<?php
        echo $_POST['aud'];
        include 'connect.php';
$res = $dbh -> prepare("SELECT `week_day`,`lesson_number`,`disciple`,`name`,`title`,`type` 
                        FROM `lesson` Left join lesson_groups on lesson.ID_Lesson=lesson_groups.FID_Lesson2
                        Left join lesson_teacher on lesson_teacher.FID_Lesson1=lesson.ID_Lesson
                        Left join groups on lesson_groups.FID_Groups=groups.ID_Groups
                        Left join teacher on lesson_teacher.FID_Teacher=teacher.ID_Teacher 
                        WHERE auditorium=(:aud)
                        ");
$res->bindParam(':aud', $aud);
$aud = $_POST['aud'];
echo '<table border="1">',
        '<tr><th>week_day</th><th>lesson_number</th><th>disciple</th><th>name</th><th>Group</th><th>type</th>';
$res->execute();
while($row = $res ->fetch(PDO::FETCH_ASSOC))
{    
             echo '<tr>
                         <td>',$row['week_day'],'</td>',
                        '<td>',$row['lesson_number'],'</td>',
                        '<td>',$row['disciple'],'</td>',
                        '<td>',$row['name'],'</td>',
                        '<td>',$row['title'],'</td>',
                        '<td>',$row['type'],'</td>',
               
                '</tr>';   
}
echo '</table><br><a href="index.php">Назад</a>';
 ?>