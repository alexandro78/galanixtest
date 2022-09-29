<?php 

include './../Models/Model.php';
$modelObj = new Model();
$table = $modelObj->filterData();
?>


<style>
            table,
            th,
            td {
                border: 1px solid black;
                border-collapse: collapse;
            }
</style>
<table>
<form method="GET" action="importList.php">
<tr>
    <th>id</th>
    <th>uid</th>
    <th>name</th>
    <th>age</th>
    <th>email</th>
    <th>phone</th>
    <th>gender</th>
</tr>
<tr>
    <td><input type="text" name="id" id="id" size="1"/></td>
    <td><input type="text" name="uid" id="uid" size="1"/></td>
    <td><input type="text" name="name" id="name" /></td>
    <td><input type="text" name="age" id="age" size="1"/></td>
    <td><input type="text" name="email" id="email" /></td>
    <td><input type="text" name="phone" id="phone" /></td>
    <td><select id="gender" name="gender" value="0">
            <option value=""></option>
            <option value="male">male</option>
            <option value="female">female</option>
        </select>
    </td>
</tr>
<input type="submit" hidden />
<tr>
<?php
while ($row = mysqli_fetch_assoc($table)) {
    ?>
    <td><?=$row["id"];?></td>
    <td><?=$row["uid"];?></td>
    <td><?=$row["name"];?></td>
    <td><?=$row["age"];?></td>
    <td><?=$row["email"];?></td>
    <td><?=$row["phone"];?></td>
    <td><?=$row["gender"];?></td>
</tr>
<?php
}
?>
</form>
</table>