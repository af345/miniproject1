<?php







main::start("example.csv");

class main  {

    static public function start($filename) {

 $records = csv::getRecords($filename);

    }
}

class csv {


    static public function getRecords($filename) {

        $file = fopen("$filename", "r");

        $fieldnames = array();
        $count = 0;


        while (!feof($file)) {

            $record = fgetcsv($file);
            if ($count == 0) {
                $fieldnames = $record;
            } else {
                $records[] = recordFactory::create($fieldnames, $record);
            }
           $count++;
        }

        fclose($file);
        return $records;

    }
}

class record {

    public function __construct(Array $fieldnames = null, $values = null)
    {
        
        $record = array_combine($fieldnames, $values);
        print_r($record);

        $this->createProperty();

    }

    public function createProperty($name = 'first', $value = "Alexandra") {

        $this->{$name} = $value;
    }
}

class recordFactory{

    public static function create(Array $fieldnames = null, Array $values= null) {


        $record = new record($fieldnames, $values);

        return $record;
    }
}

