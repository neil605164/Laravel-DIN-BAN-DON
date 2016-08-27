<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-blue.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <title><?php echo $__env->yieldContent('title'); ?></title>
</head>
<body style="max-width:400px">
    <div style="height: 90px">
    </div>
    <header class="w3-container w3-card-4 w3-theme w3-top">
        <h1><i class="fa fa-bars w3-closenav" onclick="w3_open()"></i> <?php echo $__env->yieldContent('title'); ?></h1>
    </header>
    
    <nav class="w3-sidenav w3-card-2 w3-white w3-top" style="width:30%;display:none" id='mySidenav' >
        <div class="w3-theme-l2">
            <a href="javascript:void(0)" onclick="w3_close()" class="w3-closenav w3-right w3-xlarge">X</a>
                <div class="w3-padding-large w3-center">
                    <?php echo e(Auth::guest() ? 'guest' : Auth::user()->name); ?>

                </div>
        </div>
        <br>
        <a href="<?php echo e(url('/')); ?>">Home</a>
        <a href="<?php echo e(url('/store')); ?>">store</a>
        <a href="#">Messages</a>
        <?php if(Auth::guest()): ?>
        <a href="<?php echo e(url('/login')); ?>">login</a>
        <a href="<?php echo e(url('/register')); ?>">Register</a>
        <?php else: ?>
        <a href="<?php echo e(url('/logout')); ?>"onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>

        <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;"><?php echo e(csrf_field()); ?>

        </form>
        <?php endif; ?>
    </nav>

    <script>
    function w3_open() {
        document.getElementById("mySidenav").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidenav").style.display = "none";
    }
    </script>

    <?php echo $__env->yieldContent('content'); ?>  
    <div style="height:60px">
    </div>

    <footer class="w3-container w3-theme w3-bottom">
        <h3>Footer</h3>
    </footer>
</body>
</html>