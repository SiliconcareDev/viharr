
<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('dist/frontend/module/car/css/car.css?_ver='.config('app.asset_version'))); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css")); ?>"/>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="bravo_search_car">
        <div class="bravo_banner" <?php if($bg = setting_item("car_page_search_banner")): ?> style="background-image: url(<?php echo e(get_file_url($bg,'full')); ?>)" <?php endif; ?> >
            <div class="container">
                <h1>
                    <?php echo e(setting_item_with_lang("car_page_search_title")); ?>

                </h1>
            </div>
        </div>
        <div class="bravo_form_search">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <?php echo $__env->make('Car::frontend.layouts.search.form-search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <?php echo $__env->make('Car::frontend.layouts.search.list-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script type="text/javascript" src="<?php echo e(asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('module/car/js/car.js?_ver='.config('app.asset_version'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u603013329/domains/viharr.com/public_html/themes/BC/Car/Views/frontend/search.blade.php ENDPATH**/ ?>