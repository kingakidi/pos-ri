<div class="container-fluid">

    

<?php
    if (isset($_GET['page'])) {
        $page =  $_GET['page'];
        include "./control/$page".".php";
        }else if(isset($_GET['userid']) && isset($_GET['view'])){
            include "./control/users.php";
        }
        else{
            include "./control/reports.php"; 
        }

?>
</div>