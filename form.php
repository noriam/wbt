<!DOCTYPE html>
<html>
<body>
<?php
$uploadOk = 1;
if (isset($_POST["submit"])) {
    $target_dir = "./Upload/";
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
<form action="index.php" method="post" enctype="multipart/form-data">
    Select .cfg to upload :
  <input type="file" name="fileToUpload" id="fileToUpload" required>
  <input type="submit" value="Upload .cfg file" name="submit">
</form>
<?php
    }
else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)
      == false) {
    echo "Sorry, there was an error uploading your file.<br>";
    $uploadOk = 1;
  } else
    include("chara_page.php");
}
?>
</body>
</html>
