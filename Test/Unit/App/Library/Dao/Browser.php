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
namespace Test\Unit\App\Library\Dao;

use \Test\Unit\TestCase;
use \App\Singleton;
use \App\Library\Dao\Browser as _Browser;

/**
 * Unit testing on browser's dao
 *
 * @since 0.1
 * @author Romain L.
 * @see \App\Library\BrowserDao
 */
class Browser extends TestCase
{
    /**
     * PDO result object
     *
     * @var \mock\PDOStatement
     *
     * @access private
     */
    private $result;

    /**
     * Tested class
     *
     * @var \App\Library\Dao\Browser
     *
     * @access private
     */
    private $browser;

    /**
     * Item to save
     *
     * @var \mock\App\Item\Browser
     *
     * @access private
     */
    private $item;

    /**
     * Setting routine
     *
     * @return void
     * @access public
     */
    public function beforeTestMethod()
    {
        $this->result = new \mock\PDOStatement;
        $this->mockGenerator()->orphanize('__construct');
        $db = new \mock\App\Library\Db;
        $db->getMockController()->prepare = $this->result;
        $db->getMockController()->beginTransaction = true;
        $db->getMockController()->commit = true;

        \App\Singleton::db($db);
        $this->browser = new _Browser;
        $this->mockGenerator()->orphanize('__construct');
        $this->item = new \mock\App\Item\Browser;
    }

    public function testGetType()
    {
        $type = $this->browser->getType();

        $this->string($type)->isIdenticalTo('browser');
    }

    /**
     * Tests updating one browser with name unknown
     *
     * @return void
     * @access public
     */
    public function testUpdateOneWithoutResult()
    {
        $this->result->getMockController()->fetch = false;

        $this->exception(function () {
            $this->browser->updateOne($this->item);
        })->isInstanceOf('\PDOException');
    }

    public function testUpdateOneWithResult()
    {
        $dataResult = [
            'software_id' => 42,
            'platform_id' => 161,
        ];
        $dataRelease = [
            'a' => [
                'major'     => 2,
                'minor'     => 7,
                'patch'     => 1,
                'timestamp' => 314,
            ]
        ];
        $this->mockGenerator()->orphanize('__construct');
        $release = new \mock\App\Item\Release;
        $release->getMockController()->display = $dataRelease;
        $this->item->getMockController()->getRelease = $release;
        $this->item->getMockController()->getCommercialName = 'Times';
        $this->result->getMockController()->fetch = $dataResult;

        $this->when(function () {
            $this->browser->updateOne($this->item);
        })->error()->notExists();
    }
}
