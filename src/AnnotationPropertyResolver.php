<?php declare(strict_types = 1);
/**
 * Created by Vitaly Iegorov <egorov@samsonos.com>.
 * on 07.08.16 at 13:04
 */
namespace samsonframework\containerannotation;

use samsonframework\container\configurator\PropertyConfiguratorInterface;
use samsonframework\container\metadata\ClassMetadata;
use samsonframework\container\metadata\PropertyMetadata;
use samsonframework\container\resolver\PropertyResolverTrait;

/**
 * Class properties annotation resolver.
 */
class AnnotationPropertyResolver extends AbstractAnnotationResolver implements AnnotationResolverInterface
{
    use PropertyResolverTrait;

    /**
     * {@inheritDoc}
     */
    public function resolve(\ReflectionClass $classReflection, ClassMetadata $classMetadata)
    {
        /** @var \ReflectionProperty $property */
        foreach ($classReflection->getProperties() as $property) {
            $this->resolveClassPropertyAnnotations($property, $classMetadata);
        }

        return $classMetadata;
    }

    /**
     * Resolve class property annotations.
     *
     * @param \ReflectionProperty $property
     * @param ClassMetadata       $classMetadata
     */
    protected function resolveClassPropertyAnnotations(\ReflectionProperty $property, ClassMetadata $classMetadata)
    {
        /** @var PropertyConfiguratorInterface[] $annotations Read class annotations */
        $annotations = $this->reader->getPropertyAnnotations($property);
        if (count($annotations)) {
            $propertyMetadata = $this->resolvePropertyMetadata($property, $classMetadata);

            foreach ($annotations as $annotation) {
                if ($annotation instanceof PropertyConfiguratorInterface) {
                    $annotation->toPropertyMetadata($propertyMetadata);
                }
            }
        }
    }
}
