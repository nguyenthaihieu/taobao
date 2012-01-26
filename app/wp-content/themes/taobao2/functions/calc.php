<?php

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