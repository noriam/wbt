<?php
$handle = fopen("Upload/" . $_FILES["fileToUpload2"]["name"], "r");
if ($handle == false) {
print "Error: open fail";
exit(1);
}
$contents = fread($handle, filesize("Upload/" . $_FILES["fileToUpload2"]["name"]));
if ($contents == false) {
print "Error: read fail";
exit(1);
}
?>