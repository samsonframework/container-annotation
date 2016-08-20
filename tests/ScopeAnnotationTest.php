<?php declare(strict_types=1);
/**
 * Created by Vitaly Iegorov <egorov@samsonos.com>.
 * on 06.08.16 at 12:24
 */
namespace samsonframework\containerannotation\tests;

use samsonframework\containerannotation\Scope;
use samsonframework\container\metadata\ClassMetadata;
use samsonframework\containerannotation\tests\classes\CarController;


class ScopeAnnotationTest extends TestCase
{
    public function testToMetadata()
    {
        $scope = new Scope(['value' => CarController::class]);
        $metadata = new ClassMetadata();
        $scope->toClassMetadata($metadata);
        static::assertEquals(true, in_array(CarController::class, $metadata->scopes));
    }
}
