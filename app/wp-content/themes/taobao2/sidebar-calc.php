<h2>Внутренний курс <span>Taobao.ru.com:</span></h2>
<span class="calcul"><?php echo get_option('taobao_cny', 'N.A.');?></span>

<a class="calcul" href="<?php bloginfo('url'); ?>/?page_id=12"></a>
<div class="top-s"></div>
<div class="body-s">
    <h2>Русский поиск <span>на Taobao.com:</span></h2>


    <div class="item">
        <label>Введите слово или фразу на <br/> русском языке и нажмите <br/> кнопку “Перевести”
        </label>
        <input type="text" class="text" id="source"/>
        <button class="sub" id="do">Перевести</button><br>
    </div>
    <div class="item">
        <label>Затем нажмите "Поиск на <br/> Taobao" и у вас откроется <br/> страница с результатами
            поиска.</label>
        <form action="http://search8.taobao.com/search" method="get"  target='_blank'>
            <input type="text" class="text" id="target" name=q />
            <input type="submit" class="sub" value="Поиск на Taobao.com"/>
    </div>
    <div class="item">
        <a href="<?php bloginfo('url') ?>/?page_id=2733">Видеоинструкция</a>
    </div>
</form>
</div>
<div class="bottom-s"></div>
