<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAD Hotel - Rooms</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <?php require('inc/links.php') ?>
</head>
<body>

    <!-- header -->
    <?php require('inc/header.php') ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold judul text-center">OUR ROOMS</h2>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 mb-4 ps-4">
                <nav class="navbar navbar-expand-lg navbar-light bg-light rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">FILTERS</h4>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">Check Availability</h5>
                                <label class="form-label">Check-in</label>
                                <input type="date" class="form-control shadow-none mb-3">
                                <label class="form-label">Check-out</label>
                                <input type="date" class="form-control shadow-none ">
                            </div>
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">Guests</h5>
                                <div class="d-flex">
                                    <div class="me-3">
                                        <label class="form-label">Adults</label>
                                        <input type="number" class="form-control shadow-none ">
                                    </div>
                                    <div>
                                        <label class="form-label">Childrens</label>
                                        <input type="number" class="form-control shadow-none ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9 px-4">
                <?php 
                    $room_res = select("SELECT * FROM `rooms` WHERE `status`=? AND `removed`=?",[1,0],'ii');

                    while($room_data = mysqli_fetch_assoc($room_res)){
                        // get features
                        $fea_q = mysqli_query($con,"SELECT f.name FROM `features` f
                            INNER JOIN `room_features` rfea ON f.id = rfea.features_id 
                            WHERE rfea.room_id = '$room_data[id]'");

                        $features_data = "";
                        while($fea_row = mysqli_fetch_assoc($fea_q)){
                            $features_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                                $fea_row[name]
                            </span>";
                        }
                        
                        // get facilities
                        $fac_q = mysqli_query($con,"SELECT f.name FROM `facilities` f 
                            INNER JOIN `room_facilities` rfac ON f.id = rfac.facilities_id 
                            WHERE rfac.room_id = '$room_data[id]'");

                        $facilities_data = "";
                        while($fac_row = mysqli_fetch_assoc($fac_q)){
                            $facilities_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                                $fac_row[name]
                            </span>";
                        }

                        // get thumb image
                        $room_thumb = ROOMS_IMAGE_PATH."thumbnail.jpg";
                        $thumb_q = mysqli_query($con,"SELECT * FROM `room_images` WHERE `room_id`='$room_data[id]' AND `thumb`='1'");

                        if(mysqli_num_rows($thumb_q) > 0){
                            $thumb_res = mysqli_fetch_assoc($thumb_q);
                            $room_thumb = ROOMS_IMAGE_PATH.$thumb_res['image'];
                        }

                        echo<<<data
                            <div class="card mb-4 border-0 shadow">
                                <div class="row g-0 p-3 align-items-center">
                                    <div class="col-md-5">
                                        <img src="$room_thumb" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-5 px-3">
                                        <h5>$room_data[name]</h5>
                                        <div class="features mb-2">
                                            <h6 class="mb-1">Features</h6>
                                            $features_data
                                        </div>
                                        <div class="facilities mb-4">
                                        <h6 class="mb-1">Facilities</h6>
                                        $facilities_data
                                    </div>
                                        <div class="guest">
                                            <h6 class="mb-1">Guest</h6>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                $room_data[adult] Adults
                                            </span>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                            $room_data[children] Children
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <h6>Rp. $room_data[price] per night</h6>
                                            <a href="#" class="btn btn-sm btn-success w-100 shadow-none mb-2">Book Now</a>
                                            <a href="room_details.php?id=$room_data[id]" class="btn btn-sm btn-outline-dark w-100 shadow-none">Details Room</a>
                                    </div>
                                </div>
                            </div>
                        data;

                    }
                ?>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php require('inc/footer.php') ?>

</body>
</html>