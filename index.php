<?php 
include('includes/config.php');
include('class/AccessLog.php');

$obj = new AccessLog();

if(isset($_POST['fetch_data']) && $_POST['fetch_data'] !=''){
  $curl_post_data = array();
  $url = SITE_URL.'getdata/?token='.PARTNER_A_KEY;
  $date_range = $_POST['date_range'];
  if(trim($date_range) != ''){
    $data_arr = explode("-",$date_range);
    $from_date = $data_arr[0];
    $to_date = $data_arr[1];
  }else{
    $from_date = '';
    $to_date = '';
  }
  $res = $obj->getPartnerLogs($from_date,$to_date);
  $res_data= array();
  $tbl_str = '';
  $total_req_served = 0;
  if($res){
    if($res['status'] == "success"){
      if(isset($res['data'])){
        foreach ($res['data'] as $row) {
          $tbl_str.='<tr><td>'.$row["p_name"].'</td><td>'.$row["p_email"].'</td><td>'.$row["p_key"].'</td><td>'.$row["hit_count"].'</td></tr>';
            $total_req_served = $total_req_served + $row["hit_count"];
          }
          $tbl_str.='<tr><td colspan="3" class="text-right"><b>Total Request Served</b></td><td><b>'.$total_req_served.'</b></td></tr>';

          $res_data['data']= $tbl_str;
          $res_data['status'] =$res['status'];
         
      }else{
        $tbl_str.='<tr><td colspan="6">No record found</td></tr>';
        $res_data['data'] = $tbl_str;  
      $res_data['status'] =$res['status'];
      }
      
      
    }else{
      $res_data['data'] = '';  
      $res_data['status'] =$res['status'];
    }  
  }else{
    $res_data['data'] = '';  
    $res_data['status'] ='error';
    $res_data['msg'] ='No data found';
  }
  echo json_encode($res_data);
  exit; 
}

include('includes/header.php');
?>
<div class="d-flex" id="wrapper"><?php 
  include('includes/sidebar.php');?>
  <!-- Page Content -->
  <div id="page-content-wrapper">

    
    <div class="container-fluid">
      <h1 class="mt-4">Dashboard</h1>
      
      <div class="col-md-4">
        <div class="form-group">
          <label for="date_range">Filter by Date Range</label>
          <input type="text" autocomplete="off" name="date_range" onchange="fetchData()" id="date_range" class="form-control">
        </div>
      </div>
      <table class="table table-bordered col-md-8">
        <thead>
          <tr>
            <th>Partner Name</th>
            <th>Partner Email</th>
            <th>Token</th>
            <th>Requests Served</th>
           </tr>
        </thead>
        <tbody id="outputrec">
        </tbody>
      </table>
    </div>
  </div>
  <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<script type="text/javascript">
function fetchData(){
  var date_range = $("#date_range").val();
  $.post("index.php", {fetch_data: 'yes','date_range': date_range },function(response){
    var result = JSON.parse(response);
    if(result.status == 'success'){
      $("#outputrec").html(result.data);
      $('#table').DataTable();
    }else{
      alert(result.status);
    }
    
  
  });
  
}
$(function() {
  $('input[name="date_range"]').daterangepicker({
    timePicker: true,
    startDate: moment().startOf('hour'),
    endDate: moment().startOf('hour').add(48, 'hour'),
    locale: {
      format: 'Y/M/DD hh:mm A'
    }
  });
  $('input[name="date_range"]').val('');
  fetchData();
}); 
</script>
<?php include('includes/footer.php');?>