<?php $__env->startSection('title', 'Menu Information'); ?>

<?php $__env->startSection('content'); ?>
<form class="w3-container" method="POST" action="<?php echo e(url('/addMenu')); ?>">
	<?php echo e(csrf_field()); ?>

    <div class="w3-input-group">
        <label for="name" class="w3-label w3-text-blue">Menu Name</label>
        <input type="text" class="w3-input w3-border" name="name" autofocus>  
    </div>
                          
    <div class="w3-input-group">                        
        <label for="email" class="w3-label w3-text-blue">Menu Price</label>
        <input type="text" class="w3-input w3-border" name="price" >
    </div>
    
    <input type="hidden" name="id" value="<?php echo e($store_id); ?>">    

    <div class="w3-input-group">                      
    <button class="w3-btn w3-blue">add Menu</button>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>