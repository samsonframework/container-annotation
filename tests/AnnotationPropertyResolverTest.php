<?php
/**
 * Created by Vitaly Iegorov <egorov@samsonos.com>.
 * on 07.08.16 at 13:59
 */
namespace samsonframework\containerannotation\tests;

use Doctrine\Common\Annotations\AnnotationReader;
use samsonframework\containerannotation\AnnotationPropertyResolver;
use samsonframework\containerannotation\Inject;
use samsonframework\container\metadata\ClassMetadata;
use samsonframework\containerannotation\tests\classes as tests;

class AnnotationPropertyResolverTest extends TestCase
{
    /** @var AnnotationPropertyResolver */
    protected $resolver;

    /** @var ClassMetadata */
    protected $classMetadata;

    public function setUp()
    {
        /** @var ClassMetadata $methodResolver */
        $this->classMetadata = new ClassMetadata();

        $this->resolver = new AnnotationPropertyResolver(new AnnotationReader(), $this->classMetadata);
    }

    public function testInjectResolve()
    {
        new Inject(['value' => 'test']);

        $reflectionClass = new \ReflectionClass(tests\CarController::class);
        $this->classMetadata->nameSpace = ($reflectionClass->getNamespaceName());
        $this->classMetadata->className = (tests\CarController::class);

        $classMetadata = $this->resolver->resolve($reflectionClass, $this->classMetadata);
        $propertyMetadata = $classMetadata->propertiesMetadata;

        static::assertEquals(tests\Car::class, $propertyMetadata['car']->dependency);
        //static::assertEquals(tests\FastDriver::class, $propertyMetadata['fastDriver']->dependency);
        //static::assertEquals(tests\SlowDriver::class, $propertyMetadata['slowDriver']->dependency);
    }
}
