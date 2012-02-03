<?php
/*
 * Калькулятор стоимости покупки и доставки товара
*/

// Интерфейс настройки калькулятора

add_action('admin_menu', 'register_submenu_calculator');

function register_submenu_calculator () {
    add_submenu_page('options-general.php', 'Настройка калькулятора', 'Калькулятор', 'manage_options', 'calculator', 'submenu_calculator_callback');
}

function submenu_calculator_callback () {
    global $title;

    // Сохраняем, изменяем или удаляем данныне если нам что-то передали
    if (isset($_POST) && isset($_POST['action'])) {
        $result = true;
        $action = explode('_', $_POST['action']);
        if (isset($action[1])) {
            if ($action[0] == 'delete') {
                calculator_delete_param($action[1]);
            } elseif ($action[0] == 'update' && isset($_POST[$action[1] . '_label'])) {
                //$pre_code = (isset($_POST[$action[1] . '_pre_code']))?$_POST[$action[1] . '_pre_code']:NULL;
                $post_code = (isset($_POST[$action[1] . '_post_code']))?$_POST[$action[1] . '_post_code']:NULL;
                $result = calculator_set_param($_POST[$action[1] . '_label'],
                        //$pre_code,
                        $post_code, $action[1]);
            }
        } else {
            if ($action[0] == 'add' && isset($_POST['label'])) {
                //$pre_code = (isset($_POST['pre_code']))?$_POST['pre_code']:NULL;
                $post_code = (isset($_POST['post_code']))?$_POST['post_code']:NULL;
                $result = calculator_set_param($_POST['label'],
                        //$pre_code,
                        $post_code);
            } elseif ($action[0] == 'save') {
                $formula = (isset($_POST['formula']))?$_POST['formula']:'';
                $formula_opt = (isset($_POST['formula_opt']))?$_POST['formula_opt']:'';
                update_option('calculator_formula', strtolower(trim($formula)));
                update_option('calculator_formula_opt', strtolower(trim($formula_opt)));

                if (isset($_POST['calculator_conf_countries'])) {
                    update_option('calculator_conf_countries', 1);
                } else {
                    update_option('calculator_conf_countries', '');
                }

                if (isset($_POST['calculator_conf_opt'])) {
                    update_option('calculator_conf_opt', 1);
                } else {
                    update_option('calculator_conf_opt', '');
                }
            }
        }
    }

    // Собираем существующие параметры
    $params = calculator_get_params();
    ?>
<style type="text/css">
    .calculator_admin_form {margin-top:15px;}
    .calculator_admin_form table {width:100%;margin:0;}
    .calculator_admin_form table input[type=text] {width:100%;}
    .calculator_admin_form table button[type=submit] {width:38%;}
    .calculator_admin_formula input {margin-left:6px;width:300px;}
    .calculator_admin_formula label {font-weight:bold;}
    .calculator_admin_form .slug {width:20px;}
</style>

<div class="wrap">

    <div id="icon-options-general" class="icon32"><br></div>
    <h2><?php echo $title; ?></h2>

    <form class="calculator_admin_form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
        <table cellspacing="10">
            <tr>
                <th>Label</th>
                <!-- <th>Prefix code</th> -->
                <th>Image Link</th>
                <th>Options</th>
            </tr>
                <?php foreach ($params as $slug => $param) : ?>
            <tr>
                <td class="slug">
                    <?php echo $slug; ?>:
                </td>
                <td>
                    <input type="text" name="<?php echo $slug; ?>_label" value="<?php echo $param['label'] ?>" />
                </td>
                <td>
                    <input type="text" name="<?php echo $slug; ?>_post_code" value="<?php echo $param['post_code'] ?>" />
                </td>
                <td>
                    <button class="button-primary" type="submit" name="action" value="update_<?php echo $slug; ?>">Update</button>
                    <button class="button-primary" type="submit" name="action" value="delete_<?php echo $slug; ?>">Delete</button>
                </td>
            </tr>
                <?php endforeach; ?>

            <tr>
                <td></td>
                <td>
                    <input type="text" name="label" value="" />
                </td>
                <!-- <td>
                    <input type="text" name="pre_code" value="" />
                </td> -->
                <td>
                    <input type="text" name="post_code" value="" />
                </td>
                <td>
                    <center><button class="button-primary" type="submit" name="action" value="add">Add New</button></center>
                </td>
            </tr>
        </table>
    </form>

    <form class="calculator_admin_formula" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
        <table>
            <tr>
                <td>
                    <label for="formula_field">Формула</label>
                </td>
                <td>
                    <input id="formula_field" type="text" name="formula" value="<?php echo get_option('calculator_formula'); ?>" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="formula_opt_field">Формула для опта</label>
                </td>
                <td>
                    <input id="formula_opt_field" type="text" name="formula_opt" value="<?php echo get_option('calculator_formula_opt'); ?>" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="calculator_conf_countries">Отображать список городов</label>
                </td>
                <td>
                    <input type="checkbox" name="calculator_conf_countries" value="1" id="calculator_conf_countries" <?php if (get_option('calculator_conf_countries')): ?>checked <?php endif; ?>/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="calculator_conf_opt">Отображать выбор опта</label>
                </td>
                <td>
                    <input type="checkbox" name="calculator_conf_opt" value="1" id="calculator_conf_opt" <?php if (get_option('calculator_conf_opt')): ?>checked <?php endif; ?>/>
                </td>
            </tr>
        </table>

        <button type="submit" name="action" class="button-primary" value="save">Save</button>
        <p class="description">Вы можете вставить в формулу переменную Y для <br />
            использования стоимости одного юаня в рублях<br />
            и переменную C для использования стоимости<br />
            доставки в выбранный город.
        </p>
    </form>
</div>
    <?php
}

