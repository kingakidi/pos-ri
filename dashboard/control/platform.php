<div class="container">
	<form class="platform-form" id="platform-form">
		<div class="form-group">
			<input type="text" placeholder="PLATFORM NAME" class="form-control" id="platform-name"/>
			<div class="error platform-error" id="platform-error"></div>
		</div>
		<div class="form-group">
			<input type="submit" name="" id="platform-submit" class="btn btn-color text-white" value="Add Platform">
		</div>
	</form>
	
</div>
<div class="container mt-5">
<button id="pn-refresh" class="btn btn-color  text-white">Refresh</button>
<?php
	$query = mysqli_query($conn, "SELECT * FROM platform");
	if (!$query) {
		die('UNABLE TO FETCH DATA '.mysqli_error($conn));
	}else if(mysqli_num_rows($query) < 1){
		echo "NO DATA";
	}else{

		echo "<table class='table table-bordered table-responsive mt-3'>
		<thead>
			<tr>
				<th>S/N</th>
				<th>PLATFORM NAME</th>
			   
			</tr>
		</thead>
		<tbody>";
		$sn = 1;
	while ($row = mysqli_fetch_assoc($query)) {
		$id = $row['id'];
		$pn =ucwords($row['pn']);
		$date = $row['date'];
		echo "<tr>
				<td>$sn</td>
				<td><a href='?view=$pn'> $pn</a></td>
			</tr>";
			$sn++;
	}
	echo "   </tbody>
</table>";
		
	}

?>

</div>