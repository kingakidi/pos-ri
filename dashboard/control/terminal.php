<div class="container">
	<form class="terminal-form" id="terminal-form">
		<div class="error text-danger mt-2 mb-2" id="terminal-form-error"></div>
		<div class="form-group">
			<select class="form-control" id="platform-name">
			<option value="">SELECT PLATFORM</option>
			<?php
					
					$query = mysqli_query($conn, "SELECT * FROM PLATFORM");
					if (mysqli_num_rows($query) > 0) {
						while ($row = mysqli_fetch_assoc($query)) {
							$pn = ucwords($row['pn']);
							$id = $row["id"];
							echo "<option value='$id'> $pn  </option>";
						}
					}else{
						echo "NO DATA";
					}
			
			?>
				
				
			</select>
			<div class="error terminal-error" id="platform-name-error"></div>
		</div>
		<div class="form-group">
			<input type="text" name="" id="terminal-id" class="form-control" placeholder="TERMINAL ID">
			<div class="error terminal-id-error" id="terminal-id-error"></div>
		</div>
		<div class="form-group">
			<input type="text" name="" id="terminal-sn" placeholder="TERMINAL SERIAL NUMBER" class="form-control">
			<div class="error terminal-sn-error" id="terminal-sn-error"></div>
		</div>
		<div class="form-group">
			<input type="submit" name="" id="submit-terminal" class="btn btn-color text-white" value="Add Terminal">
		</div>
	</form>
</div>

<div class="container mt-5">
<?php 
            $id = $_SESSION['id'];
			$tQuery = mysqli_query($conn, "SELECT * FROM `terminal` WHERE user_id=$id");
			$rowNum = mysqli_num_rows($tQuery);
            if ($rowNum > 0) {
				echo "<p class='text-info'>No(s): $rowNum </p>";
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
</div>