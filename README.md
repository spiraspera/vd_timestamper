# vd_timestamper
PHP date format converter is a tiny function, that helps you to convert data string in a proper way.

For example, you need to convert 22/01/2016 (22 January 2016) into unix timestamp. You just need to call the funtion like this:

`vd_timestamper($date='31/12/2016');`

But you should keep in mind, that $input_type could be optional only in a case, when day is between 13 and 31. In all other cases you'll get an exception. Possible function calls could be:

`vd_timestamper($date='31/12/2016', $input_type='dd-mm-yyyy', $return_type='yyyy-mm-dd');`

`vd_timestamper($date='31/12/2016', $input_type='dd-mm-yyyy');`

`vd_timestamper($date='31/12/2016');`

$input_type parameter is optional (empty is default): dd-mm-yyyy, mm-dd-yyyy, yyyy-mm-dd

$return_type parameter is optional: timestamp, dd-mm-yyyy, mm-dd-yyyy, yyyy-mm-dd