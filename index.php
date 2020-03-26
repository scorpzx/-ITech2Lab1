<html>
   <head>
   <meta charset="utf-8">
      <title>
          Расписание
     </title>
   </head>
   <body>

<?php 
include 'connect.php';
header('Content-type: text/html; charset=utf-8');

    echo '     <form action="1.php" method="POST">
                   <b>Вывести расписание занятий группы</b>
                   <select name="group">';

$res = $dbh -> query('select `ID_Groups`, `title` from `groups`');
while($row = $res ->fetch(PDO::FETCH_ASSOC))
{    
 echo'    <option value="',
$row['ID_Groups'],'">',$row['title'],
'</option>';   
}

      echo' </select>
                   <input type="submit" name="send" value="Ок">
                    </form>' ; 




   echo '     <form action="2.php" method="POST">
                   <b>Вывести расписание преподавателя</b>
                   <select name="teacher">';

$res2 = $dbh -> query('select `ID_Teacher`, `name` from `teacher`');
while($row2 = $res2 ->fetch(PDO::FETCH_ASSOC))
{    
 echo'    <option value="',
$row2['ID_Teacher'],'">',$row2['name'],
'</option>';   
}

      echo' </select>
                   <input type="submit" name="send" value="Ок">
                    </form>' ; 





   echo '     <form action="3.php" method="POST">
                   <b>Вывести расписание для аудитории</b>
                   <select name="aud">';

$res3 = $dbh -> query('select distinct `auditorium` from `lesson`');
while($row3 = $res3 ->fetch(PDO::FETCH_ASSOC))
{    
 echo'    <option value="',
$row3['auditorium'],'">',$row3['auditorium'],
'</option>';   
}

      echo' </select>
                   <input type="submit" name="send" value="Ок">
                    </form>' ; 



   echo '     <form action="input.php" method="POST">
                   <b>Добавление нового ПЗ</b><br>
                    Введите день недели<br>
                   <input type="text" name="week"><br>
                    Введите номер пары<br>
                   <input type="number" min="1" name="number"><br>
                   Ввелите номер аудитории<br> 
                   <input type="text" name="audN"><br>
                   Введите название дисциплины<br> 
                   <input type="text" name="name"><br>
                   
                  <b>Выберите преподавателя</b>
                   <select name="teacher">';

$res2 = $dbh -> query('select `ID_Teacher`, `name` from `teacher`');
while($row2 = $res2 ->fetch(PDO::FETCH_ASSOC))
{    
 echo'    <option value="',
$row2['ID_Teacher'],'">',$row2['name'],
'</option>';   
}

      echo' </select>
<b>Выберите группу</b>
                   <select name="group">';

$res = $dbh -> query('select `ID_Groups`, `title` from `groups`');
while($row = $res ->fetch(PDO::FETCH_ASSOC))
{    
 echo'    <option value="',
$row['ID_Groups'],'">',$row['title'],
'</option>';   
}

      echo' </select><br>
       <input type="submit" name="send" value="Добавить">
                    </form>' ; 












?>
</body>
</html>