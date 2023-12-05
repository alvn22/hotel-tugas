<?php

    require('../admin/inc/essentials.php');
    require('../admin/inc/db_config.php');
    require('../inc/sendgrid/sendgrid-php.php');

    if(isset($_POST['register'])){
        $data = filteration($_POST);

        if($data['pass'] != $data['cpass']){
            echo 'pass_mismatch';
            exit;
        }

        $u_exist = select("SELECT * FROM `user_cred` WHERE `email`=? AND `phonenum`=? LIMIT 1",[$data['email'],$data['phonenum']],"ss");

        if(mysqli_num_rows($u_exist) != 0){
            $u_exist_fetch = mysqli_fetch_assoc($u_exist);
            echo ($u_exist_fetch['email'] == $data['email']) ? 'email_already' : 'phone_already';
            exit;
        }

        $enc_pass = password_hash($data['pass'],PASSWORD_BCRYPT);

        $query = "INSERT INTO `user_cred`(`name`, `email`, `address`, `phonenum`, `password`) VALUES (?,?,?,?,?)";
        $values = [$data['name'],$data['email'],$data['address'],$data['phonenum'],$enc_pass];
        if(insert($query,$values,'sssss')){
            echo 1;
        } else {
            echo 'ins_failed';
        }

    }

?>