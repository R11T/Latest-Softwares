<?php
/**
 * @licence GPL-v2
 */
namespace App;

/**
 * Routing service
 *
 * Execute controller/action/parameters sequence understood by Request
 *
 * @since 0.1
 * @author Romain L.
 * @see \Tests\Units\App\Router
 */
class Router
{
    /**
     * Request object, that's it which understand parameters given to script
     *
     * @var Libraries\Io\Request
     * @access private
     */
    private $request;

    /**
     * __construct()
     *
     * @param Libraries\Io\Request $request
     *
     * @access public
     */
    public function __construct(Libraries\Io\Request $request)
    {
        $this->request = $request;
    }

    /**
     * Returns action requested
     *
     * @return string
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
