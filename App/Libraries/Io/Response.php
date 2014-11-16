<?php
/**
 * @licence GPL-v2
 */
namespace App\Libraries\Io;

/**
 * Response constructor
 *
 * Used to format a response to display
 *
 * @since 0.1
 * @author Romain L.
 * @see \Tests\Units\App\Libraries\Io;
 */
 class Response
 {

 	private $data = [];

 	private $type;
 	/*
 	const:
 		info
 		error
 		warning
 		ok
 	*/
 	const OK = 1;
 	const WARNING = 40;

 	public function __construct()
 	{
 		$this->type = self::OK;
 	}

 	/**
 	 * Sets response as a warning
 	 *
 	 * @return void
 	 * @access public
 	 */
 	public function setWarning()
 	{
 		$this->setType(self::WARNING);
 	}

 	/**
 	 * Sets response type
 	 *
 	 * @param int $type Response type
 	 *
 	 * @return void
 	 * @access private
 	 */
	private function setType($type)
 	{
 		$this->type = (int) $type;
 	}

 	/**
 	 * Returns response type
 	 *
 	 * @return int
 	 * @access public
 	 */
 	public function getType()
 	{
 		return $this->type;
 	}

 	/**
 	 * Append a string to response sequence
 	 *
 	 * @param string $string
 	 *
 	 * @return void
 	 * @access public
 	 */
 	 public function write($string)
 	 {
 	 	$this->data[] = (string) $string;
 	 }

 	 public function flush()
 	 {
 	 	$this->data = [];
 	 }

 	 /**
 	  * Returns data's content
 	  *
 	  * @return array
 	  * @access public
 	  */
 	  public function sendOutput()
 	  {
 	  	return $this->data;
 	  }

 	  /*settype
 	  
 	  write
 	  flush
 	  isWarning
 	  gettype?
 	  sendoutput
 	  getcookedtype



 	  */

 }

