<?php declare(strict_types = 1);
/**
 * Created by Vitaly Iegorov <egorov@samsonos.com>.
 * on 07.08.16 at 13:59
 */
namespace samsonframework\containerannotation\tests;

use Doctrine\Common\Annotations\AnnotationReader;
use samsonframework\containerannotation\AnnotationClassResolver;
use samsonframework\containerannotation\Controller;
use samsonframework\containerannotation\Route;
use samsonframework\containerannotation\Scope;
use samsonframework\container\Builder;
use samsonframework\container\metadata\ClassMetadata;
use samsonframework\containerannotation\tests\classes as tests;

class AnnotationClassResolverTest extends TestCase
{
    /** @var AnnotationClassResolver */
    protected $resolver;

    /** @var ClassMetadata */
    protected $classMetadata;

    public function setUp()
    {
        /** @var ClassMetadata $methodResolver */
        $this->classMetadata = new ClassMetadata();

        $this->resolver = new AnnotationClassResolver(new AnnotationReader(), $this->classMetadata);
    }

    public function testResolve()
    {
        new Route(['value' => '/test/']);
        new Controller();
        new Scope(['value' => 'test']);

        $reflectionClass = new \ReflectionClass(tests\CarController::class);
        $this->classMetadata->className = $reflectionClass->getName();
        $this->classMetadata->nameSpace = $reflectionClass->getNamespaceName();

        $classMetadata = $this->resolver->resolve($reflectionClass, $this->classMetadata);

        static::assertEquals(true, in_array('cars', $classMetadata->scopes, true));
        static::assertEquals(true, in_array(Builder::SCOPE_CONTROLLER, $classMetadata->scopes, true));
    }
}
