<?php
//<Sergey Korkishko`s function here>

function get_Hours()
{
    $time = date_i18n(get_option('time_format'));
    $times = explode(":", $time);
    echo $times[0];
    return $times[0];
}
add_action('init','get_Hours');

add_action('init','get_Minutes');
function get_Minutes()
{
    $time = date_i18n(get_option('time_format'));
    $times = explode(":", $time);
    echo $times[1];
    return $times[1];
}
add_action('init','get_Minutes');


function get_js_Hours_Minutes()
{?>
    <script type="text/javascript">
        var serverHours = parseInt("<?php echo get_Hours(); ?>");
        var serverMinutes = parseInt("<?php echo get_Minutes(); ?>");
	</script>
<?php
    return true;

}
add_action('init','get_js_Hours_Minutes');


function online_consultation()
{?>
<script type="text/javascript">
    var liveTex = true,
        liveTexID = 12443,
        liveTex_object = true;
    (function() {
        var lt = document.createElement('script');
        lt.type ='text/javascript';
        lt.async = true;
        lt.src = 'http://cs15.livetex.ru/js/client.js';
        var sc = document.getElementsByTagName('script')[0];
        if ( sc ) sc.parentNode.insertBefore(lt, sc);
        else  document.documentElement.firstChild.appendChild(lt);
    })();
</script>
<?php
    return true;

}
add_action('init','online_consultation');