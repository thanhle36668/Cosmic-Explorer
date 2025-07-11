<?php $__env->startSection('title'); ?>
    <title><?php echo e($planet_details->name); ?> Details</title>
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
                            <li class="nav-item dropdown planets">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Planets
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php $__currentLoopData = $planets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a class="dropdown-item"
                                                href="<?php echo e(route('planet', $planet->id)); ?>"><?php echo e($planet->name); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                            <li class="nav-item dropdown constellation">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    planets
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php $__currentLoopData = $planets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a class="dropdown-item" href="#"><?php echo e($planet->name); ?></a>
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

    <!-- ***** Main Banner Details ***** -->
    <div class="page-heading" style="background-image: url('<?php echo e(asset('images')); ?>/background/background-banner-main.avif')"
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
        style="background-image: url('<?php echo e(asset('images')); ?>/background/background-banner-main.avif');">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="header-text">
                        <h2><?php echo e($planet_details->name); ?></h2>
                        <ul class="info-list">
                            <li><strong>Discovery Date:</strong> <?php echo e($planet_details->discovery_date); ?></li>
                            <li><strong>Size (Diameter):</strong> <?php echo e($planet_details->diameter_km); ?></li>
                            <li><strong>Average Distance to Earth:</strong> <?php echo e($planet_details->avg_distance_to_earth_km); ?>

                            </li>
                            <li><strong>Average Distance to the Sun:</strong> <?php echo e($planet_details->avg_distance_to_sun_km); ?>

                            </li>
                        </ul>
                        <p id="overflowTest"><?php echo e($planet_details->brief_intro_composition); ?></p>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="owl-banner owl-carousel ">
                        <div class="item">
                            <img class="rounded-circle" src="<?php echo e(asset('images')); ?>/planets/<?php echo e($planet_details->photo); ?>"
                                alt="" height="480px" width="480px">
                        </div>
                        <div class="item">
                            <img class="rounded-circle" src="<?php echo e(asset('images')); ?>/planets/<?php echo e($planet_details->photo_2); ?>"
                                alt="" height="480px" width="480px">
                        </div>
                        <div class="item">
                            <img class="rounded-circle" src="<?php echo e(asset('images')); ?>/planets/<?php echo e($planet_details->photo_3); ?>"
                                alt="" height="480px" width="480px">
                        </div>
                        <div class="item">
                            <img class="rounded-circle" src="<?php echo e(asset('images')); ?>/planets/<?php echo e($planet_details->photo_4); ?>"
                                alt="" height="480px" width="480px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Details Planet End ***** -->

    <section class="categories-collections" style="background-color: black">
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
                                            <img src="<?php echo e(asset('images')); ?>/planets/<?php echo e($planet->photo_extra); ?>"
                                                alt="<?php echo e($planet->name); ?>">
                                            <div class="down-content-discovery text-center p-3"
                                                style="background-color: transparent; border: none">
                                                <div class="main-button mt-0 mb-0">
                                                    <a href="<?php echo e(route('planet', $planet->id)); ?>">View Details</a>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user.details-page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\Cosmic-Explorer\Cosmic-Explorer-Project\resources\views/user/details-page-planet.blade.php ENDPATH**/ ?>