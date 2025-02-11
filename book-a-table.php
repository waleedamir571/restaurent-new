<?php include 'header.php'; ?>
<!-- Wrapper -->
<div class="wrapper">

    <!-- Section Started Inner -->
    <section class="section kf-started-inner">
        <div class="kf-parallax-bg js-parallax" style="background-image: url(images/reservation/reserve.png);">
        </div>
        <div class="container">

            <h1 class="kf-h-title text-anim-1 scroll-animate" data-splitting="chars" data-animate="active">
                Reservation
            </h1>

        </div>
    </section>

    <!-- Section Reservation -->
    <section class="section kf-reservation">
        <div class="container">
            <div class="kf-titles align-center">
                <div class="kf-subtitle">
                    Booking Table
                </div>
                <h3 class="kf-title">
                    Make Your Reservation
                </h3>
            </div>


            <div class="kf-reservation-form element-anim-1 scroll-animate" data-animate="active">
                <form name="reservationForm" id="reservationForm" method="POST" action="backend/action/action.php">
                    <input type="hidden" name="form" value="reservationForm">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="kf-field">
                                <input type="text" name="name" placeholder="Full Name" />
                                <i class="far fa-user"></i>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="kf-field">
                                <input type="email" name="email" placeholder="Email Address" />
                                <i class="fas fa-at"></i>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="kf-field">
                                <input type="tel" name="phone" placeholder="Phone Number" />
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="kf-field">
                                <select name="persons">
                                    <option value="1">1 Person</option>
                                    <option value="2">2 Persons</option>
                                    <option value="3">3 Persons</option>
                                    <option value="4">4 Persons</option>
                                    <option value="5">5 Persons</option>
                                    <option value="6">6 Persons</option>
                                    <option value="7">7 Persons</option>
                                    <option value="8">8 Persons</option>
                                    <option value="9">9 Persons</option>
                                    <option value="10">10 Persons</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="kf-field">
                                <input type="date" name="date" />
                                <i class="far fa-calendar-alt"></i>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="kf-field">
                                <input type="time" name="time" id="timepicker" class="form-control" placeholder="Select Time">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="kf-bts">
                                <button type="submit" class="kf-btn">
                                    <span>booking table</span>
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                                <!-- <a href="#"  onclick="$('#rform').submit(); return false;">
                                    <span>booking table</span>
                                    <i class="fas fa-chevron-right"></i>
                                </a> -->
                            </div>
                        </div>
                    </div>
                </form>
                <div class="alert-success" style="display: none;">
                    <p>Thanks, your message is sent successfully.</p>
                </div>

            </div>

        </div>
    </section>

    <!-- Section Insta Carousel -->
    <div class="section kf-insta-carousel element-anim-1 scroll-animate" data-animate="active">
        <div class="container">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">

                        <div class="slide-item">
                            <div class="image kf-image-hover">
                                <a href="" target="blank">
                                    <img src="images/reservation/s1.png" alt="" />
                                    
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-slide">

                        <div class="slide-item">
                            <div class="image kf-image-hover">
                                <a href="" target="blank">
                                    <img src="images/reservation/s2.png" alt="" />
                                    
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-slide">

                        <div class="slide-item">
                            <div class="image kf-image-hover">
                                <a href="" target="blank">
                                    <img src="images/reservation/s3.png" alt="" />
                                    
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-slide">

                        <div class="slide-item">
                            <div class="image kf-image-hover">
                                <a href="" target="blank">
                                    <img src="images/reservation/s4.png" alt="" />
                                    
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-slide">

                        <div class="slide-item">
                            <div class="image kf-image-hover">
                                <a href="instagram.html" target="blank">
                                    <img src="images/ins_gal5.jpg" alt="" />
                                    
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-slide">

                        <div class="slide-item">
                            <div class="image kf-image-hover">
                                <a href="instagram.html" target="blank">
                                    <img src="images/ins_gal6.jpg" alt="" />
                                    
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-slide">

                        <div class="slide-item">
                            <div class="image kf-image-hover">
                                <a href="instagram.html" target="blank">
                                    <img src="images/ins_gal1.jpg" alt="" />
                                    
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-slide">

                        <div class="slide-item">
                            <div class="image kf-image-hover">
                                <a href="instagram.html" target="blank">
                                    <img src="images/ins_gal2.jpg" alt="" />
                                    
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-slide">

                        <div class="slide-item">
                            <div class="image kf-image-hover">
                                <a href="instagram.html" target="blank">
                                    <img src="images/ins_gal3.jpg" alt="" />
                                    
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-slide">

                        <div class="slide-item">
                            <div class="image kf-image-hover">
                                <a href="instagram.html" target="blank">
                                    <img src="images/ins_gal4.jpg" alt="" />
                                    
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-slide">

                        <div class="slide-item">
                            <div class="image kf-image-hover">
                                <a href="instagram.html" target="blank">
                                    <img src="images/ins_gal5.jpg" alt="" />
                                    
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-slide">

                        <div class="slide-item">
                            <div class="image kf-image-hover">
                                <a href="instagram.html" target="blank">
                                    <img src="images/ins_gal6.jpg" alt="" />
                                    
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Brands -->
    <div class="section kf-brands">
        <div class="container">

            <div class="kf-brands-items row">

                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
                    <div class="kf-brands-item element-anim-1 scroll-animate" data-animate="active">
                        <div class="image">
                            <img src="images/brand1.png" alt="" />
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
                    <div class="kf-brands-item element-anim-1 scroll-animate" data-animate="active">
                        <div class="image">
                            <img src="images/brand2.png" alt="" />
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
                    <div class="kf-brands-item element-anim-1 scroll-animate" data-animate="active">
                        <div class="image">
                            <img src="images/brand3.png" alt="" />
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
                    <div class="kf-brands-item element-anim-1 scroll-animate" data-animate="active">
                        <div class="image">
                            <img src="images/brand4.png" alt="" />
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
                    <div class="kf-brands-item element-anim-1 scroll-animate" data-animate="active">
                        <div class="image">
                            <img src="images/brand5.png" alt="" />
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
                    <div class="kf-brands-item element-anim-1 scroll-animate" data-animate="active">
                        <div class="image">
                            <img src="images/brand6.png" alt="" />
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>
<!-- Footer -->

<?php include 'footer.php'; ?>

  <script>
        $(document).ready(function () {
            $('#timepicker').timepicker({
                timeFormat: 'h:mm p',
                interval: 15,
                minTime: '6:00am',
                maxTime: '11:30pm',
                defaultTime: '10:00am',
                startTime: '6:00am',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });
        });
    </script>