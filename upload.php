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
         $hash = hash_file('md5', $_FILES['image']['tmp_name']);
         $name = $_FILES['image']['name'];
         $level1 = mb_substr($hash, 0, 2) . '/';
         $level2 = mb_substr($hash, 2, 2) . '/';
         //Сохраняем ссылку на файл в базе данных
         $link = mysql_connect('localhost', 'root', '19alex89') or die('Не удалось соединиться: ' . mysql_error());
         mysql_select_db('steelbase') or die('Не удалось выбрать базу данных');
         //Проверяем, есть ли данное изображение на сервере?
         $test = mysql_query("SELECT COUNT(HASH) FROM photo WHERE HASH='" . $hash . "'");
         $cnt = (int) mysql_result($test, 0);
         $fullFileName = $uploadDir . $level1 . $level2 . $hash;
         if ($cnt <= 0) { //Добавляем запись только если изображения нет в базе данных
            if (!file_exists($uploadDir . $level1)) {
               mkdir($uploadDir . $level1);
            }
            if (!file_exists($uploadDir . $level1 . $level2)) {
               mkdir($uploadDir . $level1 . $level2);
            }
            move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $level1 . $level2 . $hash);
            $query = 'INSERT INTO photo (UID, HASH, NAME) VALUES (NULL, "'. $hash . '", "' . $name . '")';
            $result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
         }
         if (file_exists($fullFileName)) {
            $arr = array('fileName' => $fullFileName);
            echo json_encode($arr);
            //echo '<div>' . $fullFileName . '</div>';
         }
         // Освобождаем память от результата
         mysql_free_result($result);
         // Закрываем соединение
         mysql_close($link);
      };
   }
?>