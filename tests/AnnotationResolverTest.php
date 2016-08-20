<?php declare(strict_types = 1);
/**
 * Created by Vitaly Iegorov <egorov@samsonos.com>.
 * on 06.08.16 at 10:56
 */
namespace samsonframework\containerannotation\tests;

use samsonframework\containerannotation\AnnotationClassResolver;
use samsonframework\containerannotation\AnnotationMethodResolver;
use samsonframework\containerannotation\AnnotationPropertyResolver;
use samsonframework\containerannotation\AnnotationResolver;
use samsonframework\container\metadata\ClassMetadata;
use samsonframework\containerannotation\tests\classes as tests;

class AnnotationResolverTest extends TestCase
{
    /** @var AnnotationResolver */
    protected $resolver;

    public function setUp()
    {
        /** @var AnnotationClassResolver $classResolver */
        $classResolver = $this->createMock(AnnotationClassResolver::class);
        /** @var AnnotationPropertyResolver $propertyResolver */
        $propertyResolver = $this->createMock(AnnotationPropertyResolver::class);
        /** @var AnnotationMethodResolver $methodResolver */
        $methodResolver = $this->createMock(AnnotationMethodResolver::class);

        $this->resolver = new AnnotationResolver($classResolver, $propertyResolver, $methodResolver);
    }

    public function testResolve()
    {
        $classMetadata = $this->resolver->resolve(new \ReflectionClass(tests\CarController::class));
        static::assertEquals(true, $classMetadata instanceof ClassMetadata);
    }
}
