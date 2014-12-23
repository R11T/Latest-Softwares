<?php
namespace App;

use \App\Libraries;

/**
 * Main controller
 *
 * @since 0.1
 * @author Romain L.
 * @see \Tests\Units\App\Main
 */
class Main
{
	/**
	 * Execute script action
	 *
	 * @return void
	 * @access public
	 */
    public function run()
    {
        $router = Singleton::router();
        $action = $router->getAction();
        $query  = $router->getQuery();
        if ('help' !== $action) {
            if (null !== $query) {
                $conNS = CONTROLLER_NS . ucfirst($query);
                if (is_callable([$conNS, $action])) {
                    Singleton::response()->display((new $conNS)->$action());
                } else {
                    throw new \DomainException('Software Type doesn\'t exist');
                }
            } else {
                throw new \InvalidArgumentException('Parameter unknown');
            }
        } else {
            Singleton::response()->display($this->help());
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
    private function update($softwareType = null)// rename to push
    {
        if (null === $softwareType) {
            throw new \BadFunctionCallException('No software type specified');
        } else {
            $response = Singleton::response();
            $softwareType = ucfirst($softwareType);
            $softwareClass = MODEL_NS . $softwareType;
            if (is_dir(MODEL_DIR . $softwareType) && class_exists($softwareClass)) {
                $db = Singleton::db();
                $res = $db->query('SELECT * from software');
                foreach ($res->fetchAll(\PDO::FETCH_ASSOC) as $row) {
                    $response->display($row['software_name']);
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
     * @return array
     * @access private
     */
    private function help($query = null)
    {
        return [
            '---- Help ----',
            'Usage : {script_name} action [parameters]',
            'Availables actions :',
            'help : This help',
            'get [parameters] : Get latest information…',
            'parameters : ? for listing parameters allowed',
            '',
        ];
    }

    private function create() // rename to post
    {
        // create a new table from a predefined schema (it has to stick to call methods, interface with inheritance can force this)
        // append softwareType table
        // and new softwareType class
        // and add new software example class
        $db  = Singleton::db();
        $res = $db->query('DROP TABLE IF EXISTS type');
        $res = $db->query('
            CREATE TABLE type (type_id INTEGER PRIMARY KEY,
            type_name TEXT NOT NULL DEFAULT \'\',
            type_last_update INTEGER NOT NULL DEFAULT CURRENT_TIMESTAMP);
        ');
        $res = $db->query('CREATE UNIQUE INDEX type_name ON type(type_name)');
        var_dump($res);
        $res = $db->query('DROP TABLE IF EXISTS software');
        $res = $db->query('CREATE TABLE test(a integer)');
        var_dump($res);
        $res = $db->query('
            CREATE TABLE software (software_id INTEGER PRIMARY KEY,
            type_id INTEGER NOT NULL,
            software_name TEXT NOT NULL DEFAULT \'\',
            software_last_update INTEGER NOT NULL DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (type_id) REFERENCES type(type_id)
            );
        ');
        $res = $db->query('CREATE UNIQUE INDEX software_name ON software(software_name)');
        var_dump($res);
    }
    
    private function add() // refacto with above
    {
        // with software type and software name, create new software class
        // with software type only, create new software type class
        // for the momentn we will only add a new browser : 1/ into the db 2/ in order to expect class with its name (and with its inheritance)
        $db  = Singleton::db();
        $res = $db->query('DELETE FROM software');
        $res = $db->query('DELETE FROM type');
        $res = $db->query('
            INSERT INTO type (type_name, type_last_update) VALUES ("browser", ' . time() . ');
        ');

        var_dump($res);
        $res = $db->query('
            INSERT INTO software (type_id, software_name, software_last_update) VALUES (1, "chrome", ' . time() . ');
        ');
        var_dump($res);
    }

    private function verifConsistency()
    {
        // check if all classes are present, callable and match to db informations
        // ensure that there's no residue of work undone
    }
}
