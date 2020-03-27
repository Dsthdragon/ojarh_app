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

$user->verificationtype = isset($_POST['verificationtype']) ? $_POST['verificationtype'] : die("Please select document type:");

$user->verifystatus = 'Pending';
$user->verifyid = mt_rand(100000, 999999);

$user->file_name = @$_FILES['verifyimage']['name'];
$user->file_size = @$_FILES['verifyimage']['size'];
$user->file_tmp = @$_FILES['verifyimage']['tmp_name'];
$user->file_type = @$_FILES['verifyimage']['type'];

$user->userid = $_SESSION['userid'];

$user->file_name  = $user->verifyid."-".$user->file_name;

if($user->isVerifyExist()) {
   	header('Location: ../../seller/seller_verification.php?result=You already requested for this process, verification is on going!');
	return false;
}

if(is_uploaded_file($user->file_tmp)){
    if($user->file_size > 1097152 ){
    	header('Location: ../../seller/seller_verification.php?result=File must not exceed 1MB.');
        return true;
    }else{
    	if($user->submit_verify()){
			mkdir( "../../seller/marketImage/".$user->verifyid );
			$targetPath = "../../seller/marketImage/".$user->verifyid.'/'.$user->file_name;
			if(move_uploaded_file($user->file_tmp, $targetPath)) {
				header('Location: ../../seller/seller_verification.php?result=Verication submitted!');
				return true;
			}
		}else{
			//header("location: ../../seller/seller_verification.php?result=Fail to create market");
			return false;
		}
    }

}else{
	header('Location: ../../admin/market_setting.php?result=Please upload market image!');
	return false;
}

?>