/**
 * Функция возвращает список всех созданных полей калькулятора
 * @return mixed Массив созданных полей калькулятора
 */
function calculator_get_params () {
    global $wpdb;
    $query = "SELECT `option_name`, `option_value` FROM wp_options WHERE "
            . "`option_name` LIKE 'calculator_p%' ORDER BY `option_name`;";
    $params = $wpdb->get_results($query);

    // Преобразуем массив в удобную форму
    $new_params = array();
    foreach ($params as $param) {
        $options = explode("<", $param->option_value);
        $new_params[substr($param->option_name, 11)] = array(
                "label" => $options[1],
                //"pre_code" => $options[0],
                "post_code" => $options[0]);
    }

    return $new_params;
}

/**
 * Функция создает или изменяет поле параметра калькулятора
 * @param string $label Название поля
 * @param string $pre_code HTML-код перед полем формы
 * @param string $post_code HTML-код после поля формы
 * @param string $slug Название переменной для формулы
 * @return boolean Возвращает false если при сохранении возникли ошибки и true в ином случае
 */
function calculator_set_param ($label, 
        //$pre_code = NULL,
        $post_code = NULL, $slug = NULL) {

    // Без лейбела - не пустим!
    if (empty($label)) {
        return false;
    }

    // Преобразуем данные в необходимый нам формат
    //$pre_code = htmlspecialchars($pre_code);
    $post_code = htmlspecialchars($post_code);
    $label = htmlspecialchars($label);

    // Если slug нет - то мы создадим новый параметр, а если есть возьмем его номер
    if (is_null($slug)) {
        $number = get_option('calculator_count_params', 0);
        update_option('calculator_count_params', ++$number);
        $slug = "p" . $number;
    } else {
        if (!preg_match("/^p[0-9]+$/", $slug)) {
            return false;
        }
    }

    // Формируем строку для записи и сохраняем в БД новое значение
    $new_value = /*$pre_code . "<" .*/ $post_code . "<" . $label;
    update_option('calculator_' . $slug, $new_value);

    return true;
}

/**
 * Функция удаляет параметр по заданому слагу
 * @param type $slug Слаг параметра
 */
function calculator_delete_param ($slug) {
    global $wpdb;
    $wpdb->query("DELETE FROM $wpdb->options WHERE `option_name` = 'calculator_" . $slug . "'");
}

// Алгоритм калькулятора

/**
 * Функция расчитывает стоимость заказа
 * @param array $params Параметры заказа
 * @param boolean $opt Передать true если заказ оптовый
 * @return mixed Return number or false
 */
function calculate ($params, $city_coast = 1, $opt = false) {
    // Выбираем формулу
    $formula = 'calculator_formula';
    if ($opt) {
        $formula .= '_opt';
    }
    $formula = get_option($formula);

    // Вставляем в формулу параметры
    $cny = get_option('taobao_cny');
    foreach ($params as $slug => $value) {
        if (preg_match("/^p[0-9]+$/", $slug)) {
            $value = trim($value);
            if (empty($value)) {
                $value = 0;
            }
            $formula = str_replace($slug, $value, $formula);
        }
    }

    $formula = str_replace("y", $cny, $formula);
    $formula = str_replace("c", $city_coast, $formula);

    $result = false;
    $formula = '$result = ' . $formula . ';';
    eval($formula);

    return $result;
}

// Интерфейс пользователя

