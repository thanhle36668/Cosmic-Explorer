<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $__env->yieldContent('title', 'Admin Panel'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
        }
        .sidebar {
            height: 100vh;
            background-color: #1f1f1f;
            min-width: 220px;
        }
        .sidebar a {
            color: #ccc;
            display: block;
            padding: 12px 16px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #333;
            color: #fff;
        }
        .main-content {
               padding: 24px;
                background-color: #f0f0f0; 
                color: #000; 
                border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3">
            <h4 class="text-white">Admin</h4>
            <a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a>
        <div class="dropdown">
            <a href="#" class="dropdown-toggle d-block text-white mb-2" data-bs-toggle="collapse" data-bs-target="#postsMenu" aria-expanded="false">
                Posts
            </a>
            <div class="collapse" id="postsMenu">
                <a href="<?php echo e(route('posts.index')); ?>" class="d-block ps-3 text-white mb-1">All Posts</a>
                <a href="<?php echo e(route('posts.create')); ?>" class="d-block ps-3 text-white">Create Post</a>
            </div>
        </div>      
        <a href="<?php echo e(route('comments.index')); ?>">Comments</a>
        <a href="<?php echo e(route('logout')); ?>"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            >Logout</a>

            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                <?php echo csrf_field(); ?>
            </form>
    </div>

        <!-- Main Content -->
        <div class="main-content flex-grow-1">
            <h2 class="mb-4"><?php echo $__env->yieldContent('title'); ?></h2>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\Users\Admin\Desktop\Cosmic-Explorer\Cosmic-Explorer-Project\resources\views/layouts/admin/admin.blade.php ENDPATH**/ ?>