<?
function vd_timestamper($date, $input_type="", $return_type="timestamp") {
    // $input_type parameter is optional: dd-mm-yyyy, mm-dd-yyyy, yyyy-mm-dd,
    // separator doesn't matter

    // exceptions
    $timestamper_error = 'Timestamper error: ';
    $not_a_string = $timestamper_error . 'date has to be a string!';
    $wrong_format = $timestamper_error . 'incorrect date format!';

    // parameters
    $proper_types = array('dd-mm-yyyy', 'mm-dd-yyyy', 'yyyy-mm-dd');

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
    if in_array($input_type, $proper_types) {
        // check and compare 
    }



    return $char_list;


    // $day = substr($date, 0, 2);
    // $month = substr($date, 3, 2);
    // $year = substr($date, 6, 4);
    // return strtotime($month . '/' . $day . '/' . $year);
}
?>