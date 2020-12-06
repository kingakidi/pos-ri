<?php
include "../../control/conn.php";
include "../../control/functions.php";

    // ADD TERMINAL
    if (isset($_POST['addPlatform'])) {
      $pn = check(strtolower(trim($_POST['pn'])));
      
    

      $query =mysqli_query($conn, "SELECT * FROM platform WHERE pn ='$pn'");
      if (!$query) {
          die("Connection Error: ".mysqli_error($conn));
      }else if(mysqli_num_rows($query) > 0){
        echo "Platform already exist";
      }else{
        
        $query = mysqli_query($conn,  "INSERT INTO `platform`( `pn`, `date`) VALUES ('$pn', now())");
        if (!$query) {
            die('Unable to add platform '.mysqli_error($conn));
        }else{
            echo "platform added successfully";
        }
      }

      
    }

      // TERMINAL ID 
    if (isset($_POST['terminal-id'])) {
      $ti = check(strtolower(trim($_POST['el'])));
      $query = mysqli_query($conn, "SELECT * FROM `terminal` WHERE terminal_id='$ti'");
      if (mysqli_num_rows($query) > 0) {
        echo "<span class='text-danger'>TERMINAL ID IS TAKEN</span>";
      }else{
        echo "<span class='text-info'>OK</span>";
      }


    }
      // TERMINAL SN 
    if (isset($_POST['terminal-sn'])) {
      $ts = check(strtolower(trim($_POST['el'])));
      $query = mysqli_query($conn, "SELECT * FROM `terminal` WHERE terminal_sn='$ts'");
      if (mysqli_num_rows($query) > 0) {
        echo "<span class='text-danger'>TERMINAL SN IS TAKEN</span>";
      }else{
        echo "<span class='text-success'>OK</span>";
      }
    }
      // ADDING TERMINAL 
    if (isset($_POST['addTerminal'])) {
      $userid = $_SESSION['id'];
      $pi = $_POST['pn'];
      $ts = $_POST['ts'];
      $ti = $_POST['ti'];
      // CHECK TERMINAL AVAILABILITY QUERY 
      $tQuery = mysqli_query($conn, "SELECT * FROM `terminal` WHERE terminal_id ='$ti' OR terminal_sn ='$ts'");
      if (mysqli_num_rows($tQuery) < 1) {
        $itQuery = mysqli_query($conn, "INSERT INTO `terminal`(`terminal_id`, `terminal_sn`, `platform_id`, `user_id`) VALUES ('$ti','$ts','$pi','$userid')");

        if (!$itQuery) {
          die('UNABLE TO UPLOAD TERMINAL '.mysqli_error($conn));
        }else{
          echo "<span class='text-info'> TERMINAL UPLOADED SUCCESSFULLY </span>";
        }
      }else{
        echo "<span class='text-danger'> ERROR: Terminal ID or SN </span>";
      }
     
      
    }
    // PROFILE UPDATE 
    if (isset($_POST['profileUpdate'])) {

      $s =  check(strtolower(trim($_POST["surname"]))); 
      $o =  check(strtolower(trim($_POST['othername']))); 
      $d =  check(strtolower(trim($_POST['dob']))); 
      $g =  check(strtolower(trim($_POST['gender'])));
      $a =  check(strtolower(trim($_POST['address'])));
      $c =  check(strtolower(trim($_POST['country']))); 
      $st =  check(strtolower(trim($_POST['state'])));
      $l =  check(strtolower(trim($_POST['lga'])));
      $b =  check(strtolower(trim($_POST['branch'])));
      $userid = $_SESSION['id'];
      $checkProfileQuery = mysqli_query($conn, "SELECT * FROM profile WHERE profile.userid =$userid");
      if (!$checkProfileQuery) {
        echo "UNABLE TO FETCH ".mysqli_error($conn);
      }else if(mysqli_num_rows($checkProfileQuery) > 0 ){
        echo "<span class='text-info color'> <a href='index.php?page=profile'> Kindly Refresh <a> </span>";
      }else{
        if (!empty($s) && !empty($o) && !empty($d) && !empty($g) && !empty($a) && !empty($c) && !empty($st) && !empty($l) && !empty($b)) {
          $sql = "INSERT INTO `profile`(`userid`, `surname`, `othername`, `dob`, `gender`, `address`, `country`, `state`, `lga`, `branch`, `date`) VALUES ($userid, '$s', '$o', '$d', '$g', '$a', '$c', '$st', '$l', '$b', now())";
          $query = mysqli_query($conn, $sql);
          if (!$query) {
            die('UNABLE TO UPDATE PROFILE '.mysqli_error($conn));
          }else{
            echo "<span class='text-info'>Updated Successfully</span>";
          }
        }else{
          echo "<span class='text-warning'> Invalid Details: Check fields </span>";
        }
      }
     

    }
   
    // CHECK SINGLE USER 
    if (isset($_POST['fetchSingleUser'])) {
      $sId = $_POST['userid'];
    
        $pQ = mysqli_query($conn, "SELECT * FROM profile WHERE profile.userid =$sId LIMIT 1");
        if (!$pQ) {
          die(" UNABLE TO FETCH DATA ".mysqli_error($conn));
        }else{
            ?>

<table class='table table-bordered'>
          <thead>
            <tr class='text-info text-center'>
              <th colspan="2"><?php echo ucwords($_SESSION['username'])."'s Profile" ?></th>
              
            </th>
          </thead>
          <tbody>
            <?php 
            $row = mysqli_fetch_assoc($pQ);
            $id = ucwords($row['id']); 
            $email = $_SESSION['email'];
            $phone = $_SESSION['phone'];
            $surname = ucwords($row['surname']); 
            $othername = ucwords($row['othername']); 
            $dob = ucwords($row['dob']);
            $gender = ucwords($row['gender']); 
            $address = ucwords($row['address']);
            $country = ucwords($row['country']);
            $state = ucwords($row['state']);
            $lga = ucwords($row['lga']);
            $branch = ucwords($row['branch']);
            $date = $row['date'];
            echo "			<tr>
            <td>Full Name</td>
            <td>$surname $othername</td>
          </tr>
          <tr>
            <td>Email Address</td>
            <td>$email</td>
          </tr>
          <tr>
            <td>Phone Number</td>
            <td>$phone</td>
          </tr>
    
          <tr>
            <td>Date of Birth</td>
            <td>$dob</td>
          </tr>
          <tr>
            <td>Gender</td>
            <td>$gender</td>
          </tr>
          <tr>
            <td>Address</td>
            <td>$address</td>
          </tr>
          <tr>
            <td>LGA, State, Country</td>
            <td>$lga, $state, $country</td>
          </tr>
          <tr>
            <td>Branch</td>
            <td>$branch</td>
          </tr> 
          <tr>
          <td colspan='2'> <button class='btn btn-info' id='popup-close'>Close</button></td>
          </tr>
          ";
          
    
        }
    
        ?>
        
        </tbody>
          </table>
       
   
    <?php } 
