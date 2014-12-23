<?php
/**
 * @licence GPL-v2
 */
namespace App;

/**
 * Routing service
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
     * Returns query requested
     *
     * @return string|null if query doesn't exist
     */
     public function getQuery()
     {
        return $this->request->getQuery();
     }
}
