<?php
/**
 * Created by PhpStorm.
 * User: Alexey
 * Date: 03.06.14
 * Time: 20:29
 */
if (isset($_GET['uid'])) {

   $uid = $_GET['uid'];

   $link = mysql_connect('localhost', 'root', '19alex89') or die('Не удалось соединиться: ' . mysql_error());
   echo '<div>Соединение успешно установлено</div>';
   mysql_select_db('steelbase') or die('Не удалось выбрать базу данных');

   //Проверяем, есть ли данное изображение на сервере?
   $test = mysql_query("SELECT * FROM photo WHERE UID='" . $uid . "'");
   $row = mysql_fetch_assoc($test);
   if (mysql_num_rows($test) > 0) {
      $hash = $row['HASH'];
      echo '<div>Отдаем изображение с UID = "' . $uid . '; hash = ' . $hash . '</div>';
      $uploadDir = 'uploads/';
      $level1 = mb_substr($hash, 0, 2) . '/';
      $level2 = mb_substr($hash, 2, 2) . '/';
      if (!file_exists($uploadDir . $level1) || !file_exists($uploadDir . $level1 . $level2) || !file_exists($uploadDir . $level1 . $level2 . $hash)) {
         echo('<div>ERROR! Файл не найден на сервере!</div>');
      } else {
         echo '<div>Изображение "' . $uploadDir . $level1 . $level2 . $hash . '" найдено и готово к отправке</div>';
      }
      //Тут отдаем файл
      //тут нужно будет вернуть ссылку на уже загруженное изображение
   } else {
      echo '<div>Изображение с UID = "' . $uid . '" не существует!</div>';
   }
   // Освобождаем память от результата
   mysql_free_result($result);

   // Закрываем соединение
   mysql_close($link);
}

?>