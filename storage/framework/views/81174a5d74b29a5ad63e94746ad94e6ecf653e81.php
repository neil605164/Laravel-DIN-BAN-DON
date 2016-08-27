<?php $__env->startSection('title','Login'); ?>
<?php $__env->startSection('content'); ?>
<form class="w3-container" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
    <?php echo e(csrf_field()); ?>

    <div class="w3-input-group">
        <label for="email" class="w3-label w3-text-blue">E-Mail Address</label>
        <input id="email" type="email" class="w3-input w3-border" name="email" value="<?php echo e(old('email')); ?>" autofocus>
    </div>
    <?php if($errors->has('email')): ?>

    <span class="help-block">
        <strong><?php echo e($errors->first('email')); ?></strong>
    </span>

    <?php endif; ?>  

    <div class="w3-input-group">
        <label for="password" class="w3-label w3-text-blue">Password</label>
        <input id="password" type="password" class="w3-input w3-border" name="password">
    </div>

    <?php if($errors->has('password')): ?>

    <span class="help-block">
        <strong><?php echo e($errors->first('password')); ?></strong>
    </span>

    <?php endif; ?>     

    <div class="w3-input-group">
        <input type="checkbox" name="remember"> Remember Me 
    </div> 

    <div class="w3-input-group">
        <button type="submit" class="w3-btn w3-blue">Login</button>
        <a class="btn btn-link" href="<?php echo e(url('/password/reset')); ?>">Forgot Your Password?</a>
    </div>                            
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>