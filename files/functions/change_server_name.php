<?php
	/********************************

	Author: Tymoteusz `Razor Meister` Bartnik

	Contact: battnik90@gmail.com

	Function: change_server_name()

	********************************/

class change_server_name
{
	public static $before_clients = 1;
	private static $name;
	private static $cfg;
	
	public function construct($event_name)
	{
		global $cfg;
		self::$cfg = $cfg[$event_name];
		self::$name = $event_name;
	}


	private function replace_name($name, $date_format)
	{
		global $ts3, $server_info;

		$edited_name = array
		(
			'[ONLINE]' => $server_info['virtualserver_clientsonline'] - $server_info['virtualserver_queryclientsonline'],
			'[MAX_CLIENTS]' => $server_info['virtualserver_maxclients'],
			'[DATE]' => date($date_format),
		);

		return str_replace(array_keys($edited_name), array_values($edited_name), $name);
	}

	public function main()
	{
		global $ts3, $server_info;			

		$name = self::replace_name(self::$cfg['server_name'], self::$cfg['format']);

		if($name != $server_info['virtualserver_name'])
			$ts3->serverEdit(array('virtualserver_name' => $name));	
	}
}
?>