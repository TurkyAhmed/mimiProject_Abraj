<?php

// Define a constant
define('ROOT_PATH', '/abraj/');
define('BASE_PATH', __DIR__);


require_once('inc/app.php'); 

$db_server = "127.0.0.1";
$db_user = "root";
$db_user_pass = "";
$db_name = "abraj";

$connection = db_connect($db_server, $db_user, $db_user_pass, $db_name);

$pageName = myAppRequestRoute();
$pageName = explode("?",$pageName)[0];
//==========================================================================================

if ($pageName == "signout") {
    myAppSignout();
    header("Location: " . ROOT_PATH);
    exit;
}

if ($pageName == "home") {
    if (isset($_FILES["myphoto"])) {
        $file = $_FILES["myphoto"];
        $directory = "";
        $type = "private";
        myAppHandleFileUpload($file,$directory,$type);
    }


    if(isset($_POST["submit"])){
        $checkin=$_REQUEST["checkin"];
        $checkOut=$_REQUEST["check_out"];
        $categoryRoom=$_REQUEST["category_room"];
        $Adulte=$_REQUEST["Adulte"];
        $childern=$_REQUEST["childern"];

        $content ="
        checkin: $checkin
        checkcout: $checkOut
        category room: $categoryRoom
        Adulte: $Adulte 
        childern: $childern ";

 
        $apiToken = "6478668361:AAEKMmCMzsq6Duwz1BzN2MC-9rkUb1JbQeY";
        $data = [
            'chat_id' => '@abraj_booking', //to be private replace @TR_A to -1002125885464
            'text' => $content ,
        ];
        $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );


        $localPhotoPath= "./private/".$_FILES["myphoto"]["name"]; 

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot$apiToken/sendPhoto");

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $postFields = [
            'chat_id' => '@abraj_booking',
            'photo' => new CURLFile(realpath($localPhotoPath)),
        ];
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);

        $response = curl_exec($ch);

        curl_close($ch);


    }


}

if ($pageName == "contact") {

    if(isset($_POST["submit"])){
        $name=$_REQUEST["name"];
        $email=$_REQUEST["email"];
        $phone=$_REQUEST["myphoto"];
        $subject=$_REQUEST["subject"];
        $msg=$_REQUEST["message"];

        $content ="
        From: $name 
        Email: $email 
        Phone: $phone
        Subject: $subject 
        
        Message: $msg ";

        echo $content;
        $apiToken = "6478668361:AAEKMmCMzsq6Duwz1BzN2MC-9rkUb1JbQeY";
        $data = [
            'chat_id' => '@TR17_A', //to be private replace @TR_A to -1002125885464
            'text' => $content 
        ];
        $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );
        }
    }





//==========================================================================================

if($pageName == "/"){
    $pageName='home';
}

// Construct the file path
$filePath = 'pages/' . $pageName . '.php';

// Check if the file exists
if (file_exists($filePath)) {
    require_once('layout/header.php');
    // Include or require the file
    require_once($filePath);
    require_once('layout/footer.php');
} else {
    require_once('layout/header.php');
    // File not found, handle the error
    require_once('pages/notfound.php');
    require_once('layout/footer.php');
}


// $_SESSION['fields'] = array();
unset($_SESSION['fields']);
unset($_SESSION['errors']);
