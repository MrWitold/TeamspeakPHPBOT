<?php
	/********************************

	Author: Tymoteusz `Razor Meister` Bartnik

	Contact: battnik90@gmail.com

	Function: groups_assigner()

	********************************/

class groups_assigner
{
	private static $name;
	private static $cfg;
	
	public function construct($plugin_name)
	{
		global $cfg;
		self::$cfg = $cfg[$plugin_name];
		self::$name = $plugin_name;
	}

	public function main($client)
	{
		global $ts3, $language;
		
		$has_register_rang = false;
		$time_spent = 0;

		foreach(self::$cfg['register_groups'] as $group)
		{
			if(in_array($group, explode(',', $client['client_servergroups'])))
			{
				$has_register_rang = true;
				$ts3->clientKick($client['clid'], "channel");
				$ts3->clientPoke($client['clid'],  $language['function']['groups_assigner']['has_rang']);
				break;
			}
		}

		if(!$has_register_rang)
		{
			if(self::$cfg['min_time_on_server'] == 0)
			{

				$config = self::$cfg['info'];
				while($sgid = current($config))
				{
					if(key($config) == $client['cid'])
					{
						$ts3->serverGroupAddClient($sgid, $client['client_database_id']);
						$ts3->clientKick($client['clid'], "channel");
						$ts3->clientPoke($client['clid'],  $language['function']['groups_assigner']['received_rang']);
					}
					next($config);
				}
			}
			else
			{
				$ts3->clientKick($client['clid'], "channel");
				$ts3->clientPoke($client['clid'], $language['function']['groups_assigner']['error']." ".self::$cfg['min_time_on_server']." ".$language['function']['groups_assigner']['min']);
			}
		}
	}
}
?>