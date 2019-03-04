<?php
/**
 * Created by PhpStorm.
 * User: rupack
 * Date: 4.3.19
 * Time: 13.29
 */

namespace Framework\Http;


class RouteCollection
{
    private $method;
    
    public function get()
    {
    
    }
    
    public function getMethod($method)
    {
        return $this->method = $method;
    }
}