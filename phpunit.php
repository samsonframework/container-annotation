<?php declare(strict_types=1);
/**
 * Created by Vitaly Iegorov <egorov@samsonos.com>
 * on 04.08.14 at 17:43
 */

/** Set composer autoloader */
require __DIR__.'/vendor/autoload.php';

/** Set The Default Timezone */
date_default_timezone_set('UTC');

new \samsonframework\containerannotation\Route(['value' => 'test']);
new \samsonframework\containerannotation\Scope(['value' => 'test']);
new \samsonframework\containerannotation\Service(['value' => 'test']);
new \samsonframework\containerannotation\Controller();
new \samsonframework\containerannotation\Inject(['value' => 'test']);
new \samsonframework\containerannotation\InjectArgument(['driver' => ' ']);