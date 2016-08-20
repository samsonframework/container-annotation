<?php
/**
 * Created by Vitaly Iegorov <egorov@samsonos.com>.
 * on 06.08.16 at 12:24
 */
namespace samsonframework\containerannotation\tests;

use samsonframework\containerannotation\Route;
use samsonframework\container\metadata\ClassMetadata;
use samsonframework\container\metadata\MethodMetadata;


class RouteAnnotationTest extends TestCase
{
    public function testToMethodMetadata()
    {
        $routePath = '/test-route/';
        $routeIdentifier = 'test_route';

        $route = new Route(['value' => $routePath, 'name' => $routeIdentifier]);
        $methodMetadata = new MethodMetadata(new ClassMetadata());
        $route->toMethodMetadata($methodMetadata);

        static::assertArrayHasKey($routeIdentifier, $methodMetadata->routes);
        static::assertEquals($routePath, $methodMetadata->routes[$routeIdentifier]);
    }

    public function testToClassMetadata()
    {
        $routePath = '/test-route/';
        $routeIdentifier = 'test_route';

        $route = new Route(['value' => $routePath, 'name' => $routeIdentifier]);
        $classMetadata = new ClassMetadata();
        $route->toClassMetadata($classMetadata);

        static::assertArrayHasKey($routeIdentifier, $classMetadata->routes);
        static::assertEquals($routePath, $classMetadata->routes[$routeIdentifier]);
    }

    public function testInvalidArgumentsException()
    {
        $this->expectException(\InvalidArgumentException::class);

        $route = new Route(['value' => '']);
    }
}
