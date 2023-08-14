<?php if($block): ?>
    <?php
        
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $icon = $block->icon != '' ? $block->icon : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $image_for_screen = null;
        if ($agent->isDesktop() && $image_background != null) {
            $image_for_screen = $image_background;
        } else {
            $image_for_screen = $image;
        }
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
        $block_icon = $block_childs->filter(function ($items, $key) {
            return $items->icon != null;
        });
        $block_icon = $block_childs->filter(function ($items, $key) {
            return $items->icon != null;
        });
        $block_content = $block_childs->filter(function ($items, $key) {
            return $items->icon == null;
        });
        
    ?>

    <div class="our-testimonial">
        <div class="container">
            <div class="d-flex flex-column our-testimonial-title">
                <div class="text-center our-testimonial-title-bottom">
                    <span><?php echo e($title); ?></span>
                    <p><?php echo e($brief); ?></p>
                </div>
                <div id="peopleSayingCarousel" class="carousel slide mt-5" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <?php if($block_content): ?>
                            <?php $__currentLoopData = $block_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $title_child = $item->json_params->title->{$locale} ?? $item->title;
                                    $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                                    $content_child = $item->json_params->content->{$locale} ?? $item->content;
                                    $image_child = $item->image != '' ? $item->image : null;
                                    $url_link = $item->url_link != '' ? $item->url_link : 'javascript:void(0)';
                                    $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                                    $icon_child = $item->icon != '' ? $item->icon : '';
                                    $style = $item->json_params->style ?? '';
                                ?>
                                <div class="carousel-item active">
                                    <div class="col-4 text-center d-flex align-items-center flex-column px-5">
                                        <div>
                                            <h3 class="title"><?php echo e($title_child); ?></h3>
                                            <p>
                                                <?php echo e($brief_child); ?>

                                            </p>
                                        </div>
                                        <div class="mt-auto">
                                            <div class="star">
                                                <?php echo $icon; ?>

                                                <?php echo $icon; ?>

                                                <?php echo $icon; ?>

                                                <?php echo $icon; ?>

                                                <?php echo $icon; ?>

                                            </div>
                                            <img src="<?php echo e($image_child); ?>" alt=""
                                                class="rounded-circle avatar" />
                                            <div class="person-name"><?php echo e($url_link); ?></div>
                                            <div class="person-description">
                                                <?php echo e($url_link_title); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                    <a class="carousel-control-prev bg-white w-aut" href="#peopleSayingCarousel" role="button"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next bg-white w-aut" href="#peopleSayingCarousel" role="button"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
                <div class="our-testimonial-partner d-flex justify-content-between">
                    <?php if($block_icon): ?>
                        <?php $__currentLoopData = $block_icon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $icon_child = $item->icon != '' ? $item->icon : '';
                            ?>
                            <div class="our-testimonial-partner-img">
                                <?php echo $icon_child; ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH D:\FHM\FHM-AutoCar-BE\resources\views/frontend/blocks/custom/styles/our_testimonials.blade.php ENDPATH**/ ?>