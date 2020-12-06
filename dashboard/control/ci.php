<?php
   // INSERT CI INTO THE DATABASE
   $userid = $_SESSION['id'];
   // CHECK IF CI EXIST FOR CURRENT DATE 
  $todayDate =  date("Y-m-d");
  $dateQuery =mysqli_query($conn, "SELECT * FROM ci WHERE ci.date = CURRENT_DATE() AND ci.userid = $userid");
  if (!$dateQuery) {
    echo "UNABLE TO FETCH";
  }else if(mysqli_num_rows($dateQuery) > 0){
    include './control/ci-table.php';
  }else{
    // SHOW FORM IF NOT FILLED
?>
    <!-- CI FORM  -->
    <hr>
    <h5 class='text-info text-center'>CASH IN (CI) FORM</h5>
    <div class="text-success form-group">
      <input
        type="button"
        class="btn btn-color text-white"
        value="SHOW CI"
        id="text-in"
      />
    </div>
    <form class="in" id="in">
      <div class="error" id="error-in"></div>
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label for="ci11" class='placeholder'>CI11 - Opening PM Balance</label>
            <input
              type="number"
              class="form-control"
              placeholder="CI11 - Opening PM Balance"
              id="ci11"
              step='0.01'
            />
            <span class="text-info info"></span>
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            <label for="ci12">CI12 - Opening Cash Balance</label>
            <input
              type="number"
              class="form-control"
              placeholder="CI12 - Opening Cash Balance"
              id="ci12"
              step='0.01'
            />
            <span class="text-info info"> </span>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label for="ci21">CI21 - Pocket Monie Giving</label>
            <input
              type="number"
              class="form-control"
              placeholder="CI21 - Pocket Monie Giving"
              id="ci21"
              step='0.01'
            />
            <span class="text-info info"></span>
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            <label for="ci22">CI22 - Cash Giving</label>
            <input
              type="number"
              class="form-control"
              placeholder="CI22 - Cash Giving"
              id="ci22"
              step='0.01'
            />
            <span class="text-info info"></span>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label for="ci31">CI31 - Customer Transfer Charges</label>
            <input
              type="number"
              class="form-control"
              placeholder="CI31 - Transfer Charges from Customers"
              id="ci31"
              step='0.01'
            />
            <span class="text-info info"></span>
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            <label for='ci32'>CI32 - POS CHARGES CUSTOMER</label>
            <input
              type="number"
              class="form-control"
              placeholder="CI32 - POS CHARGES CUSTOMER"
              id="ci32"
              step='0.01'
            />
            <span class="text-info info"> </span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label for='ci33'>CI33 - OTHER INCOME</label>
            <input
              type="number"
              class="form-control"
              placeholder="CI33 - OTHER INCOME"
              id="ci33"
              step=0.01
            />
            <span class="text-info info"></span>
          </div>
        </div>
      
        <div class="col-sm">
          <div class="form-group">
            <label for="total-ci"> TOTAL CI</label>
            <input type="text" class="form-control" id="total-ci" placeholder="TOTAL CI"  step="0.01"  disabled>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <input type="submit" class="btn btn-info" value="Send CI">
          </div>
        </div>
        <div class="col-sm"></div>
      </div>

      <hr />
    </form>




  <?php }?>
