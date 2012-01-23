<?php

/**
 * Counting number of viewers of site
 * @author Sergey Korkishko <Spiritvoin88@gmail.com>
 *
 * @return array
 */

function getHours()
{
    $time = date_i18n(get_option('time_format'));
    $times = explode(":", $time);
    return $times[0];
}
add_action('init','getHours');

function getMinutes()
{
    $time = date_i18n(get_option('time_format'));
    $times = explode(":", $time);
    return $times[1];
}
add_action('init','getMinutes');


function initServerTime()
{?>
    <script type="text/javascript">
        var serverHours = parseInt("<?php echo getHours(); ?>");
        var serverMinutes = parseInt("<?php echo getMinutes(); ?>");
	</script>
<?php
    return true;
}
add_action('init','initServerTime');


function onlineConsultation()
{?>
<!--<script type="text/javascript">-->
<!--    var liveTex = true,-->
<!--        liveTexID = 12443,-->
<!--        liveTex_object = true;-->
<!--    (function() {-->
<!--        var lt = document.createElement('script');-->
<!--        lt.type ='text/javascript';-->
<!--        lt.async = true;-->
<!--        lt.src = 'http://cs15.livetex.ru/js/client.js';-->
<!--        var sc = document.getElementsByTagName('script')[0];-->
<!--        if ( sc ) sc.parentNode.insertBefore(lt, sc);-->
<!--        else  document.documentElement.firstChild.appendChild(lt);-->
<!--    })();-->
<!--</script>-->
<?php
//    return true;

}
add_action('wp_enqueue_scripts','onlineConsultation');