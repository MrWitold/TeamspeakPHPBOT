<?php

class get_private_channel
{
	private static $name;
	private static $cfg;
	
	public function construct($event_name)
	{
		global $cfg;
		self::$cfg = $cfg[$event_name];
		self::$name = $event_name;
	}	

	public function main($client)
	{
		global $ts3, $language;

		$lang = $language['function']['get_private_channel'];
		$has_rang = false;
		$has_channel = false;
		$give_channel = false;

		if(self::$cfg['message_type'] == 'poke')
			$poke = true;
		else
			$poke = false;

		$client_groups = explode(',', $client['client_servergroups']);

		foreach($client_groups as $client_group)
		{
			if(in_array($client_group, self::$cfg['needed_server_group']))
				$has_rang = true;
		}

		if($has_rang)
		{
			$cgcl = $ts3->getElement('data', $ts3->channelGroupClientList(NULL, $client['client_database_id']));
			foreach($cgcl as $once_cgcl)
			{
				if($once_cgcl['cldbid'] == $client['client_database_id'] && $once_cgcl['cgid'] == self::$cfg['head_channel_admin_group'])
				{
					$has_channel = true;
					if($poke)
						$ts3->clientPoke($client['clid'], $lang['has_channel']);
					else
						$ts3->sendMessage(1, $client['clid'], $lang['has_channel']);

					$ts3->clientMove($client['clid'], $once_cgcl['cid']);

					break;
				}
			}
			if(!$has_channel)
			{
				$number = 0;
				foreach($ts3->getElement('data', $ts3->channelList("-topic -limits -flags")) as $channel)
				{
					if(!$give_channel && $channel['pid'] == self::$cfg['channels_zone'])
					{						
						$number++;
						if($channel['channel_topic'] == self::$cfg['empty_channel_topic'])
						{
							if($poke)
								$ts3->clientPoke($client['clid'], $lang['get_channel']);
							else
								$ts3->sendMessage(1, $client['clid'], $lang['get_channel']);
							
							$message = "\n[b]".$lang['hi'].$client['client_nickname']."![/b]\n";
							$message .= $lang['channel_created']."[b]".$number."[/b]\n".$lang['default_pass']."\n[color=green]".$lang['gl&hf']."[/color]";
						
							$ts3->sendMessage(1, $client['clid'], $message);
							$ts3->clientMove($client['clid'], $channel['cid']);
							$ts3->setClientChannelGroup(self::$cfg['head_channel_admin_group'], $channel['cid'], $client['client_database_id']);

							$data = date('d-m-Y');
							$desc_main = "[center][size=15][b]".$lang['private_channel'].$number.$lang['not_empty']."[/b][/size][/center]\n";
							$desc_main .= "[left][img]http://i.imgur.com/efy87mj.png[/img] ● [size=11][b]".$lang['owner']."[URL=client://2/".$client['client_unique_identifier']."]".$client['client_nickname']."[/url][/b][/size][/left][left][img]http://i.imgur.com/uoiJnCi.png[/img] ● [size=11][b]".$lang['created']."".$data."\n[/b][/size][/left]\n";

							if(strlen($client['client_nickname']) >=20 )
								$name = $number.". ".$language['function']['get_private_channel']['channel_name'];
							else
								$name = $number.". ".$language['function']['get_private_channel']['channel_name'].$client['client_nickname'];

							$ts3->channelEdit($channel['cid'], array
							(
								'channel_name' => $name,
								'channel_description' => $desc_main,
								'channel_topic' => $data,
								'channel_flag_maxclients_unlimited'=>1, 
								'channel_flag_maxfamilyclients_unlimited'=>1, 
								'channel_flag_maxfamilyclients_inherited'=>0,
								'channel_maxclients' => 1,
								'channel_maxfamilyclients' => 1,
								'channel_password' => '123',
							));
						
							$desc_sub = $lang['sub_channel']."[/b][/size][/center]\n";
							$desc_sub .= "\n[size=11][b]".$lang['owner']."[/b]".$client['client_nickname']."[/size]\n\n\n";
							for($i=0; $i<self::$cfg['sub_channels']; $i++)
							{
								$num = $i;
								$num++;
								$ts3->channelCreate(array
								(
									'channel_flag_permanent' => 1, 
									'cpid' => $channel['cid'], 
									'channel_name' => $num.".".$language['function']['get_private_channel']['sub_channel'], 
									'channel_flag_maxclients_unlimited' => 1, 
									'channel_flag_maxfamilyclients_unlimited' => 1,
									'channel_password' => '123',
									'channel_description' => "[center][size=15][b]".$num.$desc_sub,
								));
							}

							$give_channel = true;
							break;
						}
					}
				}
				if(!$give_channel)
				{
					if($poke)
						$ts3->clientPoke($client['clid'], $lang['no_empty']);
					else
						$ts3->sendMessage(1, $client['clid'], $lang['no_empty']);

					$ts3->clientKick($client['clid'], "channel");
				}
			}
		}
		elseif(!$has_rang)
		{
			if($poke)
				$ts3->clientPoke($client['clid'], $lang['hasnt_rang']);
			else
				$ts3->sendMessage(1, $client['clid'], $lang['hasnt_rang']);

			$ts3->clientKick($client['clid'], "channel");
		}
	}
}
?>