<?php $__env->startSection('title', 'Trang quản trị'); ?>

<?php $__env->startSection('content'); ?>
    <h1 class="mb-4">Bảng điều khiển</h1>
    <p>Xin chào, <?php echo e(auth()->user()->name); ?>!</p>
    <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
        class="btn btn-danger">Đăng xuất</a>

    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
        <?php echo csrf_field(); ?>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\Cosmic-Explorer\Cosmic-Explorer-Project\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>