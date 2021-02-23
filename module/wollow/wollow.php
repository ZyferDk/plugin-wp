<?php

class Wollow
{
    //constructor for Wollow object
    function Wollow()
    {
        register_activation_hook(__FILE__, array(&$this, 'activate'));
    }

    function activate()
    {
        //initialize some stored plugin stuff
        if (get_option('wollow') == '') {
            update_option('wollow', array());
        }
        update_option('myplugin_activated', time());
        //etc
    }
}
