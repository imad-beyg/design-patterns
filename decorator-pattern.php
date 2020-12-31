<?php

/**
 * Interface CarService
 */
interface CarService{
    public function getCost();
    public function getDescription();
}

/**
 * Class BasicInspection
 */
class BasicInspection implements CarService {

    public function getCost()
    {
        return 25;
    }

    public function getDescription()
    {
        return 'Basic Inspection';
    }
}

/**
 * Class OilChange
 */
class OilChange implements CarService{

    protected $carService;

    function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 29 + $this->carService->getCost();
    }

    public function getDescription()
    {
        return $this->carService->getDescription() . ', and oil change';
    }
}

/**
 * Class TireRotation
 */
class TireRotation implements CarService{

    protected $carService;

    function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 15 + $this->carService->getCost();
    }

    public function getDescription()
    {
        return $this->carService->getDescription() . ', and tire rotation';
    }
}


$service = new TireRotation(new OilChange(new BasicInspection()));
echo $service->getCost();
echo $service->getDescription();

/**
 *  We could have done everything with inheritance or making a CarService as a class and add a method for each service instead of class but in that case we are completing breaking SOLID principles specifically Open/Close principle (OCP) which says class should be open for extension but close for modification
 *
 **/
