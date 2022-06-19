<?php

// echo BASEURL;
?>
<nav class="nav bd-grid">
                <div class="textflex">
                    <a href="<?php echo BASEURL ?>"> <img src="./images/mylogo.jpeg" style="width: 50px; height: 40px;"></a>
                    <a href="<?php echo BASEURL ?>" class="textflexp">Alocryptotrade</a>
                </div>

                <div class="nav_toggle" id="nav-toggle"><i class="fas fa-bars"></i></div>

                <div class="nav_menu" id="nav-menu">
                    <div class="nav_close" id="nav-close"> <i class="fas fa-times"></i> </div>

                    <div class="navminwidth">
                        <ul class="nav_list">
                            <li class="nav_item animate__animated animate__fadeIn"><a href="<?php echo BASEURL ?>" class="nav_link"><i class="fas fa-home"></i>Home</a></li>
                            <li class="nav_item animate__animated animate__fadeIn"><a href="./dashboard" class="nav_link"><i class="fas fa-clone"></i>Account</a>
                                <div class="sub-menu-1">
                                    <ul>
                                        <li ><a href="<?php echo BASEURL ?>dashboard" class="sub-style">My Account</a></li>
                                        <li><a href="<?php echo BASEURL?>signin" class="sub-style">Login</a></li>
                                        <li><a href="<?php echo BASEURL?>signup" class="sub-style">Register</a></li>
                                        <li><a href="<?php echo BASEURL?>forgetpassword" class="sub-style">Forgot Password</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav_item animate__animated animate__fadeIn"><a href="#" class="nav_link"><i class="fas fa-clone"></i> Docs</a>
                                <div class="sub-menu-1">
                                    <ul>
                                        <li><a href="<?php echo BASEURL?>about" class="sub-style">About Us</a></li>
                                        <li><a href="<?php echo BASEURL?>testimony" class="sub-style">Testimonials</a></li>
                                        <li><a href="<?php echo BASEURL?>privacypolicy.php" class="sub-style">Privacy Policy</a></li>
                                        <li><a href="<?php echo BASEURL?>Terms.php" class="sub-style">Terms And Conditions</a></li>
                                    </ul>
                                </div>
                            </li>
                            <!--<li class="nav_item"><a href="#" class="nav_link"><i class="fas fa-dollar-sign"></i></i>Payouts</a>-->
                            <!--</li>-->
                            <li class="nav_item animate__animated animate__fadeIn"><a href="<?php echo BASEURL?>messageus" class="nav_link"><i class="fas fa-phone"></i>Contact Us</a></li>
                        </ul>
                    </div>
                    <!-- ==========NAVMAXWIDTH=========== -->
                    <div class="navmaxwidth">
                        <nav class="nav__container">
                            <div>
                                <!-- <a href="#" class="nav__link nav__logo">
                                                                                            <i class="fas fa-compact-disc nav__icon"></i>
                                                                                            <span class="nav__logo-name"> Kais</span>
                                                                                        </a> -->

                                <div class="nav__list">
                                    <div class="nav__items">
                                        <!-- <h3 class="nav__subtitle">Profile</h3> -->

                                        <a href="<?php echo BASEURL?>" class="nav__link">
                                            <i class="fas fa-home nav__icon"></i>
                                            <span class="nav__name">Home</span>
                                        </a>

                                        <div class="nav__dropdown">
                                            <a href="<?php echo BASEURL?>dashboard" class="nav__link .active">
                                                <i class="fas fa-user nav__icon"></i>
                                                <span class="nav__name">Account</span>
                                                <i class="fas fa-chevron-down nav__icon nav__dropdown-icon"></i>
                                            </a>

                                            <div class="nav__dropdown-collapse">
                                                <div class="nav__dropdown-content">
                                                    <a href="<?php echo BASEURL?>account" class="nav__dropdown-item">My Account</a>
                                                    <hr>
                                                    <a href="<?php echo BASEURL?>signin" class="nav__dropdown-item">Login</a>
                                                    <hr>
                                                    <a href="<?php echo BASEURL?>signup" class="nav__dropdown-item">Register</a>
                                                    <hr>
                                                    <a href="<?php echo BASEURL?>forgetpassword" class="nav__dropdown-item">Forgot Password</a>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="nav__dropdown">
                                            <a href="#" class="nav__link .active">
                                                <i class="fas fa-user nav__icon"></i>
                                                <span class="nav__name">Docs</span>
                                                <i class="fas fa-chevron-down nav__icon nav__dropdown-icon"></i>
                                            </a>

                                            <div class="nav__dropdown-collapse">
                                                <div class="nav__dropdown-content">
                                                    <a href="<?php echo BASEURL?>about" class="nav__dropdown-item"> About Us</a>
                                                    <hr>
                                                    <a href="<?php echo BASEURL?>testimony" class="nav__dropdown-item">Testimonials</a>
                                                    <hr>
                                                    <a href="<?php echo BASEURL?>privacy" class="nav__dropdown-item">Privacy Policy</a>
                                                    <hr>
                                                    <a href="<?php echo BASEURL?>terms" class="nav__dropdown-item">Terms and Conditions</a>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>

                                        <!--<a href="#" class="nav__link">-->
                                        <!--    <i class="fas fa-compass nav__icon"></i>-->
                                        <!--    <span class="nav__name">Payouts</span>-->
                                        <!--</a>-->

                                        <a href="<?php echo BASEURL?>messageus" class="nav__link">
                                            <i class="fas fa-compass nav__icon"></i>
                                            <span class="nav__name">Contact Us</span>
                                        </a>
                                    </div>

                                </div>
                            </div>

                            <a href="#" class="nav__link nav__logout">
                                <i class="fas fa-registered nav__icon"></i>
                                <span class="nav__namee">ALOCRYPTOTRADE</span>
                            </a>
                        </nav>
                    </div>
                </div>
            </nav>