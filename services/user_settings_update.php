<?php
if(!defined('INTERFACE_ACCESS')){die('Direct access not premitted');}

$session_id = $_REQUEST["session_id"];
$session = session::get_session($session_id);
if($session->is_valid()) {
    ormlib::remove_from_instance(new user_settings(), "`key` = 'current_report'");
    $users = new user_settings();
    $users->user_id = $session->user_id;
    $users->key = "current_report";
    $users->value = $_REQUEST["current_report"];
    $users->insert();
}

?>