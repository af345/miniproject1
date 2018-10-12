<?php







main::start();

class main {

    static public function start() {
        $records = csv::getRecords();
        $table = html::generateTable($records);
        system::printPage($table);

    }

}

class csv {

    static public function getRecords() {

        $make = 'ford';
        $model = 'Taurus';
        $car = AutomobileFactory::create($make, $model);
        print_r($car);
        return $records;
    }
}

class html{

    static public function generateTable($records) {

        $table = $records;

        return $table;

    }
}

class system {

    static public function printPage($page) {
        echo $page;
    }
}



class Automobile

{
    private $vehicleMake;
    private $vehicleModel;

public function_construct($make,$model)

{

    $this->vehicleMake = $make;
    $this->vehicleMocel = $model;
}

public function getMakeAndModel ()
{
    return $this->vehicleMake . '' . $this->vehicleModel;
}

lass AutomobileFactory
    public static function create($Make, $Model)
{
    return new Automobile($make,$model);
}
