<?php

class channels_guard
{
	private $before_clients;
	private static $name;
	private static $cfg;
	
	public function construct($plugin_name)
	{
		global $cfg;
		self::$cfg = $cfg[$plugin_name];
		self::$name = $plugin_name;
	}
	
	private function find_previous_channel($cid, &$num)
	{
		global $ts3;
		$chan = 0;
		foreach($channels = $ts3->getElement('data', $ts3->channelList("-topic -limits -flags")) as $channel)
		{
			if($channel['pid'] == self::$cfg['channels_zone'])
			{	
				if($channel['cid'] == $cid)
					return $chan;

				$chan = $channel['cid'];
				$num++;
			}
		}
		return 0;
	}

	private function creat_free_channel($number, $order)
	{
		global $ts3, $language;
		$lang = $language['function']['channels_guard'];
	
		$desc = "[center][size=15][b]".$lang['private_channel'].$number.$lang['empty']."[/b][/size][/center]\n\n[size=11]".$lang['how_to_get']."[/size]\n\n\n";
		
		if($order == 'none')
		{
			$ts3->channelCreate(array
			(
				'channel_name' => $number.". ".self::$cfg['free_channel_name'],
				'channel_topic' => self::$cfg['empty_channel_topic'],
				'cpid' => self::$cfg['channels_zone'],
				'channel_flag_semi_permanent' => 0,
				'channel_flag_permanent' => 1,
				'channel_flag_maxclients_unlimited' => 0,
				'channel_flag_maxfamilyclients_unlimited' => 0,
				'channel_flag_maxfamilyclients_inherited' => 0,
				'channel_maxclients' => 0,
				'channel_maxfamilyclients' => 0,
				'channel_description' => $desc,
			));
		}
		else
		{
			$ts3->channelCreate(array
			(
				'channel_name' => $number.". ".self::$cfg['free_channel_name'],
				'channel_topic' => self::$cfg['empty_channel_topic'],
				'cpid' => self::$cfg['channels_zone'],
				'channel_flag_semi_permanent' => 0,
				'channel_flag_permanent' => 1,
				'channel_flag_maxclients_unlimited' => 0,
				'channel_flag_maxfamilyclients_unlimited' => 0,
				'channel_flag_maxfamilyclients_inherited' => 0,
				'channel_maxclients' => 0,
				'channel_maxfamilyclients' => 0,
				'channel_order' => $order,
				'channel_description' => $desc,
			));
		}
	}

	private function check_channels()
	{
		global $ts3, $clients, $language;
		
		$lang = $language['function']['channels_guard'];
		$config = self::$cfg['check_date'];
			
		$taken = 0;
		$free = 0;
		$channels_to_check = array();	
		$cids = array();
			
		if($config['new_date_if_owner'])
		{
			foreach($channels = $ts3->getElement('data', $ts3->channelList("-topic")) as $channel)
				if($channel['pid'] == self::$cfg['channels_zone'])
				{
					if($channel['channel_topic'] != self::$cfg['empty_channel_topic'] && $channel['channel_topic'] != date('d-m-Y'))
					{
						array_push($channels_to_check, $channel);
						array_push($cids, $channel['cid']);
					}
				}
				elseif(in_array($channel['pid'], $cids))
					array_push($channels_to_check, $channel);
		}

		foreach($channels = $ts3->getElement('data', $ts3->channelList("-topic -limits -flags")) as $channel)
		{
			if($channel['pid'] == self::$cfg['channels_zone'])
			{	
				if($channel['channel_topic'] != self::$cfg['empty_channel_topic'])
				{
					$taken++;
					
					if(self::$cfg['check_date']['enabled'])
					{
						if(!preg_match("/^[0-9]{2}\-[0-9]{2}\-[0-9]{4}$/", $channel['channel_topic']))
							$ts3->channelEdit($channel['cid'], array('channel_topic' => date('d-m-Y')));

						elseif($channel['channel_topic'] != date('d-m-Y'))
						{
							if($config['new_date_if_owner'])
							{
								foreach($channels_to_check as $channel_child)
								{
									if(($channel_child['pid'] == $channel['cid'] || $channel_child['cid'] == $channel['cid']) && $channel_child['total_clients'] > 0)
									{
										$find = false;
										$channel_admins = $ts3->getElement('data', $ts3->channelGroupClientList($channel['cid'],NULL,self::$cfg['head_channel_admin_group']));
									
										if($channel_admins != NULL)
										{
											$clients_on_channel = $ts3->getElement('data', $ts3->channelClientList($channel_child['cid']));

											foreach($channel_admins as $cli)
											{
												foreach($clients_on_channel as $client_on_channel)
													if($client_on_channel['client_database_id'] == $cli['cldbid'])
													{
														$ts3->channelEdit($channel['cid'], array('channel_topic' => date('d-m-Y')));
														$find = true;
														break;
													}
												
												if($find)
													break;

											}
										}
									}	
								}
							}
							
							$channel_date = explode("-", $channel['channel_topic']);
							$channel_time = mktime(0,0,0,$channel_date[1],$channel_date[0],$channel_date[2]);
							$time_delete = mktime(0,0,0,$channel_date[1],$channel_date[0] + self::$cfg['check_date']['time_interval_delete'],$channel_date[2]);
							$time_change_name = mktime(0,0,0,$channel_date[1],$channel_date[0] + self::$cfg['check_date']['time_interval_warning'],$channel_date[2]);

							if(time() < $channel_time)
								$ts3->channelEdit($channel['cid'], array('channel_topic' => date('d-m-Y')));

							if(time()>=$time_delete)
							{
								$number = 1;
								$previous = self::find_previous_channel($channel['cid'], $number);
								$ts3->channelDelete($channel['cid']);


								if($previous == 0)
									self::creat_free_channel($number, '0');
								else
									self::creat_free_channel($number, $previous);
							}
							elseif(strpos($channel['channel_name'],$config['warning_text']) === False && time()>=$time_change_name)
									$ts3->channelEdit($channel['cid'], array('channel_name' => $channel['channel_name']." ".$config['warning_text']));

							elseif(strpos($channel['channel_name'],$config['warning_text']) !== False && time()<$time_change_name)
									$ts3->channelEdit($channel['cid'], array('channel_name' => substr($channel['channel_name'], 0, strlen($channel['channel_name'])-strlen($config['warning_text']))));
						}
						elseif(strpos($channel['channel_name'],$config['warning_text']) !== False)
							$ts3->channelEdit($channel['cid'], array('channel_name' => substr($channel['channel_name'], 0, strlen($channel['channel_name'])-strlen($config['warning_text']))));
					}
					if(self::$cfg['check_channel_name']['enabled'] && self::has_bad_nick(strtolower($channel['channel_name'])))
					{
						self::find_previous_channel($channel['cid'], $number);
						$number++;
						$ts3->channelEdit($channel['cid'], array('channel_name' => $number.". ".$lang['bad_name']));	
					}
				}
				else	
					$free++;
			}
		}
		
		if(self::$cfg['make_empty_channels']['enabled'])
			self::make_empty_channels($free, $taken);
	}

