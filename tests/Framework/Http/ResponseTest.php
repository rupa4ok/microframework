<?php
/**
 * Created by PhpStorm.
 * User: rupak
 * Date: 03.03.2019
 * Time: 12:48
 */

namespace Tests\Framework\Http;

use Framework\Http\Response;
use PHPUnit\Framework\TestCase;
use Zend\Diactoros\Response\HtmlResponse;

class ResponseTest extends TestCase
{
    public function testEmpty(): void
    {
        $response = new HtmlResponse($body = 'Body');
        
        self::assertEquals($body, $response->getBody());
        self::assertEquals(200, $response->getStatusCode());
        self::assertEquals('OK', $response->getReasonPhrase());
    }
    
    public function test404(): void
    {
        $response = new HtmlResponse($body = 'Empty', $status = 404);
    
        self::assertEquals($body, $response->getBody());
        self::assertEquals($status, $response->getStatusCode());
        self::assertEquals('Not Found', $response->getReasonPhrase());
    }
    
    public function testHeader(): void
    {
        $response = (new Response(''))
            ->withHeader($name1 = 'X-header-1', $value1 = 'value_1')
            ->withHeader($name2 = 'X-header-1', $value2 = 'value_2');
    
        self::assertEquals([$name1 => $value1, $name2 => $value2], $response->getHeaders());
    }
}
