<?php 
        include 'conn.php';
        include 'functions.php';
        

        // USERNAME CHECK 
        if (isset($_POST['userCheck'])) {
           $u = strtolower(uCheck( $_POST['username']));
          
            //    CHECK CHECK FOR NUMBER 
            if (empty($u)) {
                echo 'USERNAME IS REQUIRED';
            }elseif (is_numeric($u[0])) {
                echo 'INVALID USERNAME';
            }elseif(strlen($u) < 5){
                echo 'USERNAME IS TOO SHORT';
            }elseif ( preg_match('/\s/', $u) ) {
                echo 'USERNAME CONTAINED SPACE CHARACTER';
            } else{
                        // CHECK NAME IN DATABASE 
                $query = mysqli_query($conn, "SELECT * FROM signup WHERE username='$u'");
                if (mysqli_num_rows($query) < 1) {
                    echo "OK";
                }else{
                    echo "USERNAME IS TAKEN";
                }
            }
        


        }

        // EMAIL CHECK 
        if (isset($_POST['emailCheck'])) {
            $e = strtolower(uCheck( $_POST['email']));

            if (empty($e)) {
                echo 'EMAIL IS REQUIRED';
            }elseif(!filter_var($e, FILTER_VALIDATE_EMAIL)){
                echo 'INVALID EMAIL';
            }elseif ( preg_match('/\s/', $e) ) {
                echo 'EMAIL CONTAINED SPACE CHARACTER';
            } else{
                        // CHECK NAME IN DATABASE 
                $query = mysqli_query($conn, "SELECT * FROM signup WHERE email='$e'");
                if (mysqli_num_rows($query) < 1) {
                    echo "OK";
                }else{
                    echo "EMAIL IS TAKEN";
                }
            }
            
        }

        if (isset($_POST['r'])) {
            
            // print_r($_POST);
            $u= strtolower(uCheck($_POST['u']));
            $e = strtolower($_POST['e']);
            $n = uCheck($_POST['n']);
            $p = uCheck($_POST['p']);
            $cp = uCheck($_POST['cp']); 

            if (!empty($u) && !empty($e) && !empty($n) && !empty($p) && !empty($cp)) {
                // CHECK FOR USERNAME AND EMAIL AVAILABILITY


                    // USERNAME QUERY 
                    $query = mysqli_query($conn, "SELECT * FROM signup WHERE username='$u'");
                    // CHECK EMAIL QUERY 
                    $eQuery = mysqli_query($conn, "SELECT * FROM signup WHERE email='$e'");
                    // PHONE NUMBER CHECK
                    $nQuery = mysqli_query($conn, "SELECT * FROM signup WHERE phone='$n'");
                    // USERNAME CHECK 

                if (is_numeric($u[0])){
                    echo "INVALID USERNAME";
                }else if (preg_match('/\s/', $u)) {
                    echo " USERNAME CONTAINED SPACE CHARACTER";
                    exit();
                }else if(strlen($u) < 5){
                    echo " USERNAME: AT LEAST 5 CHARACTERS";
                }else if (mysqli_num_rows($query) > 0) {
                    echo "USERNAME IS TAKEN";
                    exit();
                // EMAIL CHECK 
                }else if(!filter_var($e, FILTER_VALIDATE_EMAIL)){
                    echo "INVALID EMAIL ADDRESS";
                    exit();
                }else if(!validateEmail($e)){
                        echo "INVALID EMAIL ADDRESS";
                        exit();
                }else if(mysqli_num_rows($eQuery) > 0){
                    echo "EMAIL IS TAKEN";
                    exit();
                }else if(mysqli_num_rows($nQuery) > 0){
                    echo 'PHONE NUMBER IS TAKEN';
                    exit();
                }else if(strlen($p) < 8){
                    echo 'PASSWORD: MINIMUM OF 8 CHARACTERS';
                    exit();
                }else if(!preg_match("#[0-9]+#", $p)){
                    echo 'PASSWORD: MUST CONTAIN AT LEAST 1 NUMBER';
                    exit();
                }else if(!preg_match("/[a-z]/i", $p)){
                    echo "PASSWORD MUST CONTAIN AT LEAST 1 LETTER";
                    exit();
                }else if($p !== $cp){
                    echo 'PASSWORD MISMATCH';
                    exit();
                }else{ 
                    // CREATE FOLDER FOR THE ACCOUNT, 
                    // SEND FOR EMAIL CONFIRMATION.
                    // HASH PASSWORD 
                    $pHash = password_hash($p, PASSWORD_DEFAULT);
                     // SEND DATA TO DATABASE,
                    $sQuery = mysqli_query($conn, "INSERT INTO `signup`(`userid`, `username`, `email`, `phone`, `password`, `date`, `verification_status`, `verification_code`) VALUES (NULL,'$u', '$e','$n','$pHash', now(),'1','2w34e4')");

                    if ($sQuery == true) {
                        if (!file_exists("../users/sydeestack_$u")) {
                            mkdir("../users/sydeestack_$u", 0777, true);
                        }
                        echo 'SUCCESS';
                    }


                }

            }else{
                echo "ALL FIELD REQUIRE";
            }
            
        }
?>