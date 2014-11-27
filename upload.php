<?php
$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if file is a .cfg
if ($imageFileType != "cfg") {
  echo "Sorry, only .cfg files are allowed.";
  $uploadOk = 0;
}
echo $uploadOk;
?>