<?php declare(strict_types = 1);
/**
 * Created by Vitaly Iegorov <egorov@samsonos.com>.
 * on 18.08.16 at 12:50
 */
namespace samsonframework\containerannotation\tests\classes;

use samsonframework\containerannotation\InjectArgument;

class Road
{
    /** @var CarService */
    protected $carService;

    /**
     * Road constructor.
     *
     * @param CarService $carService
     * @InjectArgument(carService="CarService")
     */
    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }
}
