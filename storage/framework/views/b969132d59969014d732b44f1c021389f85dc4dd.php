<?php $__env->startSection('title', 'Store Information'); ?>

<?php $__env->startSection('content'); ?>
<form class="w3-container" method="POST" action="<?php echo e(url('/addStore')); ?>">
	<?php echo e(csrf_field()); ?>

    <div class="w3-input-group">
        <label for="name" class="w3-label w3-text-blue">Store Name</label>
        <input type="text" class="w3-input w3-border" name="name" autofocus>  
    </div>
                          
    <div class="w3-input-group">                        
        <label for="email" class="w3-label w3-text-blue">Store Tel</label>
        <input type="text" class="w3-input w3-border" name="tel" >
    </div>
    
    <div class="w3-input-group">                          
        <label for="password" class="w3-label w3-text-blue">Store Address</label>
        <input type="text" class="w3-input w3-border" name="addr">
    </div class="w3-input-group">

    <div>
    	<?php $types=['aa','bb','cc','dd']; ?>
    	<?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    	<input class="w3-check" type="checkbox" name="types[]" value="<?php echo e($type); ?>">
		<label class="w3-validate"><?php echo e($type); ?></label>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </div>
        

    <div class="w3-input-group">                      
    <button class="w3-btn w3-blue">Register</button>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>