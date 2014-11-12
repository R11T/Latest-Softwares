<?php
namespace App;

use \Exception\LogicException;
use \App\Controllers\Main;
use \App\Helpers;

class Router
{
    public function routing(array $argv, $argc)
    {
        list($script, $action, $param) = $argv;
        if ('latest-softwares' !== $script && './latest-softwares' !== $script) {
            throw new \LogicException('Bad script called');
        }
        switch ($options) {
            case 'help':
                Helpers\Displayer::display('-----Help-----');
                Helpers\Displayer::display('Availables options:');
                Helpers\Displayer::display('-h: This help');
                break;
            
            default:
               call_user_func_array([new Main(), $action], [$param]); 
        }
    }
}
