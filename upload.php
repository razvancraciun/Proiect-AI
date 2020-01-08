<?php
$target_dir = "data/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fil = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$status = '';

if (file_exists($target_file)) {
    $status = "Sorry, file already exists.";
    $uploadOk = 0;
}

if($fil != "xml") {
    $status = "Sorry, only XML.";
    $uploadOk = 0;
}


if ($uploadOk == 0) {
    $_REQUEST['uploadError'] = "Sorry, only XML.";
    $status = "Sorry, your file was not uploaded.";

} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $status = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        $status = "Sorry, there was an error uploading your file.";
    }
}

header("Location: index.php?uploadResult=".$status);
?>
