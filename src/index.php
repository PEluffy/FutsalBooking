<!-- <?php
        session_start();
        if ((isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true)) {
            echo "<script>
    window.location.href='index.php';
    </script>";
        }

        ?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PK FUTSAL-HOME</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <?php require('../inc/links.php');    ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

</head>

<body class="bg-light">

    <?php
    require('../inc/header.php');    ?>
    <!-- Carousel -->
    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="../image/carosell/1.jpg" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="../image/carosell/2.jpg" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="../image/carosell/3.jpg" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="../image/carosell/4.jpg" class="w-100 d-block" />
                </div>
            </div>
        </div>
    </div>

    <!--Our COURTS-->

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR COURTS</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 my-3">
                <div class="card border-0  shadow p-3 mb-5 bg-body rounded" style=" max-width:500px; margin:auto;">
                    <img src="../image/courts/futsalgroundA.jpg">
                    <h6 type="submit" class="shadow-none text-center mt-2">5A side(Rs 1000)</h6>
                    <button type="submit" class="btn btn-primary shadow-none">BOOK NOW</button>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 my-3">
                <div class="card border-0 shadow p-3 mb-5 bg-body rounded" style="max-width:500px; margin:auto;">
                    <img src="../image/courts/futsalgroundB.jpg">
                    <h6 type="submit" class=" text-center mt-2">7A side(Rs 2000)</h6>
                    <button type="submit" class="btn btn-primary shadow-none">BOOK NOW</button>
                </div>
            </div>
            <div class="col-lg-12 text-center mt-2">
                <button type="button" class="btn btn-sm btn-outline-dark shadow-none rounded-0 fw-bold ">More Details>>></button>
            </div>
        </div>
    </div>

    <!-- Facilities -->
    <h2 class="mt-5 pt-4 mb-5 text-center fw-bold h-font">OUR FACILITIES</h2>
    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-3 my-3">
                <img src="../image/svg/wifi.svg" width="80px">
                <h5 class="mt-4">Wifi</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-3 my-3">
                <img src="../image/svg/rs.svg" width="80px">
                <h5 class="mt-4">Discount</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-3 my-3">
                <img src="../image/svg/love.svg" width="80px">
                <h5 class="mt-4">Water</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-3 my-3">
                <img src="../image/svg/call.svg" width="80px">
                <h5 class="mt-4">Call</h5>
            </div>
        </div>
        <div class="col-lg-12 text-center mt-4">
            <button type="button" class="btn btn-sm btn-outline-dark shadow-none rounded-0 fw-bold ">More Details>>></button>
        </div>
    </div>

    <!-- testimonial -->
    <h2 class="mt-5 pt-4 mb-5 text-center fw-bold h-font">TESTEMONIAL</h2>
    <div class="container">
        <div class="swiper swiper-testimonials">
            <div class="swiper-wrapper">
                <div class="swiper-slide bg-white p-4 ">
                    <div class="profile d-flex align-items-center p-4 smalldevice">
                        <img src="../image/svg/love.svg" width="30px">
                        <h6 class="m-0 ms-2">Random user1</h6>
                    </div>
                    <P>Lorem ipsum dolor sit amet c
                        onsectetur adipisicing elit
                        Dolor saepe vitae ipsum dolorum unde quo porro
                    </P>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center p-4">
                        <img src="../image/svg/love.svg" width="30px">
                        <h6>Random user2</h6>
                    </div>
                    <P>Lorem ipsum dolor sit amet c
                        onsectetur adipisicing elit
                        Dolor saepe vitae ipsum dolorum unde quo porro
                    </P>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center p-4">
                        <img src="../image/svg/love.svg" width="30px">
                        <h6>Random user3</h6>
                    </div>
                    <P>Lorem ipsum dolor sit amet c
                        onsectetur adipisicing elit
                        Dolor saepe vitae ipsum dolorum unde quo porro
                    </P>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center p-4">
                        <img src="../image/svg/love.svg" width="30px">
                        <h6>Random user4</h6>
                    </div>
                    <P>Lorem ipsum dolor sit amet c
                        onsectetur adipisicing elit
                        Dolor saepe vitae ipsum dolorum unde quo porro
                    </P>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>


    </div>

    <!--Reach Us-->
    <h2 class="mt-5 pt-4 mb-5 text-center fw-bold h-font">REACH US</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
                <iframe height="320" class="w-100 rounded" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d1178.7454298192038!2d85.3176899733825!3d27.73041743331114!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2snp!4v1692332346612!5m2!1sen!2snp" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>
            <div class="col-lg-4 col-md-4">
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Call us</h5>
                    <i class="bi bi-telephone-fill"></i>
                    <a href="tel: 9869296810" class="d-inlne-block mb-2 text-decoration-none text-dark">9869296810</a><br>
                    <i class="bi bi-telephone-fill"></i>
                    <a href="tel: 9849157085" class="d-inlne-block mb-2 text-decoration-none text-dark">9869296810</a>
                </div>
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Follow us</h5>
                    <a href="#" class="d-inlne-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-twitter me-1"></i>Twitter
                        </span>
                    </a><br>
                    <a href="#" class="d-inlne-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-facebook"></i>Facebook
                        </span>
                    </a><br>
                    <a href="#" class="d-inlne-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-envelope"></i> Gmail
                        </span>
                    </a>

                </div>
            </div>
        </div>
    </div>

    <?php require('../inc/footer.php');    ?>

    <!-- 
font-family: 'Merienda', cursive;
font-family: 'Poppins', sans-serif; -->

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".swiper-container", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 75000,
                disableOnINTERACTION: false,
            }
        });


        var swiper = new Swiper(".swiper-testimonials ", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            slidesPerView: "3",
            loop: true,
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