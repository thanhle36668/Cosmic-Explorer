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
                            <li class="nav-item dropdown planets">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Planets
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php $__currentLoopData = $planets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a class="dropdown-item"
                                                href="<?php echo e(route('details-planet', $planet->id)); ?>"><?php echo e($planet->name); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                            <li class="nav-item dropdown constellation">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Constellations
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php $__currentLoopData = $constellations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $constellation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a class="dropdown-item" href="#"><?php echo e($constellation->name); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                            <li class="nav-item dropdown observatories">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Observatories
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php $__currentLoopData = $observatories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $observatory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a class="dropdown-item"
                                                href="<?php echo e(route('details-observatory', $observatory->id)); ?>"><?php echo e($observatory->name); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        style="background-image: url('<?php echo e(asset('images')); ?>/background/background-banner-main.avif');">
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
                                <a href="#">Evolution of Earth</a>
                            </div>
                            <div class="border-button">
                                <a href="#" target="_blank">Constellation collections</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="owl-banner owl-carousel ">
                        <?php $__currentLoopData = $planets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item">
                                <a href="<?php echo e(route('details-planet', $planet->id)); ?>">
                                    <img class="rounded-circle" src="<?php echo e(asset('images')); ?>/planets/<?php echo e($planet->photo); ?>"
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

    <!-- ***** Featured news (BigBang Theory - The Earth's Evolution - Comets ) ***** -->
    <section class="featured-news py-4"
        style="background-image: url('<?php echo e(asset('images')); ?>/background/background-dark.jpg');">
        <!-- ***** BigBang Theory ***** -->
        <div class="card py-5 px-5">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?php echo e(asset('images')); ?>/news/<?php echo e($news_bigbang_theory->photo); ?>" class="img-fluid"
                        alt="<?php echo e($news_bigbang_theory->name); ?>">
                </div>
                <div class="col-md-8 d-flex justify-content-center align-items-center">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($news_bigbang_theory->title); ?></h5>
                        <p class="card-text"><?php echo e($news_bigbang_theory->description_short); ?></p>
                        <a href="#" class="card-button badge rounded-pill bg-white">View Details</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ***** The Earth's Evolution ***** -->
        <div class="card py-5 px-5">
            <div class="row g-0">
                <div class="col-md-8 d-flex justify-content-center align-items-center">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($news_earth_evolved->title); ?></h5>
                        <p class="card-text">
                            <?php echo e($news_earth_evolved->description_short); ?>

                        </p>
                        <a href="#" class="card-button badge rounded-pill bg-white">View Details</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="<?php echo e(asset('images')); ?>/news/<?php echo e($news_earth_evolved->photo); ?>" class="img-fluid"
                        alt="<?php echo e($news_earth_evolved->name); ?>">
                </div>
            </div>
        </div>

        <!-- ***** Comets ***** -->
        <div class="card py-5 px-5">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?php echo e(asset('images')); ?>/news/<?php echo e($news_comet->photo); ?>" class="img-fluid"
                        alt="<?php echo e($news_comet->name); ?>">
                </div>
                <div class="col-md-8 d-flex justify-content-center align-items-center">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($news_comet->title); ?></h5>
                        <p class="card-text"><?php echo e($news_comet->description_short); ?></p>
                        <a href="#" class="card-button badge rounded-pill bg-white">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Discovery (BigBang Theory - The Earth's Evolution - Comets ) End ***** -->

    <!-- ***** News ***** -->
    <section class="news" style="background-color: black">
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
                                                <img src="<?php echo e(asset('images')); ?>/constellations/<?php echo e($constellation->photo); ?>"
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
    <section class="categories-collections" style="background-color: black">
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
                                                <img src="<?php echo e(asset('images')); ?>/planets/<?php echo e($planet->photo); ?>"
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
                                            <img src="<?php echo e(asset('images')); ?>/constellations/<?php echo e($constellation->photo); ?>"
                                                alt="<?php echo e($constellation->name); ?>">
                                            <div class="down-content text-center">
                                                <h4><?php echo e($constellation->name); ?>

                                                </h4>
                                                <div class="main-button">
                                                    <a href="#">View Details</a>
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
                                                src="<?php echo e(asset('images')); ?>/observatories/<?php echo e($observatory->photo); ?>"
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user.cosmic-explorer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\Cosmic-Explorer\Cosmic-Explorer-Project\resources\views/user/home.blade.php ENDPATH**/ ?>