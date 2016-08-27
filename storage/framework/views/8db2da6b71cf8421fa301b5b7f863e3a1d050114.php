<?php $__env->startSection('title', 'Edit Store'); ?>

<?php $__env->startSection('content'); ?>
<form class="w3-container" method="POST" action="<?php echo e(url('/edit')); ?>">
	<?php echo e(csrf_field()); ?>

	<input type="hidden" name="_method" value="PUT">
    <div class="w3-input-group">
        <label for="name" class="w3-label w3-text-blue">Store Name</label>
        <input type="text" class="w3-input w3-border" name="name" value="<?php echo e($store->name); ?>"autofocus >  
    </div>
                          
    <div class="w3-input-group">                        
        <label for="email" class="w3-label w3-text-blue">Store Tel</label>
        <input type="text" class="w3-input w3-border" name="tel" value="<?php echo e($store->tel); ?>" >
    </div>
    
    <div class="w3-input-group">                          
        <label for="password" class="w3-label w3-text-blue">Store Address</label>
        <input type="text" class="w3-input w3-border" name="addr" value="<?php echo e($store->addr); ?>" >
    </div class="w3-input-group">
    
    <input type="hidden" name="id" value="<?php echo e($store->id); ?>">   

    <div class="w3-input-group">                      
	    <button class="w3-btn w3-blue">Edit</button>
	    <button class="w3-btn w3-red" onclick="event.preventDefault();document.getElementById('delete-form').submit();">Delete</button>
    </div>
</form>

<form id="delete-form" action="<?php echo e(url('/store')); ?>" method="POST" style="display: none;"><?php echo e(csrf_field()); ?>

<input type="hidden" name="_method" value="DELETE">
<input type="hidden" name="id" value="<?php echo e($store->id); ?>">

</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>