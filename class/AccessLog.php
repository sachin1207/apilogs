<?php
class AccessLog{
	
	function checkToken($token){
		global $conn;
		$sql = "SELECT * FROM tbl_partner_details WHERE p_key='".$token."'";
		$result = $conn->query($sql);
		$result_data=array();
		if($result){
			$row = $result->fetch_assoc(); 
			$result_data['partner_data'] = $row;
			$result_data['check'] = 'success';
		}else{
			$result_data['partner_data'] = '';
			$result_data['check'] = 'failure';
		}
		return $result_data;
	}

	function addPartnerApiLog($p_id){
		global $conn;
	  $sql = "INSERT INTO tbl_partner_api_logs( p_id, request_date) VALUES ($p_id,CURRENT_TIMESTAMP)";
		$conn->query($sql);
	}
	
	function getData(){
		global $conn;
		$sql = "SELECT * FROM tbl_users_data WHERE u_status=1 ORDER BY RAND ()";
		$result = $conn->query($sql);
		$result_data = array();
		while($row = $result->fetch_assoc()) {
 		 	$result_data[] = $row;
   }
		return $result_data;
	}

	function getPartnerLogs($from_date, $to_date){
		global $conn;
		if($from_date !='' && $to_date!=''){
			$from = date('Y-m-d H:i:s', strtotime($from_date));
			$to = date('Y-m-d H:i:s', strtotime($to_date));

			$search_query = "WHERE (b.request_date >= '$from' AND b.request_date <= '$to') "; 	
		}else{
			$search_query = "";
		}

		$sql = "SELECT a.*, COUNT(b.p_id) as hit_count FROM tbl_partner_details a LEFT JOIN tbl_partner_api_logs b ON a.p_id = b.p_id ".$search_query." GROUP BY a.p_id ORDER BY a.p_name";
		$result = $conn->query($sql);
		$result_data = array();
		if($result){
			while($row = $result->fetch_assoc()) {
	 		 	$result_data['data'][] = $row;
	    }
	    $result_data['status'] = 'success';
		}else{
			$result_data['data']= array();
			$result_data['status'] = 'error';
		}
		return $result_data;
	}
}
