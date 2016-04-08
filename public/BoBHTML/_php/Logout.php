<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 4/8/16
 * Time: 2:27 PM
 */
	session_start();
	session_destroy();
    setcookie('FirstName', "", time() - 3600, "/");

    header('Location: /index.php');
?>