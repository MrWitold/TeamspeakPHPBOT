<?php

class mr_bot 
{
        
    public function isTimeForEvent($event) {
        global $cfg,$event_info;
        $time = $cfg[$event]['time_interval'];

        if(time() >= $event_info['data'][$event]){
            $event_info['data'][$event] = time() + $time['seconds'] + ($time['minutes'] * 60) + ($time['hours'] * 60 * 60) + ($time['days'] * 24 * 60 * 60);
            return true;
        }
        else{
            return false;
        }
    }
}
?>