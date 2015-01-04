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
namespace Test\Unit\App\Library\Io;

use \Test\Unit\TestCase;
use \App\Library\Io\Response as _Response;

/**
 * Unit testing on the response object
 *
 * @since 0.1
 * @author Romain L.
 * @see \App\Library\Io\Response;
 */
 class Response extends TestCase
 {
 	/**
 	 * Tests displaying data as a string
 	 *
 	 * @return void
 	 * @access public
 	 */
 	 public function testDisplayWithString()
 	 {
        $this->mockGenerator->orphanize('__construct');
        $item       = new \mock\App\Item\Browser;
        $item->getMockController()->display = 'Allons-y';
        $response   = new _Response();
        $collection = new \mock\App\Library\Collection($item);

        $this->output(function () use ($response, $collection) {
            $response->display($collection);
        })->isIdenticalTo("Allons-y\n");
 	 }
 }