	private function check_channel_num()
	{
		global $ts3, $language;
		$lang = $language['function']['channels_guard'];
		
		$number = 1;
		foreach($channels = $ts3->getElement('data', $ts3->channelList("-topic -limits -flags")) as $channel)
		{
			if($channel['pid'] == self::$cfg['channels_zone'])
			{
				if(strpos($channel['channel_name'],$number.". ") === False)
				{
					$created = false;

					for($i=1; $i<=5; $i++)
					{
						$num = $number+$i;
				
						if(strpos($channel['channel_name'],$num.". ") !== False)
						{
							for($j=0; $j<$i; $j++)
							{
								$channel_nr = 1;
								$previous = self::find_previous_channel($channel['cid'], $channel_nr);

								if($channel_nr == 0) $channel_nr++;

								if($previous == 0)
									self::creat_free_channel($channel_nr, '0');
								else
									self::creat_free_channel($channel_nr, $previous);
							}		

							$number += $i;
				
							$created = true;
							break;
						}
					}
		
					
					if(!$created)
					{	
						if($channel['channel_topic'] == self::$cfg['empty_channel_topic'])	
							$ts3->channelEdit($channel['cid'], array('channel_name' => $number.". ".self::$cfg['free_channel_name'], 'channel_description' => 
								"[center][size=15][b]".$language['function']['channels_guard']['private_channel'].$number.$language['function']['channels_guard']['empty']."[/b][/size][/center]\n\n[size=11]".$language['function']['channels_guard']['how_to_get']."[/size]\n\n\n".$language['function']['down_desc_img']
							));
						else
							$ts3->channelEdit($channel['cid'], array('channel_name' => $number.". ".$lang['wrong_name']));

					}
				}
				$number++;
			}
		}
	}

	private function has_bad_nick($name)
	{
		$bad_names = explode(",", strtolower(fread(fopen(self::$cfg['check_channel_name']['file'], "r"), filesize(self::$cfg['check_channel_name']['file']))));

		foreach($bad_names as $bad_name)
		{
			if(preg_match('/^[a-zA-Z0-9\.\-_]/', $bad_name) && strpos($name,$bad_name) !== False)
				return true;
		}

		return false;
	}


	private function make_empty_channels($free, $taken)
	{
		global $ts3;

		$config = self::$cfg['make_empty_channels'];

		if($free<$config['minimum_free_channels'])
		{
			$count = $config['minimum_free_channels'] - $free;
			$num = $free+$taken+1;
			
			for($i=0; $i<$count; $i++)
			{
				self::creat_free_channel($num, 'none');
				$num++;
			}
		}
	}

	public function main()
	{
		global $ts3, $language;

		self::check_channels();

		if(self::$cfg['check_channel_num']['enabled'])
			self::check_channel_num();
	}
}
?>