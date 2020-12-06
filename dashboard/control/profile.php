<?php
  $e = $_SESSION['email'];
  $u = $_SESSION['username'];
  $userid = $_SESSION['id'];

?>

<div class="container mt-5">
  <?php 
  $query = mysqli_query($conn, "SELECT * FROM profile WHERE profile.userid =$userid");
  if (!$query) {
    echo "UNABLE TO FETCH ".mysqli_error($conn);
  }else if(mysqli_num_rows($query) > 0 ){
    $pQ = mysqli_query($conn, "SELECT * FROM profile WHERE profile.userid =$userid LIMIT 1");
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
			</tr>";

    }

    ?>
	
		</tbody>
			</table>
<?php
  }else{
    include "./control/profile-form.php";
  }
  
   ?>
    </div>