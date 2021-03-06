<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php echo $__env->make('admin.includes.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <?php echo $__env->make('admin.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        
        <?php echo $__env->make('admin.includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <?php echo $__env->yieldContent('content'); ?>
        </div>

    </div>
    <script src="<?php echo e(URL::asset('admin/assets/libs/jquery/dist/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('admin/assets/libs/popper.js/dist/umd/popper.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('admin/assets/libs/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('admin/dist/js/app-style-switcher.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('admin/dist/js/feather.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('admin/dist/js/sidebarmenu.js')); ?>"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo e(URL::asset('admin/dist/js/custom.min.js')); ?>"></script>
    <!--This page JavaScript -->
    <script src="<?php echo e(URL::asset('admin/assets/extra-libs/c3/d3.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('admin/assets/extra-libs/c3/c3.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('admin/assets/libs/chartist/dist/chartist.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('admin/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('admin/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('admin/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('admin/dist/js/pages/dashboards/dashboard1.min.js')); ?>"></script>
</body>
</html>