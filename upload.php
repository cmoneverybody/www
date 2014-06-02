<?php
/**
 * Created by PhpStorm.
 * User: Alexey
 * Date: 01.06.14
 * Time: 20:11
 */
   if ($_POST) {
      $uploadDir = 'uploads/';
      if ($_FILES['image']['error'] == 0) {
         move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $_FILES['image']['name']);
      };
   }
?>