<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title>file import</title>
 </head>
 <body>

 <form enctype="multipart/form-data" action="./../Controllers/MainController.php" method="POST">
    Send this file: <input id="uploadField" name="userfile" type="file" accept=".csv"/>
    <input type="submit" value="Import" />
</form>
<br><br>
<a href="importList.php">View results</a>



<script>
var uploadField = document.getElementById("uploadField");

uploadField.onchange = function() {
    if(this.files[0].size > 1024){
       alert("file must not exceed 1MG");
       this.value = "";
    };
};
</script>
 </body>
</html>
