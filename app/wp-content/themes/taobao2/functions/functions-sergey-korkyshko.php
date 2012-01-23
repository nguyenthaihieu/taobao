<?php
//<Sergey Korkishko`s function here>

function getHours()
{
    $time = date_i18n(get_option('time_format'));
    $times = explode(":", $time);
    //echo $times[0];
    return $times[0];
}
add_action('init','getHours');

function getMinutes()
{
    $time = date_i18n(get_option('time_format'));
    $times = explode(":", $time);
    //echo $times[1];
    return $times[1];
}
add_action('init','getMinutes');


function initServerTime()
{
//    echo getHours();?>
    <script type="text/javascript">
        var serverHours = parseInt("<?php echo getHours(); ?>");
        var serverMinutes = parseInt("<?php echo getMinutes(); ?>");
//        console.log("serverHours="+serverHours);
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