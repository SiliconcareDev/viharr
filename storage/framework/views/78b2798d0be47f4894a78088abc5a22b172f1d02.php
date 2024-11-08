<form action="<?php echo e(url( app_get_locale(false,false,'/').config('hotel.hotel_route_prefix') )); ?>" class="form bravo_form d-flex justify-content-start" method="get" onsubmit="return false;">
    <?php $hotel_map_search_fields = setting_item_array('hotel_map_search_fields');

    $hotel_map_search_fields = array_values(\Illuminate\Support\Arr::sort($hotel_map_search_fields, function ($value) {
        return $value['position'] ?? 0;
    }));

    ?>
    <?php if(!empty($hotel_map_search_fields)): ?>
        <?php $__currentLoopData = $hotel_map_search_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php switch($field['field']):
                case ('location'): ?>
                    <?php echo $__env->make('Hotel::frontend.layouts.search-map.fields.location', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php break; ?>
                <?php case ('attr'): ?>
                    <?php echo $__env->make('Hotel::frontend.layouts.search-map.fields.attr', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php break; ?>
                <?php case ('date'): ?>
                    <?php echo $__env->make('Hotel::frontend.layouts.search-map.fields.date', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php break; ?>
                <?php case ('price'): ?>
                    <?php echo $__env->make('Hotel::frontend.layouts.search-map.fields.price', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php break; ?>
                <?php case ('advance'): ?>
                    <div class="filter-item filter-simple">
                        <div class="form-group">
                            <span class="filter-title toggle-advance-filter" data-target="#advance_filters"><?php echo e(__('More filters')); ?> <i class="fa fa-angle-down"></i></span>
                        </div>
                    </div>
                <?php break; ?>

            <?php endswitch; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>



</form>
<?php /**PATH /home/u603013329/domains/clubsilicon.in/public_html/themes/BC/Hotel/Views/frontend/layouts/search-map/form-search-map.blade.php ENDPATH**/ ?>