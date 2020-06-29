<?php
    
    set_time_limit(0);

    require_once ('files/classes/ts3admin.class.php');
    require_once ('files/classes/mr_bot.class.php');
    require_once ('files/config/config.php');
    require_once ('files/config/pl.php');

    $cfg = $config['functions'];
    $connection = $config['connetions'];

    $plugins_events_commands = array();
    $events = array();
    $event_info = array ('data' => NULL);

    $mr_bot = new mr_bot();


    foreach (new DirectoryIterator('files/functions') as $fileInfo ) {
        $file = pathinfo($fileInfo->getFilename());

        if (isset($file['extension']) && ($file['extension'] == 'php')) 
            array_push($plugins_events_commands, $file['filename']);
    }

    foreach ($plugins_events_commands as $function ) {
        if (array_key_exists($function, $cfg) && $cfg[$function]['enabled']) {
            if (array_key_exists('time_interval', $cfg[$function])) {
                require 'files/functions/' . $function . '.php';
                    array_push($events, $function);
                    $function::construct($function);
                    $event_info['data'][$function] = time();
                }
            }
        }


    $ts3 = new ts3admin($connection['server_addres'], $connection['server_query_port']);

    if($ts3->getElement('success', $ts3->connect())) {
        $ts3 -> login($connection['server_query_login'],$connection['server_query_password']);
        $ts3 -> selectServer($connection['server_port']);
        $ts3 -> setName($connection['server_bot_name']);

        while(true){

            Sleep(1);

            $clients = $ts3->getElement('data',$ts3->clientList('-uid -groups -ip -times -away -voice -country'));
            $server_info = $ts3->getElement('data', $ts3->serverInfo());

            foreach ($events as $event) {
                if ($mr_bot::isTimeForEvent($event)) {
                    if (property_exists($event, 'before_clients')) {
                            $event::main();
                        }
                    foreach ($clients as $client) {
                        if (array_key_exists('if_client_on_channel', $cfg[$event])) {
                            if (in_array($client['cid'], $cfg[$event]['if_client_on_channel'])) {
                                $event::main($client);
                            }
                        }
                    }
                }
            }
        }
    }
    else{
        echo ('Connection could not be established.');
    }


?>