<?php declare(strict_types=1);
/**
 * Created by Vitaly Iegorov <egorov@samsonos.com>.
 * on 06.08.16 at 11:11
 */
namespace samsonframework\containerannotation\tests\classes;

use samsonframework\containerannotation\InjectArgument;

class Car
{
    /** @var Wheel */
    protected $frontLeftWheel;
    /** @var Wheel */
    protected $frontRightWheel;
    /** @var Wheel */
    protected $backLeftWheel;
    /** @var Wheel */
    protected $backRightWheel;

    /** @var DriverInterface */
    protected $driver;

    /**
     * Car constructor.
     *
     * @param DriverInterface $driver
     *
     * @InjectArgument(driver="SlowDriver")
     */
    public function __construct(DriverInterface $driver)
    {
        $this->driver = $driver;
    }
}
