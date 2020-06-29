<?php
	/********************************

	Author: Tymoteusz `Razor Meister` Bartnik

	Contact: battnik90@gmail.com

	Function: record_online()

	********************************/

class online_file
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


	function main()
	{
		global $ts3, $server_info;

		$current_online = $server_info['virtualserver_clientsonline'] - $server_info['virtualserver_queryclientsonline'];

			$fp = fopen("/var/www/panwitold.tech/public_html/onlinedata.txt", "w");
			fwrite($fp, $current_online);
			fclose($fp);
	}
}
?>