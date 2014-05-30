<?php
/**
 * Created by PhpStorm.
 * User: Alexey
 * Date: 29.05.14
 * Time: 21:09
 */
   header('Content-Type: text/html; charset=utf-8');
   if ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
      print '[
         {"name":"Alexey","phone":"22-11-33"},
         {"name":"Ivan","phone":"55-44-66"},
         {"name":"Michail","phone":"88-77-99"}
      ]';
   }
?>