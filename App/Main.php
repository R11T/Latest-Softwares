<?php
namespace App;

use \App\Libraries;
use \App\Helpers\Displayer;

/**
 * Main controller
 *
 * @since 0.1
 * @author Romain L.
 * @see \Tests\Units\Main
 */
class Main
{
	/**
	 * Execute script action, giving results to \Response
	 *
	 * @return void
	 * @access public
	 */
    public function run()
    {
        $router = Singleton::router();
        $action = $router->getAction();
        if (is_callable([$this, $action])) {
            $this->$action();
        } else {
            $this->help();
        }
    }

    protected function get($softwareType = '')
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

    protected function help()
    {
    	$response = Singleton::response();
    	//$response->writeHelp();
    	$response->write('----Help----');
    	$response->write('Usage : {script_name} action [parameters]');

    	$response->write('Availables actions :');
    	$response->write('help : This help');
    	$response->write('get [parameters] : Get latest information…');
        /*Displayer::display('-----Help-----');
        Displayer::display('Availables actionns:');
        Displayer::display('-h: This help');*/
    }

    protected function update($type)
    {

    }
}
