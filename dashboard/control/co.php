<?php
    // INSERT CI INTO THE DATABASE
    $userid = $_SESSION['id'];
    // CHECK IF CI EXIST FOR CURRENT DATE 
      $todayDate =  date("Y-m-d");
   $dateQuery =mysqli_query($conn, "SELECT * FROM ci WHERE ci.date = CURRENT_DATE() AND ci.userid = $userid");
   if (!$dateQuery) {
     echo "UNABLE TO FETCH";
   }else if(mysqli_num_rows($dateQuery) > 0){

    // CHECK FOR CO EXISTING
    // SELECT CI ID FROM CI TABLE 
        $userid = $_SESSION['id'];
        $ciQuery = mysqli_query($conn, "SELECT ci.id FROM ci WHERE ci.date = DATE_FORMAT(NOW(), '%Y-%m-%d') AND ci.userid =$userid");
        
        $ciId = mysqli_fetch_assoc($ciQuery)['id'];
    // CHECK CASHOUT 
    $checkCoQuery = mysqli_query($conn, "SELECT * FROM co WHERE ciid = $ciId AND  userid=$userid");
    if (!$checkCoQuery) {
      echo "<span>UNABLE TO CHECK CO STATUS KINDLY RETRY LATER</span>";
    }else if (mysqli_num_rows($checkCoQuery) > 0){
      // echo "<div class='text-info'>TABLE FOR CO</div>";
      include './control/co-table.php';
    }else{

    // IF CI EXIST FOR THE DAY, SHOW IN CO 
?>
    <!-- CO FORM  -->
    <h5 class='text-info text-center'>CASH OUT (CO) FORM</h5>

    <div class="text-success form-group">
      <input
        type="button"
        class="btn btn-color text-white"
        value="SHOW CO"
        id="text-out"
      />
    </div>
    <hr />
    <form class="out" id="out">
    <div class="error" id="error-out"> ERROR </div>
      <?php 
        $id = $_SESSION['id'];
        $tQuery = mysqli_query($conn, "SELECT * FROM `terminal` WHERE user_id=$id");
        if (mysqli_num_rows($tQuery) > 0) { 
          while($row = mysqli_fetch_assoc($tQuery)){ 
            $ti = strtoupper($row['terminal_id']);
            $ts = strtoupper($row['terminal_sn']); 
            $pi =  $row['platform_id']; $pQuery = mysqli_query($conn, "SELECT pn FROM `platform` WHERE id =$pi "); 
            $pn = ucwords(mysqli_fetch_assoc($pQuery)['pn']); 
            $fullpn = "$pn, $ti, $ts"; 
            $placeholder = "CO11 - Money Payout through $fullpn"; 

    ?>  
      <div class="form-group">
        <label for="<?php echo $ts; ?>"><?php echo $placeholder; ?></label>
        <input
          type="number"
          class="form-control co11"
          placeholder='<?php echo $placeholder; ?>' id="<?php echo $ts ?>"/>
      </div>
      <?php
      
      } }else{ echo "NO TERMINAL"; } ?>

      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label for="co12">CO12 - PM GIVING TO PLS</label>
            <input
              type="number"
              class="form-control"
              placeholder="CO12 - PM GIVING TO PLS"
              id="co12"
            />
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            <label for="co21">CO21 - CASH GIVING TO SYSTEM</label>
            <input
              type="numbers"
              placeholder="CO21 - CASH GIVING TO SYSTEM"
              class="form-control"
              id="co21"
            />
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label for="co22">CO22 - CHARGES</label>
            <input
              type="number"
              class="form-control"
              placeholder="CO22 - CHARGES"
              id="co22"
            />
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            <label for="co31">CO31 - CLOSING PM BALANCE</label>
            <input
              type="number"
              class="form-control"
              placeholder="CO31 - CLOSING PM BALANCE"
              id="co31"
            />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label for="co32">CO32 - CLOSING CASH BALANCE</label>
            <input
              type="number"
              class="form-control"
              placeholder="CO32 - CLOSING CASH BALANCE"
              id="co32"
            />
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            <label for="tc01">TC01 - BANK TRANSFER COUNTER</label>
            <input
              type="number"
              class="form-control"
              placeholder="TC01 - BANK TRANSFER COUNTER"
              id="tc01"
            />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label for="tc02">TC02 - WITHDRAWAL COUNT</label>
            <input
              type="number"
              class="form-control"
              placeholder="TC02 - WITHDRAWAL COUNT"
              id="tc02"
            />
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            <label for="cx">CX - BANK TRANSFER VOLUME</label>
            <input
              type="number"
              class="form-control"
              placeholder="CX - BANK TRANSFER VOLUME"
              id="cx"
            />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label for="total-co" > TOTAL CO</label>
            <input type="text" class="form-control" placeholder="TOTAL CO" id="total-co" disabled>
          </div>
        </div>
        <div class="col-sm">
          <label for=""></label>
          <div class="form-group">
            <input type="submit" class="btn btn-info" id='btn-form-co' value="Send CO">
          </div>
        </div>
      </div>
    </form>


<?php


      // SHOW ERROR IF NOT EXIST
   }}else{
     echo "<span  class='text-info'>KINDLY UPLOAD CASH IN (CI) TO VIEW CASH OUT (CO) FORM</span>";
   }

?>