?>
<?php 
		// LOGIN PASSWORD RESET 
if (isset($_POST['resetPassword'])) {
  $u = check($_POST['u']);
  $cp = check($_POST['cp']);
  $p = check($_POST['p']);
  $confirmPassword = check($_POST['confirmPassword']);
  $query = mysqli_query($conn, "SELECT password FROM signup WHERE username='$u' LIMIT 1");
  $dbPassword = mysqli_fetch_assoc($query)['password'];
 

    if (password_verify($cp, $dbPassword)) {      
        // CHECK PASSWORD VALIDITY 

        if(strlen($p) < 8){
          echo '<span class="text-info"> PASSWORD: MINIMUM OF 8 CHARACTERS </span>';
          
          exit();
        }else if(!preg_match("#[0-9]+#", $p)){
          echo '<span class="text-danger"> PASSWORD: MUST CONTAIN AT LEAST 1 NUMBER </span>';
       
            exit();
        }else if(!preg_match("/[a-z]/i", $p)){
            echo '<span class="text-danger"> PASSWORD MUST CONTAIN AT LEAST 1 LETTER </span>';
            exit();
        }else if($p !== $confirmPassword){
            echo '<span class="text-danger"> PASSWORD MISMATCH </span>';
            exit();
        }else{
          $pHash = password_hash($p, PASSWORD_DEFAULT);
          $pQuery = mysqli_query($conn, "UPDATE `signup` SET `password`='$pHash' WHERE 1");
          if (!$pQuery) {
            echo "<span class='text-danger'> Error Updating Password </span>";
          }else{
            echo "<span class='text-info'>PASSWORD CHANGED SUCCESSFULLY</span>";
          }
        }
    } else {
        echo 'Invalid Current Password.';
    }
  
}

    // END PASSWORD RESET 
    
 	  // BIGINNING OF CI 
