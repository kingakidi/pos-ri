<hr>
<h6 class='text-info'>CASH OUT TABLE</h6>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>CI ID</th>
            <th>USERID</th>
            <th>CO11</th>
            <th>CO12</th>
            <th>CO21</th>
            <th>CO22</th>
            <th>CO31</th>
            <th>CO32</th>
            <th>TC01</th>
            <th>TC02</th>
            <th>CX</th>
        </tr>
    </thead>
    <tbody>
<?php
$ciQuery = mysqli_query($conn, "SELECT ci.id FROM ci WHERE ci.date = DATE_FORMAT(NOW(), '%Y-%m-%d') AND ci.userid =$userid");
        
$ciId = mysqli_fetch_assoc($ciQuery)['id'];
//  END OF CI QUERY 

    $coTableQuery = mysqli_query($conn, "SELECT * FROM `co` WHERE userid =$userid AND ciid =$ciId ");
    if (!$coTableQuery) {
        echo "UNABLE TO FETCH CO DATA ";
    }else{
       	$row = mysqli_fetch_assoc($coTableQuery);
       	$coId = $row['id'];
		$ciid = $row['ciid'];
		$userid = $row['userid'];
		$co11 = $row['co11'];
		$co12 = $row['co12'];
		$co21 = $row['co21'];
		$co22 = $row['co22'];
		$co31 = $row['co31'];
		$co32 = $row['co32'];
		$tc01 = $row['tc01']; 
		$tc02 = $row['tc02'];
		$cx = $row['cx'];

		// echo "$coId <br> $ciid <br> $userid <br> $co11 <br> $co12 <br> $co21 <br> <br> $co22 <br> $co31 <br> $co32 <br> $tc01 <br> $tc02 <br> $cx";
    }
?>
        <tr>
            <td><?php echo $coId; ?></td>
            <td><?php echo $ciid; ?></td>
            <td><?php echo $userid; ?></td>
            <td><?php echo $co11; ?></td>
            <td><?php echo $co12; ?></td>
            <td><?php echo $co21; ?></td>
            <td><?php echo $co22; ?></td>
            <td><?php echo $co31; ?></td>
            <td><?php echo $co32; ?></td>
            <td><?php echo $tc01; ?></td>
            <td><?php echo $tc02; ?></td>
            <td><?php echo $cx; ?></td>
        </tr>
    </tbody>
</table>