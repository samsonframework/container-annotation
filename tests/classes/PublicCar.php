<?php
/**
 * Created by Vitaly Iegorov <egorov@samsonos.com>.
 * on 06.08.16 at 11:11
 */
namespace samsonframework\containerannotation\tests\classes;

use samsonframework\containerannotation\InjectArgument;

class PublicCar
{
    /** @var Wheel */
    public $frontLeftWheel;

    /**
     * Car constructor.
     *
     * @param DriverInterface $driver
     *
     * @InjectArgument(driver="SlowDriver")
     */
    public function __construct(DriverInterface $driver)
    {

    }

    protected function protectedMethod()
    {

    }
}
