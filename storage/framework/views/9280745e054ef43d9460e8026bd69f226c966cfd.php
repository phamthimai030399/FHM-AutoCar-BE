<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        $image = $block->image != '' ? $block->image : null;
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $button = $block->json_params->button ?? $block->button;
        $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
        
        // $image_for_screen = null;
        // if ($agent->isDesktop() && $image_background != null) {
        //     $image_for_screen = $image_background;
        // } else {
        //     $image_for_screen = $image;
        // }
    ?>
    <style>
        .banner {
            background: url(<?php echo e($image_background); ?>) no-repeat center center;
            background-size: cover;
        }

        @media (min-width: 768px) {
            .banner {
                background: url(<?php echo e($image); ?>) no-repeat center center;
            }
        }
    </style>
    <div class="banner">
        <div class="container">
            <div class="banner-content">
                <a href="" class="btn-best-price text-uppercase text-center"><?php echo e($url_link_title); ?></a>
                <div class="mt-3 service">
                    <?php echo e($brief); ?>

                </div>
                <p class="mt-3">
                    <?php echo e($content); ?>

                </p>
                <a href=""
                    class="btn-shop-now text-uppercase text-center mt-md-4 mt-3 d-inline-flex"><?php echo e($button); ?></a>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH D:\FHM\FHM-AutoCar-BE\resources\views/frontend/blocks/banner/styles/banner_image.blade.php ENDPATH**/ ?>