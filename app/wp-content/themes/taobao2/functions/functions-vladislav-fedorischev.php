<?php

/**
 * Counting number of viewers of site
 * @author Vladislav Fedorischev <vlad_graf@mail.ru>
 *
 * @return array
 */
function getViews()
{
    $visit = strval((int)StatPress_Print("%totalpageviews%") + 616908);
    $resultArray = array();
    $stringLength = strlen($visit);
    for ($i = 0; $i < $stringLength; $i++) {
        $resultArray[] = $visit{$i};
    }
    $reverse = array_reverse($resultArray, false);
    $count = count($reverse);
    for ($count; $count < 9; $count++) {
        $reverse[] = "0";
    }
    $normal = array_reverse($reverse, false);

    return $normal;
}

/**
 * Prints ajax responce to show number of viewers
 * @author Vladislav Fedorischev <vlad_graf@mail.ru>
 */
function viewsRefresh()
{
    if (isset($_GET['timer'])) :
        header('Content-Type: text/html; charset=utf-8');
        $views = getViews();
        ?>
    <div class="left-num">
        <a href="#"><?php echo $views[0];?></a>
        <a href="#"><?php echo $views[1];?></a>
        <a href="#"><?php echo $views[2];?></a>
    </div>
    <div class="left-num">
        <a href="#"><?php echo $views[3];?></a>
        <a href="#"><?php echo $views[4];?></a>
        <a href="#"><?php echo $views[5];?></a>
    </div>
    <div class="left-num">
        <a href="#"><?php echo $views[6];?></a>
        <a href="#"><?php echo $views[7];?></a>
        <a href="#"><?php echo $views[8];?></a>
    </div>
    <div class="text">
        <p>Столько человек уже воспользовались <br/> услугами нашего сервиса</p>
    </div>


    <?php die(); endif;
}

add_action('init', 'viewsRefresh');

/**
 * Prints scripts for ajax requests for the count of viewers
 * @author Vladislav Fedorischev <vlad_graf@mail.ru>
 */
function ajaxCall()
{
    ?>
<script>
    $(function() {
        function myFunction() {
            $('#counter').load('<?php bloginfo('url'); ?>/?timer');
        }

        setInterval(myFunction, 1000);
        myFunction();
    })
</script>
<?php
    return true;
}

add_action('wp_enqueue_scripts', 'ajaxCall');