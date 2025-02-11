<?php
require '../function/functions.php';
if (isset($_POST['form'])) {
    $_POST['page'] = $_SERVER['HTTP_REFERER'];
    date_default_timezone_set("Asia/Karachi");
    switch ($_POST['form']) {
        case 'reservationForm':
            nameEmailPhoneMessageForm($_POST, $connection);
            break;
    }
    header('Location: https://hancockpublishers.com/thank-you');
}