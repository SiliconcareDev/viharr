<?php if(!empty($style) and $style == "carousel" and !empty($list_slider)): ?>
<div class="effect">
    <div class="owl-carousel">
        <?php $__currentLoopData = $list_slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $img = get_file_url($item['bg_image'],'full') ?>
        <div class="item">
            <div class="item-bg" style="background-image: linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)),url('<?php echo e($img); ?>') !important"></div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php endif; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="text-heading text-center"><?php echo e($title); ?></h1>
            <div class="sub-heading text-center"><?php echo e($sub_title); ?></div>
            <?php if(empty($hide_form_search)): ?>
            <div class="g-form-control">
                <div class="card position-relative">
                    <div class="card-body">
                        <div class="d-md-none">
                            <!-- Mobile View (Vertical Tabs) -->
                            <div class="list-group" role="tablist">
                                <?php if(!empty($service_types)): ?>
                                <?php $number = 0; ?>
                                <?php $__currentLoopData = $service_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                $allServices = get_bookable_services();
                                if(empty($allServices[$service_type])) continue;
                                $module = new $allServices[$service_type];
                                ?>
                                <a href="#bravo_<?php echo e($service_type); ?>" class="list-group-item list-group-item-action <?php if($number == 0): ?> active <?php endif; ?>" aria-controls="bravo_<?php echo e($service_type); ?>" role="tab" data-toggle="tab">
                                    <i class="<?php echo e($module->getServiceIconFeatured()); ?>"></i>
                                    <?php echo e($service_type == 'space' 
                                    ? 'Homestays & Villas' 
                                    : (!empty($modelBlock["title_for_".$service_type]) ? $modelBlock["title_for_".$service_type] : $module->getModelName())); ?>

                                </a>
                                <?php $number++; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="d-none d-md-block">
                            <!-- Desktop View (Horizontal Tabs) -->
                            <ul class="nav nav-tabs justify-content-center position-absolute w-100" role="tablist" style="top: -75px;">
                                <?php if(!empty($service_types)): ?>
                                <?php $number = 0; ?>
                                <?php $__currentLoopData = $service_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                $allServices = get_bookable_services();
                                if(empty($allServices[$service_type])) continue;
                                $module = new $allServices[$service_type];
                                ?>
                                <li class="nav-item" role="presentation">
                                    <a href="#bravo_<?php echo e($service_type); ?>" class="nav-link <?php if($number == 0): ?> active <?php endif; ?> border rounded-pill" aria-controls="bravo_<?php echo e($service_type); ?>" role="tab" data-toggle="tab" style="font-size: 0.75rem; padding: 1rem 2rem;">
                                        <i class="<?php echo e($module->getServiceIconFeatured()); ?>"></i>
                                        <?php echo e($service_type == 'space' 
                                        ? 'Homestays & Villas' 
                                        : (!empty($modelBlock["title_for_".$service_type]) ? $modelBlock["title_for_".$service_type] : $module->getModelName())); ?>

                                    </a>
                                </li>
                                <?php $number++; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <div class="tab-content text-center mt-4">
                            <?php if(!empty($service_types)): ?>
                            <?php $number = 0; ?>
                            <?php $__currentLoopData = $service_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $allServices = get_bookable_services();
                            if(empty($allServices[$service_type])) continue;
                            $module = new $allServices[$service_type];
                            ?>
                            <div role="tabpanel" class="tab-pane fade <?php if($number == 0): ?> show active <?php endif; ?>" id="bravo_<?php echo e($service_type); ?>">
                                <?php echo $__env->make(ucfirst($service_type).'::frontend.layouts.search.form-search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <?php $number++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
                $(document).ready(function() {
                    // Hide specific menu items by matching text
                    $('.nav-link:contains("Tour")').parent().hide(); // Hides 'Tours'
                    $('.nav-link:contains("Homestays & Villas")').parent().hide(); // Hides 'Homestays & Villas'
                    $('.nav-link:contains("Car")').parent().hide(); // Hides 'Car'

                    // Also hide in the mobile view
                    $('.list-group-item:contains("Tour")').hide();
                    $('.list-group-item:contains("Homestays & Villas")').hide();
                    $('.list-group-item:contains("Car")').hide();
                });
            </script>


            <?php endif; ?>
        </div>
    </div>
</div><?php /**PATH /home/u603013329/domains/viharr.com/public_html/themes/Base/Template/Views/frontend/blocks/form-search-all-service/style-normal.blade.php ENDPATH**/ ?>