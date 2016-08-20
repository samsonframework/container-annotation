<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: root
 * Date: 27.07.2016
 * Time: 1:55.
 */
namespace samsonframework\containerannotation;

use samsonframework\container\configurator\ControllerConfigurator;

/**
 * Controller configurator annotation class.
 * @see    \samsonframework\container\configurator\ControllerConfigurator
 *
 * @author Vitaly Egorov <egorov@samsonos.com>
 *
 * @Annotation
 */
class Controller extends ControllerConfigurator implements AnnotationConfiguratorInterface
{

}
