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
 	 * Tests displaying data as a string
 	 *
 	 * @return void
 	 * @access public
 	 */
 	 public function testDisplayWithString()
 	 {
        $data     = 'This is a string';
 	 	$response = new _Response();

        $this->output(function () use ($response, $data) {
            $response->display($data);
        })->isIdenticalTo("This is a string\n");
 	 }

     public function testDisplayWithArray()
     {
        $data     = ['Allons-y', 'Geronimo'];
        $response = new _Response();

        $this->output(function () use ($response, $data) {
            $response->display($data);
        })->isIdenticalTo("Allons-y\nGeronimo\n");
     }
 }
