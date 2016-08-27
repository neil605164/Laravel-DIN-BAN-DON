<?php $__env->startSection('title','logout'); ?>
<?php $__env->startSection('content'); ?>
<form class="w3-container" role="form" method="POST" action="<?php echo e(url('/register')); ?>">
<?php echo e(csrf_field()); ?>


    <div class="w3-input-group">
        <label for="name" class="w3-label w3-text-blue">Name</label>
        <input id="name" type="text" class="w3-input w3-border" name="name" value="<?php echo e(old('name')); ?>" autofocus>

        <?php if($errors->has('name')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('name')); ?></strong>
            </span>
        <?php endif; ?>   
    </div>

    
                           
    <div class="w3-input-group">                        
        <label for="email" class="w3-label w3-text-blue">E-Mail Address</label>
        <input id="email" type="email" class="w3-input w3-border" name="email" value="<?php echo e(old('email')); ?>">

        <?php if($errors->has('email')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('email')); ?></strong>
            </span>
        <?php endif; ?>
    </div>

    
    
    <div class="w3-input-group">                          
        <label for="password" class="w3-label w3-text-blue">Password</label>
        <input id="password" type="password" class="w3-input w3-border" name="password">

        <?php if($errors->has('password')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('password')); ?></strong>
            </span>
        <?php endif; ?>
    </div>


    
    <div class="w3-input-group">                            
        <label for="password-confirm" class="w3-label w3-text-blue">Confirm Password</label>
        <input id="password-confirm" type="password" class="w3-input w3-border" name="password_confirmation">

        <?php if($errors->has('password_confirmation')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
        </span>
        <?php endif; ?>
    </div>

    

    <div class="w3-input-group">                      
    <button type="submit" class="btn btn-primary">Register</button>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>