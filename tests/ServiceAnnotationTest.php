<?php declare(strict_types = 1);
/**
 * Created by Vitaly Iegorov <egorov@samsonos.com>.
 * on 06.08.16 at 12:24
 */
namespace samsonframework\containerannotation\tests;

use samsonframework\containerannotation\Service;
use samsonframework\container\Builder;
use samsonframework\container\ContainerBuilder;
use samsonframework\container\metadata\ClassMetadata;
use samsonframework\containerannotation\tests\classes\CarService;


class ServiceAnnotationTest extends TestCase
{
    public function testToClassMetadata()
    {
        $scope = new Service(['value' => CarService::class]);
        $metadata = new ClassMetadata();
        $scope->toClassMetadata($metadata);
        static::assertEquals(CarService::class, $metadata->name);
    }

    public function testAddingServiceScope()
    {
        $scope = new Service(['value' => CarService::class]);
        $metadata = new ClassMetadata();
        $scope->toClassMetadata($metadata);
        static::assertEquals(true, in_array(Builder::SCOPE_SERVICES, $metadata->scopes, true));
    }
}
