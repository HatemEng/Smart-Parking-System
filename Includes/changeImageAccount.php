
<?php
include_once("connection.php");
session_start();


if (isset($_POST['mobile']) && $_POST['mobile'] == 'android') {
    $userId = $_POST['userId'];
} else {
$_SESSION['ImageDir'];
$userId = $_SESSION['UserId'];

$target_dir = "includes/img/accounts/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["update"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $msg = "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $msg = "File is not an image.";
        $uploadOk = 0;
    }
    ///////////// to save the other info like username password ////////////////////
    $username       = $_POST['username'];
    $password       = $_POST['password'];
    $email          = $_POST['email'];
    $phone          = $_POST['phone'];
    $query  = "UPDATE tbl_accounts SET username = '$username',password = '$password',
        email = '$email',phone = '$phone' WHERE id = '$userId'";
        $result = mysqli_query($conn, $query);
        if($result->num_rows > 0) {
            $msg = "Success";
        } else {
            $msg = "Failed";
        }
        ////////////// end of update the account info ////////////////////////
}
// Check if file already exists
if (file_exists($target_file)) {
    $msg = "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $msg = "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $msg = "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $msg = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $_SESSION['ImageDir'] = $target_file;
        $query  = "UPDATE tbl_accounts SET pic = '$target_file' WHERE id = '$userId'";
        $result = mysqli_query($conn, $query);
        if($result->num_rows > 0) {
            $msg = "Success";
        } else {
            $msg = "Failed";
        }

    } else {
        $msg = "Sorry, there was an error uploading your file.";
    }
}
}
    /////// load from database ////////////
    $query  = "SELECT * FROM tbl_accounts WHERE id = '$userId'";
    $result = $result = mysqli_query($conn, $query);
    if($result->num_rows > 0){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['ImageDir']   = $row['pic'];
            $_SESSION['Username']   = $row['username'];
            $_SESSION['UserId']     = $row['id'];
            $_SESSION['Email']      = $row['email'];
            $_SESSION['Phone']      = $row['phone'];
            $_SESSION['Password']   = $row['password'];
            if (isset($_POST['mobile']) && $_POST['mobile'] == 'android') {
                echo $row['pic'];
            }
        }
?>
