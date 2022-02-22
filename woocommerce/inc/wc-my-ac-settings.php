<?php
function account_menu_items_settings($items) {
    $items['dashboard'] = "Мой профиль";
    unset($items['edit-address']);  
    unset($items['downloads']);
    return $items;
}
add_filter( 'woocommerce_account_menu_items', 'account_menu_items_settings', 10 );