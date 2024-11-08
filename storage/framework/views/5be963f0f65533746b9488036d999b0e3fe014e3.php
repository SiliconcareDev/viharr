<?php if(count($hotel_related) > 0): ?>
    <div class="bravo-list-hotel-related-widget container py-4">
        <h3 class="heading text-center mb-4"><?php echo e(__("Related Hotels")); ?></h3>

        <div id="hotelCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php $__currentLoopData = $hotel_related->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="carousel-item <?php if($key == 0): ?> active <?php endif; ?>">
                        <div class="row">
                            <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $translation_item = $item->translate();
                                ?>
                                <div class="col-md-4">
                                    <div class="card mb-3" style="min-height: 100%;">
                                        <a href="<?php echo e($item->getDetailUrl(false)); ?>">
                                            <?php if($item->image_url): ?>
                                                <img src="<?php echo e($item->image_url); ?>" class="card-img-top" alt="<?php echo e($translation_item->title); ?>" style="height: 200px; object-fit: cover;">
                                            <?php endif; ?>
                                        </a>
                                        <div class="card-body d-flex flex-column">
                                            <?php if($item->star_rate): ?>
                                                <div class="star-rate mb-2">
                                                    <?php for($star = 1 ;$star <= $item->star_rate ; $star++): ?>
                                                        <i class="fa fa-star text-warning"></i>
                                                    <?php endfor; ?>
                                                </div>
                                            <?php endif; ?>
                                            <h5 class="card-title">
                                                <a href="<?php echo e($item->getDetailUrl(false)); ?>" class="text-dark">
                                                    <?php echo e($translation_item->title); ?>

                                                </a>
                                            </h5>
                                            <div class="price-wrapper mt-auto">
                                                <?php echo e(__("From")); ?>

                                                <span class="text-success font-weight-bold"><?php echo e($item->display_price); ?></span>
                                                <span><?php echo e(__("/night")); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Carousel controls -->
            <a class="carousel-control-prev" href="#hotelCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#hotelCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/u603013329/domains/viharr.com/public_html/themes/BC/Hotel/Views/frontend/layouts/details/hotel-related-list.blade.php ENDPATH**/ ?>