<?php declare(strict_types=1);
/**
 * Created by Vitaly Iegorov <egorov@samsonos.com>.
 * on 06.08.16 at 12:24
 */
namespace samsonframework\containerannotation\tests;

use samsonframework\containerannotation\AnnotationWithValue;
use samsonframework\containerannotation\tests\classes\CarController;


class CollectionValueTest extends TestCase
{
    public function testCreationWithArray()
    {
        $scope = new AnnotationWithValue(['value' => CarController::class]);

        static::assertEquals(true, in_array(CarController::class, $this->getProperty('collection', $scope), true));
    }

    public function testCreationWithWrongType()
    {
        $this->expectException(\InvalidArgumentException::class);

        new AnnotationWithValue([]);
    }
}