if (isset($_POST['ci'])) {
  	$ci11=htmlspecialchars(check($_POST['ci11']));
    $ci12=htmlspecialchars(check($_POST['ci12']));
    $ci21=htmlspecialchars(check($_POST['ci21']));
    $ci22=htmlspecialchars(check($_POST['ci22']));
    $ci31=htmlspecialchars(check($_POST['ci31']));
    $ci32=htmlspecialchars(check($_POST['ci32']));
    $ci33=htmlspecialchars(check($_POST['ci33']));
    $ciTotal =str_replace(',', '',  htmlspecialchars(check($_POST['totalCi'])));
    $ciTotal = (double)($ciTotal);
    $ciArray = [$ci11, $ci12, $ci21, $ci22, $ci31, $ci32, $ci33];
    $sumCi = array_sum($ciArray);
    $sumCi = (double)($sumCi);
  
    

	    if (!is_numeric($ci11) || !is_numeric($ci12) || !is_numeric($ci22) || !is_numeric($ci31) || !is_numeric($ci32) || !is_numeric($ci33)) {
	    	echo "<span class='text-danger'> INVALID DATA</span>";
	    }else if(empty($ci11) || empty($ci12) || empty($ci22) || empty($ci31) || empty($ci32) || empty($ci33)) {
	    	echo "<span class='text-danger'> ALL FIELD IS REQUIRED </span>";
	    }else if($ciTotal !== $sumCi){
	    		echo "<span class='text-danger'> TOTAL NOT MATCH </span>";
	    		echo "ciTotal: $ciTotal <br> SUMCI: $sumCi";
	    }else{

        // INSERT CI INTO THE DATABASE
       $userid = $_SESSION['id'];
       // CHECK IF CI EXIST FOR CURRENT DATE 
       	$todayDate =  date("Y-m-d");
    	$dateQuery =mysqli_query($conn, "SELECT * FROM ci WHERE ci.date = CURRENT_DATE() AND ci.userid = $userid");
    	if (!$dateQuery) {
    		echo "<span class='text-danger'>UNABLE TO FETCH</span>";
    	}else if(mysqli_num_rows($dateQuery) > 0){
    		echo "<span>CI ALREADY UPLOADED FOR THE DAY</span>";
    	}else{


  			// INSERT INTO THE CI OF THE DAY 
		        $sql = "INSERT INTO `ci`(`userid`, `date`, `time`, `branch`, `PM`, `terminals`, `ci11`, `ci12`, `ci21`, `ci22`, `ci31`, `ci32`, `ci33`) VALUES ($userid, now(), TIME_FORMAT(now(), '%T'),  'kabala', 'pm123', 'terminalid34', '$ci11', '$ci12', '$ci21', '$ci22', '$ci31', '$ci32', '$ci33')";

		        $query = mysqli_query($conn, $sql);

		        if (!$query) {
		          echo '<span class="text-danger">UNABLE TO INSERT</span>';
		        }else{
		        	echo "<span class='text-info'>CI UPDATED SUCCESSFULLY</span>";
			    	
			    }
    	}
     }
    }

?>

	<!-- END OF CI -->

<?php 

	// BEGINING OF CASH OUT
  
    if (isset($_POST['sendCo'])) {
    	$co11 = check($_POST['co11']);
    	$co12 = check($_POST['co12']);
    	$co21 = check($_POST['co21']);
    	$co22 = check($_POST['co22']);
    	$co31 = check($_POST['co31']);
    	$co32 = check($_POST['co32']);
    	$tc01 = check($_POST['tc01']);
    	$tc02 = check($_POST['tc02']);
    	$cx = check($_POST['cx']);
    	$totalCo = check($_POST['totalCo']);

    	if (!empty($co11) && !empty($co12) && !empty($co21) && !empty($co22) && !empty($co31) && !empty($co32) && !empty($tc01) && !empty($tc02) && !empty($cx) && !empty($totalCo)) {
    		$userid = $_SESSION['id'];
        $ciQuery = mysqli_query($conn, "SELECT ci.id FROM ci WHERE ci.date = DATE_FORMAT(NOW(), '%Y-%m-%d') AND ci.userid =$userid");
        
        $ciId = mysqli_fetch_assoc($ciQuery)['id'];
        if (!$ciQuery) {
            echo "<span class='text-danger'>UNABLE TO FETCH CASH IN (CI) ID</span>";
        }else if(mysqli_num_rows($ciQuery) > 1){
            echo "<span class='text-danger'>CASH IN ID ERROR: CONTACT ADMIN</span>";
        }else if (mysqli_num_rows($ciQuery) === 1) {          
          // INSERT INTO CAS OUT CO 
         
           // CHECK IF CASHOUT ALREADY EXIST 
          $checkCoQuery = mysqli_query($conn, "SELECT * FROM co WHERE ciid = $ciId AND  userid=$userid");
          if (!$checkCoQuery) {
            echo "<span>UNABLE TO CHECK CO STATUS KINDLY RETRY LATER</span>";
          }else if (mysqli_num_rows($checkCoQuery) > 0){
            echo "<span class='text-danger'>CASH OUT FOR TODAY ALREADY EXIST! KINDLY REFRESH</span>";
          }else{
                // SEND CASH OUT IF DOES NOT EXIST 

              $coQuery = mysqli_query($conn, "INSERT INTO `co`(`ciid`, `userid`, `co11`, `co12`, `co21`, `co22`, `co31`, `co32`, `tc01`, `tc02`, `cx`) VALUES ($ciId, $userid, '$co11', '$co12', '$co21', '$co22', '$co31', '$co32', $tc01, $tc02, $cx)");

              if (!$coQuery) {
                echo "<span  class='text-danger'>UNABLE TO INSERT (CO) CASH OUT</span>";
              }else{
                echo "<span class='text-info'>CO UPLOADED SUCCESSFULLY</span>";
              }
        }
        }

    	}else{
    		echo "<span class='text-danger'> ALL FIELD REQIRED </span>";
    	}

	    
    }
    

?>