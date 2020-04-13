<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Methods: PUT, GET, POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../config/Database.php';
include_once '../models/Controller.php';
include_once '../models/core.php';

$db = getDB();

$user = new Users($db);

$data = json_decode(file_get_contents("php://input"));

$returnLocation = $_POST['returnLocation'];
$days = $_POST['days'];
$link = $_POST['link'];

$file_name = @$_FILES['adimg']['name'];
$file_size = @$_FILES['adimg']['size'];
$file_tmp = @$_FILES['adimg']['tmp_name'];
$file_type = @$_FILES['adimg']['type'];

$file_name  = mt_rand(100000, 999999)."-".$file_name;


if(is_uploaded_file($file_tmp)){
    if($file_size > 1097152 ){
    	header('Location: ../../'. $returnLocation.'?result=File must not exceed 1MB.');
        return true;
    }else{
    	if($user->create_ad($link, $file_name, $days)){
			$targetPath = "../../public/ads/".$file_name;
			if(move_uploaded_file($file_tmp, $targetPath)) {
				header('Location: ../../'. $returnLocation.'?result=Ads added!');
				return true;
			}
		}else{
			//header("location: ../../admin/market_setting.php?result=Fail to create market");
			return false;
		}
    }

}else{
	header('Location: ../../'. $returnLocation.'?result=Please upload Ad image!');
	return false;
}

?>