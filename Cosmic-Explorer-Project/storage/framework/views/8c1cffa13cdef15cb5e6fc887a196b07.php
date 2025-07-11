<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title><?php echo $__env->yieldContent('title'); ?> - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
        <a class="navbar-brand text-white" href="<?php echo e(route('admin.dashboard')); ?>">Trang quản trị</a>
        <div class="ms-auto text-white">
            <?php echo e(auth()->check() ? auth()->user()->name : ''); ?>

        </div>
    </nav>

    <div class="container mt-4">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</body>
</html>
<?php /**PATH C:\Users\Admin\Desktop\Cosmic-Explorer\resources\views/layouts/admin.blade.php ENDPATH**/ ?>