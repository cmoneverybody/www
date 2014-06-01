<?php
/**
 * Created by PhpStorm.
 * User: Alexey
 * Date: 01.06.14
 * Time: 14:23
 */
   header('Content-Type: text/html; charset=utf-8');
   if ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
      if ($_POST) {
         echo '<div>Время: ' . date('H:i:s', time()) . '</div>';

         $link = mysql_connect('localhost', 'root', '19alex89')
                 or die('Не удалось соединиться: ' . mysql_error());
         echo 'Соединение успешно установлено';
         mysql_select_db('steelbase') or die('Не удалось выбрать базу данных');

         // Выполняем SQL-запрос
         $query = 'SELECT * FROM test';
         $result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());

         // Выводим результаты в html
         echo "<table>\n";
         while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
            echo "\t<tr>\n";
            foreach ($line as $col_value) {
               echo "\t\t<td>$col_value</td>\n";
            }
            echo "\t</tr>\n";
         }
         echo "</table>\n";

         // Освобождаем память от результата
         mysql_free_result($result);

         // Закрываем соединение
         mysql_close($link);
      }
   }
?>