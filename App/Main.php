<?php
/**
 * @licence GPL-v2
 * Summary :
 * « You may copy, distribute and modify the software as long as
 * you track changes/dates of in source files and keep all modifications under GPL.
 * You can distribute your application using a GPL library commercially,
 * but you must also disclose the source code. »
 *
 * @link https://www.tldrlegal.com/l/gpl2
 * @see LICENSE file
 */
namespace App;

use \App\Library;

/**
 * Main controller
 *
 * @since 0.1
 * @author Romain L.
 * @see \Test\Unit\App\Main
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
        $type   = $router->getSoftwareType();
        if (is_callable([$this, $action])) {
            return call_user_func_array([$this, $action], [$type]);
        }
        return $this->help();
    }

    /**
     * Execute GET method, in a RESTful meaning
     *
     * @return array
     * @access private
     */
    private function get()
    {
        $itemsType    = new \App\Item\Types(Singleton::daoType()->getAllNames());
        $softwareType = Singleton::router()->getSoftwareType();
        if (in_array($softwareType, $itemsType->getNames())) {
            Singleton::mainFactory()->create($softwareType);
            $softwareName = Singleton::router()->getSoftwareName();
            if ('all' === $softwareName) {
                return Singleton::factory()->getAll();
            } elseif (isset($softwareName) && in_array($softwareName, Singleton::factory()->getAllNames())) {
                return Singleton::factory()->getByName($softwareName);
            } else {
                return $this->help('badSoftwareName');
            }
        } else {
            return $this->help('badSoftwareType');
        }
    }

    /**
     * Execute UPDATE method, in a RESTful meaning
     *
     * @return void
     * @access private
     */
    private function update()
    {
        $itemsType    = new \App\Item\Types(Singleton::daoType()->getAllNames());
        $softwareType = Singleton::router()->getSoftwareType();
        if (in_array($softwareType, $itemsType->getNames())) {
            Singleton::mainFactory()->create($softwareType);
            $softwareName = Singleton::router()->getSoftwareName();
            if ('all' === $softwareName) {
                throw new \Exception('Not available');
            } elseif (isset($softwareName) && in_array($softwareName, Singleton::factory()->getAllNames())) {
                Singleton::factory()->updateByName($softwareName);
            } else {
                return $this->help('badSoftwareName');
            }
        } else {
            return $this->help('badSoftwareType');
        }
    }

    private function checkExistenceSoftwareType()
    {
    }

    /**
     * Display help
     *
     * @param string $query
     *
     * @return array
     * @access private
     */
    private function help($section = null)
    {
        $help = new \App\Library\Factory\Help();
        switch ($section) {
            case 'badSoftwareType' :
                return $help->badSoftwareType();
                break;
            case 'badSoftwareName' :
                return $help->badSoftwareName();
                break;
            default:
                return $help->main();
        }
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
        //$res = $db->query('DELETE FROM software');
        //$res = $db->query('DELETE FROM type');
        /*$res = $db->query('
            INSERT INTO type (type_name, type_last_update) VALUES ("browser", ' . time() . ');
        ');
*/
        $res = $db->query('
            INSERT INTO software (type_id, software_name, software_last_update) VALUES (1, "firefox", ' . time() . ');
        ');
        var_dump($res);
    }
}
