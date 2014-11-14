<?php
namespace App;

use \App\Libraries;
use \App\Helpers\Displayer;

class Main
{
    public function run()
    {
        $router = Singleton::router();
        $action = $router->getAction();
        if (is_callable([$this, $action])) {
            $this->$action();
        } else {
            $this->help();
        }
        

        // try, with the info given by router, to call an action
        // that method give its return to response object
        // if not [se vautre], set method help content into response
    }

    public function get($softwareType = '')
    {
        /*if ('' !== $softwareType) {
            //self::testExistenceFactoryOfType($software);
            // Factories\FactoriesFactory::getAllName();
            // in_array()…
            switch ($softwareType) {
                case 'office':
                    // $factory = Factories\Type\Office::get()
                    break;
                case 'browsers':
                    $factory = Factories\Type\Browsers::getAll();
                    break;
            }
            var_dump($factory);
        //} else {
        //    $factory = Factories\FactoriesFactory::getFactories();
        }*/
        /*$factory = Libraries\Factory::get($softwareType);
        $softwares = json_encode($factory->getSoftwares());
        var_dump($softwares);
        $tmp = 'browsers.json';
        file_put_contents($tmp, $softwares);*/
        Displayer::display('Tadaaam');
    }

    public function help()
    {
        Displayer::display('-----Help-----');
        Displayer::display('Availables options:');
        Displayer::display('-h: This help');
    }

    private function update($type)
    {

    }
}
