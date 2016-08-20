<?php
/**
 * Created by Vitaly Iegorov <egorov@samsonos.com>.
 * on 06.08.16 at 12:24
 */
namespace samsonframework\containerannotation\tests;

use samsonframework\containerannotation\Controller;
use samsonframework\container\Builder;
use samsonframework\container\ContainerBuilder;
use samsonframework\container\metadata\ClassMetadata;


class ControllerAnnotationTest extends TestCase
{
    public function testToMetadata()
    {
        $scope = new Controller();
        $metadata = new ClassMetadata();
        $scope->toClassMetadata($metadata);
        static::assertEquals(true, in_array(Builder::SCOPE_CONTROLLER, $metadata->scopes));
    }
}
