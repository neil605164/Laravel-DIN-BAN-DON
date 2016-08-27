<?php $__env->startSection('title', 'Store'); ?>

<?php $__env->startSection('content'); ?>

<p><?php echo e($message); ?></p>
<a href="<?php echo e(url('/add')); ?>" style="text-decoration:none; position: fixed; top: 52px; right: 50px;" class="w3-btn-floating w3-teal w3-right ">+</a>
<?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $store): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
<div class="w3-panel w3-leftbar <?php echo e($class[ $index%4 ]); ?>">

    <ul class="w3-ul w3-border">
      <li><a href="/edit/<?php echo e($store->id); ?>" style="text-decoration:none;" ><h2 class='w3-text-theme w3-hover-text-amber  '><?php echo e($store->name); ?></h2></a></li>
      <li>Tel:<?php echo e($store->tel); ?></li>
      <li>addr:<?php echo e($store->addr); ?></li>
      <li>type:<?php echo e($store->type); ?></li>
    </ul>

    <ul class="w3-ul w3-border">
      <li><a href="/addMenu/<?php echo e($store->id); ?>" style="text-decoration:none;" ><h3 class='w3-text-theme w3-hover-text-amber'>Menu</h3></a></li>
      <?php $__currentLoopData = $store->menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
      <li><?php echo e($menu->name); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </ul>

</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>