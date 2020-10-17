<?php 
include('includes/config.php');

if(isset($_POST['fetch_data']) && $_POST['fetch_data'] !=''){
  $curl_post_data = array();
   $url = SITE_URL.'getdata.php?token='.PARTNER_A_KEY;
  
    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $data = curl_exec($ch);
    curl_close($ch);
    $res = json_decode($data);
    $tbl_str ='';
    $res_data= array();
    if($res){
      if($res->status = "success"){
        foreach ($res->data as $row) {
          $tbl_str .= '<tr><td>'.$row->u_name.'</td><td>'.$row->u_email.'</td><td>'.$row->u_phone.'</td></tr>';
        }
        $res_data['data']= $tbl_str;
        $res_data['status'] =$res->status;
        $res_data['msg'] =$res->msg;
      }else{
        $res_data['data'] = '';  
        $res_data['status'] =$res->status;
        $res_data['msg'] =$res->msg;
      }  
    }else{
      $res_data['data'] = '';  
      $res_data['status'] ='error';
      $res_data['msg'] ='No data found';
    }
    echo json_encode($res_data);
  exit; 
}?>

<?php include('includes/header.php');?>

<div class="d-flex" id="wrapper"><?php 
  include('includes/sidebar.php');?>
  <!-- Page Content -->
  <div id="page-content-wrapper">

    
    <div class="container-fluid">
        <h1 class="mt-4">Partner A</h1>
        <button class="btn btn-primary mt-2 mb-2" onclick="fetchData()">Fetch Data</button>
       <div class="col-md-8">
      <table id="table" class="table table-bordered">
        <thead>
          <tr>
            <th>User</th>
            <th>Email</th>
            <th>Phone</th>
          </tr>
        </thead> 
        <tbody id="outputrec">
        <tr>
          <td colspan="4">No data found</td>
        </tr>
        </tbody>
       </table>    
     </div>
    </div>
  </div>
  <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->
<script type="text/javascript">
  function fetchData(){
      $.post("partnera.php", {fetch_data: 'yes'},function(response){
        var result = JSON.parse(response);
        if(result.status == 'success'){
          $("#outputrec").html(result.data);
          $('#table').DataTable();
        }else{
          alert(result.status);
        }
        
      
      });
      
    } 
</script>

<?php include('includes/footer.php');?>