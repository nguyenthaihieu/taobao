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

function kama_excerpt($args=''){
    global $post;
    if(is_array($args)){
        $i=$args;
    } else {
        parse_str($args, $i);
    }

    $maxchar     = isset($i['maxchar']) ?  (int)trim($i['maxchar'])     : 350;
    $text        = isset($i['text']) ?          trim($i['text'])        : '';
    $save_format = isset($i['save_format']) ?   trim($i['save_format'])         : false;
    $echo        = isset($i['echo']) ?          false                   : true;

    if (!$text){
        $out = $post->post_excerpt ? $post->post_excerpt : $post->post_content;
        $out = preg_replace ("!\[/?.*\]!U", '', $out ); //убираем шоткоды, например:[singlepic id=3]
        //для тега <!--more-->
        if( !$post->post_excerpt && strpos($post->post_content, '<!--more-->') ){

            $out = str_replace("\r", '', trim($match[1], "\n"));
            $out = preg_replace( "!\n\n+!s", "</p><p>", $out );
            $out = "<p>". str_replace( "\n", "<br />", $out ) ."</p>";
            if ($echo)
                return print $out;
            return $out;
        }
    }

    $out = $text.$out;
    if (!$post->post_excerpt)
        $out =$out;

    if ( iconv_strlen($out, 'utf-8') > $maxchar ){
        $out = iconv_substr( $out, 0, $maxchar, 'utf-8' );
        $out = preg_replace('@(.*)\s[^\s]*$@s', '\\1 ...', $out); //убираем последнее слово, ибо оно в 99% случаев неполное
    }

    if($save_format){
        $out = str_replace( "\r", '', $out );
        $out = preg_replace( "!\n\n+!", "</p><p>", $out );
        $out = "<p>". str_replace ( "\n", "<br />", trim($out) ) ."</p>";
    }

    if($echo) return print $out;
    return $out;
}