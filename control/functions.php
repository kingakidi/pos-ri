<?php 
        function uCheck($data){
            global $conn;
            $newData = mysqli_escape_string($conn, strip_tags(stripcslashes(htmlspecialchars(trim($data)))));
            return $newData;
        }

        function pCheck($data){
            global $conn;
            $newData = mysqli_escape_string($conn, htmlspecialchars( $data));
            return $newData;
        }
        function Check($data){
            global $conn;
            $newData = mysqli_escape_string($conn, htmlspecialchars( $data));
            return $newData;
        }
        function fetchUserData($query){
            echo "
            <table>
            <thead>
            <th>S/N</th>
            <th>USERNAME</th>
            <th>EMAIL</th>
            <th>PHONE</th>
            <th>ACTION</td>
            </thead>
            <tbody>";
            $sn = 0;
            while ($row =mysqli_fetch_assoc($query)) {
                $sn++;
                $id = $row['userid'];
                $u = $row['username'];
                $e = $row['email'];
                $p = $row['phone'];
                echo "                
                <tr>
                    <td>$sn</td>
                    <td>$u</td>
                    <td>$e</td>
                    <td>$p</td>
                    <td><a href='?userid=$id'>action</a> </td>
                </tr>";
                }
                echo " </tbody>
                </table>";
        }


//    VALIDATE EMAIL 

function validateEmail($email) {
    $re = "/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/";
   return preg_match($re, $email);
  }

