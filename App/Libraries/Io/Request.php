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
     * In the argv, offset of action argument
     *
     * @var int
     *
     * @access public
     */
    const ACTION = 1;

    /**
     * In the argv, offset of method argument
     *
     * @var int
     *
     * @access public
     */
    const METHOD = 2;

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
        if (1 === count($argv)) {
            throw new \BadFunctionCallException('None args specified');
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
     * Returns method requested by the user
     *
     * @return string
     * @access public
     * @throw \BadFunctionCallException if there's no such method
     */
    public function getMethod()
    {
        if (!isset($this->argv[self::METHOD])) {
            throw new \BadFunctionCallException('No method specified');
        }
        return $this->argv[self::METHOD];
    }

    // TODO: array_slice for params…
}
