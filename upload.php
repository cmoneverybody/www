<?php
/**
 * Created by PhpStorm.
 * User: Alexey
 * Date: 01.06.14
 * Time: 20:11
 */
   if ($_POST) {
      $uploaddir = 'uploads/';
      echo 'File "' . $_FILES['userfile']['tmp_name'] . '" saved to "' . $uploaddir . $_FILES['userfile']['name'] . '"<br/>';
      if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploaddir . $_FILES['userfile']['name'])) {
         echo "File is valid, and was successfully uploaded.";
      } else {
         echo "There some errors!";
      }
   }
?>