<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAD Hotel - Facilities</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <?php require('inc/links.php') ?>
    <style>
        .pop:hover{
            border-top-color: #20EBFF !important;
            transform: scale(1.01);
            transition: all 0.3s;
        }
    </style>
</head>
<body class="bg-light">

    <!-- header -->
    <?php require('inc/header.php') ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold judul text-center">FACILITIES</h2>
        <!-- <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quisquam cum facilis aspernatur placeat saepe aperiam, ipsa et qui ducimus rem.
        </p> -->
    </div>
    <div class="container">
        <div class="row">
            <?php 
                $res = selectAll('facilities');
                $path = FACILITIES_IMAGE_PATH;

                while($row = mysqli_fetch_assoc($res)){
                    echo<<<data
                        <div class="col-lg-4 mb-5 px-4">
                            <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                                <div class="d-flex align-items-center mb-2">
                                    <img src="$path$row[icon]" width="40px">
                                    <h5 class="m-0 ms-3">$row[name]</h5>
                                </div>
                                <p>$row[description]</p>
                            </div>
                        </div>
                    data;
                }
            ?>
        </div>
    </div>

    <!-- footer -->
    <?php require('inc/footer.php') ?>

</body>
</html>