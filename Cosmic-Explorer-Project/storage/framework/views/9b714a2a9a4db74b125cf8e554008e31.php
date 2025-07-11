<!DOCTYPE html>
<html>

<head>
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5" style="max-width: 500px;">
        <h2>Login</h2>
        <?php if($errors->has('error')): ?>
            <div class="alert alert-danger">
                <?php echo e($errors->first('error')); ?>

            </div>
        <?php endif; ?>
        <form method="POST" action="<?php echo e(route('process-login')); ?>">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label class="mb-2">Email</label>
                <input type="email" name="email" class="form-control" required autofocus>
            </div>
            <div class="mb-3">
                <label class="mb-2">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button class="btn btn-primary">Login</button>
        </form>
    </div>
</body>

</html>
<?php /**PATH C:\Users\Admin\Desktop\Cosmic-Explorer\Cosmic-Explorer-Project\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>