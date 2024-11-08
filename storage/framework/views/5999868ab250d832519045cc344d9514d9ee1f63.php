<?php
    $terms_ids = $row->terms->pluck('term_id');
    $attributes = \Modules\Core\Models\Terms::getTermsById($terms_ids);
?>
<?php if(!empty($terms_ids) and !empty($attributes)): ?>
    <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $translate_attribute = $attribute['parent']->translate() ?>
        <?php if(empty($attribute['parent']['hide_in_single'])): ?>
            <div class="g-attributes <?php echo e($attribute['parent']->slug); ?> attr-<?php echo e($attribute['parent']->id); ?>">
                <h3><?php echo e($translate_attribute->name); ?></h3>
                <?php $terms = $attribute['child'] ?>
                <div class="list-attributes">
                    <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $translate_term = $term->translate() ?>
                        <div class="item <?php echo e($term->slug); ?> term-<?php echo e($term->id); ?>">
                            <?php if(!empty($term->image_id)): ?>
                                <?php $image_url = get_file_url($term->image_id, 'full'); ?>
                                <img src="<?php echo e($image_url); ?>" class="img-responsive" alt="<?php echo e($translate_term->name); ?>">
                            <?php else: ?>
                                <i class="<?php echo e($term->icon ?? "icofont-check-circled icon-default"); ?>"></i>
                            <?php endif; ?>
                            <?php echo e($translate_term->name); ?>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<div class="g-attributes">
    <h3><?php echo e(__("Rules")); ?></h3>
    <div class="description">

        <div class="row">
            <div class="col-lg-4">
                <div class="key"><?php echo e(__("Check In")); ?></div>
            </div>
            <div class="col-lg-8">
                <div class="value"> <?php echo e($row->check_in_time); ?> </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-4">
                <div class="key"><?php echo e(__("Check Out")); ?></div>
            </div>
            <div class="col-lg-8">
                <div class="value"> <?php echo e($row->check_out_time); ?> </div>
            </div>
        </div>
        <?php if($translation->policy): ?>
        <div class="row">
            <div class="col-lg-4">
                <div class="key"><?php echo e(__("Hotel Policies")); ?></div>
            </div>
            <div class="col-lg-8">
                <?php $__currentLoopData = $translation->policy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item <?php if($key > 1): ?> d-none <?php endif; ?>">
                    <div class="strong"><?php echo e($item['title']); ?></div>
                    <div class="context"><?php echo $item['content']; ?></div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if( count($translation->policy) > 2): ?>
                <div class="btn-show-all">
                    <span class="text"><?php echo e(__("Show All")); ?></span>
                    <i class="fa fa-caret-down"></i>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/u603013329/domains/viharr.com/public_html/themes/BC/Hotel/Views/frontend/layouts/details/hotel-attributes.blade.php ENDPATH**/ ?>