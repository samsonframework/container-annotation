<?php declare(strict_types = 1);
/**
 * Created by Vitaly Iegorov <egorov@samsonos.com>.
 * on 20.08.16 at 13:15
 */
namespace samsonframework\containerannotation\tests;

use Doctrine\Common\Annotations\AnnotationReader;
use samsonframework\containerannotation\AnnotationClassResolver;
use samsonframework\containerannotation\AnnotationMethodResolver;
use samsonframework\containerannotation\AnnotationPropertyResolver;
use samsonframework\containerannotation\AnnotationResolver;
use samsonframework\container\AnnotationMetadataCollector;
use samsonframework\container\Builder;
use samsonframework\container\metadata\ClassMetadata;
use samsonframework\containerannotation\tests\classes\CarController;

class AnnotationMetadataCollectorTest extends TestCase
{
    /** @var AnnotationMetadataCollector */
    protected $annotationCollector;

    public function setUp()
    {
        $reader = new AnnotationReader();

        $resolver = new AnnotationResolver(
            new AnnotationClassResolver($reader),
            new AnnotationPropertyResolver($reader),
            new AnnotationMethodResolver($reader)
        );

        $this->annotationCollector = new AnnotationMetadataCollector($resolver);
    }

    public function testCollect()
    {
        /** @var ClassMetadata[] $classesMetadata */
        $classesMetadata = $this->annotationCollector->collect([CarController::class]);

        static::assertEquals(CarController::class, $classesMetadata[CarController::class]->className);
        static::assertTrue(in_array(Builder::SCOPE_CONTROLLER, $classesMetadata[CarController::class]->scopes, true));
    }
}
