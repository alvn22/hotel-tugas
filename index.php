<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAD Hotel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <?php require('inc/links.php') ?>
</head>
<body class="bg-light">

    <!-- header -->
    <?php require('inc/header.php') ?>

    <!-- carousel -->
    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <?php 
                    $res = selectAll('carousel');
                    while($row = mysqli_fetch_assoc($res)){
                        $path = CAROUSEL_IMAGE_PATH;
                        echo <<<data
                        <div class="swiper-slide">
                        <img src="$path$row[image]" class="w-100 d-block"/>
                            </div>
                        data;
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- check -->
    <div class="container cek-sedia">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="mb-4">Check Availability</h5>
                <form>
                    <div class="row align-items-end">
                        <div class="col-lg-3">
                            <label class="form-label" style="font-weight: 500;">Check-in</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3">
                            <label class="form-label" style="font-weight: 500;">Check-out</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3">
                            <label class="form-label" style="font-weight: 500;">Adult</label>
                            <select class="form-select shadow-none">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label class="form-label" style="font-weight: 500;">Children</label>
                            <select class="form-select shadow-none">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        
                    </div>
                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-success shadow-none">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- kamar -->
    <h2 class="mt-5 mb-4 pt-4 text-center fw-bold judul">ROOMS</h2>
    <div class="container">
        <div class="row">
            <?php 
                $room_res = select("SELECT * FROM `rooms` WHERE `status`=? AND `removed`=? ORDER BY `id` DESC LIMIT 3",[1,0],'ii');

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
                        <div class="col-lg-4 col-md-6 my-3">
                            <div class="card shadow" style="width: 18rem;">
                                <img src="$room_thumb" class="card-img-top">
                                <div class="card-body">
                                    <h5>$room_data[name]</h5>
                                    <h6>Rp. $room_data[price] per night</h6>
                                    <div class="features my-4">
                                        <h6 class="mb-1">Features</h6>
                                        $features_data
                                    </div>
                                    <div class="facilities mb-4">
                                        <h6 class="mb-1">Facilities</h6>
                                        $facilities_data
                                    </div>
                                    <div class="guest my-4">
                                        <h6 class="mb-1">Guests</h6>
                                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                                            $room_data[adult] Adults
                                        </span>
                                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                                            $room_data[children] Children
                                        </span>
                                    </div>
                                    <div class="d-flex justify-content-evenly mb-2">
                                        <a href="#" class="btn btn-outline-success">Book Now</a>
                                        <a href="room_details.php?id=$room_data[id]" class="btn btn-outline-dark">Details Room</a>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    data;
                }
            ?>
            <!-- <div class="col-lg-4 col-md-6 my-3">
                <div class="card shadow" style="width: 18rem;">
                    <img src="images/rooms/1.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5>Family Room</h5>
                        <h6>Rp. 300.000 per night</h6>
                        <div class="features my-4">
                            <h6 class="mb-1">Features</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                3 Spring bed
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                1 Bathroom
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Balcony
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Sofa
                            </span>
                        </div>
                        <div class="facilities mb-4">
                            <h6 class="mb-1">Facilities</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Wi-fi
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Television
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                AC
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Room heater
                            </span>
                        </div>
                        <div class="guest my-4">
                            <h6 class="mb-1">Guest</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                2 Adults
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                2 Children
                            </span>
                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb1">Rating</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-outline-success">Book Now</a>
                            <a href="#" class="btn btn-outline-dark">Details Room</a>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="text-center mt-5">
                <a href="rooms.php" class="btn btn-outline-dark fw-bold judul shadow-none">More Rooms</a>
            </div>
        </div>
    </div>

    <!-- fasilitas -->
    <h2 class="mt-5 mb-4 pt-4 text-center fw-bold judul">FACILITIES</h2>
    <div class="container"> 
        <div class="row justify-content-evenly">
            <?php 
                $res = mysqli_query($con,"SELECT * FROM `facilities` ORDER BY `id` DESC LIMIT 5");
                $path = FACILITIES_IMAGE_PATH;

                while($row = mysqli_fetch_assoc($res)){
                    echo<<<data
                        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                            <img src="$path$row[icon]" width="60px">
                            <h5 class="mt-3">$row[name]</h5>
                        </div>
                    data;
                }
            ?>
            <div class="text-center mt-5">
                <a href="facilities.php" class="btn btn-outline-dark fw-bold judul shadow-none">More Facilities</a>
            </div>
        </div>
    </div>

    <!-- testimoni -->
    <!-- <h2 class="mt-5 mb-4 pt-4 text-center fw-bold judul">TESTIMONIALS</h2>
    <div class="container">
        <div class="swiper swiper-testimonials">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="profile">
                        <img src="images/">
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div> -->

    <!-- maps -->
    <?php
        $contact_q = "SELECT * FROM `contact_details` WHERE `sr_no`=?";
        $values = [1];
        $contact_r = mysqli_fetch_assoc(select($contact_q,$values,'i'));
    ?>
    <h2 class="mt-5 mb-4 pt-4 text-center fw-bold judul">FIND US</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="bg-white p-4 rounded">
                    <h5>Call Us</h5>
                    <a href="tel: +<?php echo $contact_r['pn1'] ?>" class="d-inline-block text-decoration-none text-dark mb-3">
                        <i class="bi bi-telephone-fill"></i> +<?php echo $contact_r['pn1'] ?>
                    </a>
                    <br>
                    <a href="tel: +<?php echo $contact_r['pn2'] ?>" class="d-inline-block text-decoration-none text-dark">
                        <i class="bi bi-whatsapp"></i> +<?php echo $contact_r['pn2'] ?>
                    </a>
                </div>
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Follow Us</h5>
                    <a href="<?php echo $contact_r['ig'] ?>" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-instagram"></i> Instagram
                        </span>
                    </a>
                    <br>
                    <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-facebook"></i> Facebook
                        </span>
                    </a>
                    <br>
                    <a href="<?php echo $contact_r['tw'] ?>" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-twitter"></i> Twitter
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-lg-8 p-4 mb-3 bg-white rounded">
            <iframe class="w-100 rounded" height="450" src="<?php echo $contact_r['iframe'] ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php 
    require('inc/footer.php');
    ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
    var swiper = new Swiper(".swiper-container", {
      spaceBetween: 30,
      effect: "fade",
      loop: true,
      autoplay: {
        delay: 3500,
        disableOnInteraction: false,
      }
    });

    var swiper = new Swiper(".swiper-testimonials", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
      },
      pagination: {
        el: ".swiper-pagination",
      },
    });
  </script>
</body>
</html>