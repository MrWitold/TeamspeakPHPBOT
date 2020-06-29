<?php

class Guest_Poke_Information
{
    public function construct($event_name)
    {
        global $cfg;
        self::$cfg = $cfg[$event_name];
        self::$name = $event_name;
    }

    public static function onThink()
    {
        global $ts3,$config,$clientList,$oldClientList;

        $clients['new'] = self::organizeClientList($clientList);
        $clients['old'] = self::organizeClientList($oldClientList);

        $clients['diff'] = array_diff($clients['new'], $clients['old']);

        if(count($clients['diff']) != 0) {
            foreach($clients['diff'] as $new_user){
                if(self::checkMembership($new_user))
                    self::pokeGroup();
            }
        }
    }

    private static function organizeClientList($clientList)
    {
        $clients['all'] = $clientList;
        $clients['recent'] = array();

        foreach($clients['all'] as $client) {
                
                if($client['client_type'] == 0) {
                        array_push($clients['recent'], $client['clid']);
                }
        }
        
        return $clients['recent'];
    }

    private static function checkMembership($clid)
    {
        global $clientList,$config;

        foreach($clientList as $client){
            if($client['clid'] == $clid){
                $groups = explode(",",$client['client_servergroups']);
                if(in_array($config['Guest_Poke_Information']['guest_group'],$groups)){
                    return true;
                }
            }
        }

        return false;
    }

    private static function pokeGroup()
    {
        global $clientList,$config,$ts3;

        foreach($clientList as $client){
            $groups = explode(",",$client['client_servergroups']);
            foreach($config['Guest_Poke_Information']['groups_to_poke'] as $admin_group){
                if(in_array($admin_group,$groups)){
                    $ts3 -> clientPoke($client['clid'],"Ktoś nowy pojawił się na serwerze.");
                    break;
                }
            }
        }
    }
}