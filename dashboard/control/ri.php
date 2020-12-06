<?php

$id = $_SESSION['id'];

$pQuery = mysqli_query($conn, "SELECT * FROM profile WHERE profile.userid = $id"); 
if (!$pQuery) {
  echo "UNABLE TO EXECUTE PROFILE QUERY ".mysqli_error($conn);
}else if (mysqli_num_rows($pQuery) < 1){
  echo "Kindly Complete your profile to procceed";
}else if (mysqli_num_rows($pQuery) > 0){
      // CHECK FOR PLATFORM AVAILABILITY 
      $tQuery = mysqli_query($conn, "SELECT * FROM `terminal` WHERE user_id=$id");
      if (mysqli_num_rows($tQuery) > 0) { 

?>

<!-- SHOW THE RI  -->
<div class="container p-5">
      <div class="income">
        <p class="text-success income-header">
          DATE: <?php echo "<strong>". date("d-m-Y") ."</strong>"; ?><br />

          <!-- SELECT TERMINALS FROM TERMINAL  -->
          <?php 
            $id = $_SESSION['id'];
            $tQuery = mysqli_query($conn, "SELECT * FROM `terminal` WHERE user_id=$id");
            if (mysqli_num_rows($tQuery) > 0) {
              while($row = mysqli_fetch_assoc($tQuery)){                 
                  $ti = strtoupper($row['terminal_id']); 
                  $ts = strtoupper($row['terminal_sn']); 
                  $pi = $row['platform_id']; 

                  $pQuery = mysqli_query($conn, "SELECT pn FROM `platform` WHERE id =$pi ");
                  $pn = strtoupper(mysqli_fetch_assoc($pQuery)['pn']);
                  
                  echo "<br> TERMINAL ID: <strong> $ti </strong>, <br> TERMINAL SN: <strong>$ts</strong>, <br> PLATFORM: <strong>$pn</strong> <br>";
              }
            }else{
              echo "NO TERMINAL";
            }
          
          ?>
          <br>BRANCH NAME<br />
          
          PM
        </p>    
              <?php 
                include './control/ci.php';
                include './control/co.php';
              ?>
      
        
    <form class="income-form" id="rif">
       <div class="form-group">
          <input
            type="text"
            class="form-control"
            value="0"
            id="roi"
            placeholder="RI"
            disabled
          />
        </div>
      </form>
      <div class="form-group">
          <input type="submit" class="btn btn-color text-white"  value="UPLOAD RI"/>
        </div>
      <div class="alert alert-info " id="show-ri-info">
    </div>
      </div>
    </div>

<?php
}else{ 
echo "<p class='text-info'> KINDLY REGISTER YOUR TERMINAL</p>"; 
}}

?>
