<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAD Hotel - Contact</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <?php require('inc/links.php') ?>
</head>
<body>

    <!-- header -->
    <?php require('inc/header.php') ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold judul text-center">CONTACT US</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-3">
                    <iframe class="w-100" height="320px" src="<?php echo $contact_r['iframe'] ?>" width="750" height="300" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <h5 class="mt-4">Address</h5>
                    <a href="<?php echo $contact_r['gmap'] ?>" class="d-inline-block text-decoration-none text-dark">
                    <i class="bi bi-geo-alt-fill"></i> <?php echo $contact_r['address'] ?>
                    </a>
                    <h5 class="mt-4">Call Us</h5>
                    <a href="tel: +<?php echo $contact_r['pn1'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
                    <i class="bi bi-telephone-fill"></i> +<?php echo $contact_r['pn1'] ?>
                    </a>
                    <br>
                    <a href="tel: +<?php echo $contact_r['pn2'] ?>" class="d-inline-block text-decoration-none text-dark">
                        <i class="bi bi-whatsapp"></i> +<?php echo $contact_r['pn2'] ?>
                    </a>
                    <h5 class="mt-4">Email</h5>
                    <a href="mailto: <?php echo $contact_r['email'] ?>" class="d-inline-block text-decoration-none text-dark">
                    <i class="bi bi-envelope-fill"></i> <?php echo $contact_r['email'] ?>
                    </a>
                    <h5 class="mt-4">Follow Us</h5>
                    <a href="<?php echo $contact_r['ig'] ?>" class="d-inline-block text-decoration-none text-dark me-2 fs-5">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block text-decoration-none text-dark me-2 fs-5">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="<?php echo $contact_r['tw'] ?>" class="d-inline-block text-decoration-none text-dark fs-5">
                        <i class="bi bi-twitter"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 px-4">
                <div class="bg-white rounded shadow p-4">
                    <form method="POST">
                        <h5 class="text-center">Send a Message</h5>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Name</label>
                            <input name="name" required type="text" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Email</label>
                            <input name="email" required type="email" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Subject</label>
                            <input name="subject" required type="text" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Message</label>
                            <textarea name="message" required class="form-control shadow-none" rows="5" style="resize: none;"></textarea>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" name="send" class="btn btn-success shadow-none mt-3">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php 

        if(isset($_POST['send'])){
            $frm_data = filteration($_POST);
            $q = "INSERT INTO `user_queries`(`name`, `email`,`subject`, `message`) VALUES (?,?,?,?)";
            $values = [$frm_data['name'],$frm_data['email'],$frm_data['subject'],$frm_data['message']];
            $res = insert($q, $values, 'ssss');
            if($res==1){
                alert('success','Mail sent!');
            }
            else{
                alert('error', 'Server Down');
            }
        }
    ?>

    <!-- footer -->
    <?php require('inc/footer.php') ?>

</body>
</html>