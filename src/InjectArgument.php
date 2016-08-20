<?php declare(strict_types = 1);
/**
 * Created by Vitaly Iegorov <egorov@samsonos.com>.
 * on 07.08.16 at 15:46
 */
namespace samsonframework\containerannotation;

use samsonframework\container\configurator\InjectableArgumentConfigurator;

/**
 * Method argument injection annotation.
 *
 * @author Vitaly Egorov <egorov@samsonos.com>
 *
 * @Annotation
 */
class InjectArgument extends InjectableArgumentConfigurator implements AnnotationConfiguratorInterface
{
    /**
     * InjectArgument constructor.
     *
     * @param array $valueOrValues
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(array $valueOrValues)
    {
        // Pass to injectable argument configurator
        parent::__construct(key($valueOrValues), $valueOrValues[key($valueOrValues)]);
    }
}
