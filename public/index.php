<?php







main::start("example.csv");

class main  {

    static public function start($filename) {

 $records = csv::getRecords($filename);
 $table = html::generateTable($records);

    }

}

class html
{

    public static function generateTable($records) {

        $count = 0;

        foreach ($records as $record) {

            if($count == 0) {

                $array = $record->returnArray();
                $fields = array_keys($array);
                $values= array_values($array);
                print_r($fields);
                print_r($values);

            } else {
                $array = $record->returnArray();
                $values= array_values($array);

               print_r($values);
            }

            $count++;

        }

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
        foreach ($record as $property => $value) {
            $this->createProperty($property, $value);
        }

    }

    public function returnarray() {
        $array = (array) $this;

        return $array;

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

/* TABLE ATTEMPT
function array_to_table($values, $recursive = false, $null = '&nbsp;')
{

    if (empty($values) || !is_array($values)) {
        return false;
    }

    if (!isset($values[0]) || !is_array($values[0])) {
        $values = array($values);

        $table = "<table>\n";

        $table .= "\t<tr>";

        foreach (array_keys($values[0]) as $heading) {
            $table .= '<th>' . $heading . '</th>';
        }

        $table .= "</tr>\n";

        foreach ($values as $row) {
            $table .= "\t<tr>";
            foreach ($row as $cell) {
                $table .= '<td>';

                if (is_object($cell)) {
                    $cell = (array)$cell;
                }

                if ($recursive == true && is_array($cell) && !empty($cell)) {
                    $table . -"\n" . array2table($cell, true, true) . "\n";

                } else {
                    $table .= (strlen($cell) > 0) ?
                        htmlspecialchars((string)$cell) :
                        $null;
                }

                $table .= '</td>';
            }

            $table .= "</tr\n";

        }
        $table .= '</table>';
        return $table;
        echo table;
    }

}
*/



/*
function array_to_table($data, $args=false) {
    if (!is_array($args)) {$args = array();}
    foreach (array('class', 'column_widths', 'customer headers', 'format_functions', 'nowrap_head', 'nowrap_body', 'capitalize_headers' )
        if (array_key_exists($key, $args)) { $$key = $args[key]; } else {$$key = false; }
    }
    if ($class) { $class = 'class ="'. $class. '"';} else {$class = '';}
    if (!is_array($column_widths)) {$column_widths = array();}

*/