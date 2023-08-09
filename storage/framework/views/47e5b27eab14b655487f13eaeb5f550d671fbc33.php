<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
        
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    ?>

    <section class="slide_content mt_page_title">
        <div class="container">
            <div class="box_title text-center mb-3 mb-lg-5">
                <h2 class="title text-uppercase"><?php echo e($title); ?></h2>
                <p class="bref">
                    <?php echo $brief; ?>

                </p>
            </div>
            <div class="d-flex flex-wrap">
                <div class="col-4 d-none d-md-block">
                    <div class="img bf_img position-relative">
                        <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" />
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="slick_content">
                        <?php if($block_childs): ?>
                            <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $title_child = $item->json_params->title->{$locale} ?? $item->title;
                                    $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                                    $content_child = $item->json_params->content->{$locale} ?? $item->content;
                                    $image_child = $item->image != '' ? $item->image : null;
                                    $url_link = $item->url_link != '' ? $item->url_link : 'javascript:void(0)';
                                    $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                                    $icon = $item->icon != '' ? $item->icon : '';
                                    $style = $item->json_params->style ?? '';
                                ?>
                                <div class="items_content">
                                    <p class="icon">
                                        <i class="fas fa-quote-left fa-lg" style="color: #a9a9a7"></i>
                                    </p>
                                    <p class="name mt-2"><?php echo e($title_child); ?></p>
                                    <p class="bref mt-3">
                                        <?php echo $brief_child; ?>

                                    </p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>



                    </div>
                </div>
                <div class="col-4 d-none d-md-block">
                    <div class="img p-4">
                        <img src="<?php echo e($image_background); ?>" alt="<?php echo e($title); ?>" />
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\yoga\resources\views/frontend/blocks/custom/styles/about_vision.blade.php ENDPATH**/ ?>