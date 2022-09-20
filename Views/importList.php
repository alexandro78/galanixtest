
<?php
include './../Models/Model.php';
$modelObj = new Model();
$table = $modelObj->showDataFromTable();
while ($row = mysqli_fetch_assoc($table)) {
?>

<tr>
<td><?=$row["id"];?></td>
<td><?=$row["uid"];?></td>
<td><?=$row["name"];?></td>
<td><?=$row["age"];?></td>
<td><?=$row["email"];?></td>
<td><?=$row["phone"];?></td>
<td><?=$row["gender"];?></td>
<br>
</tr>
<?php
}
?>
