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
                        <?php if($block_childs): ?>
                            <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $title_child = $item->json_params->title->{$locale} ?? $item->title;
                                    $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                                    $content_child = $item->json_params->content->{$locale} ?? $item->content;
                                    $image_child = $item->image != '' ? $item->image : null;
                                    $url_link = $item->url_link != '' ? $item->url_link : 'javascript:void(0)';
                                    $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                                    $icon_chil = $item->icon != '' ? $item->icon : '';
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
                    <div class="our-testimonial-partner-img">
                        <svg xmlns="http://www.w3.org/2000/svg" width="189" height="36" viewBox="0 0 189 36" fill="none">
                            <path d="M178.412 30.5269C178.412 27.7904 180.639 25.5703 183.381 25.5703C186.124 25.5703 188.348 27.7904 188.348 30.5269C188.348 33.2633 186.124 35.4822 183.381 35.4822C180.639 35.4822 178.412 33.2633 178.412 30.5269Z" fill="#C3C3C3"/>
                            <path d="M19.9542 17.4C19.9542 14.2607 19.346 11.9315 18.1295 10.4142C16.9119 8.898 15.0673 8.14073 12.5873 8.14073H9.94918V27.3391H11.9677C14.7224 27.3391 16.7409 26.5246 18.0261 24.8895C19.31 23.2576 19.9542 20.7606 19.9542 17.4ZM29.3622 17.073C29.3622 22.7928 27.8209 27.2002 24.7386 30.2937C21.6563 33.3886 17.323 34.9361 11.7376 34.9361H0.884644V0.663036H12.4952C17.8809 0.663036 22.0387 2.07012 24.9684 4.88259C27.8973 7.69655 29.3622 11.758 29.3622 17.073ZM59.425 34.9357H68.0612V0.519267H59.425V34.9357ZM80.1932 22.0982C80.1932 24.2925 80.4808 25.9662 81.0546 27.1164C81.6295 28.2682 82.5926 28.8433 83.947 28.8433C85.2868 28.8433 86.2345 28.2682 86.7864 27.1164C87.3385 25.9662 87.613 24.2925 87.613 22.0982C87.613 19.9153 87.3341 18.2688 86.775 17.1572C86.2142 16.043 85.2583 15.485 83.9026 15.485C82.577 15.485 81.6297 16.0402 81.0546 17.1444C80.4808 18.2502 80.1932 19.9009 80.1932 22.0982ZM96.4031 22.0982C96.4031 26.2789 95.3047 29.5402 93.1021 31.8781C90.9013 34.2172 87.82 35.3877 83.8594 35.3877C80.061 35.3877 77.0375 34.1915 74.7934 31.7991C72.5464 29.407 71.4235 26.1742 71.4235 22.0982C71.4235 17.9303 72.5233 14.6918 74.7259 12.3827C76.9283 10.0737 80.0165 8.91911 83.993 8.91911C86.4499 8.91911 88.6237 9.45408 90.5072 10.5227C92.3919 11.591 93.8469 13.1216 94.869 15.1149C95.8926 17.1057 96.4031 19.4348 96.4031 22.0982ZM99.8327 34.9359H108.47V9.37111H99.8327V34.9359ZM99.8325 6.27891H108.47V0.517578H99.8325V6.27891ZM125.969 28.4154C127.135 28.4154 128.524 28.1198 130.145 27.5333V33.9656C128.98 34.4763 127.873 34.8419 126.821 35.0585C125.768 35.2781 124.533 35.387 123.12 35.387C120.22 35.387 118.13 34.66 116.846 33.2083C115.568 31.7569 114.927 29.5282 114.927 26.5206V15.9822H111.902V9.37322H114.927V2.8447L123.631 1.33459V9.37322H129.141V15.9822H123.63V25.9327C123.63 27.5878 124.411 28.4154 125.969 28.4154ZM145.96 28.4154C147.126 28.4154 148.515 28.1198 150.135 27.5333V33.9656C148.972 34.4763 147.864 34.8419 146.811 35.0585C145.757 35.2781 144.527 35.387 143.11 35.387C140.211 35.387 138.12 34.66 136.839 33.2083C135.558 31.7569 134.917 29.5282 134.917 26.5206V15.9822H131.891V9.37322H134.917V2.74569L143.619 1.33459V9.37322H149.133V15.9822H143.619V25.9327C143.619 27.5878 144.4 28.4154 145.96 28.4154ZM161.034 18.9838C161.151 17.5841 161.552 16.5585 162.237 15.903C162.924 15.249 163.772 14.9222 164.787 14.9222C165.894 14.9222 166.774 15.2893 167.427 16.0293C168.084 16.765 168.426 17.7503 168.453 18.9838H161.034ZM173.213 11.9332C171.16 9.92529 168.248 8.91996 164.48 8.91996C160.519 8.91996 157.471 10.0745 155.335 12.3835C153.199 14.6927 152.131 18.0055 152.131 22.3228C152.131 26.5033 153.286 29.7275 155.589 31.9906C157.894 34.2538 161.13 35.3868 165.298 35.3868C167.299 35.3868 169.021 35.2507 170.465 34.9794C171.899 34.7113 173.288 34.2265 174.635 33.5267L173.308 27.7654C172.329 28.1642 171.398 28.4711 170.518 28.6732C169.247 28.9672 167.852 29.115 166.334 29.115C164.669 29.115 163.355 28.7093 162.392 27.8973C161.429 27.0841 160.915 25.9626 160.857 24.5342H176.294V20.6088C176.294 16.8326 175.268 13.9396 173.213 11.9332ZM40.8246 18.9838C40.9425 17.5841 41.3435 16.5585 42.0279 15.903C42.7136 15.249 43.5633 14.9222 44.5797 14.9222C45.684 14.9222 46.5637 15.2893 47.218 16.0293C47.8749 16.765 48.2156 17.7503 48.2459 18.9838H40.8246ZM53.0058 11.9332C50.9515 9.92529 48.0402 8.91996 44.2707 8.91996C40.3083 8.91996 37.2619 10.0745 35.1271 12.3835C32.9922 14.6927 31.9224 18.0055 31.9224 22.3228C31.9224 26.5033 33.0756 29.7275 35.3814 31.9906C37.6848 34.2538 40.9209 35.3868 45.0887 35.3868C47.09 35.3868 48.8122 35.2507 50.2557 34.9794C51.6905 34.7113 53.0792 34.2265 54.4279 33.5267L53.0995 27.7654C52.1203 28.1642 51.1885 28.4711 50.3103 28.6732C49.0365 28.9672 47.6434 29.115 46.1252 29.115C44.4618 29.115 43.1464 28.7093 42.1833 27.8973C41.2185 27.0841 40.7068 25.9626 40.6477 24.5342H56.0855V20.6088C56.0855 16.8326 55.059 13.9396 53.006 11.9332" fill="#C3C3C3"/>
                          </svg>
                    </div>
                    <div class="our-testimonial-partner-img">
                        <svg xmlns="http://www.w3.org/2000/svg" width="230" height="48" viewBox="0 0 230 48" fill="none">
                        <path d="M131.799 29.4678L145.417 16.3518H132.004V10.1755H154.946V16.4531L141.326 29.5184H155.204V35.6947H131.804L131.799 29.4678ZM122.123 1.78209H129.218V8.13141H122.123V1.78209ZM122.027 10.2524H129.122V35.7716H122.027V10.2524ZM36.2193 22.9351C36.2477 15.641 42.2652 9.74803 49.6661 9.76668C57.0669 9.78527 63.0539 15.7085 63.0444 23.0025C63.035 30.2966 57.0328 36.2048 49.6319 36.2048C46.0641 36.21 42.6417 34.812 40.1238 32.3208C37.6058 29.8296 36.2004 26.4513 36.2193 22.9351ZM56.1557 22.9351C56.1557 19.3114 53.2554 16.2958 49.6319 16.2958C45.9553 16.2958 43.1579 19.3079 43.1579 22.935C43.1579 26.5622 45.9553 29.5743 49.6319 29.5743C53.2554 29.569 56.1574 26.5587 56.1574 22.935L56.1557 22.9351ZM95.0604 10.1755H102.105V13.0338C103.761 10.9373 106.298 9.66526 109.249 9.66526C115.362 9.66526 119.039 13.544 119.039 20.1274V35.6947H111.839V21.0464C111.839 17.6271 110.233 15.6301 107.076 15.6301C104.383 15.6301 102.157 17.4664 102.157 21.7452V35.6789H95.0657L95.0604 10.1755ZM155.609 22.9351C155.609 13.9005 162.345 9.65663 168.195 9.65663C171.563 9.65663 174.203 10.8797 175.91 12.6687V10.1755H183.001V35.6947H175.91V32.8363C174.203 34.8263 171.457 36.2048 168.092 36.2048C162.602 36.2048 155.609 31.9243 155.609 22.9351ZM176.114 22.8844C176.114 19.107 173.318 16.0443 169.486 16.0443C165.55 16.0443 162.547 18.9533 162.547 22.8844C162.547 26.8156 165.55 29.7735 169.486 29.7735C173.322 29.7735 176.117 26.6601 176.117 22.8845L176.114 22.8844ZM185.869 10.1755H192.913V13.0339C194.57 10.9373 197.107 9.66532 200.058 9.66532C206.169 9.66532 209.846 13.544 209.846 20.1274V35.6947H202.647V21.0464C202.647 17.6271 201.051 15.6301 197.883 15.6301C195.191 15.6301 192.964 17.4664 192.964 21.7452V35.6789H185.873L185.869 10.1755ZM131.799 35.6947V29.4678L145.417 16.3518H132.004V10.1755H154.946V16.4531L141.326 29.5184M28.6514 22.7132L28.554 22.9159C26.5951 26.985 22.9929 29.3193 18.6709 29.3193C12.4043 29.3193 7.50259 24.4377 7.50259 18.2073C7.50259 11.8178 12.3705 7.00093 18.8269 7.00093C23.0106 7.00093 26.1891 8.93151 28.2757 12.7421L28.3873 12.9448L34.7019 8.96652L34.5955 8.79183C31.3159 3.28643 25.4197 0 18.8269 0C8.29144 0 0.347778 7.82906 0.347778 18.2107C0.347778 28.7637 8.11949 36.4233 18.8269 36.4233C25.7282 36.4233 31.8247 32.6476 35.1362 26.3246L35.2355 26.1341L28.6514 22.7132ZM64.8315 22.9352C64.8315 13.9005 71.5679 9.65663 77.418 9.65663C80.7862 9.65663 83.424 11.0351 85.133 12.9221V10.1755H92.2239V34.9853C92.2239 42.1819 87.6148 48 78.8628 48C72.2859 48 67.4711 44.6297 65.3899 40.6497L71.6565 37.1798C73.0021 39.8337 75.3793 41.518 78.8539 41.518C82.6866 41.518 85.1188 38.5583 85.1188 35.2404V32.8364C83.4099 34.8263 80.6657 36.2048 77.301 36.2048C71.8214 36.2048 64.8315 31.9244 64.8315 22.9352ZM85.3369 22.8844C85.3369 19.107 82.5412 16.0443 78.7086 16.0443C74.773 16.0443 71.77 18.9533 71.77 22.8844C71.77 26.8156 74.773 29.7735 78.7086 29.7735C82.5412 29.7735 85.3369 26.66 85.3369 22.8844ZM227.318 16.4531V10.1755H222.45V1.75767H215.359V10.1755H210.954V16.4531H215.35V24.6194C215.35 32.9394 218.043 35.6947 226.277 35.6947H227.313V29.162C222.962 29.162 222.445 28.5488 222.445 24.5687V16.4531H227.318ZM228.823 4.80295C228.655 4.96967 228.455 5.10193 228.235 5.19215C228.015 5.28237 227.779 5.32878 227.541 5.32872C227.303 5.32879 227.067 5.28238 226.847 5.19216C226.628 5.10193 226.428 4.96967 226.26 4.80295C226.088 4.63874 225.953 4.4417 225.862 4.22389C225.77 4.00608 225.725 3.77209 225.728 3.53627C225.73 2.72902 226.281 2.02353 227.072 1.81601C227.864 1.60849 228.698 1.95072 229.107 2.65043C229.515 3.35015 229.396 4.23296 228.816 4.80295H228.823ZM226.44 2.45304C226.294 2.59388 226.178 2.76299 226.1 2.94992C226.022 3.13684 225.983 3.33761 225.987 3.53982C225.983 3.7427 226.022 3.94414 226.099 4.13207C226.176 4.32 226.291 4.49054 226.437 4.63346C226.581 4.77705 226.753 4.89096 226.943 4.96868C227.132 5.04639 227.335 5.08636 227.54 5.08631C227.954 5.08631 228.351 4.92329 228.642 4.63352C228.789 4.49125 228.905 4.32089 228.983 4.13284C229.061 3.94479 229.099 3.743 229.096 3.53976C229.101 2.91635 228.722 2.35214 228.138 2.11339C227.554 1.87458 226.881 2.00894 226.437 2.45304H226.44ZM227.504 2.55256C227.688 2.54325 227.871 2.56695 228.047 2.62252C228.145 2.66112 228.229 2.73035 228.284 2.81981C228.34 2.90927 228.365 3.01415 228.355 3.11872C228.36 3.19446 228.345 3.27022 228.311 3.33832C228.277 3.40641 228.226 3.46444 228.162 3.50653C228.073 3.55675 227.976 3.58884 227.875 3.60091C227.942 3.6075 228.007 3.62803 228.065 3.66114C228.124 3.69425 228.175 3.73922 228.215 3.7931C228.282 3.88018 228.32 3.98591 228.323 4.09539V4.38539C228.323 4.41971 228.329 4.45386 228.339 4.48675L228.351 4.51117H228.024C228.023 4.50478 228.023 4.49835 228.024 4.49195V4.25263C228.035 4.16803 228.024 4.08186 227.991 4.00295C227.958 3.92405 227.904 3.85525 227.836 3.80362C227.712 3.75258 227.579 3.73103 227.446 3.7407H227.169V4.51117H226.815V2.55262L227.504 2.55256ZM227.882 2.86012C227.748 2.80295 227.603 2.77839 227.458 2.78851H227.158V3.49784H227.476C227.589 3.5031 227.701 3.4883 227.809 3.45413C227.865 3.42958 227.913 3.39119 227.949 3.34271C227.985 3.29423 228.008 3.2373 228.015 3.17749C228.023 3.11767 228.014 3.057 227.991 3.00138C227.967 2.94577 227.93 2.8971 227.882 2.86012Z" fill="#C3C3C3"/>
                        </svg>
                    </div>
                    <div class="our-testimonial-partner-img">
                        <svg xmlns="http://www.w3.org/2000/svg" width="195" height="48" viewBox="0 0 195 48" fill="none">
                            <path d="M191.58 44.6545C191.699 44.6557 191.818 44.6323 191.927 44.586C192.037 44.5396 192.136 44.4711 192.219 44.3849C192.301 44.2986 192.365 44.1963 192.406 44.0844C192.447 43.9725 192.464 43.8534 192.458 43.7344C192.458 43.0818 192.064 42.77 191.256 42.77H189.951V46.1865H190.442V44.6972H191.045L191.059 44.7154L191.995 46.1865H192.52L191.513 44.6639L191.58 44.6545ZM191.013 44.3122H190.443V43.1572H191.165C191.537 43.1572 191.962 43.2181 191.962 43.7061C191.962 44.2673 191.532 44.3122 191.01 44.3122M0.347778 7.29748H7.59339V33.69H21.0072V40.3766H0.347778V7.29748ZM24.2105 17.948H31.1712V40.3642H24.2105V17.948ZM27.6908 6.80371C28.4894 6.80385 29.27 7.0408 29.934 7.48457C30.5979 7.92835 31.1154 8.55904 31.4209 9.29688C31.7264 10.0347 31.8062 10.8466 31.6503 11.6298C31.4945 12.413 31.1098 13.1325 30.5451 13.6971C29.9803 14.2617 29.2609 14.6462 28.4776 14.802C27.6943 14.9577 26.8825 14.8777 26.1447 14.5721C25.4069 14.2664 24.7763 13.7489 24.3327 13.0849C23.889 12.4209 23.6522 11.6402 23.6522 10.8416C23.6522 10.3113 23.7567 9.78616 23.9596 9.29621C24.1626 8.80626 24.4601 8.36109 24.8351 7.98613C25.2102 7.61117 25.6554 7.31375 26.1454 7.11087C26.6354 6.90799 27.1605 6.80362 27.6908 6.80371ZM60.2885 7.29241H67.2491V27.0614L75.1379 17.9379H83.6719L74.5361 28.3158L83.4798 40.3737H74.7311L67.3419 29.2932H67.2506V40.3722H60.2899L60.2885 7.29241ZM35.0307 17.9502H41.7151V21.0136H41.8101C42.4778 19.8697 43.4436 18.9287 44.6044 18.2909C45.7652 17.6532 47.0774 17.3427 48.401 17.3926C55.4595 17.3926 56.7588 22.0367 56.7588 28.07V40.3628H49.7982V29.4643C49.7982 26.8627 49.7503 23.5187 46.1728 23.5187C42.5547 23.5187 41.9964 26.3516 41.9964 29.275V40.3599H35.0358L35.0307 17.9502Z" fill="#C3C3C3"/>
                            <path d="M98.3307 26.5485C98.344 25.9838 98.2425 25.4223 98.0324 24.8979C97.8223 24.3736 97.508 23.8973 97.1084 23.498C96.7089 23.0987 96.2324 22.7847 95.7079 22.575C95.1834 22.3653 94.6218 22.2642 94.0571 22.2779C92.8409 22.2022 91.6437 22.6075 90.7235 23.4064C89.8034 24.2053 89.234 25.3337 89.1382 26.5485H98.3307ZM104.227 36.482C103.07 37.8846 101.616 39.0124 99.9698 39.7838C98.3235 40.5552 96.5262 40.9507 94.7082 40.9419C87.7476 40.9419 82.1747 36.2956 82.1747 29.1008C82.1747 21.9059 87.7468 17.2619 94.7082 17.2619C101.214 17.2619 105.294 21.9023 105.294 29.1008V31.2832H89.1382C89.3394 32.521 89.9811 33.6443 90.9451 34.4463C91.9091 35.2483 93.1304 35.6748 94.3841 35.6474C95.3749 35.6413 96.3483 35.3874 97.2159 34.909C98.0835 34.4306 98.8177 33.7427 99.3516 32.9081L104.227 36.482ZM119.803 23.3662C116.323 23.3662 114.234 25.69 114.234 29.0761C114.234 32.4622 116.322 34.7882 119.803 34.7882C123.284 34.7882 125.376 32.468 125.376 29.0761C125.376 25.6842 123.288 23.3662 119.803 23.3662ZM131.785 40.3596H125.376V37.3868H125.281C124.478 38.4682 123.435 39.3492 122.234 39.9615C121.034 40.5737 119.709 40.9005 118.361 40.9165C111.673 40.9165 107.268 36.0897 107.268 29.2639C107.268 22.995 111.167 17.2386 117.575 17.2386C120.456 17.2386 123.147 18.0268 124.725 20.2114H124.817V7.28998H131.784L131.785 40.3596ZM178.776 40.3727H171.815V29.472C171.815 26.8726 171.769 23.5264 168.195 23.5264C164.569 23.5264 164.015 26.3586 164.015 29.2828V40.372H157.054V17.9557H163.736V21.0192H163.83C164.498 19.8758 165.465 18.9351 166.626 18.2975C167.787 17.6598 169.099 17.349 170.423 17.3982C177.478 17.3982 178.778 22.0386 178.778 28.0755L178.776 40.3727ZM149.2 14.8916C148.401 14.8917 147.62 14.655 146.956 14.2113C146.291 13.7675 145.774 13.1368 145.468 12.3987C145.162 11.6607 145.082 10.8485 145.237 10.0649C145.393 9.28133 145.778 8.56152 146.343 7.9965C146.907 7.43148 147.627 7.04664 148.411 6.89064C149.194 6.73464 150.006 6.81449 150.744 7.12009C151.483 7.42568 152.114 7.94331 152.557 8.60749C153.001 9.27168 153.239 10.0526 153.239 10.8515C153.239 11.382 153.134 11.9073 152.931 12.3974C152.729 12.8875 152.431 13.3328 152.056 13.708C151.681 14.0831 151.236 14.3808 150.746 14.5838C150.256 14.7869 149.73 14.8915 149.2 14.8916ZM152.68 40.3727H145.712V17.9557H152.68V40.3727ZM182.246 0.348903H142.215C141.306 0.338649 140.431 0.689536 139.781 1.32446C139.131 1.95938 138.759 2.82639 138.748 3.73497V43.932C138.759 44.8411 139.13 45.7087 139.78 46.3443C140.43 46.9798 141.306 47.3314 142.215 47.3217H182.246C183.157 47.3332 184.035 46.9826 184.687 46.347C185.34 45.7115 185.713 44.8429 185.726 43.932V3.73207C185.713 2.82169 185.339 1.95369 184.687 1.31879C184.034 0.68388 183.156 0.333995 182.246 0.346002M191.072 41.2478C190.225 41.256 189.416 41.5992 188.821 42.2023C188.227 42.8055 187.895 43.6195 187.899 44.4664C187.904 45.3134 188.243 46.1242 188.843 46.7216C189.443 47.319 190.256 47.6544 191.103 47.6544C191.95 47.6544 192.762 47.319 193.362 46.7216C193.963 46.1242 194.302 45.3134 194.306 44.4664C194.31 43.6195 193.979 42.8055 193.384 42.2023C192.79 41.5992 191.98 41.256 191.134 41.2478H191.072ZM191.072 47.2877C190.517 47.2969 189.971 47.1412 189.504 46.8403C189.037 46.5394 188.67 46.1068 188.448 45.5971C188.227 45.0875 188.162 44.5237 188.262 43.9771C188.361 43.4305 188.62 42.9256 189.006 42.5263C189.392 42.127 189.888 41.8511 190.431 41.7337C190.974 41.6163 191.54 41.6625 192.057 41.8665C192.574 42.0705 193.018 42.4232 193.334 42.8799C193.651 43.3366 193.825 43.8769 193.834 44.4323V44.4795C193.849 45.2082 193.575 45.9132 193.071 46.4395C192.566 46.9659 191.874 47.2704 191.145 47.2862H191.073" fill="#C3C3C3"/>
                          </svg>
                    </div>
                    <div class="our-testimonial-partner-img">
                        <svg xmlns="http://www.w3.org/2000/svg" width="190" height="40" viewBox="0 0 190 40" fill="none">
                            <path d="M6.49849 26.0727C6.49849 28.2618 6.97897 29.9424 7.60697 30.9592C8.43036 32.291 9.65846 32.8552 10.9105 32.8552C12.5254 32.8552 14.0027 32.4545 16.8496 28.517C19.1304 25.361 21.8179 20.9311 23.6261 18.1539L26.6884 13.4488C28.8156 10.1812 31.2778 6.54871 34.1009 4.08653C36.4055 2.07691 38.8917 0.960449 41.3937 0.960449C45.5944 0.960449 49.5957 3.39472 52.658 7.96023C56.0093 12.9604 57.6361 19.2584 57.6361 25.7577C57.6361 29.6215 56.8746 32.4604 55.5787 34.7033C54.3267 36.8724 51.8864 39.0396 47.7814 39.0396V32.8552C51.2963 32.8552 52.1735 29.6255 52.1735 25.9292C52.1735 20.6619 50.9454 14.8165 48.24 10.6397C46.3201 7.67713 43.832 5.86687 41.0947 5.86687C38.1341 5.86687 35.7516 8.09978 33.0741 12.0811C31.6506 14.1964 30.1893 16.7742 28.5485 19.683L26.7422 22.8829C23.1137 29.3164 22.1947 30.7818 20.3804 33.2001C17.2005 37.4347 14.4851 39.0396 10.9105 39.0396C6.66995 39.0396 3.98846 37.2034 2.32773 34.4362C0.972038 32.1813 0.306152 29.2227 0.306152 25.8514L6.49849 26.0727Z" fill="#C3C3C3"/>
                            <path d="M5.1886 8.39684C8.02759 4.02073 12.1246 0.960449 16.8237 0.960449C19.545 0.960449 22.2504 1.76589 25.0755 4.07257C28.1657 6.59456 31.4592 10.7474 35.5682 17.5917L37.0415 20.0479C40.5982 25.973 42.6218 29.0214 43.806 30.4588C45.3292 32.3049 46.3958 32.8552 47.7814 32.8552C51.2962 32.8552 52.1734 29.6255 52.1734 25.9292L57.6361 25.7577C57.6361 29.6215 56.8745 32.4604 55.5786 34.7033C54.3266 36.8724 51.8864 39.0396 47.7814 39.0396C45.2295 39.0396 42.9687 38.4853 40.4686 36.1268C38.5467 34.3166 36.2998 31.1008 34.5713 28.2099L29.4296 19.6212C26.8498 15.3109 24.4833 12.0971 23.1137 10.6417C21.6404 9.07668 19.7464 7.18668 16.724 7.18668C14.2777 7.18668 12.2003 8.90323 10.4619 11.5289L5.1886 8.39684Z" fill="#C3C3C3"/>
                            <path d="M16.724 7.18668C14.2778 7.18668 12.2004 8.90323 10.4619 11.5289C8.00372 15.2391 6.49849 20.7656 6.49849 26.0727C6.49849 28.2618 6.97897 29.9424 7.60698 30.9592L2.32773 34.4362C0.972038 32.1813 0.306152 29.2227 0.306152 25.8514C0.306152 19.7209 1.98881 13.3312 5.18865 8.39684C8.02764 4.02073 12.1246 0.960449 16.8237 0.960449L16.724 7.18668Z" fill="#C3C3C3"/>
                            <path d="M69.674 2.16455H76.8372L89.0165 24.1986L101.198 2.16455H108.206V38.3696H102.362V10.6217L91.6801 29.8367H86.1975L75.5174 10.6217V38.3696H69.674V2.16455ZM126.515 15.6637C122.325 15.6637 119.801 18.8177 119.197 22.7233H133.42C133.127 18.7001 130.806 15.6637 126.515 15.6637ZM113.403 24.9482C113.403 16.7303 118.714 10.7493 126.617 10.7493C134.39 10.7493 139.032 16.6546 139.032 25.3868V26.9917H119.197C119.901 31.2403 122.72 34.1032 127.265 34.1032C130.892 34.1032 133.158 32.9967 135.308 30.9731L138.412 34.775C135.487 37.4645 131.767 39.0156 127.058 39.0156C118.503 39.0156 113.403 32.7774 113.403 24.9482ZM146.117 16.1821H140.738V11.3972H146.117V3.48436H151.755V11.3972H159.927V16.1821H151.755V28.3096C151.755 32.4504 153.079 33.9217 156.333 33.9217C157.818 33.9217 158.669 33.7941 159.927 33.5848V38.3178C158.36 38.7604 156.865 38.9637 155.246 38.9637C149.16 38.9637 146.117 35.6383 146.117 28.9814V16.1821ZM183.668 20.8353C182.536 17.9764 180.01 15.871 176.297 15.871C171.473 15.871 168.385 19.2942 168.385 24.8705C168.385 30.3072 171.228 33.8958 176.066 33.8958C179.87 33.8958 182.585 31.6828 183.668 28.9296V20.8353ZM189.306 38.3696H183.772V34.5936C182.225 36.8165 179.41 39.0156 174.85 39.0156C167.517 39.0156 162.617 32.8771 162.617 24.8705C162.617 16.7881 167.635 10.7493 175.161 10.7493C178.881 10.7493 181.8 12.2366 183.772 14.8622V11.3972H189.306V38.3696Z" fill="#C3C3C3"/>
                          </svg>
                    </div>
                    <div class="our-testimonial-partner-img">
                        <svg xmlns="http://www.w3.org/2000/svg" width="172" height="52" viewBox="0 0 172 52" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M106.384 40.4132C96.4191 47.7583 81.9753 51.6772 69.5394 51.6772C52.1023 51.6772 36.4045 45.2278 24.5283 34.5014C23.5955 33.6577 24.4314 32.5082 25.551 33.1652C38.3676 40.6223 54.2148 45.1084 70.5845 45.1084C81.6245 45.1084 93.7692 42.8243 104.936 38.0843C106.623 37.3677 108.034 39.189 106.384 40.4132Z" fill="#C3C3C3"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M110.527 35.6726C109.258 34.0452 102.107 34.9037 98.8971 35.2844C97.9193 35.4039 97.7702 34.5528 98.6509 33.9408C104.346 29.9324 113.692 31.0894 114.782 32.433C115.871 33.7841 114.498 43.152 109.146 47.6232C108.325 48.31 107.541 47.9442 107.907 47.0335C109.109 44.0329 111.803 37.3074 110.527 35.6726Z" fill="#C3C3C3"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M99.1211 5.64313V1.74672C99.1211 1.15699 99.569 0.76138 100.106 0.76138H117.551C118.111 0.76138 118.559 1.16436 118.559 1.74672V5.08324C118.551 5.64313 118.081 6.37467 117.245 7.53166L108.205 20.4377C111.564 20.3558 115.11 20.8558 118.156 22.5727C118.842 22.9608 119.029 23.5282 119.081 24.0879V28.2457C119.081 28.8129 118.454 29.4772 117.797 29.1339C112.43 26.3199 105.302 26.0138 99.3675 29.1638C98.7628 29.4923 98.1283 28.8354 98.1283 28.2681V24.3194C98.1283 23.6849 98.1357 22.6025 98.7702 21.6397L109.243 6.62109H100.129C99.569 6.62109 99.1211 6.22548 99.1211 5.64313ZM35.4863 29.955H30.1789C29.6714 29.9178 29.2684 29.5371 29.231 29.0518V1.81394C29.231 1.26897 29.6863 0.835975 30.2535 0.835975H35.2025C35.7176 0.858267 36.1282 1.25405 36.1656 1.74654V5.30737H36.2626C37.5539 1.86624 39.9798 0.26151 43.2493 0.26151C46.5709 0.26151 48.6462 1.86624 50.1391 5.30737C51.423 1.86624 54.3416 0.26151 57.4693 0.26151C59.6936 0.26151 62.1271 1.17962 63.6125 3.23981C65.2919 5.53132 64.9486 8.86048 64.9486 11.7791L64.9411 28.9698C64.9411 29.5148 64.4858 29.9552 63.9185 29.9552H58.6187C58.0888 29.918 57.6632 29.4925 57.6632 28.9698V14.5334C57.6632 13.3838 57.7678 10.5173 57.514 9.42774C57.1184 7.59888 55.9316 7.08375 54.3937 7.08375C53.1099 7.08375 51.7663 7.94219 51.2213 9.31576C50.6765 10.6893 50.7288 12.9882 50.7288 14.5334V28.9697C50.7288 29.5146 50.2734 29.955 49.7061 29.955H44.4063C43.8689 29.9178 43.4508 29.4923 43.4508 28.9697L43.4434 14.5334C43.4434 11.4953 43.9435 7.02425 40.1739 7.02425C36.3597 7.02425 36.5089 11.3833 36.5089 14.5334V28.9697C36.5089 29.5146 36.0536 29.955 35.4863 29.955ZM133.577 0.261339C141.452 0.261339 145.715 7.02408 145.715 15.6232C145.715 23.9312 141.005 30.5224 133.577 30.5224C125.844 30.5224 121.634 23.7595 121.634 15.332C121.634 6.85242 125.896 0.261339 133.577 0.261339ZM133.622 5.82233C129.711 5.82233 129.464 11.152 129.464 14.4736C129.464 17.8029 129.412 24.909 133.577 24.909C137.69 24.909 137.884 19.1763 137.884 15.6829C137.884 13.3838 137.787 10.6369 137.093 8.45732C136.496 6.56124 135.309 5.82233 133.622 5.82233ZM155.926 29.955H150.641C150.111 29.9178 149.686 29.4923 149.686 28.9697L149.678 1.72425C149.723 1.22421 150.164 0.835975 150.701 0.835975H155.62C156.083 0.858267 156.463 1.17208 156.568 1.59735V5.76265H156.665C158.15 2.03789 160.233 0.261339 163.898 0.261339C166.279 0.261339 168.601 1.11961 170.094 3.47097C171.482 5.6505 171.482 9.31576 171.482 11.9508V29.0966C171.422 29.5743 170.982 29.955 170.459 29.955H165.137C164.652 29.9178 164.249 29.5594 164.197 29.0966V14.3019C164.197 11.3236 164.54 6.96423 160.875 6.96423C159.584 6.96423 158.397 7.83021 157.807 9.14394C157.061 10.8087 156.963 12.4657 156.963 14.3021V28.9697C156.956 29.5146 156.493 29.955 155.926 29.955ZM85.2147 16.9445C85.2147 19.012 85.267 20.7365 84.2218 22.5725C83.3785 24.0656 82.0349 24.9836 80.5494 24.9836C78.5117 24.9836 77.3173 23.4311 77.3173 21.1394C77.3173 16.6159 81.3706 15.7949 85.2147 15.7949V16.9445ZM90.5667 29.8804C90.216 30.1939 89.7084 30.2163 89.3128 30.0073C87.5512 28.5442 87.2302 27.865 86.2673 26.4691C83.356 29.44 81.2885 30.3283 77.5188 30.3283C73.0476 30.3283 69.5766 27.5738 69.5766 22.0577C69.5766 17.7506 71.9055 14.8171 75.2346 13.3838C78.1161 12.1149 82.1394 11.8909 85.2149 11.5401V10.8534C85.2149 9.59185 85.3118 8.09892 84.5653 7.00916C83.9235 6.03137 82.6842 5.62821 81.587 5.62821C79.564 5.62821 77.7652 6.66568 77.3248 8.81555C77.2352 9.2933 76.8843 9.7635 76.3992 9.78596L71.2561 9.23362C70.8233 9.13656 70.338 8.78571 70.4649 8.12139C71.6443 1.88116 77.2875 0 82.3337 0C84.9164 0 88.2903 0.686785 90.3281 2.64254C92.9107 5.05358 92.6644 8.27058 92.6644 11.7716V20.0421C92.6644 22.5279 93.6947 23.6175 94.6649 24.9613C95.001 25.439 95.0755 26.0138 94.6426 26.372C93.5602 27.2752 91.6343 28.9547 90.5744 29.8953L90.567 29.8804M15.6381 16.9445C15.6381 19.012 15.6904 20.7365 14.6452 22.5725C13.8019 24.0656 12.4657 24.9836 10.9728 24.9836C8.93507 24.9836 7.74807 23.4311 7.74807 21.1394C7.74807 16.6159 11.8014 15.7949 15.6381 15.7949V16.9445ZM20.9901 29.8804C20.6394 30.1939 20.1318 30.2163 19.7362 30.0073C17.9746 28.5442 17.6609 27.865 16.6907 26.4691C13.7794 29.44 11.7194 30.3283 7.94219 30.3283C3.47851 30.3283 0 27.5738 0 22.0577C0 17.7506 2.33644 14.8171 5.65805 13.3838C8.53946 12.1149 12.5628 11.8909 15.6381 11.5401V10.8534C15.6381 9.59185 15.7352 8.09892 14.9961 7.00916C14.3467 6.03137 13.1077 5.62821 12.0178 5.62821C9.995 5.62821 8.18861 6.66568 7.74807 8.81555C7.65856 9.2933 7.30771 9.7635 6.82996 9.78596L1.67949 9.23362C1.2465 9.13656 0.768925 8.78571 0.888277 8.12139C2.0751 1.88116 7.71086 0 12.7569 0C15.3394 0 18.7135 0.686785 20.7514 2.64254C23.3339 5.05358 23.0877 8.27058 23.0877 11.7716V20.0421C23.0877 22.5279 24.1177 23.6175 25.0882 24.9613C25.4316 25.439 25.5062 26.0138 25.0732 26.372C23.9908 27.2752 22.0651 28.9547 21.0052 29.8953L20.9901 29.8804Z" fill="#C3C3C3"/>
                          </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH D:\FHM\FHM-AutoCar-BE\resources\views/frontend/blocks/custom/styles/our_testimonials.blade.php ENDPATH**/ ?>