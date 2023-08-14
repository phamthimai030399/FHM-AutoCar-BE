<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 mt-3">
                <span class="title">Contact Us</span>
                <div class="footer-content">
                    <?php if(isset($web_information->information->address)): ?>
                        <p>Address: <?php echo e($web_information->information->address ?? ''); ?></p>
                    <?php endif; ?>
                    <?php if(isset($web_information->information->phone)): ?>
                        <p>Phone: <?php echo e($web_information->information->phone ?? ''); ?></p>
                    <?php endif; ?>
                    <?php if(isset($web_information->information->email)): ?>
                        <p>Email: <?php echo e($web_information->information->email ?? ''); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php if(isset($menu)): ?>
                <?php
                    
                    $footer_menu = $menu->filter(function ($item, $key) {
                        return $item->menu_type == 'footer' && ($item->parent_id == null || $item->parent_id == 0);
                    });
                ?>
                <?php $__currentLoopData = $footer_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $main_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $url = $title = '';
                        $title = isset($main_menu->json_params->title->{$locale}) && $main_menu->json_params->title->{$locale} != '' ? $main_menu->json_params->title->{$locale} : $main_menu->name;
                        $iorder = isset($main_menu->json_params->iorder) && $main_menu->json_params->iorder != '' ? $main_menu->json_params->iorder : $main_menu->iorder;
                    ?>
                    <?php if($iorder <= 3): ?>
                        <div class="col-12 col-md-3 mt-3">
                            <div class="block block-menu">
                                <span class="title"><?php echo e($title); ?></span>
                                <div class="footer-content column-md-2">
                                    <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item->parent_id == $main_menu->id): ?>
                                            <?php
                                                $title = isset($item->json_params->title->{$locale}) && $item->json_params->title->{$locale} != '' ? $item->json_params->title->{$locale} : $item->name;
                                            ?>
                                            <a href=""><?php echo e($title); ?></a>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="col-12 col-md-2 mt-3 text-center text-md-start">
                            <span class="title">Follow Us on</span>
                            <div class="footer-content box-icon">
                                <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($item->parent_id == $main_menu->id): ?>
                                        <?php
                                            $title = isset($item->json_params->title->{$locale}) && $item->json_params->title->{$locale} != '' ? $item->json_params->title->{$locale} : $item->name;
                                            $icon = isset($item->json_params->icon) && $item->json_params->icon != '' ? $item->json_params->icon : '';
                                        ?>
                                        <?php echo $icon; ?>

                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <div class="footer-bottom d-flex justify-content-between">
            <span>2023 © Copyright of FHM Vietnam. All Right Reserved.</span>
            <span>Powered & Designed by FHMVietnam.com</span>
        </div>
    </div>
</footer>
<?php /**PATH D:\FHM\FHM-AutoCar-BE\resources\views/frontend/blocks/footer/styles/default.blade.php ENDPATH**/ ?>