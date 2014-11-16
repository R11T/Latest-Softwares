<?php
/**
 * @licence GPL-v2
 */
namespace Tests\Units\App\Libraries\Io;

use \atoum;
use \App\Libraries\Io\Response as _Response;

/**
 * Unit testing on the response object
 *
 * @since 0.1
 * @author Romain L.
 * @see \App\Libraries\Io\Response;
 */
 class Response extends atoum
 {
 	/**
 	 * Tests setting a warning response type
 	 *
 	 * @return void
 	 * @access public
 	 */
 	 public function testSetWarning()
 	 {
 	 	$response = new _Response();

 	 	$response->setWarning();

 	 	$this->integer($response->getType())->isIdenticalTo(_Response::WARNING);
 	 	
 	 }

 	/**
 	 */
 	 public function testWrite()
 	 {
 	 	$response = new _Response();
 	 	$response->write('all went well');

 	 	$out = $response->sendOutput();

 	 	$this->array($out)->size->isIdenticalTo(1);
 	 	$this->string($out[0])->isIdenticalTo('all went well');
 	 	// string, type, append
 	 }
 }
