<?
function vd_timestamper($date, $input_type='', $return_type='timestamp') {
    // $input_type parameter is optional: dd-mm-yyyy, mm-dd-yyyy, yyyy-mm-dd
    // $return_type parameter is optional: timestamp (default), dd-mm-yyyy, mm-dd-yyyy, yyyy-mm-dd

    // possible function calls:
    // vd_timestamper($date='31/12/2016', $input_type='dd-mm-yyyy', $return_type='yyyy-mm-dd');
    // vd_timestamper($date='31/12/2016', $input_type='dd-mm-yyyy');
    // vd_timestamper($date='31/12/2016');

    // exceptions
    $timestamper_error = 'Timestamper error: ';
    $not_a_string = $timestamper_error . 'date has to be a string!';
    $wrong_format = $timestamper_error . 'incorrect date format!';
    $wrong_input_type = $timestamper_error . 'incorrect input type format!';
    $enter_input_type = $timestamper_error . 'please, enter input type format.';

    // parameters
    $proper_input_types = array('dd-mm-yyyy' => '224', 'mm-dd-yyyy' => '224', 'yyyy-mm-dd' => '422');
    $proper_return_types = array('timestamp', 'dd-mm-yyyy', 'mm-dd-yyyy', 'yyyy-mm-dd');

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
        } else if (is_numeric($char)) {
            $temp_string .= $char;
        } else {    
            array_push($char_list, $temp_string);
            $temp_string = '';
        }

    }

    // check if array has correct numbers of cells
    if (count($char_list) !== 3) {
        return $wrong_format;   
    }      

    // create a string with numbers of chars in each char_list cell
    foreach ($char_list as $key) {
        // but firstly check if date range is correct
        if (strlen($key) == 2 && $key > 31) {
            return $wrong_format;
        } else {
            $numeric_type .= strlen($key);
        }   
    }

    // check if input type was entered
    if (array_key_exists($input_type, $proper_input_types)) {
        // check if numbers are equal to the proper_input_types value
        if ($numeric_type != $proper_input_types[$input_type]) {
            return $wrong_input_type;
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
        // type wasn't entered
        switch ($numeric_type) {
            case '224':
                if ($char_list[0] > 12 && $char_list[1] <= 12) {
                    // dd-mm-yyyy
                    $day = $char_list[0];
                    $month = $char_list[1];
                    $year = $char_list[2];
                    continue;
                } else if ($char_list[0] <= 12 && $char_list[1] > 12) {
                    // mm-dd-yyyy
                    $day = $char_list[1];
                    $month = $char_list[0];
                    $year = $char_list[2];
                    continue;
                }  else {
                    // can't recognize where is month or day
                    // because $char_list[0] <= 12 && $char_list[1] <= 12
                    return $enter_input_type;
                }
            case '422':    
                if ($char_list[1] <= 12 && $char_list[2] > 12) {
                    // yyyy-mm-dd
                    $day = $char_list[2];
                    $month = $char_list[1];
                    $year = $char_list[0];
                    continue;
                }  else {
                    // can't recognize where is month or day
                    // because $char_list[1] <= 12 && $char_list[2] <= 12
                    return $enter_input_type;
                }            
        }
    }

    // check $return_type and return result
    switch ($return_type) {
        case $return_type == $proper_return_types[0]:
            return strtotime($month . '/' . $day . '/' . $year);
        case $return_type == $proper_return_types[1]:
            return $day . '-' . $month . '-' . $year;
        case $return_type == $proper_return_types[2]:
            return $month . '-' . $day . '-' . $year;
        case $return_type == $proper_return_types[3]:
            return $year . '-' . $month . '-' . $day;
    }
}
?>