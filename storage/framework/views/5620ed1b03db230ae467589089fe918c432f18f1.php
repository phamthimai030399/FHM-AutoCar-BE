<?php
    if (isset($menu)) {
        $main_menu = $menu->first(function ($item, $key) {
            return $item->menu_type == 'header' && ($item->parent_id == null || $item->parent_id == 0);
        });
    }
    // dd($web_information);
?>


<header>
    <div class="top-header py-1">
        <div class="container p-lg-0 ">
            <div class="d-flex justify-content-between content-top-header">
                <div class="item-contact d-none d-lg-flex">
                    <p class="f-w-500 me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16" fill="none">
                            <path d="M11.561 15.4965C10.4542 15.4799 9.5457 15.1661 8.67021 14.749C7.17113 14.0346 5.85789 13.0517 4.64789 11.9202C3.25205 10.6193 2.02966 9.17391 1.09635 7.49725C0.621437 6.64654 0.237375 5.75865 0.0721874 4.7923C-0.0269252 4.21828 -0.0517034 3.63599 0.179559 3.08674C0.282802 2.84309 0.427341 2.6077 0.609047 2.41773C1.117 1.87674 1.65386 1.36053 2.18246 0.836058C2.62847 0.394181 3.24379 0.390052 3.6898 0.831929C4.42488 1.55876 5.15171 2.28971 5.87854 3.02067C6.31215 3.45841 6.31215 4.06961 5.88267 4.51561C5.67205 4.73449 5.46557 4.96162 5.2343 5.15985C4.89567 5.4448 4.84611 5.79582 4.93697 6.1964C5.06086 6.73326 5.30451 7.2123 5.61423 7.66244C6.36584 8.75681 7.29915 9.65295 8.48437 10.2641C8.83953 10.4459 9.2112 10.5863 9.61591 10.6028C9.87195 10.6152 10.0867 10.5408 10.2684 10.3467C10.4955 10.099 10.7392 9.8677 10.9787 9.6323C11.4247 9.19043 12.04 9.1863 12.4819 9.62404C13.2129 10.3509 13.9438 11.0818 14.6706 11.8128C15.1125 12.2547 15.1084 12.8741 14.6665 13.3201C14.1544 13.8363 13.6424 14.3525 13.122 14.8605C12.6554 15.3148 12.0896 15.513 11.561 15.4965ZM4.76352 5.01531C3.73522 3.98701 2.71106 2.96285 1.68277 1.93456C1.43912 2.17821 1.18307 2.43838 0.922904 2.69855C0.720549 2.9009 0.584269 3.14043 0.514064 3.41712C0.386044 3.91268 0.431471 4.41237 0.534713 4.90381C0.724679 5.79995 1.09222 6.63002 1.55475 7.41466C3.17359 10.1692 5.36232 12.3579 8.12509 13.9644C9.04601 14.5012 10.0206 14.9224 11.0985 15.0422C11.5982 15.0959 12.1102 15.0918 12.5273 14.782C12.9114 14.4971 13.2418 14.1337 13.5804 13.8157C12.5356 12.7709 11.5156 11.7508 10.4914 10.7267C10.1156 11.057 9.72741 11.0818 9.33096 10.9992C9.0171 10.929 8.69912 10.8423 8.40591 10.706C7.2785 10.1816 6.37823 9.368 5.61011 8.40578C5.14758 7.82763 4.75526 7.19991 4.55703 6.47722C4.42075 5.94862 4.37533 5.43241 4.76352 5.01531ZM5.12693 4.67254C5.2756 4.51974 5.43253 4.36282 5.5812 4.20589C5.82898 3.94159 5.82898 3.59469 5.57294 3.33452C5.38297 3.14043 5.18888 2.94633 4.99478 2.75224C4.45379 2.21125 3.91693 1.67026 3.37594 1.1334C3.13642 0.893874 2.80191 0.860837 2.56652 1.06732C2.37656 1.23251 2.2155 1.4266 2.05031 1.60005C3.06621 2.61183 4.08625 3.63186 5.12693 4.67254ZM13.9232 13.4688C14.0636 13.3242 14.204 13.1756 14.3485 13.0269C14.6376 12.7296 14.6376 12.3909 14.3485 12.0977C14.0553 11.8004 13.758 11.5072 13.4607 11.2098C13.0353 10.7845 12.6099 10.355 12.1804 9.92964C11.9368 9.69012 11.5982 9.65708 11.3545 9.8677C11.1687 10.0288 11.0076 10.2187 10.8466 10.388C11.8625 11.4081 12.8825 12.4281 13.9232 13.4688Z" fill="white"/>
                            <path d="M7.71213 1.57528C7.71213 1.43074 7.71213 1.29859 7.71213 1.17057C11.3256 1.07558 14.4353 4.26371 14.3279 7.79046C14.1999 7.79046 14.076 7.79046 13.9273 7.79046C13.8943 6.09316 13.3037 4.61473 12.0979 3.40886C10.8961 2.20299 9.42595 1.61244 7.71213 1.57528Z" fill="white"/>
                            <path d="M12.5521 7.78633C12.42 7.78633 12.2878 7.78633 12.1474 7.78633C12.1226 6.56395 11.6973 5.51087 10.8342 4.6519C9.9752 3.79705 8.92626 3.37582 7.71213 3.34692C7.71213 3.20651 7.71213 3.07436 7.71213 2.94221C10.3056 2.85548 12.643 5.16811 12.5521 7.78633Z" fill="white"/>
                            <path d="M10.7846 7.9763C10.6525 7.9763 10.5203 7.9763 10.3758 7.9763C10.351 7.24947 10.1032 6.61763 9.59114 6.10142C9.07493 5.5852 8.44721 5.32916 7.71213 5.31264C7.71213 5.1681 7.71213 5.03595 7.71213 4.9038C9.24837 4.82534 10.8383 6.21705 10.7846 7.9763Z" fill="white"/>
                            </svg>
                        <?php echo e($web_information->information->phone); ?>

                    </p>
                    <p class="f-w-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 16 12" fill="none">
                            <path d="M8.00626 0.482152C10.3563 0.482152 12.71 0.482152 15.06 0.482152C15.3265 0.482152 15.5744 0.519161 15.7705 0.722705C15.9556 0.911446 16 1.1483 16 1.40365C16 3.77217 16 6.14438 16 8.5129C16 9.20865 16 9.9044 16 10.6002C16 11.2219 15.6928 11.5254 15.0674 11.5254C10.4007 11.5254 5.73767 11.5254 1.07095 11.5254C1.01544 11.5254 0.959926 11.5254 0.904414 11.5254C0.315986 11.518 0.00511818 11.2071 0.00511818 10.6187C0.00511818 8.0392 0.00511818 5.45974 0.00511818 2.88027C0.00511818 2.39917 0.0199215 1.91806 0.00141743 1.44066C-0.0244882 0.859635 0.304883 0.467349 0.974729 0.47475C3.31734 0.489554 5.66365 0.482152 8.00626 0.482152ZM15.3079 1.622C15.208 1.71452 15.1303 1.78114 15.0563 1.85145C13.0209 3.76847 10.9891 5.68178 8.95367 7.5988C8.33563 8.17983 7.67319 8.17983 7.05885 7.5988C4.9901 5.65958 2.92505 3.71296 0.856303 1.77003C0.808193 1.72562 0.760083 1.68491 0.70087 1.6368C0.70087 4.52713 0.70087 7.39526 0.70087 10.293C0.756382 10.2375 0.789689 10.2005 0.822996 10.1635C1.65938 9.23456 2.49576 8.30566 3.33214 7.38045C3.68002 6.99557 4.02419 6.61069 4.37207 6.2295C4.5016 6.08517 4.67554 6.05557 4.81987 6.14438C4.9679 6.2332 5.00861 6.37013 4.9679 6.52557C4.94569 6.60328 4.88648 6.6773 4.83097 6.74021C3.65781 8.0429 2.48096 9.34558 1.3078 10.6483C1.25969 10.7001 1.21528 10.7556 1.15607 10.8259C5.73396 10.8259 10.2786 10.8259 14.8602 10.8259C14.7824 10.7408 14.7269 10.6742 14.6714 10.615C13.502 9.31597 12.3288 8.02069 11.1593 6.72171C10.9891 6.53297 10.9817 6.32202 11.1371 6.18509C11.2926 6.04816 11.4961 6.07777 11.6701 6.27021C12.6064 7.30644 13.539 8.34636 14.4753 9.38259C14.7454 9.68235 15.0156 9.97842 15.3117 10.3041C15.3079 7.39155 15.3079 4.52713 15.3079 1.622ZM1.26339 1.1668C1.25229 1.1779 1.24489 1.19271 1.23379 1.20381C1.2819 1.24082 1.33001 1.27412 1.37072 1.31113C2.6808 2.5435 3.98719 3.77587 5.29727 5.00454C6.06334 5.72619 6.8294 6.44785 7.59917 7.16581C7.85083 7.40266 8.15059 7.39526 8.40965 7.16951C8.46516 7.1214 8.52067 7.06959 8.57248 7.01777C10.5894 5.11926 12.6064 3.22075 14.6233 1.32223C14.6714 1.27783 14.7306 1.24822 14.7861 1.21491C14.7713 1.19641 14.7602 1.1816 14.7454 1.1631C10.2489 1.1668 5.75617 1.1668 1.26339 1.1668Z" fill="white"/>
                            </svg>
                            <?php echo e($web_information->information->email); ?>

                    </p>
                </div>
                <div class="item-content text-uppercase text-nowrap">
                    <p class="f-w-500" style="padding: 0px">
                        <?php echo e($web_information->information->brief); ?>

                        <a href="" class="text-decoration-underline" style="font-weight: 500">Shop now!</a>
                    </p>
                </div>
                <div class="item-support d-none d-lg-flex">
                    <a href="" class="f-w-500 me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none">
                            <path d="M6.99963 0.743309C8.96779 0.743309 10.936 0.743309 12.9041 0.743309C13.5947 0.743309 13.9992 1.14485 13.9992 1.83538C13.9992 4.70094 13.9992 7.56345 13.9992 10.429C13.9992 11.1134 14.0023 11.7949 13.9962 12.4793C13.9962 12.6192 13.9871 12.7652 13.9506 12.8991C13.838 13.3432 13.4791 13.617 13.0197 13.617C11.6904 13.617 10.358 13.62 9.02863 13.614C8.89783 13.614 8.81569 13.6565 8.73356 13.7508C8.28639 14.271 7.79663 14.7425 7.23994 15.1471C7.03005 15.2992 6.95095 15.2962 6.74106 15.138C6.18437 14.7212 5.67332 14.2558 5.22919 13.7174C5.16531 13.6383 5.09534 13.614 4.99496 13.614C3.68386 13.617 2.37276 13.6018 1.06471 13.6231C0.526277 13.6322 -0.00302894 13.2459 1.30493e-05 12.5614C0.00913901 9.37951 0.00609716 6.19455 0.00609716 3.01263C0.00609716 2.60196 0.00305518 2.1913 0.00609716 1.78367C0.0121811 1.14181 0.407639 0.743309 1.0495 0.743309C3.03287 0.740267 5.01625 0.740267 6.99963 0.743309C6.99963 0.740267 6.99963 0.740267 6.99963 0.743309ZM5.00104 1.36692C4.95237 1.36083 4.92499 1.35779 4.89457 1.35779C3.60477 1.35779 2.31497 1.35779 1.02212 1.35779C0.748342 1.35779 0.620579 1.49772 0.620579 1.77759C0.620579 5.37626 0.620579 8.97493 0.620579 12.5736C0.620579 12.8808 0.748342 13.0086 1.05254 13.0086C2.20545 13.0086 3.36141 13.0086 4.51432 13.0086C4.56299 13.0086 4.60862 13.0025 4.64209 13.0025C4.45652 12.6284 4.25271 12.2724 4.10061 11.8983C3.79033 11.1347 3.68082 10.3469 3.89072 9.53161C4.28922 7.99541 5.82542 6.91246 7.51372 7.17711C9.27199 7.45393 10.4736 9.14224 10.1755 10.9401C10.0599 11.6428 9.78 12.2785 9.39975 12.8748C9.37542 12.9113 9.36021 12.9508 9.32979 13.0086C9.39975 13.0086 9.44843 13.0086 9.4971 13.0086C10.6409 13.0086 11.7847 13.0086 12.9285 13.0086C13.2631 13.0086 13.3817 12.893 13.3817 12.5523C13.3817 8.96884 13.3817 5.38538 13.3817 1.80192C13.3817 1.46426 13.2783 1.35779 12.9406 1.35779C11.6843 1.35779 10.431 1.35779 9.17465 1.35779C9.11989 1.35779 9.06514 1.35779 8.99821 1.35779C8.99821 1.43992 8.99821 1.50076 8.99821 1.55856C8.99821 2.73885 8.99821 3.9161 8.99821 5.09639C8.99821 5.44318 8.7731 5.57703 8.46282 5.41276C8.01565 5.17853 7.56544 4.94429 7.12131 4.70702C7.03613 4.66139 6.97225 4.65835 6.88403 4.70398C6.44294 4.94125 5.99881 5.1694 5.55468 5.40059C5.21702 5.57703 5.00104 5.44926 5.00104 5.06902C5.00104 3.89481 5.00104 2.7206 5.00104 1.54639C5.00104 1.4886 5.00104 1.4308 5.00104 1.36692ZM6.99963 14.5661C7.11522 14.4718 7.22473 14.3836 7.3312 14.2923C8.1282 13.5987 8.81265 12.8139 9.25678 11.8435C9.52752 11.2473 9.66441 10.6206 9.57011 9.9727C9.35108 8.45475 7.89093 7.4661 6.40035 7.82201C5.08622 8.13534 4.22533 9.3643 4.43523 10.791C4.53257 11.442 4.7881 12.026 5.14097 12.5736C5.63986 13.3463 6.27868 13.9881 6.99963 14.5661ZM8.36548 1.37604C7.44984 1.37604 6.54333 1.37604 5.63377 1.37604C5.63377 2.4742 5.63377 3.56019 5.63377 4.66747C6.02619 4.46062 6.4034 4.26897 6.77756 4.0682C6.92966 3.98607 7.06655 3.98607 7.22169 4.07124C7.51676 4.23551 7.82096 4.38761 8.11908 4.54275C8.19817 4.5823 8.27726 4.62184 8.36548 4.66747C8.36548 3.55715 8.36548 2.47116 8.36548 1.37604Z" fill="white"/>
                            <path d="M5.77984 10.3499C5.78592 9.64112 6.32435 9.1179 7.04226 9.12398C7.68412 9.13007 8.23776 9.70805 8.22559 10.3621C8.21343 11.0374 7.66587 11.5819 7.00271 11.5758C6.31218 11.5637 5.77375 11.0222 5.77984 10.3499ZM7.60807 10.3256C7.60503 10.0001 7.33733 9.72934 7.01184 9.7263C6.65897 9.72326 6.38519 9.99399 6.38519 10.3438C6.38519 10.6876 6.65897 10.9613 6.99967 10.9583C7.3495 10.9613 7.61111 10.6845 7.60807 10.3256Z" fill="white"/>
                            </svg>
                        <?php echo e($web_information->information->track_order); ?>

                    </a>
                    <a href="" class="f-w-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="16" viewBox="0 0 13 16" fill="none">
                            <path d="M6.74635 15.0887C6.44694 15.0261 6.16093 14.9323 5.91068 14.7446C5.29844 14.2887 5.04819 13.5112 5.29397 12.8006C5.54423 12.0811 6.2235 11.6119 6.99661 11.6298C7.7295 11.6477 8.39089 12.1616 8.60092 12.8811C8.61433 12.9213 8.62327 12.9615 8.63668 13.0017C9.29807 13.1358 10.4957 12.537 10.889 11.8622C10.7683 11.8622 10.6611 11.8622 10.5538 11.8622C10.308 11.8577 10.1829 11.7326 10.1829 11.4823C10.1829 10.0702 10.1829 8.65799 10.1829 7.24584C10.1829 7.15646 10.2008 7.06261 10.2321 6.9777C10.2812 6.84811 10.3795 6.77214 10.5315 6.77661C10.6432 6.78107 10.7504 6.77661 10.8532 6.77661C10.8666 6.75426 10.8756 6.74979 10.8756 6.74086C10.9292 5.69067 10.8711 4.65837 10.2902 3.73779C9.36957 2.272 8.04232 1.53464 6.3084 1.63743C4.23932 1.75808 2.59479 3.30431 2.32666 5.34657C2.26409 5.81133 2.28644 6.28503 2.26856 6.77661C2.39816 6.77661 2.50094 6.77661 2.60372 6.77661C2.81823 6.77661 2.94336 6.88833 2.97464 7.10283C2.98358 7.1654 2.98358 7.23243 2.98358 7.29499C2.98358 8.68481 2.98358 10.0746 2.98358 11.46C2.98358 11.7415 2.86739 11.8577 2.59032 11.8577C2.16131 11.8577 1.7323 11.8711 1.30329 11.8488C0.601678 11.8175 0.0296654 11.2544 0.01179 10.5573C-0.00608542 9.74839 -0.00161657 8.944 0.01179 8.13514C0.0251966 7.45587 0.597209 6.74085 1.43735 6.77661C1.47757 6.77661 1.51779 6.77661 1.58483 6.77661C1.58483 6.70957 1.58483 6.65148 1.58483 6.59338C1.58929 6.05265 1.55801 5.51192 1.6742 4.98013C2.04065 3.25068 3.0238 1.9994 4.65046 1.3112C7.37646 0.158234 10.4466 1.59274 11.3537 4.40365C11.5325 4.95331 11.5951 5.52086 11.5906 6.09287C11.5906 6.31185 11.5906 6.53529 11.5906 6.76767C11.8721 6.77214 12.1179 6.85258 12.3279 7.02686C12.7301 7.35309 12.9625 7.7821 12.9804 8.29155C13.0072 9.07807 13.0027 9.86905 12.9893 10.66C12.9804 11.2544 12.6095 11.6834 12.0196 11.7817C11.814 11.8175 11.7023 11.9068 11.5951 12.0722C11.0588 12.9123 10.2991 13.4352 9.32488 13.6318C9.10591 13.6765 8.87799 13.6899 8.64115 13.7167C8.53836 14.2575 8.22554 14.6552 7.72503 14.892C7.54181 14.9814 7.33624 15.0216 7.13961 15.0842C7.00555 15.0887 6.87595 15.0887 6.74635 15.0887ZM2.28197 7.47375C2.00937 7.47375 1.75017 7.47375 1.49098 7.47375C1.01281 7.47375 0.7134 7.76422 0.708931 8.24239C0.704462 8.98869 0.704462 9.73499 0.708931 10.4813C0.708931 10.8567 0.999407 11.1471 1.37479 11.1561C1.64739 11.1606 1.91999 11.1561 2.19259 11.1561C2.22387 11.1561 2.25515 11.1471 2.28197 11.1427C2.28197 9.92268 2.28197 8.70715 2.28197 7.47375ZM10.8934 11.1561C11.1258 11.1561 11.3537 11.1561 11.5772 11.1561C11.6353 11.1561 11.6978 11.1561 11.7559 11.1471C12.0956 11.098 12.2833 10.9237 12.2877 10.6332C12.2922 9.87799 12.2922 9.12275 12.2877 8.36305C12.2833 8.09939 12.1849 7.8536 12.0017 7.66144C11.9168 7.57653 11.8006 7.49162 11.6889 7.47822C11.4297 7.4514 11.166 7.46928 10.8979 7.46928C10.8934 8.70715 10.8934 9.92715 10.8934 11.1561ZM7.97082 13.3816C7.96635 12.7738 7.52393 12.318 6.93404 12.318C6.3665 12.318 5.89727 12.7872 5.90174 13.3458C5.91068 13.9134 6.40225 14.396 6.96533 14.3871C7.51946 14.3781 7.97082 13.9268 7.97082 13.3816Z" fill="white"/>
                            </svg>
                        <?php echo e($web_information->information->content_support); ?>

                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="main-header">
        <div class="container p-lg-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-black">
                <div class="container-fluid p-0">
                    <div class="navbar-brand box-logo text-center">
                        <img class="mr-2 mb-1" width="15px" src="<?php echo e($web_information->image->logo_header ?? ''); ?>"
                            alt="logo" />
                        <div class="title-logo text-white">
                            <span>Vehicles</span>
                            <span class="text-large">Meta</span>
                        </div>
                    </div>
                    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                        data-bs-target="#mynavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse menu navbar-collapse" id="mynavbar">
                        <ul class="box-content navbar-nav ms-auto">
                            <?php if(isset($main_menu)): ?>
                                <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($item->parent_id == $main_menu->id): ?>
                                        <?php if($item->sub <= 0): ?>
                                            <li class="nav-item <?php echo e($item->url_link == url()->full() ? 'active' : ''); ?>">
                                                <a class="nav-link item-menu" href="<?php echo e($item->url_link); ?>"
                                                    title="<?php echo e($item->name ?? ''); ?>">
                                                    <?php echo e($item->name ?? ''); ?>

                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>
                        <div class="box-icon d-flex align-items-center pe-1">
                            <a href="" class="item-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15"viewBox="0 0 19 18" fill="none">
                                    <path d="M10.0135 17.9537C9.57225 17.9537 9.13101 17.9537 8.69418 17.9537C8.44708 17.9184 8.19999 17.8919 7.9573 17.8522C5.78198 17.4815 3.92434 16.502 2.52561 14.7899C0.209082 11.9528 -0.293934 8.7714 1.13128 5.40472C2.83448 1.385 7.05717 -0.706493 11.324 0.215704C14.7436 0.952579 17.519 3.79418 18.1588 7.21381C18.225 7.58004 18.278 7.95069 18.3353 8.31692C18.3353 8.75816 18.3353 9.1994 18.3353 9.63623C18.3 9.88333 18.2736 10.1304 18.2338 10.3731C17.8588 12.5749 16.8351 14.4061 15.1319 15.8533C14.0288 16.7888 12.7668 17.4198 11.3549 17.7286C10.9136 17.8257 10.4591 17.8786 10.0135 17.9537ZM7.07923 11.6439C4.89508 10.0951 4.80683 7.20499 6.38207 5.51062C7.90435 3.87361 10.4944 3.77653 12.1315 5.31647C12.908 6.04452 13.3405 6.95348 13.3978 8.01687C13.4772 9.53033 12.8551 10.7261 11.6284 11.6395C13.1066 12.1778 14.2627 13.0956 15.1231 14.384C18 11.3615 18.0882 6.34015 14.7877 3.21615C11.5181 0.118631 6.2894 0.356902 3.31984 3.85154C0.49589 7.1741 1.06068 11.8292 3.59341 14.3796C4.01259 13.7486 4.5112 13.1971 5.10246 12.7338C5.69814 12.266 6.35118 11.9086 7.07923 11.6439ZM4.38324 15.1076C7.19836 17.5212 11.6593 17.4374 14.3244 15.0988C13.111 13.2721 11.4211 12.2837 9.21484 12.3278C7.12777 12.3763 5.52606 13.3647 4.38324 15.1076ZM12.3477 8.26838C12.3477 6.62255 10.9931 5.27234 9.35163 5.27234C7.71462 5.27676 6.36883 6.61813 6.36442 8.25514C6.35559 9.89657 7.71021 11.2556 9.35163 11.26C10.9886 11.2688 12.3477 9.91422 12.3477 8.26838Z" fill="white"/>
                                    </svg>
                            </a>
                            <a href="" class="item-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 19 16" fill="none">
                                    <path d="M9.32089 15.9298C6.76763 14.1109 4.37661 12.1298 2.42537 9.67043C1.57998 8.60301 0.858401 7.46301 0.504018 6.12233C-0.243175 3.31715 1.56717 0.494897 4.44493 0.0850078C6.41752 -0.196791 8.00157 0.546134 9.16292 2.16861C9.21842 2.24546 9.26539 2.32232 9.3337 2.42906C9.38067 2.36074 9.4191 2.30524 9.45325 2.254C10.5378 0.567482 12.4634 -0.218139 14.2566 0.0892778C16.3018 0.443661 17.8005 1.87827 18.2274 3.83805C18.4879 5.04637 18.2573 6.19064 17.745 7.29222C17.1686 8.53469 16.353 9.61492 15.4479 10.6311C13.6632 12.625 11.6222 14.3286 9.43618 15.8615C9.40202 15.8785 9.37213 15.8956 9.32089 15.9298ZM8.70606 4.84143C8.68898 4.68772 8.67617 4.55963 8.65909 4.43581C8.38157 1.86119 5.43549 0.465009 3.24942 1.874C1.802 2.80479 1.25975 4.55109 1.88739 6.25896C2.28874 7.35199 2.94627 8.29559 3.68066 9.18368C4.98291 10.7635 6.49437 12.1298 8.09123 13.4021C8.50112 13.7266 8.91955 14.0426 9.3337 14.3628C11.3789 12.8343 13.3002 11.2075 14.927 9.25627C15.6059 8.44076 16.2164 7.57829 16.6434 6.60053C16.9679 5.85761 17.1344 5.09334 17.0063 4.27783C16.7459 2.61693 15.3411 1.39153 13.6034 1.31041C12.0193 1.23782 10.4993 2.37355 10.1022 3.94053C10.0297 4.23086 9.9955 4.53401 9.94427 4.84143C9.53438 4.84143 9.12449 4.84143 8.70606 4.84143Z" fill="white"/>
                                    </svg>
                            </a>
                            <a href="" class="item-icon">
                                <div class="icon-cart">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15"viewBox="0 0 16 18" fill="none">
                                        <path d="M11.1885 4.67433C11.8795 4.67433 12.5435 4.67433 13.2007 4.67433C13.7155 4.67433 13.8104 4.75562 13.8714 5.2502C14.3185 8.65122 14.7657 12.0455 15.2128 15.4465C15.2535 15.7581 15.3212 16.063 15.3348 16.3747C15.3415 16.5305 15.2873 16.7134 15.1993 16.8353C15.0638 17.025 14.8808 17.1876 14.6979 17.3299C14.6031 17.4044 14.454 17.4519 14.3253 17.4519C9.9961 17.4586 5.66692 17.4586 1.33773 17.4519C1.20223 17.4519 1.03286 17.3841 0.931233 17.296C0.267289 16.7134 0.280838 16.7134 0.396012 15.8665C0.714434 13.4953 1.01931 11.1173 1.33095 8.73929C1.48678 7.55368 1.6426 6.37484 1.79842 5.18922C1.8594 4.75563 1.9678 4.66755 2.41494 4.66755C3.07889 4.66755 3.73606 4.66078 4.4 4.66078C4.41355 4.66078 4.4271 4.64723 4.47453 4.63368C4.47453 4.4101 4.47453 4.17976 4.47453 3.94263C4.4813 2.07952 5.77531 0.66356 7.62487 0.507736C9.42701 0.351913 11.1207 1.8695 11.1817 3.69196C11.1953 4.00361 11.1885 4.31525 11.1885 4.67433ZM13.0719 5.49409C12.9839 5.48732 12.95 5.48732 12.9161 5.48732C9.54896 5.48732 6.17504 5.48732 2.80789 5.48054C2.59109 5.48054 2.56399 5.58217 2.54367 5.75154C2.3201 7.49948 2.08297 9.24064 1.85262 10.9886C1.62228 12.7094 1.3987 14.4302 1.17513 16.1511C1.12771 16.4898 1.28353 16.6592 1.62228 16.6592C5.76177 16.6592 9.90125 16.6592 14.0407 16.6592C14.3592 16.6592 14.5285 16.483 14.4879 16.1714C14.3456 15.0874 14.2033 14.0102 14.0611 12.9262C13.7968 10.9411 13.5394 8.94932 13.2752 6.96426C13.2074 6.46969 13.1397 5.98189 13.0719 5.49409ZM5.2672 4.64723C7.00158 4.64723 8.68176 4.64723 10.3755 4.64723C10.3755 4.32203 10.3891 4.01038 10.3755 3.69873C10.3281 2.44537 9.29151 1.40203 8.01105 1.31395C6.75091 1.22588 5.55174 2.1405 5.35527 3.37354C5.28752 3.78681 5.29429 4.20686 5.2672 4.64723Z" fill="white"/>
                                        </svg>
                                    <div class="item-order rounded-circle text-center">5</div>
                                </div>
                            </a> 
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
<?php /**PATH D:\FHM\yoga\resources\views/frontend/blocks/header/styles/default.blade.php ENDPATH**/ ?>