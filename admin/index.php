<?php 
    require('inc/essentials.php');
    require('inc/db_config.php');
    session_start();
        if((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin']==true)){
            redirect('dashboard.php');
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <?php require('inc/links.php') ?>
    <style>
        .login-form{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
        }
    </style>
</head>
<body class="bg-light">
    <div class="login-form text-center rounded bg-white shadow overflow-hidden">
        <form method="POST">
            <h4 class="bg-dark text-white py-3">Admin Login Panel</h4>
            <div class="p-4">
                <div class="mb-3">
                    <input name="admin_usn" required type="text" class="form-control shadow-none text-center" placeholder="Username">
                </div>
                <div class="mb-4">
                    <input name="admin_pass" required type="password" class="form-control shadow-none text-center" placeholder="Password">
                </div>
                <div class="d-flex justify-content-evenly mb-2">
                    <button name="login" type="submit" class="btn btn-success shadow-none">LOGIN</button>
                    <a href="../index.php" class="btn btn-outline-dark">BACK</a>
                </div>
                
            </div>
        </form>
    </div>

    <?php 
        if(isset($_POST['login']))
        {
            $frm_data = filteration($_POST);
            $query = "SELECT * FROM `admin_cred` WHERE `admin_usn`=? AND `admin_pass`=?";
            $values = [$frm_data['admin_usn'],$frm_data['admin_pass']];
            $res = select($query,$values,"ss");
            if($res->num_rows==1){
                $row = mysqli_fetch_assoc($res);
                $_SESSION['adminLogin'] = true;
                $_SESSION['adminId'] = $row['sr_no'];
                redirect('dashboard.php');
            }
            else{
                alert('error','Login failed - Invalid user!');
            }
        }
    ?>

    <?php require('inc/script.php') ?>

</body>
</html>