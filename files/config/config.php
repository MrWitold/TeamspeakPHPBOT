<?php

    //
    //Login Informations
    //


    $config['connetions'] = array
    (
        'server_addres' => '',
        'server_port' => 9987,
        'server_query_port' => ,
        'server_query_login' => '',
        'server_query_password' => '',
        'server_bot_name' => ''
    );

    //
    // Functions
    // 

    $config['functions'] = array 
    (
        'channels_guard' => array
        (
            'enabled' => false,
            'channels_zone' => 817,     
            'empty_channel_topic' => '#free',    
            'free_channel_name' => 'Prywatny Kanał - Wolny',
            'head_channel_admin_group' => 52,
            'check_date' => array
            (
                'enabled' => true,
                'new_date_if_owner' => true,
                'time_interval_warning' => 4,
                'time_interval_delete' => 6,
                'warning_text' => '(ZMIEŃ DATĘ)',
            ),
            'check_channel_num' => array
            (
                'enabled' => true,  
            ),
            'check_channel_name' => array
            (
                'enabled' => false,
                'file' => 'include/cache/nicks_security.txt',
            ),
            'make_empty_channels' => array
            (
                'enabled' => true,
                'minimum_free_channels' => 5,
                'icon_id' => '0',
            ),
            'time_interval' => array('weeks' => 0,'days' => 0,'hours' => 0,'minutes' => 0,'seconds' => 30),
        ),

        'get_private_channel' => array
        (
            'enabled' => true,
            'if_client_on_channel' => array(781),
            'sub_channels' => 1,
            'head_channel_admin_group' => 52,
            'needed_server_group' => array(308,309,314),
            'message_type' => 'poke',
            'empty_channel_topic' => '#free',
            'channels_zone' => 817,
            'time_interval' => array('weeks' => 0,'days' => 0,'hours' => 0,'minutes' => 0,'seconds' => 10),
        ),

     
        'Guest_Poke_Information' => array 
        (
            'enabled' => false,
            'groups_to_poke' => array(2,57,54,72,62),
            'guest_group' => 56,
            'time_interval' => array('days' => 0,'hours' => 0,'minutes' => 0,'seconds' => 10)
        ),

        'change_server_name' => array
        (
            /****************************************
        
                    DATE FORMAT

            m: month numeric, 
            M: month in words, 
            d: day numeric, 
            D: day in words, 
            Y: year, 
            G: hours, 
            i: minutes, 
            s: seconds

            ****************************************/

            'enabled' => true,
            'server_name' => 'PanWitold.com | Online: [[ONLINE]/[MAX_CLIENTS]]', //[ONLINE] - online users, [MAX_CLIENTS] - max clients, [DATE] - format higher, [%] %online
            'format' => 'd-m-Y G:i',
            'time_interval' => array('weeks' => 0,'days' => 0,'hours' => 0,'minutes' => 0,'seconds' => 10),
            'data' => '1970-01-01 00:00:00',  //Do not change
        ),

        'groups_assigner' => array
        (
            'enabled' => true,
            'if_client_on_channel' => array(779,780),       //all checking channels id
            'register_groups' => array(309,314),               //all register groups
            'info' => array
            (   
                779 => 309,   //channel_id => server group id,
                309 => 315,
            ),
            //Minimal time on server to be registered [Db connect must be on]
            'min_time_on_server' => 0,
			'time_interval' => array('weeks' => 0,'days' => 0,'hours' => 0,'minutes' => 0,'seconds' => 10),			//in minutes
        ),

        'online_file' => array
        (
            'enabled' => true,
            'time_interval' => array('weeks' => 0,'days' => 0,'hours' => 0,'minutes' => 0,'seconds' => 40),
        ),
    );
?>
