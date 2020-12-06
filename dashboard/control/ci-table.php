<table class='table table-bordered table-responsive'>
    <thead>
        <tr>
            <th>ID</th>
            <th>USERID</th>
            <th>DATE</th>
            <th>TIME</th>
            <th>BRANCH</th>
            <th>PM</th>
            <th>TERMINALS</th>
            <th>CI11</th>
            <th>CI12</th>
            <th>CI21</th>
            <th>CI22</th>
            <th>CI31</th>
            <th>CI32</th>
            <th>CI33</th>
        
        </tr>
    </thead>
    <tbody>
<?php 
     // INSERT CI INTO THE DATABASE
     $userid = $_SESSION['id'];
     // CHECK IF CI EXIST FOR CURRENT DATE 
      $todayDate =  date("Y-m-d");
      $dailyCi =mysqli_query($conn, "SELECT * FROM ci WHERE ci.date = CURRENT_DATE() AND ci.userid = $userid");
      if (!$dailyCi) {
          echo "<span class='text-danger'>UNABLE TO FETCH</span>";
      }else if(mysqli_num_rows($dateQuery) > 0){
          $row = mysqli_fetch_assoc($dailyCi);
        $id = $row['id'];
        $userid = $row['userid']; 
        $date = $row['date']; 
        $time = $row['time'];
        $branch = $row['branch'];
        $pm = $row['pm']; 
        $terminals = $row['terminals']; 
        $ci11 = $row['ci11'];
        $ci12 = $row['ci12'];
        $ci21 = $row['ci21']; 
        $ci22 = $row['ci22'];
        $ci31 = $row['ci31']; 
        $ci32 = $row['ci32']; 
        $ci33 = $row['ci33']; 

        // echo "$id <br> $userid <br> $date <br> $time <br> $branch <br> $pm <br> $terminals <br> $ci11 <br> $ci12 <br> $ci22 <br> $ci31 <br> $ci32 <br> $ci33";
      }
?>

    <tr>
            <td><?php echo $id ;?></td>
            <td><?php echo $userid;?></td>
            <td><?php echo $date;?></td>
            <td><?php echo $time;?></td>
            <td><?php echo $branch;?></td>
            <td><?php echo $pm;?></td>
            <td><?php echo $terminals;?></td>
            <td><?php echo $ci11;?></td>
            <td><?php echo $ci12;?></td>
            <td><?php echo $ci21;?></td>
            <td><?php echo $ci22;?></td>
            <td><?php echo $ci31;?></td>
            <td><?php echo $ci32;?></td>
            <td><?php echo $ci33;?></td>
        
        </tr>
    </tbody>
</table>