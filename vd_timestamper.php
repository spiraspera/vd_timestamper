<?
// function array_counter($array) {
//     $array_length = strlen($array);
//     $temp_string = '';

//     for ($i = 0; $i < $date_length; $i++) { 
//         $char = $date[$i];

//         if ($i+1 == $date_length) {
//             $temp_string .= $char;
//             array_push($char_list, $temp_string);
//         } elseif (is_numeric($char)) {
//             $temp_string .= $char;
//         } else {    
//             array_push($char_list, $temp_string);
//             $temp_string = '';
//         }

//     }

//     return $counted;
// }


function vd_timestamper($date, $input_type="", $return_type="timestamp") {
    // $input_type parameter is optional: dd-mm-yyyy, mm-dd-yyyy, yyyy-mm-dd

    // exceptions
    $timestamper_error = 'Timestamper error: ';
    $not_a_string = $timestamper_error . 'date has to be a string!';
    $wrong_format = $timestamper_error . 'incorrect date format!';
    $wrong_input_type = $timestamper_error . 'incorrect input type format!';

    // parameters
    $proper_types = array('dd-mm-yyyy' => '224', 'mm-dd-yyyy' => '224', 'yyyy-mm-dd' => '422');

    // input check
    switch ($date) {
        case !is_string($date):
            return $not_a_string;
        case strlen($date) < 10:
            return $wrong_format;   
        default:
            continue;
    }

    // push date into array
    $char_list = array();
    $date_length = strlen($date);
    $temp_string = '';

    for ($i = 0; $i < $date_length; $i++) { 
        $char = $date[$i];

        if ($i+1 == $date_length) {
            $temp_string .= $char;
            array_push($char_list, $temp_string);
        } elseif (is_numeric($char)) {
            $temp_string .= $char;
        } else {    
            array_push($char_list, $temp_string);
            $temp_string = '';
        }

    }

    // check if array is correct
    switch ($date) {
        case count($char_list) !== 3:
            return $wrong_format;   
        default:
            continue;
    }    

    // chech if type was entered
    if (array_key_exists($input_type, $proper_types)) {
        // create a string with numbers of chars in each char_list cells
        foreach ($char_list as $key) {
            $test_type .= strlen($key);
        }

        // check if numbers are equal to the proper_types value
        if ($test_type != $proper_types[$input_type]) {
            echo $wrong_input_type;
        } else {
            if ($input_type == 'dd-mm-yyyy') {
                $day = $char_list[0];
                $month = $char_list[1];
                $year = $char_list[2];
            } else if ($input_type == 'mm-dd-yyyy') {
                $day = $char_list[1];
                $month = $char_list[0];
                $year = $char_list[2];
            } else {
                $day = $char_list[2];
                $month = $char_list[1];
                $year = $char_list[0];
            }
        }
        

    } else {
        // type wasnt entered
        echo 'type is empty';
    }

    // return $day . $month . $year;
    return $char_list;

    // return array_keys($proper_types, '224');


    // return array_search($test_type, $proper_types);


    // $day = substr($date, 0, 2);
    // $month = substr($date, 3, 2);
    // $year = substr($date, 6, 4);
    // return strtotime($month . '/' . $day . '/' . $year);
}
?>