<?php
session_start();
$message="";
include 'connectDB.php';
if(isset($_POST['api-service']) && $_POST['api-service']=='getsubjet'){
    openSubjectDetails($_POST['id']);
}

function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}

function getSubCategories($id) {
  $sql = "SELECT * From sub_categories where parent_id=$id";
  global $conn;
  $all =array();
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
 $all[]=$row;
   }
}
return $all;
}

function getBook($id) {
  $sql = "SELECT * From books where id=$id";
  global $conn;
  $all =array();
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    if($row = mysqli_fetch_assoc($result)) {
        $row['user']= getUser($row['promoter_id']);
        return $row;

   }
}
return $all;
}
function search_by_cat($q) {
  $sql = "SELECT * From books where sub_cat=$q order by id desc";
  global $conn;
  $all =array();
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
 $all[]=$row;
   }
}
return $all;
}
function search($q) {
  $sql = "SELECT * From books where title like '%$q%' or description  like '%$q%' order by id desc";
  global $conn;
  $all =array();
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
 $all[]=$row;
   }
}
return $all;
}
function getLatestBooks() {
  $sql = "SELECT * From books order by id desc limit 0 ,10";
  global $conn;
  $all =array();
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
 $all[]=$row;
   }
}
return $all;
}


function getCategories() {
  $sql = "SELECT * From categories";
  global $conn;
  $all =array();
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $row['subs']= getSubCategories($row['id']);
 $all[]=$row;
   }
}
return $all;
}




function signup(){
       global $conn;
      $sql = "INSERT INTO `users` (`id`, `username`, `password`, `bus_name`, `location`, `email`, `phone`, `user_type`)"
              . " VALUES (NULL, '".$_POST['username']."', '".$_POST['pass1']."', '".$_POST['busname']."', '".$_POST['location']."',"
              . " '".$_POST['email']."', '".$_POST['phone']."', '".$_POST['user_type']."');";
   //echo 'you are inserting '.$sql.'<br />';
      if ($conn->query($sql) === TRUE) {
          Check_Login($_POST['email'], $_POST['pass1']);
    return true;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    return false;
}

}




function addBook(){
       global $conn;
       global   $message;
       $sql = "INSERT INTO `books` (`id`, `title`, `description`, `start_date`, `end_date`, `sub_cat`, `amount`, `promoter_id`)"
              . " VALUES (NULL, '".$_POST['title']."', '".$_POST['desc']."',"
              . "'".$_POST['start']."', '".$_POST['end']."', '".$_POST['cat']."', '0', '".$_SESSION['user']['id']."');";
   //echo 'you are inserting '.$sql.'<br />';
      if ($conn->query($sql) === TRUE) {
           $last_id = $conn->insert_id;


           $target_dir = "images/books/";

$uploadOk = 1;
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$target_file = $target_dir . $last_id.".".$imageFileType;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
         $message=  "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
         $message=  "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
     $message=  "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
     $message=  "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $message= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
     $message=  "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
         $message=  "Book was added";
    } else {
         $message=  "Sorry, there was an error uploading your file.";
    }
}





    return true;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    return false;
}

}



function getUser($id){
  $sql = "SELECT * FROM users where id=$id";
  global $conn;
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    if($row = mysqli_fetch_assoc($result)) {
        return  $row;
    }
} else {
  return array();
}

}

function Check_Login($user , $pass){
 $myusername = $user;
$mypassword = $pass;
  $sql = "SELECT * FROM users WHERE email='".$myusername."' and password='".($mypassword)."'";
  global $conn;
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    if($row = mysqli_fetch_assoc($result)) {
       $_SESSION['user'] = $row;
return true;
    }
} else {
  return false;
}

}
