<?php
/**
 * Created by PhpStorm.
 * User: rupak
 * Date: 03.03.2019
 * Time: 8:05
 */

namespace Tests\Framework\Http;

use Framework\Http\Request;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    
    public function testEmpty(): void
    {
        $request = new Request();
        
        self::assertEquals([], $request->getQueryParams());
        self::assertNull($request->getParsedBody());
    }
    
    public function testQueryParams():void
    {
        $request = (new Request())
            ->withQueryParams($data = [
                'name' => 'Тест',
                'age' => 30
            ]
            );
    
        self::assertEquals($data, $request->getQueryParams());
        self::assertNull($request->getParsedBody());
    }
    
    public function testParseBody():void
    {
        $request = (new Request())
            ->withParsedBody($data = ['title' => 'title']);
        
        self::assertEquals([], $request->getQueryParams());
        self::assertEquals($data, $request->getParsedBody());
    }
}
