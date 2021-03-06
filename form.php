<!DOCTYPE html>
<html>
<body>
<?php
$uploadOk1 = 1;
$uploadOk2 = 1;
if (isset($_POST['submit'])) {
    $target_dir = "./Upload/";
    $target_file1 = $target_dir . basename($_FILES["fileToUpload1"]["name"]);
    $target_file2 = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
    $fileType1 = pathinfo($target_file1, PATHINFO_EXTENSION);
    $fileType2 = pathinfo($target_file2, PATHINFO_EXTENSION);
    // Check if file is a .cfg
    if ($fileType1 != "cfg")
        echo "<div class='error'>Error character 1, only .cfg files are allowed.<br></div>";
    else
        $uploadOk1 = 0;
    if ($fileType2 != "cfg")
    {
        if ($fileType2 != "")
            echo "<div class='error'>Error character 2, only .cfg files are allowed.<br></div>";
    }
    else
        $uploadOk2 = 0;
}
?>
<div class="form">
    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload1" id="fileToUpload1" required>
        <br>
        <input type="file" name="fileToUpload2" id="fileToUpload2">
        <br>
        <input type="submit" value="Upload .cfg file" name="submit">
    </form>
</div>
<?php
if ($uploadOk1 == 0) {
    if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file1) == false) {
        echo "Sorry, there was an error uploading your file.<br>";
        $uploadOk1 = 1;
    } else {
        print "<div class='main'><div class='unit_to_compare1'>";
        include("open1.php");
        include("chara_page.php");
        print "</div>";
    }
    if ($uploadOk2 == 0) {
        if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2) == false) {
            echo "Sorry, there was an error uploading your file.<br>";
            $uploadOk2 = 1;
        } else {
            print "<div class='unit_to_compare2'>";
            include("open2.php");
            include("chara_page.php");
            print "</div></div>";
        }
    }
}
?>
</div>
</body>
</html>
