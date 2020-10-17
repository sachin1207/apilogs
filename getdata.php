<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once 'includes/config.php';
include_once 'class/AccessLog.php';

$obj = new AccessLog();
if(isset($_GET['token']) && $_GET['token'] != ''){
	$token = $_GET['token'];
	$auth_data = $obj->checkToken($token);
	if($auth_data['check'] == "success"){
		$p_id = $auth_data['partner_data']['p_id'];
		$obj->addPartnerApiLog($p_id);
		$result['data'] = $obj->getData();
		
		$result['status'] ='success';
		$result['msg'] ='Valid Token';
	}else{
		$result['data'] = '';
		$result['status'] ='failure';
		$result['msg'] ='Invalid Token';
	}
}else{
	$result['data'] = '';
	$result['status'] ='failure';
	$result['msg'] ='Invalid Token';

}

echo json_encode($result); 
exit;