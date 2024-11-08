<div class="row">
    <div class="col-lg-3 col-md-12">
        <?php echo $__env->make('Event::frontend.layouts.search.filter-search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="col-lg-9 col-md-12">
        <div class="bravo-list-item">
            <div class="topbar-search">
                <h2 class="text">
                    <?php if($rows->total() > 1): ?>
                        <?php echo e(__(":count events found",['count'=>$rows->total()])); ?>

                    <?php else: ?>
                        <?php echo e(__(":count event found",['count'=>$rows->total()])); ?>

                    <?php endif; ?>
                </h2>
                <div class="control">
                    <?php echo $__env->make('Event::frontend.layouts.search.orderby', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <div class="list-item">
                <div class="row">
                    <?php if($rows->total() > 0): ?>
                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-6">
                                <?php echo $__env->make('Event::frontend.layouts.search.loop-grid', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="col-lg-12">
                            <?php echo e(__("Event not found")); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="bravo-pagination">
                <?php echo e($rows->appends(request()->query())->links()); ?>

                <?php if($rows->total() > 0): ?>
                    <span class="count-string"><?php echo e(__("Showing :from - :to of :total Events",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()])); ?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/u603013329/domains/clubsilicon.in/public_html/themes/BC/Event/Views/frontend/layouts/search/list-item.blade.php ENDPATH**/ ?>