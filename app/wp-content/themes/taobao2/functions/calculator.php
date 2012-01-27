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
                $pre_code = (isset($_POST[$action[1] . '_pre_code']))?$_POST[$action[1] . '_pre_code']:NULL;
                $post_code = (isset($_POST[$action[1] . '_post_code']))?$_POST[$action[1] . '_post_code']:NULL;
                $result = calculator_set_param($_POST[$action[1] . '_label'],
                        $pre_code, $post_code, $action[1]);
            }
        } else {
            if ($action[0] == 'add' && isset($_POST['label'])) {
                $pre_code = (isset($_POST['pre_code']))?$_POST['pre_code']:NULL;
                $post_code = (isset($_POST['post_code']))?$_POST['post_code']:NULL;
                $result = calculator_set_param($_POST['label'], $pre_code, $post_code);
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
        </style>

        <div class="wrap">

            <div id="icon-options-general" class="icon32"><br></div>
            <h2><?php echo $title; ?></h2>

            <form class="calculator_admin_form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <table cellspacing="10">
                    <tr>
                        <th>Label</th>
                        <th>Prefix code</th>
                        <th>Postfix code</th>
                        <th>Options</th>
                    </tr>
                    <?php foreach ($params as $slug => $param) : ?>
                        <tr>
                            <td>
                                <input type="text" name="<?php echo $slug; ?>_label" value="<?php echo $param['label'] ?>" />
                            </td>
                            <td>
                                <input type="text" name="<?php echo $slug; ?>_pre_code" value="<?php echo $param['pre_code'] ?>" />
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
                        <td>
                            <input type="text" name="label" value="" />
                        </td>
                        <td>
                            <input type="text" name="pre_code" value="" />
                        </td>
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
                использования стоимости одного юаня в рублях.</p>
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
        . "`option_name` LIKE 'calculator_p%' ORDER BY `option_id`;";
    $params = $wpdb->get_results($query);

    // Преобразуем массив в удобную форму
    $new_params = array();
    foreach ($params as $param) {
        $options = explode("<", $param->option_value);
        $new_params[substr($param->option_name, 11)] = array(
            "label" => $options[2],
            "pre_code" => $options[0],
            "post_code" => $options[1]);
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
function calculator_set_param ($label, $pre_code = NULL, $post_code = NULL, $slug = NULL) {

    // Без лейбела - не пустим!
    if (empty($label)) {
        return false;
    }

    // Преобразуем данные в необходимый нам формат
    $pre_code = htmlspecialchars($pre_code);
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
    $new_value = $pre_code . "<" . $post_code . "<" . $label;
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
function calculate ($params, $opt = false) {
    // Выбираем формулу
    $formula = 'calculator_formula';
    if ($opt) {
        $formula .= '_opt';
    }
    $formula = get_option($formula);

    // Вставляем в формулу параметры
    $cny = get_option('cny');
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

    $result = false;
    $formula = '$result = ' . $formula . ';';
    eval($formula);

    return $result;
}

// Интерфейс пользователя

