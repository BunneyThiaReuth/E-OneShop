    
    <?php $__env->startSection('content'); ?>
        <!-- Categories Section Begin -->
        <?php echo $__env->make('includes.CategorySection', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- Categories Section End -->

        <!-- Featured Section Begin -->
        <?php echo $__env->make('includes.FeaturdSection', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
        <!-- Featured Section End -->

        <!-- Banner Begin -->
        <?php echo $__env->make('includes.banner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- Banner End -->

        <!-- Latest Product Section Begin -->
        <?php echo $__env->make('includes.lastPro', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- Latest Product Section End -->

        <!-- Blog Section Begin -->
        <?php echo $__env->make('includes.bloge', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- Blog Section End -->
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>