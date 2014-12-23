<?php
namespace App;

use \App\Libraries;
//use \App\Helpers\Displayer;

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
        $query  = $router->getQuery();
        if (is_callable([$this, $action])) {
            $this->$action($query);
        } else {
            $this->help();
        }
    }

    /**
     * Display latests data form database
     *
     * @param string|null $softwareType
     *
     * @return void
     * @access private
     */
    private function get($softwareType = null)
    {
        if (null === $softwareType) {
            throw new \BadFunctionCallException('No software type specified');
        } else {
            $response = Singleton::response();
            $softwareType = ucfirst($softwareType);
            $softwareClass = MODEL_NS . $softwareType;
            if (is_dir(MODEL_DIR . $softwareType) && class_exists($softwareClass)) {
                $data = file_get_contents(ROOT_DIR . $softwareType . '.json');
                $response->display($data);
            } else {
                throw new \BadFunctionCallException('Software Type doesn\'t exist');
            }
        }
    }

    /**
     * Refresh database' data
     *
     * @param string $softwareType
     *
     * @return void
     * @access private
     */
    private function update($softwareType = null)
    {
        if (null === $softwareType) {
            throw new \BadFunctionCallException('No software type specified');
        } else {
            $response = Singleton::response();
            $softwareType = ucfirst($softwareType);
            $softwareClass = MODEL_NS . $softwareType;
            if (is_dir(MODEL_DIR . $softwareType) && class_exists($softwareClass)) {
                $db = Singleton::db();
                //$db->query('INSERT INTO software VALUES("", "chrome", 11)');
                $res = $db->query('SELECT * from software');
                foreach ($res as $data) {
                    $response->display([$data['software_id'], $data['software_name'], $data['software_version']]);
                }

                //$data = file_get_contents(ROOT_DIR . $softwareType . '.json');
                //$response->display($data);
            } else {
                throw new \BadFunctionCallException('Software Type doesn\'t exist');
            }
        }
    }

    /**
     * Display help
     *
     * @param string $query
     *
     * @return void
     * @access private
     */
    private function help($query = null)
    {
        $response = Singleton::response();
        $help = [
            '---- Help ----',
            'Usage : {script_name} action [parameters]',
            'Availables actions :',
            'help : This help',
            'get [parameters] : Get latest information…',
            'parameters : ? for listing parameters allowed',
            "\n",
        ];
        $response->display($help);
    }

    private function create()
    {
        // create a new table from a predefined schema (it has to stick to call methods, interface with inheritance can force this)
        // append softwareType table
        // and new softwareType class
        // and add new software example class
        $db = Singleton::db();
                $db->query('CREATE TABLE IF NOT EXISTS software (software_id int unsigned auto_increment not null,
                software_name varchar(50) not null default \'\',
                software_version int unsigned not null default 0)');
    }
    /*private function add()
    {
        // with software type and software name, create new software class
        // with software type only, create new software type class
    }*/
}
