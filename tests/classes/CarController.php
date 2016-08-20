<?php declare(strict_types=1);
/**
 * Created by Vitaly Iegorov <egorov@samsonos.com>.
 * on 06.08.16 at 11:13
 */
namespace samsonframework\containerannotation\tests\classes;

use samsonframework\containerannotation\Controller;
use samsonframework\containerannotation\Inject;
use samsonframework\containerannotation\InjectArgument;
use samsonframework\containerannotation\Route;
use samsonframework\containerannotation\Scope;

/**
 * Car Controller class.
 *
 * @Controller
 * @Route("/car")
 * @Scope("cars")
 */
class CarController
{
    /**
     * @var Car
     * @Inject
     */
    public $car;
    /**
     * @var DriverInterface
     * @Inject("\samsonframework\container\tests\classes\FastDriver")
     */
    public $fastDriver;
    /** @var Leg */
    protected $leg;
    /**
     * @var DriverInterface
     * @Inject("\samsonframework\container\tests\classes\SlowDriver")
     */
    private $slowDriver;

    /**
     * @Route("/show/", name="car_show")
     * @InjectArgument(fastDriver="FastDriver")
     * @InjectArgument(slowDriver="SlowDriver")
     * @return FastDriver
     */
    public function showAction(FastDriver $fastDriver, SlowDriver $slowDriver)
    {

    }

    /**
     * @param Leg $leg
     * @InjectArgument(leg="Leg")
     */
    public function stopCarAction(Leg $leg)
    {

    }

    /**
     * @param Leg $leg
     * @InjectArgument(leg="Leg")
     */
    protected function setLeg(Leg $leg)
    {
        $this->leg = $leg;
    }
}
