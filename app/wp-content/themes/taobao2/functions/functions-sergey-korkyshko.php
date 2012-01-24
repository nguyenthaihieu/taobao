<?php

function getHours()
{
    $time = date_i18n(get_option('time_format'));
    $times = explode(":", $time);
    return $times[0];
}

function getMinutes()
{
    $time = date_i18n(get_option('time_format'));
    $times = explode(":", $time);
    return $times[1];
}

function initServerTime()
{?>
    <script type="text/javascript">
        var serverHours = parseInt("<?php echo getHours(); ?>");
        var serverMinutes = parseInt("<?php echo getMinutes(); ?>");
	</script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/timer.js"></script>
<?php
}
add_action('wp_enqueue_scripts','initServerTime');


function onlineConsultation()
{ ?>
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
}
//add_action('wp_enqueue_scripts','onlineConsultation');