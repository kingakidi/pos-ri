<?php   
    if (isset($_POST['username']) AND isset($_POST['password'])) {
        include 'conn.php';
        include 'functions.php';
        $u = uCheck($_POST['username']);
        $p = pCheck($_POST["password"]);
        // CHECK FOR EMPTY FIELD 
        if(!empty($u) OR !empty($p)){

            // CHECK FOR USER AVAILABILITY 

            $userQuery = mysqli_query($conn, "SELECT * FROM `signup` WHERE username = '$u' OR email = '$u' LIMIT 1");
            $row = mysqli_num_rows($userQuery);
            if ($row > 0) {
                $dataArray = mysqli_fetch_assoc($userQuery);
                if(password_verify($p, $dataArray['password'])){               
                    $userId = $dataArray['userid'];
                    $username = $dataArray['username'];
                    $phone =$dataArray['phone'];
                    $email = $dataArray['email'];
                    $vStatus = $dataArray['verification_code']; 
                    $_SESSION['id'] = $userId;
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $email;
                    $_SESSION['phone'] = $phone;
                    echo "SUCCESS";              

                }else{
                    echo "INVALID PASSWORD";
                }
            }else{
                echo "INVALID USER ID";
            }
        }else{
            echo "ALL FIELD REQUIRED";
        }
      
    }
    

    
//    CHECK USERNAME AVAILABILITY

?>