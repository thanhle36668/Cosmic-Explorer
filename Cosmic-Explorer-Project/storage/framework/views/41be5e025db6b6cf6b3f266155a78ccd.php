<?php $__env->startSection('title'); ?>
    <title>Cosmic Explorer</title>
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
                            <img src="<?php echo e(asset('storage/images')); ?>/logo.svg" alt="">
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
                                        <a class="dropdown-item" href="#">Videos</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Books</a>
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

    <!-- ***** Introduction ***** -->
    <section class="main-banner"
        style="background-image: url('<?php echo e(asset('storage/images')); ?>/background/background-banner-main.avif');">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="header-text">
                        <h1>COSMIC EXPLORER</h1>
                        <h3>Astronomical information
                            <br class="hidden">
                            about the universe
                        </h3>
                        <p>We are a group of amateur astronomers working together to improve astronomical
                            knowledge and
                            observational skills. We make ourselves and our instruments available to promote public
                            interest in
                            astronomy. Cosmos members are a varied group of colleagues who share a curiosity about the
                            sky. Some
                            members are scientists or engineers, while others are artists or craftspeople, building
                            contractors or
                            college students. Ability levels span the range from novice to expert.</p>
                        <div class="buttons">
                            <div class="border-button">
                                <a href="<?php echo e(route('collections-planets')); ?>">Planet
                                    collections</a>
                            </div>
                            <div class="border-button">
                                <a href="<?php echo e(route('collections-constellations')); ?>" target="_blank">Constellation
                                    collections</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="owl-banner owl-carousel ">
                        <?php $__currentLoopData = $planets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item">
                                <a href="<?php echo e(route('details-planet', $planet->id)); ?>">
                                    <img class="rounded-circle"
                                        src="<?php echo e(asset('storage/images')); ?>/planets/<?php echo e($planet->photo); ?>"
                                        alt="<?php echo e($planet->name); ?>" height="480px" width="480px">
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Introduction End ***** -->

    <!-- ***** Discovery (BigBang Theory - The Earth's Evolution - Comets ) ***** -->
    <section class="discovery py-5 px-5" style="background-color: rgb(0,0,0);">
        <?php $__currentLoopData = $discovery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discoveries): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($discoveries->id % 2 == 0): ?>
                <div class="card px-4 py-4">
                    <div class="row g-0">
                        <div class="col-md-8 d-flex justify-content-center align-items-center">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo e($discoveries->title); ?></h5>
                                <p class="card-text"><?php echo e($discoveries->description_short); ?></p>
                                <a href="<?php echo e(route('details-discovery', $discoveries->id)); ?>"
                                    class="card-button badge rounded-pill bg-white">View Details</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="<?php echo e(asset('storage/images')); ?>/discovery/<?php echo e($discoveries->photo); ?>"
                                class="img-fluid img-discovery" alt="<?php echo e($discoveries->title); ?>">
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="card px-4 py-4">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?php echo e(asset('storage/images')); ?>/discovery/<?php echo e($discoveries->photo); ?>" class="img-fluid"
                                alt="<?php echo e($discoveries->title); ?>">
                        </div>
                        <div class="col-md-8 d-flex justify-content-center align-items-center">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo e($discoveries->title); ?></h5>
                                <p class="card-text"><?php echo e($discoveries->description_short); ?></p>
                                <a href="<?php echo e(route('details-discovery', $discoveries->id)); ?>"
                                    class="card-button badge rounded-pill bg-white">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>
    <!-- ***** Discovery (BigBang Theory - The Earth's Evolution - Comets ) End ***** -->

    <!-- ***** News ***** -->
    <section class="news"
        style="background-image: url('<?php echo e(asset('storage/images')); ?>/background/background-banner-main.avif');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="news">
                        <div class="row">
                            <div class="col-lg-12 title">
                                <div class="section-heading">
                                    <div class="line-dec"></div>
                                    <h2>News</h2>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="owl-features owl-carousel">
                                    <?php $__currentLoopData = $constellations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $constellation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="item">
                                            <div class="thumb">
                                                <img src="<?php echo e(asset('storage/images')); ?>/constellations/<?php echo e($constellation->photo); ?>"
                                                    alt="<?php echo e($constellation->name); ?>" style="border-radius: 20px;"
                                                    height="360" width="360">
                                                <div class="hover-effect">
                                                    <div class="content">
                                                        <h4>James Webb: Unveiling Cosmic Secrets</h4>
                                                        <span class="details">
                                                            <div class="border-button">
                                                                <a href="#">View Details</a>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** News End ***** -->

    <!-- ***** Collections (Planets - Constellations - Observatories) ***** -->
    <section class="categories-collections"
        style="background: url('<?php echo e(asset('storage/images')); ?>/background/background-collections.jpg')">
        <div class="container">
            <div class="row">
                <!-- ***** Planets Collections ***** -->
                <div class="col-lg-12">
                    <div class="categories">
                        <div class="row">
                            <div class="col-lg-12 mt-0">
                                <div class="section-heading">
                                    <div class="line-dec"></div>
                                    <h2>Planets Collections</h2>
                                </div>
                            </div>
                            <?php $__currentLoopData = $planets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-3 col-sm-6">
                                    <a href="<?php echo e(route('details-planet', $planet->id)); ?>">
                                        <div class="item">
                                            <div class="icon">
                                                <img src="<?php echo e(asset('storage/images')); ?>/planets/<?php echo e($planet->photo); ?>"
                                                    alt="<?php echo e($planet->name); ?>">
                                            </div>
                                            <h4><?php echo e($planet->name); ?></h4>
                                            <div class="icon-button">
                                                <a href="<?php echo e(route('details-planet', $planet->id)); ?>"><i
                                                        class="fa fa-angle-right"></i></a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <!-- ***** Planets Collections End ***** -->

                <!-- ***** Constellations Collections ***** -->
                <div class="col-lg-12">
                    <div class="collections">
                        <div class="row">
                            <div class="col-lg-12 title">
                                <div class="section-heading">
                                    <div class="line-dec"></div>
                                    <h2>Constellation Collection</h2>
                                </div>
                            </div>
                            <div class="col-lg-12 carousel">
                                <div class="owl-collection owl-carousel">
                                    <?php $__currentLoopData = $constellations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $constellation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="item">
                                            <img src="<?php echo e(asset('storage/images')); ?>/constellations/<?php echo e($constellation->photo); ?>"
                                                alt="<?php echo e($constellation->name); ?>">
                                            <div class="down-content text-center">
                                                <h4><?php echo e($constellation->name); ?>

                                                </h4>
                                                <div class="main-button">
                                                    <a href="<?php echo e(route('details-constellation', $constellation->id)); ?>">View
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
                <!-- ***** Constellations Collections End ***** -->

                <!-- ***** Observatories Collections ***** -->
                <div class="col-lg-12">
                    <div class="collections">
                        <div class="row">
                            <div class="col-lg-12 title">
                                <div class="section-heading">
                                    <div class="line-dec"></div>
                                    <h2>Observatories Collection</h2>
                                </div>
                            </div>
                            <div class="col-lg-12 carousel">
                                <div class="owl-collection owl-carousel">
                                    <?php $__currentLoopData = $observatories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $observatory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="item">
                                            <img class="img-observatory"
                                                src="<?php echo e(asset('storage/images')); ?>/observatories/<?php echo e($observatory->photo); ?>"
                                                alt="<?php echo e($observatory->name); ?>">
                                            <div class="down-content text-center">
                                                <h4><?php echo e($observatory->name); ?>

                                                </h4>
                                                <p><?php echo e($observatory->location); ?></p>
                                                <div class="main-button">
                                                    <a href="<?php echo e(route('details-observatory', $observatory->id)); ?>">View
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
                <!-- ***** Observatories Collections End ***** -->

            </div>
            <!-- ***** Constellations Collections End ***** -->
        </div>
    </section>
    <!-- ***** Collections (Planets - Constellations - Observatories) End ***** -->

    <!-- ***** Contact ***** -->
    <section class="contact"
        style="background-image: url('<?php echo e(asset('storage/images')); ?>/background/background-dark.jpg')">
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

<?php echo $__env->make('layouts.user.cosmic-explorer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\Cosmic-Explorer\Cosmic-Explorer-Project\resources\views/user/home.blade.php ENDPATH**/ ?>