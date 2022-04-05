<!DOCTYPE html>
<html lang="zxx">
<!-- head -->
<?php echo $__env->make('includes.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body>
    <!--Page Lorder --> 
    <?php echo $__env->make('includes.pageLorder', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Header Section Begin -->
    <?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <?php echo $__env->make('includes.heroSection', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- Hero Section End -->
    
    <?php echo $__env->yieldContent('content'); ?>

    <!-- Footer Section Begin -->
    <?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>