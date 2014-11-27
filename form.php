<!DOCTYPE html>
<html>
<body>
<?php
$uploadOk = 1;
if (isset($_POST["submit"])) {
  $target_dir = "upload/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
  // Check if file is a .cfg
  if ($imageFileType != "cfg")
    echo "Sorry, only .cfg files are allowed.<br>";
  else
    $uploadOk = 0;
  echo $uploadOk . "<br>";
}
if ($uploadOk != 0) {
?>
<form action="form.php" method="post" enctype="multipart/form-data">
  Select .cfg to upload :
  <input type="file" name="fileToUpload" id="fileToUpload" required>
  <input type="submit" value="Upload .cfg file" name="submit">
</form>
<?php }
?>
</body>
</html>
