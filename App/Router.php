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

/**
 * Routing service
 *
 * Execute controller/action/parameters sequence understood by Request
 *
 * @since 0.1
 * @author Romain L.
 * @see \Test\Unit\App\Router
 */
class Router
{
    /**
     * Request object, that's it which understand parameters given to script
     *
     * @var Library\Io\Request
     * @access private
     */
    private $request;

    /**
     * __construct()
     *
     * @param Library\Io\Request $request
     *
     * @access public
     */
    public function __construct(Library\Io\Request $request)
    {
        $this->request = $request;
    }

    /**
     * Returns action requested
     *
     * @return string|null if action doesn't exist
     * @access public
     */
    public function getAction()
    {
        return $this->request->getAction();
    }

    /**
     * Returns softwareType requested
     *
     * @return string|null if softwareType doesn't exist
     * @access public
     */
     public function getSoftwareType()
     {
        return $this->request->getSoftwareType();
     }

    /**
     * Returns softwareName requested
     *
     * @return string|null if softwareName doesn't exist
     * @access public
     */
    public function getSoftwareName()
    {
        return $this->request->getSoftwareName();
    }
}
