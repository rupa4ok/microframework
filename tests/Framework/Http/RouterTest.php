<?php
/**
 * Created by PhpStorm.
 * User: rupack
 * Date: 4.3.19
 * Time: 13.26
 */

namespace Framework\Http;

use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    public function testCorrectMethod(): void
    {
        $routes = new RouteCollection();
        
        $routes->get($nameGet = 'blog', '/blog', $handlerGet = 'handler_get');
        $routes->post($namePost = 'blog_edit', '/blog', $handlerGet = 'handler_post');
        
        $router = new Router($routes);
        
        $result = $router->match($this->buildRequest('POST', '/blog'));
        
        self::assertEquals($method, $routes->getMethod($method));
    }
}
