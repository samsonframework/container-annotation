<?php declare(strict_types = 1);
/**
 * Created by Vitaly Iegorov <egorov@samsonos.com>.
 * on 20.08.16 at 12:39
 */
namespace samsonframework\containerannotation;

use samsonframework\container\AbstractMetadataCollector;

/**
 * Annotation class metadata collector.
 * Class resolves and collects class metadata from annotations.
 *
 * @author Vitaly Egorov <egorov@samsonos.com>
 */
class AnnotationMetadataCollector extends AbstractMetadataCollector
{
    /**
     * {@inheritdoc}
     */
    public function collect($classes, array $classesMetadata = []) : array
    {
        /** @var array $classes */

        foreach ($classes as $alias => $className) {
            $classesMetadata[$alias] = $this->resolver->resolve(new \ReflectionClass($className), $classesMetadata[$alias] ?? null);
        }

        return $classesMetadata;
    }
}
