<?php
/**
 * @licence GPL-v2
 */
namespace Tests\Units\App;

use \atoum;
use \App\Singleton;
use \App\Main as _Main;

/**
 * Unit testing on the main controller
 *
 * @since 0.1
 * @author Romain L.
 * @see \App\Main
 */
class Main extends atoum
{
	/**
	 * Tests running help
	 *
	 * @return void
	 * @access public
	 */
	 public function testRunHelp()
	 {
	 	$main 	  = new \mock\App\Main();
	 	$this->mockGenerator()->orphanize('__construct');
	 	$router   = new \mock\App\Router;
	 	$response = new \mock\App\Libraries\Io\Response;
	 	$router->getMockController()->getAction = 'unknown';
	 	Singleton::router($router);
	 	Singleton::response($response);


	 	//var_dump($main);

	 	$this->when(function () use ($main) {
	 		$main->run();
	 	})->mock($response)->call('write')->once();
	 }
}
