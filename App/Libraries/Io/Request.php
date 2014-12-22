<?php
/**
 * @licence GPL-v2
 */
namespace App\Libraries\Io;

/**
 * Request constructor
 *
 * Used to understand parameters given in order to help router to do its job
 *
 * @since 0.1
 * @author Romain L.
 */
class Request
{
    /**
     * Typical softwares' arg
     *
     * @var array
     *
     * @access private
     * @link https://en.wikipedia.org/wiki/Entry_point#C_and_C.2B.2B
     */
    private $argv;

    /**
     * Typical softwares's arg
     *
     * @var int
     *
     * @access private
     * @link https://en.wikipedia.org/wiki/Entry_point#C_and_C.2B.2B
     */
    private $argc;

    /**
     * In the argv, action arg's offset
     *
     * @var int
     *
     * @access public
     */
    const ACTION = 1;

    /**
     * In the argv, query arg's offset
     *
     * @var int
     *
     * @access public
     */
     const QUERY = 2;

    /**
     * Request constructor (you don't say ?)
     * Sets request's attributes
     *
     * @param array $argv
     * @param int   $argc
     *
     * @access public
     * @throw \BadFunctionCallException if script is called without argument
     */
    public function __construct(array $argv, $argc)
    {
        if (1 === $argc) {
            throw new \BadFunctionCallException('No action specified');
        }
        $this->argv = $argv;
        $this->argc = $argc;
    }

    /**
     * Returns action requested by the user
     *
     * @return string
     * @access public
     */
    public function getAction()
    {
        return $this->argv[self::ACTION];
    }

    /**
     * Returns query
     *
     * @return string|null if query doesn't exist
     * @access public
     */
     public function getQuery()
     {
        return isset($this->argv[self::QUERY]) ? $this->argv[self::QUERY] : null;
     }

    // TODO: array_slice for params…
}
