<?php
// Создать пользовательское меню
add_action('admin_menu', 'register_my_custom_submenu_page');


function register_my_custom_submenu_page() {
    add_submenu_page( 'themes.php', 'Настройка темы', 'Настройка темы', 'manage_options', 'my-custom-submenu-page', 'my_custom_submenu_page_callback' );
}

function my_custom_submenu_page_callback() {
    if(isset($_POST['settings'])) {
        unset($_POST['settings']);
        $_POST['working_days'] = join(',', $_POST['working_days']);
        if (!isset($_POST['taobao_turn_online_consult'])) {
            $_POST['taobao_turn_online_consult'] = 'off';
        }
        foreach($_POST as $option=>$value) {
            update_option($option, $value);
        }
    }
    ?>
<div class="wrap">
    <h2>Настройка темы</h2>

    <form method="post" action="themes.php?page=my-custom-submenu-page">
        <input type="hidden" name="settings">
        <table class="form-table">

            <tr valign="top">
                <th scope="row">Адрес в футере</th>
                <td><textarea style="width:400px; height:100px;" name="omr_tracking_code"><?php echo get_option('omr_tracking_code');?></textarea>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Первый раз на сайте?</th>
                <td><textarea style="width:400px; height:25px;" name="omr_tracking_first"><?php echo get_option('omr_tracking_first');?></textarea>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Курс юаня (CNY)</th>
                <td><input style="width:400px; height:25px;" type="text" name="taobao_cny" value="<?php echo get_option('taobao_cny', 'N.A.');?>" />
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Наша комисия %</th>
                <td><input style="width:400px; height:25px;" type="text" name="procent" value="<?php echo get_option('procent', '15');?>" />
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Рабочее время (например: 10-19)</th>
                <td><input style="width:400px; height:25px;" type="text" name="working_hours" value="<?php echo get_option('working_hours', '10-19');?>" />
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Рабочие дни:</th>
                <td>
                    <select name="working_days[]" style="height:140px;" multiple="multiple">
                        <option value="1" <?php if(strpos(get_option('working_days', ''),'1')!==FALSE):?>selected<?php endif; ?>>понедельник</option>
                        <option value="2" <?php if(strpos(get_option('working_days', ''),'2')!==FALSE):?>selected<?php endif; ?>>вторник</option>
                        <option value="3" <?php if(strpos(get_option('working_days', ''),'3')!==FALSE):?>selected<?php endif; ?>>среда</option>
                        <option value="4" <?php if(strpos(get_option('working_days', ''),'4')!==FALSE):?>selected<?php endif; ?>>четверг</option>
                        <option value="5" <?php if(strpos(get_option('working_days', ''),'5')!==FALSE):?>selected<?php endif; ?>>пятница</option>
                        <option value="6" <?php if(strpos(get_option('working_days', ''),'6')!==FALSE):?>selected<?php endif; ?>>суббота</option>
                        <option value="0" <?php if(strpos(get_option('working_days', ''),'0')!==FALSE):?>selected<?php endif; ?>>воскресенье</option>
                    </select>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Даты праздничных дней (например: 01.01,08.03,09.05)</th>
                <td><input style="width:400px; height:25px;" type="text" name="holidays" value="<?php echo get_option('holidays', '01.01,08.03,09.05');?>" />
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Онлайн консультант</th>
                <td><input type="checkbox" name="taobao_turn_online_consult" value="on"<?php if ('on' == get_option('taobao_turn_online_consult')) : ?> checked="checked"<?php endif; ?> />
                </td>
            </tr>

<!--            <th scope="row"><h3>Баннеры</h3>-->
<!--            <th scope="row">-->
<!---->
<!--                <tr valign="top" class="top_banner">-->
<!--            <th scope="row">Верхний (адрес баннера) 726 × 90</th>-->
<!--            <td><input style="width:400px; height:25px;" type="text" name="top_banner_path"-->
<!--                       value="--><?php //echo get_option('top_banner_path');?><!--"/>-->
<!--            </td>-->

            <th scope="row"><h3>Соц сети</h3>
            <th scope="row">
            <tr valign="top">
                <th scope="row">cos0</th></th>
                <td><input style="width:400px; height:25px;" type="text" name="cos0" value="<?php echo get_option('cos0');?>" />
                </td>
            </tr>
            
            <tr valign="top">
                <th scope="row">cos1</th></th>
                <td><input style="width:400px; height:25px;" type="text" name="cos1" value="<?php echo get_option('cos1');?>" />
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">cos2</th></th>
                <td><input style="width:400px; height:25px;" type="text" name="cos2" value="<?php echo get_option('cos2');?>" />
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">cos3</th></th>
                <td><input style="width:400px; height:25px;" type="text" name="cos3" value="<?php echo get_option('cos3');?>" />
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">cos4</th></th>
                <td><input style="width:400px; height:25px;" type="text" name="cos4" value="<?php echo get_option('cos4');?>" />
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">cos5</th></th>
                <td><input style="width:400px; height:25px;" type="text" name="cos5" value="<?php echo get_option('cos5');?>" />
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">cos6</th></th>
                <td><input style="width:400px; height:25px;" type="text" name="cos6" value="<?php echo get_option('cos6');?>" />
                </td>
            </tr>
        </table>

        <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>"
                   />
        </p>


    </form>
</div>
    <?php

}