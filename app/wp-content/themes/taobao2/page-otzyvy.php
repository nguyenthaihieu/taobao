<?php
/*
Template Name: Otziv
*/
?>
<?php get_header(); ?>

<section id="container">
    <section id="content">
        <h2 class="title">Отзывы о сервисе Taobao.ru.com</h2>
        <div class="top"></div>
        <div class="body">
            <div class="page">
                <h2>Какие цвета актуальны в этом сезоне?</h2>
                <p><b>Здесь Вы можете оставить свой отзыв о нашей работе или задать интересующий Вас вопрос.</b></p>
                <p>Cлезно просим вас. прежде, чем написать отзыв или замечание на сайте учтите некоторые моменты:</p>
                <p><b>График работы компании:</b> с 04.00 до 13.00 (время московское). выходные: суббота и воскресенье.</p>
                <p><b>Срок доставки</b> до Благовещенска (после оплаты): мин.13 дней, макс. 23 дня.</p>
                <p><b>Обработка заявки</b> в течении 1-2 дней.</p>
                <p>Компания старается всегда идти на встречу клиенту.</p>
                <p>Надеемся, что вы изучили все основные моменты работы с Таобао («что это и с чем его едят»).</p>
                <p>Ну и наконец мы просто такие же люди как и вы.<b> Мы вас любим :)</b></p>
                <div class="article">
                    <p>Также просим вас присоединиться к нам в соц. сетях и оставлять свои отзывы там! Вот ссылка на нашу страницу вконтакте!</p>
                    <p><b>Спасибо всем, кто написал свой отзыв !</b></p>
                </div>
                <div class="comentars">
                    <h3>Отзывы</h3>
                    <?php get_template_part( 'content', 'single' ); ?>
					<?php comments_template( '', true ); ?>
                </div>
            </div>
        </div>
        <div class="bottom"></div>
    </section>
    <div class="right">
        <div class="boxen">
            <h2>Внутренний курс <span>Taobao.ru.com:</span></h2>
            <span class="calcul">5,3</span>
            <div class="calcul">
                <a href="#">Калькулятор</a>
                <p>Рассчитать стоимость товаров с учетом доставки.</p>
            </div>
            <div class="top-s"></div>
            <div class="body-s">
                <h2>Русский поиск <span>на Taobao.com:</span></h2>
                <form action="" method="post">
                    <div class="item">
                        <label>Введите слово или фразу на <br/> русском языке и нажмите <br/> кнопку “Перевести” </label>
                        <input type="text" class="text" />
                        <input type="submit" class="sub" value="Перевести" />
                    </div>
                    <div class="item">
                        <label>Затем нажмите "Поиск на <br/> Taobao" и у вас откроется <br/> страница с результатами поиска.</label>
                        <input type="text" class="text" />
                        <input type="submit" class="sub" value="Поиск на Taobao.com" />
                    </div>
                    <div class="item">
                        <a href="#">Видеоинструкция</a>
                    </div>
                </form>
            </div>
            <div class="bottom-s"></div>
            <div class="blog-gree">
                <div class="blog">
                    <h2>Новое в блоге</h2>
                    <ul>
                        <li>
                            <p><span class="data">02.11.2011</span> <span class="com">15</span></p>
                            <p><b>В чём встречать Новый 2012 год?</b></p>
                            <p>По восточному календарю покровителем наступающего года будет <a href="#">чёрный водяной Дракон.</a></p>
                        </li>
                        <li>
                            <p><span class="data">02.11.2011</span> <span class="com">15</span></p>
                            <p><b>В чём встречать Новый 2012 год?</b></p>
                            <p>По восточному календарю покровителем наступающего года будет <a href="#">чёрный водяной Дракон.</a></p>
                        </li>
                        <li>
                            <p><span class="data">02.11.2011</span> <span class="com">15</span></p>
                            <p><b>В чём встречать Новый 2012 год?</b></p>
                            <p>По восточному календарю покровителем наступающего года будет <a href="#">чёрный водяной Дракон.</a></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

<?php get_footer(); ?>