<?php
if(!defined('ENVIRONMENT'))
{
    $domain = strtolower($_SERVER['HTTP_HOST']);

    switch($domain) {
        case 'giatmara.edu.my' :
            define('ENVIRONMENT', 'production');
            break;

        case 'gspel.toosa.id' :
            define('ENVIRONMENT', 'staging');
            break;

        case 'gspeluat.toosa.id' :
            define('ENVIRONMENT', 'testing');
            break;

        default :
            define('ENVIRONMENT', 'development');
            break;
    }
}
