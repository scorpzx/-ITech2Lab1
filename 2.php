 <?php
        echo $_POST['teacher'];
        include 'connect.php';
$res = $dbh -> prepare("SELECT `week_day`,`lesson_number`,`auditorium`,`disciple`,`title`,`type` 
                        FROM `lesson` Left join lesson_groups on lesson.ID_Lesson=lesson_groups.FID_Lesson2
                        Left join lesson_teacher on lesson_teacher.FID_Lesson1=lesson.ID_Lesson
                        Left join groups on lesson_groups.FID_Groups=groups.ID_Groups
                        WHERE lesson_teacher.FID_Teacher=(:teacher)
                        ");
$res->bindParam(':teacher', $teacher_tmp);
$teacher_tmp = $_POST['teacher'];
echo '<table border="1">',
        '<tr><th>week_day</th><th>lesson_number</th><th>auditorium</th><th>disciple</th><th>Group</th><th>type</th>';
$res->execute();
while($row = $res ->fetch(PDO::FETCH_ASSOC))
{    
             echo '<tr>
                         <td>',$row['week_day'],'</td>',
                        '<td>',$row['lesson_number'],'</td>',
                        '<td>',$row['auditorium'],'</td>',
                        '<td>',$row['disciple'],'</td>',
                        '<td>',$row['title'],'</td>',
                        '<td>',$row['type'],'</td>',
               
                '</tr>';   
}
echo '</table><br><a href="index.php">Назад</a>';
 ?>