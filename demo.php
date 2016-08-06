<?
    include 'vd_timestamper.php';
    echo vd_timestamper($date='31/12/2016', $input_type='dd-mm-yyyy', $return_type='yyyy-mm-dd');
    echo '<br>';
    echo vd_timestamper($date='31/12/2016', $input_type='dd-mm-yyyy');
    echo '<br>';
    echo vd_timestamper($date='31/12/2016');
?>