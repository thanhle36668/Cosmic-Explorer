<?php $__env->startSection('title'); ?>
    <title><?php echo e($planet_details->name); ?> Planet</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section-change'); ?>
    <!-- ***** Header ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="<?php echo e(route('home')); ?>" class="logo">
                            <img src="<?php echo e(asset('images')); ?>/logo.svg" alt="">
                        </a>
                        <!-- ***** Logo End ***** -->

                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li>
                                <a href="<?php echo e(route('home')); ?>">Home</a>
                            </li>
                            <li>
                                <a href="#">About</a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('news')); ?>">News</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCollections"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Collections </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownCollections">

                                    <li class="nav-item">
                                        <a class="dropdown-item" href="<?php echo e(route('collections-planets')); ?>"
                                            id="navbarDropdownPlanets">
                                            Planets
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="dropdown-item" href="<?php echo e(route('collections-constellations')); ?>"
                                            id="navbarDropdownConstellations">
                                            Constellations
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="dropdown-item" href="<?php echo e(route('collections-observatories')); ?>"
                                            id="navbarDropdownObservatories">
                                            Observatories
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown educational">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Educational
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="<?php echo e(route('collections-books')); ?>">Books</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Videos</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header End ***** -->

    <!-- ***** Main Banner Details ***** -->
    <div class="page-heading" style="background: url('<?php echo e(asset('images')); ?>/background/background-banner-main.avif')"
        id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h1 style="text-transform: uppercase"><?php echo e($planet_details->name); ?> Planet</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Details End ***** -->

    <!-- ***** Details Planet ***** -->
    <section class="main-banner-details"
        style="background: url('<?php echo e(asset('images')); ?>/background/background-banner-main.avif');">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="header-text">
                        <h2><?php echo e($planet_details->name); ?></h2>
                        <ul class="info-list">
                            <li><strong class="d-inline">Discovery Date:</strong> <?php echo e($planet_details->discovery_date); ?>

                            </li>
                            <li><strong class="d-inline">Size (Diameter):</strong> <?php echo e($planet_details->diameter_km); ?></li>
                            <li><strong class="d-inline">Average Distance to Earth:</strong>
                                <?php echo e($planet_details->avg_distance_to_earth_km); ?>

                            </li>
                            <li><strong class="d-inline">Average Distance to the Sun:</strong>
                                <?php echo e($planet_details->avg_distance_to_sun_km); ?>

                            </li>
                        </ul>
                        <p id="overflowTest"><?php echo e($planet_details->brief_intro_composition); ?></p>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="owl-banner owl-carousel ">
                        <div class="item">
                            <img class="rounded-3" src="<?php echo e(asset('images')); ?>/planets/<?php echo e($planet_details->photo); ?>"
                                alt="" height="480px" width="480px">
                        </div>
                        <div class="item">
                            <img class="rounded-3" src="<?php echo e(asset('images')); ?>/planets/<?php echo e($planet_details->photo_2); ?>"
                                alt="" height="480px" width="480px">
                        </div>
                        <div class="item">
                            <img class="rounded-3" src="<?php echo e(asset('images')); ?>/planets/<?php echo e($planet_details->photo_3); ?>"
                                alt="" height="480px" width="480px">
                        </div>
                        <div class="item">
                            <img class="rounded-3" src="<?php echo e(asset('images')); ?>/planets/<?php echo e($planet_details->photo_4); ?>"
                                alt="" height="480px" width="480px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Details Planet End ***** -->

    <!-- ***** Planet Collections ***** -->
    <section class="categories-collections" style="background-color: rgb(0,0,0)">
        <div class="container">
            <div class="row">
                <!-- ***** planets Collections ***** -->
                <div class="col-lg-12">
                    <div class="collections">
                        <div class="row">
                            <div class="col-lg-12 title">
                                <div class="section-heading">
                                    <div class="line-dec"></div>
                                    <h2>Planet Collection</h2>
                                </div>
                            </div>
                            <div class="col-lg-12 carousel">
                                <div class="owl-collection owl-carousel">
                                    <?php $__currentLoopData = $planets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="item">
                                            <img class="img-planet"
                                                src="<?php echo e(asset('images')); ?>/planets/<?php echo e($planet->photo_extra); ?>"
                                                alt="<?php echo e($planet->name); ?>">
                                            <div class="down-content-discovery text-center p-3"
                                                style="background-color: transparent; border: none">
                                                <div class="main-button mt-0 mb-0">
                                                    <a href="<?php echo e(route('details-planet', $planet->id)); ?>">View
                                                        Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***** planets Collections End ***** -->
            </div>
            <!-- ***** planets Collections End ***** -->
        </div>
    </section>
    <!-- ***** Planet Collections End ***** -->

    <!-- ***** Contact ***** -->
    <section class="contact" style="background: url('<?php echo e(asset('images')); ?>/background/background-dark.jpg')">
        <div class="contact-us">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div id="map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3694.5308998533724!2d106.7116196747655!3d10.806685889343925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529ed00409f09%3A0x11f7708a5c77d777!2zQXB0ZWNoIENvbXB1dGVyIEVkdWNhdGlvbiAtIEjhu4cgVGjhu5FuZyDEkMOgbyB04bqhbyBM4bqtcCBUcsOsbmggVmnDqm4gUXXhu5FjIHThur8gQXB0ZWNo!5e1!3m2!1svi!2s!4v1751729317282!5m2!1svi!2s"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <!-- You can simply copy and paste "Embed a map" code from Google Maps for any location. -->

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="section-heading">
                            <h2>Say Hello. Don't Be Shy!</h2>
                        </div>
                        <form id="contact" action="" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <fieldset>
                                        <input name="name" type="text" id="name" placeholder="Your name"
                                            required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <input name="email" type="text" id="email" placeholder="Your email"
                                            required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="message" rows="6" id="message" placeholder="Your message" required=""></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-dark-button"><i
                                                class="fa fa-paper-plane"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="subscribe">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="section-heading">
                            <h2>By Subscribing To Our Newsletter</h2>
                        </div>
                        <form id="subscribe" action="" method="get">
                            <div class="row">
                                <div class="col-lg-5">
                                    <fieldset>
                                        <input name="name" type="text" id="name" placeholder="Your Name"
                                            required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-5">
                                    <fieldset>
                                        <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*"
                                            placeholder="Your Email Address" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-2">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-dark-button"><i
                                                class="fa fa-paper-plane"></i></button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-6">
                                <ul>
                                    <li>Store Location:<br><span>Sunny Isles Beach, FL 33160, United States</span></li>
                                    <li>Phone:<br><span>010-020-0340</span></li>
                                    <li>Office Location:<br><span>North Miami Beach</span></li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <ul>
                                    <li>Work Hours:<br><span>07:30 AM - 9:30 PM Daily</span></li>
                                    <li>Email:<br><span>info@company.com</span></li>
                                    <li>Social Media:<br><span><a href="#">Facebook</a>, <a
                                                href="#">Instagram</a>, <a href="#">Behance</a>,
                                            <a href="#">Linkedin</a></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Contact End ***** -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user.details-page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\Cosmic-Explorer\Cosmic-Explorer-Project\resources\views/user/details-page-planet.blade.php ENDPATH**/ ?>