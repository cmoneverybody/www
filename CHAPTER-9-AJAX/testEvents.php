<?php
/**
 * Created by PhpStorm.
 * User: Alexey
 * Date: 29.05.14
 * Time: 21:49
 */
header('Content-Type: text/html; charset=utf-8');
   if ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
      if ($_POST['er'] == 'yes') {
         sleep(5);
      }
   }
?>