<?php
namespace App\Controllers;

use \App\Libraries;

class Main
{
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
        $factory = Libraries\Factory::get($softwareType);
        $softwares = json_encode($factory->getSoftwares());
        var_dump($softwares);
        $tmp = 'browsers.json';
        file_put_contents($tmp, $softwares);
    }

    private function testExistenceFactoryOfType($type)
    {

    }
}
