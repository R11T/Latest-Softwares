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
namespace App\Library\Io;

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
     * In the argv, software type arg's offset
     *
     * @var int
     *
     * @access public
     */
    const SOFTWARE_TYPE = 2;

    /**
     * In the argv, software name arg's offset
     *
     * @var int
     *
     * @access public
     */
    const SOFTWARE_NAME = 3;

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
        $this->argv = $argv;
        $this->argc = $argc;
    }

    /**
     * Returns action requested by the user
     *
     * @return string|null if action doesn't exist
     * @access public
     */
    public function getAction()
    {
        return isset($this->argv[self::ACTION]) ? $this->argv[self::ACTION] : null;
    }

    /**
     * Returns software type
     *
     * @return string|null if software type doesn't exist
     * @access public
     */
    public function getSoftwareType()
    {
        return isset($this->argv[self::SOFTWARE_TYPE]) ? $this->argv[self::SOFTWARE_TYPE] : null;
    }

    /**
     * Returns software name
     *
     * @return string|null if software name doesn't exist
     * @access public
     */
    public function getSoftwareName()
    {
        return isset($this->argv[self::SOFTWARE_NAME]) ? $this->argv[self::SOFTWARE_NAME] : null;
    }

    // TODO: array_slice for params…
}
