
<?php
//程序运行时间
$starttime = explode(' ',microtime());
//echo microtime();
$name = isset($_POST['name'])? $_POST['name'] : '';
$gender = isset($_POST['gender'])? $_POST['gender'] : '';

$filename = 'img/'.rand(1000,9999).time().substr($_FILES['photo']['name'], strrpos($_FILES['photo']['name'],'.'));

$response = array();

if(move_uploaded_file($_FILES['photo']['tmp_name'], $filename)){
    $response['isSuccess'] = true;
    $response['name'] = $name;
    $response['gender'] = $gender;
    $response['photo'] = $filename;
}else{
    $response['isSuccess'] = false;
}
//程序运行时间
$endtime = explode(' ',microtime());
$thistime = $endtime[0]+$endtime[1]-($starttime[0]+$starttime[1]);
$response['yunxing']="本网页执行耗时：".$thistime." 秒。";
echo json_encode($response);

?>