function shortcode_taobao_calc ($atts) {

    $calc = "<script type=\"text/javascript\">function taobaoChangeCity (city) {
    city = city.split(' - ');
    jQuery('input[name=calc_coast]').val(city[1]);
    jQuery('input[name=calc_city]').val(city[0]);
}
function taobaoShowCities (country) {
    country = country.split(' ')[0];
    var $cities = $('ul.city li');
            $cities.hide();
    var $selected_list = jQuery('ul.city li.'+country);
            $selected_list.show();
    var $current_city = $selected_list.first().text();

    taobaoChangeCity($current_city);

    jQuery('div.cities .sel_val').text($current_city);
}
jQuery(function(){
            $countries = jQuery('ul.country li');
    var $cities = $('ul.city li');
    var first_country = $countries.first().attr('class');
    taobaoShowCities(first_country);
            $countries.click(function(){
        taobaoShowCities(jQuery(this).attr('class'));
    });
            $cities.click(function(){
        taobaoChangeCity(jQuery(this).text());
    });
});</script>";

    $calc .= '<div class="t4"><div class="minus">';
    $calc .= '<form action="" method="post" class="color">';
    $calc .= '<div class="text-form"><h2>Калькулятор стоимости доставки</h2><p>Для удобства расчета стоимости товара с учетом доставки, воспользуйтесь приведенной ниже формой. </p></div>';

    $params = calculator_get_params();

    foreach ($params as $name => $param) {
        $calc .= '<div class="item">'// . htmlspecialchars_decode($param['pre_code'])
                . '<label>' . $param['label'] . '</label>'
                . '<input type="hidden" name="' . $name . '_label" value="' . $param['label'] . '" />'
                . '<input type="text" name="' . $name . '" value="" class="text" />';
        if (!empty($param['post_code'])) {
            $calc .= '<span><a href="javascript:void(0);" onclick="$(\'#info_' . $name . '\').slideToggle(\'slow\');" class="info"></span><div id="info_' . $name . '" class="calc_info_img" style="display:none;"><div><img src="' . htmlspecialchars_decode($param['post_code']) . '" /></a></div></div>';
        }
        $calc .= '</div>';
    }

    if (get_option('calculator_conf_countries')) {
        $countries = calc_places_get_countries();
        $cities = calc_places_get_cities();
        // Страны
        $calc .= '<div class="item"><label>Ваша страна</label><span class="sel_left undefined" style="z-index: 50; "><span class="sel_right"><span class="sel_val">' . $countries[0]->name . '</span><ul class="country" style="display:none;">';
        foreach ($countries as $country) {
            $calc .= '<li class="country_' . $country->id . '">' . $country->name . '</li>';
        }
        $calc .= '</ul></span></span></div>';
        // Города
        $calc .= '<div class="item cities"><input type="hidden" name="calc_coast" value="' . $cities[0]->coast . '" /><input type="hidden" name="calc_city" value="' . $cities[0]->name . '" />'
                . '<label>Ближайшее местоположение</label>'
                . '<span class="sel_left undefined" style="z-index: 50; "><span class="sel_right"><span class="sel_val">' . $cities[0]->name . ' - ' . $cities[0]->coast . '</span><ul class="city" style="display: none; ">';
        foreach ($cities as $city) {
            $calc .= '<li class="country_' . $city->country_id . '">' . $city->name . ' - ' . $city->coast . '</li>';
        }
        $calc .= '</ul></span></span></div>';
    }

    if (get_option('calculator_conf_opt')) {
        $calc .= '<div class="item"><label>Оптовый заказ <input clsss="chek" name="opt_check" type="checkbox"></label></div>';
    }

    $calc .= '<div class="item"><button type="submit" class="sub"><i>Рассчитать</i></button></div></form>';

    // Результаты

    if (isset($_POST) && count($_POST)) {

        $row_ch = 0;

        $calc_params = array();

        $cal_res = '<div class="more"><h2>Подробный расчет стоимости доставки товара:</h2><table cellpadding="0" class="" cellspacing="0">';

        foreach ($_POST as $index => $value) {
            if (preg_match("/^p[0-9]+$/", $index)) {
                $label = (isset($_POST[$index . '_label']))?$_POST[$index . '_label']:'Параметр';
                $class = ($row_ch % 2 == 0)?' class="item1"':'';
                $cal_res .= "<tr{$class}><th class=\"item\">{$label}:</th><td class=\"item1\">{$value}</td></tr>";
                $row_ch++;
            }
        }

        if (isset($_POST['calc_coast'])) {
            if (isset($_POST['calc_city'])) {
                $class = ($row_ch % 2 == 0)?' class="item1"':'';
                $cal_res .= "<tr{$class}><th class=\"item\">Стоимость доставки из Китая в {$_POST['calc_city']}:</th><td class=\"item1\">{$_POST['calc_coast']}</td></tr>";
                $row_ch++;
            }
            $city_coast = $_POST['calc_coast'];
        } else {
            $city_coast = 1;
        }

        if (isset($_POST['opt_check'])) {
            $opt = true;
        } else {
            $opt = false;
        }

        $formula_res = calculate($_POST, $city_coast, $opt);
        //$calc .= var_export($formula_res,1);

        if ($formula_res) {
            $formula_res = round($formula_res, 2);
            $class = ($row_ch % 2 == 0)?' class="item1"':'';
            $cal_res .= "<tr{$class}><th class=\"item\">Общая стоимость:</th><td class=\"item1\">{$formula_res}</td></tr>";
            $row_ch++;
        }

        $calc .= $cal_res . "</table></div>";
    }


    return $calc . '</div></div>';
}

add_shortcode('taobaocalc', 'shortcode_taobao_calc');
