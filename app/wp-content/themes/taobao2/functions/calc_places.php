<?php
/*
 * Список стран и городов для калькулятора
*/

add_action('admin_menu', 'register_submenu_calc_places');

function register_submenu_calc_places () {
    add_submenu_page('options-general.php', 'Города и Страны', 'Города и Страны', 'manage_options', 'calc_places', 'submenu_calc_places_callback');
}

function submenu_calc_places_callback () {
    global $title;

    // Сохраняем, изменяем или удаляем данныне если нам что-то передали
    if (isset($_POST) && isset($_POST['action'])) {
        $result = true;
        $action = explode('_', $_POST['action']);
        if ($action[0] == 'delete') {
            if ($action[1] == 'country') {
                calc_places_delete_country($action[2]);
            } elseif ($action[1] == 'city') {
                calc_places_delete_city($action[2]);
            }
        } elseif ($action[0] == 'update') {
            if ($action[1] == 'country') {
                calc_places_update_country($action[2], $_POST['country_' . $action[2]], $_POST['code_' . $action[2]]);
            } elseif ($action[1] == 'city') {
                calc_places_update_city($action[2], $_POST['city_' . $action[2]], $_POST['city_' . $action[2] . '_coast']);
            }
        } elseif ($action[0] == 'add') {
            if ($action[1] == 'country') {
                calc_places_add_country($_POST['country'], $_POST['code']);
            } elseif ($action[1] == 'city') {
                calc_places_add_city($action[2], $_POST['city_country_' . $action[2]], $_POST['city_country_' . $action[2] . '_coast']);
            }
        }
    }

    $num = 0;
    // Собираем существующие параметры
    $places = get_calc_places();
    ?>
<style type="text/css">
    .calc_places_form, .calc_places_form table {width:100%;}
    .calc_places_form thead td.first_coll input {width:322px;}
    .calc_places_form tbody td.first_coll input {width:300px;}
    .calc_places_form thead {background:#eef;cursor:pointer;}
    .calc_places_form thead:hover {background:#ddf;}
    .calc_places_form thead.add_country:hover {background:#eef;}
    .calc_places_form td {padding:3px;text-align:center;}
    .calc_places_form input, .calc_places_form button {margin:0;}
    .calc_places_form td {width:70px;text-align:center;}
    .calc_places_form td.first_coll {width:auto;text-align:left;}
    .calc_places_form tbody td.first_coll {padding-left:25px;}
    .calc_places_form td.first_coll input.second_field {width:100px;}
</style>

<script type="text/javascript">
    jQuery(function(){
        var $tbody = jQuery('.calc_places_form tbody');
        jQuery('.calc_places_form thead').click(function(){
            $tbody.hide();
            jQuery(this).next().fadeIn('slow');
        });
    });
</script>

<div class="wrap">
    <div id="icon-options-general" class="icon32"><br /></div>
    <h2><?php echo $title; ?></h2>

    <pre><?php //var_dump($places); ?></pre>
    <form class="calc_places_form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
        <table cellspacing="0">
                <?php foreach ($places as $country_id => $place) : ?>
            <thead>
                <tr>
                    <td class="first_coll">
                        <input type="text" name="country_<?php echo $country_id; ?>" value="<?php echo $place['country']; ?>" />
                        <input class="second_field" type="text" name="code_<?php echo $country_id; ?>" value="<?php echo $place['code']; ?>" />
                    </td>
                    <td>
                        <button type="submit" name="action" value="update_country_<?php echo $country_id; ?>" class="button-primary">Update</button>
                    </td>
                    <td>
                        <button type="submit" name="action" value="delete_country_<?php echo $country_id; ?>" class="button-primary">Delete</button>
                    </td>
                </tr>
            </thead>
            <tbody<?php if ($num) : ?> style="display:none;"<?php endif; ?>>
                        <?php foreach ($place['cities'] as $city) : ?>
                <tr>
                    <td class="first_coll">
                        <input type="text" name="city_<?php echo $city['city_id']; ?>" value="<?php echo $city['city']; ?>" />
                        <input class="second_field" type="text" name="city_<?php echo $city['city_id']; ?>_coast" value="<?php echo $city['coast']; ?>" />
                    </td>
                    <td>
                        <button type="submit" name="action" value="update_city_<?php echo $city['city_id']; ?>"  class="button-primary">Update</button>
                    </td>
                    <td>
                        <button type="submit" name="action" value="delete_city_<?php echo $city['city_id']; ?>"  class="button-primary">Delete</button>
                    </td>
                </tr>
                        <?php endforeach; ?>
                <tr>
                    <td class="first_coll">
                        <input type="text" name="city_country_<?php echo $country_id; ?>" value="" />
                        <input class="second_field" type="text" name="city_country_<?php echo $country_id; ?>_coast" value="" />
                    </td>
                    <td colspan="2">
                        <button type="submit" name="action" value="add_city_<?php echo $country_id; ?>" class="button-primary">Add</button>
                    </td>
                </tr>
            </tbody>
                    <?php $num++; ?>
                <?php endforeach; ?>
            <thead class="add_country">
                <tr>
                    <td class="first_coll">
                        <input type="text" name="country" value="" />
                        <input class="second_field" type="text" name="code" value="" />
                    </td>
                    <td colspan="2">
                        <button type="submit" name="action" value="add_country" class="button-primary">Add</button>
                    </td>
                </tr>
            </thead>
        </table>
    </form>
</div>
    <?php
}

/**
 * Функция возвращает список всех созданных полей калькулятора
 * @return mixed Массив созданных полей калькулятора
 */
function get_calc_places () {
    global $wpdb;
    $query = "SELECT `wp_cities`.`id`, `wp_cities`.`name`, `wp_cities`.`coast`, "
            . "`wp_countries`.`id` as `country_id`, `wp_countries`.`name` as `country_name`, "
            . "`wp_countries`.`code` FROM `wp_cities` "
            . "RIGHT JOIN `wp_countries` ON `wp_countries`.`id`=`wp_cities`.`country_id` "
            . "ORDER BY `wp_countries`.`name`, `wp_cities`.`name`;";
    $places = $wpdb->get_results($query);

    // Преобразуем массив в удобную форму
    $nice_data = array();
    $count_places = count($places);
    for ($c = 0; $c < $count_places;) {
        $nice_data[$places[$c]->country_id] = array(
                "country" => $places[$c]->country_name,
                "code" => $places[$c]->code,
                "cities" => array()
        );
        $new_data = &$nice_data[$places[$c]->country_id]["cities"];
        for ($c2 = $c; $c2 < $count_places;) {
            if (!empty($places[$c2]->name)) {
                array_push($new_data, array(
                        'city' => $places[$c2]->name,
                        'city_id' => $places[$c2]->id,
                        'coast' => $places[$c2]->coast));
            }
            $c2++;
            if ($places[$c2]->country_id != $places[$c2-1]->country_id) break;
        }
        $c = $c2;
    }

    return $nice_data;
}

// Countries

function calc_places_get_countries () {
    global $wpdb;
    $res = $wpdb->get_results("SELECT `" . $wpdb->prefix . "countries`.`name`, `" . $wpdb->prefix . "countries`.`id`, `" . $wpdb->prefix . "countries`.`code` FROM `" . $wpdb->prefix . "countries` ORDER BY `" . $wpdb->prefix . "countries`.`name`;");
    return $res;
}

function calc_places_delete_country ($country_id) {
    global $wpdb;
    $res = $wpdb->query("DELETE FROM " . $wpdb->prefix . "countries WHERE `id` = " . $country_id . ";");
    return $res;
}

function calc_places_add_country ($country, $code) {
    global $wpdb;
    $res = $wpdb->query("INSERT INTO " . $wpdb->prefix . "countries (`name`, `code`) VALUES ('" . $country . "', '" . $code . "');");
    return $res;
}

function calc_places_update_country ($country_id, $country, $code) {
    global $wpdb;
    $res = $wpdb->query("UPDATE " . $wpdb->prefix . "countries SET `name`='" . $country . "', `code`='" . $code . "' WHERE `id` = " . $country_id . ";");
    return $res;
}

// Cities

function calc_places_get_cities () {
    global $wpdb;
    $res = $wpdb->get_results("SELECT * FROM `" . $wpdb->prefix . "cities` ORDER BY `name`");
    return $res;
}

function calc_places_delete_city ($city_id) {
    global $wpdb;
    $res = $wpdb->query("DELETE FROM " . $wpdb->prefix . "cities WHERE `id` = " . $city_id . ";");
    return $res;
}

function calc_places_add_city ($country_id, $city, $coast) {
    global $wpdb;
    $coast = str_replace(',', '.', $coast);
    $res = $wpdb->query("INSERT INTO " . $wpdb->prefix . "cities (`name`, `coast`, `country_id`) VALUES ('" . $city . "', " . $coast . ", " . $country_id . ");");
    return $res;
}

function calc_places_update_city ($city_id, $city, $coast) {
    global $wpdb;
    $coast = str_replace(',', '.', $coast);
    $res = $wpdb->query("UPDATE " . $wpdb->prefix . "cities SET `name`='" . $city . "', `coast`=" . $coast ." WHERE `id` = " . $city_id . ";");
    return $res;
}