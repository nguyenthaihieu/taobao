<?php
//<Sergey Korkishko`s function here>
add_action('init','get_Hours');
function get_Hours()
{
    $time = date_i18n(get_option('time_format'));
    $times = explode(":", $time);
    return $times[0];
}

add_action('init','get_Minutes');
function get_Minutes()
{
    $time = date_i18n(get_option('time_format'));
    $times = explode(":", $time);
    return $times[1];
}
