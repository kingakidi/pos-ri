<div class="form-group">
    <input type="text" placeholder="SEARCH" class="form-control"/>
</div>
<div class="show-userData" id="show-userData"></div>
<?php
    $sql = "SELECT * FROM `signup`";
    $query = mysqli_query($conn, $sql);
    if (!$query) {
        
        die('UNABLE'.mysqli_error($conn));
    }
    if (mysqli_num_rows($query) > 0) {
        echo "<table class='table table-bordered table-responsive'>
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>USERNAME</th>
                    <th>EMAIL</th>
                    <th>PHONE NUMBER</th>
                   
                </tr>
            </thead>
            <tbody>";
            $sn = 1;
        while ($row = mysqli_fetch_assoc($query)) {
          
            $id = $row['userid'];
            $u = $row['username'];
            $e = $row['email'];
            $p = $row['phone'];
            echo "<tr>
                    <td>$sn</td>
                    <td><a href='?view=$u&userid=$id' class='users-link' id='$id'> $u </a></td>
                    <td>$e</td>
                    <td>$p</td>                
                </tr>";
                $sn++;
        }
        echo "   </tbody>
</table>";
    }else{
        echo "NO USER";
    }

?>

        <tr>
            
        </tr>
 