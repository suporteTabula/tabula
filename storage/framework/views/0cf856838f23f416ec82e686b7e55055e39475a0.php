<?php $__env->startSection('content'); ?>
    <section class="hero-landing">
        <div class="container grid-md">
            <div class="columns">
                <div class="column col-6 col-xs-12 col-sm-12 hero-text">
                    <h2>A plataforma de ensino a <u>distância</u> mais <u>inovadora</u> e <u>prática</u> onde qualquer pessoa pode <u>aprender</u> ou <u>ensinar</u>.</h2>
                    <button id="explore" class="button-tabula">EXPLORE</button>
                </div>
                <div class="column col-6 hide-sm hero-mock"></div>
            </div>
        </div>
    </section>
    
    <section class="macrotemas">
        <div class="container grid-md">
            <div class="columns">
                <div class="column col-12 show-md">
                    <div class="macro-mobile-wrapper">
                        <?php for($i = 0; $i<3; $i++): ?>
                            <div class="macrotema-col-<?php echo e($i+1); ?>">
                                <?php for($j = 0; $j < $mobile_col_limit; $j++): ?>
                                    <a href="<?php echo e(route('search.single', ['id' => $mobile_categories[$mobile_category_count]->id])); ?>" style="background-image: url(<?php echo e('../images/hex/mobile/'.$mobile_categories[$mobile_category_count]->mobile_hex_bg); ?>)">
                                        <p id="macro-title"><?php echo e($mobile_categories[$mobile_category_count]->desc); ?></p> 
                                        <img id="macroicon" src="<?php echo e(asset('images/hex/icon/'.$mobile_categories[$mobile_category_count]->hex_icon)); ?>" style="display: none;"> 
                                    </a>
                                    <?php ($mobile_category_count++); ?>
                                    
                                <?php endfor; ?>
                                <?php if($mobile_col_limit == 5): ?>
                                    <?php ($mobile_col_limit = 6); ?>
                                <?php else: ?>
                                    <?php ($mobile_col_limit = 5); ?>
                                <?php endif; ?>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
                <div class="column col-12 hide-md">
                    <div class="macro-pc-wrapper hide-md">
                        <?php for($i = 0; $i<3; $i++): ?>
                            <div class="macro-row-<?php echo e($i+1); ?>">
                                <?php for($j = 0; $j < $row_limit; $j++): ?>
                                    <div class="macro-indv-pc">
                                        <a href="<?php echo e(route('search.single', ['id' => $categories[$category_count]->id])); ?>" style="background-image: url(<?php echo e('../images/hex/desktop/'.$categories[$category_count]->desktop_hex_bg); ?>)">
                                            <p><?php echo e($categories[$category_count]->desc); ?></p> 
                                            <img id="macroicon" src="<?php echo e(asset('images/hex/icon/'.$categories[$category_count]->hex_icon)); ?>" style="display: none;"> 
                                        </a>
                                        <?php ($category_count++); ?>
                                    </div>
                                <?php endfor; ?>
                                <?php if($row_limit == 5): ?>
                                    <?php ($row_limit = 6); ?>
                                <?php else: ?>
                                    <?php ($row_limit = 5); ?>
                                <?php endif; ?>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="advantages">
        <div class="container grid-md">
            <div class="columns">
                <div class="column col-4 col-xs-12 col-sm-12">
                    <div class="columns spacer card-advantage1">
                        <div class="column col-4 col-sm-4 col-md-12 col-lg-12 col-xl-12 hex-adv">
                            <img src="../images/layout/home/hexagon.svg" width="70px;">
                        </div>
                        <div class="column col-sm-8 col-md-12 col-lg-12 col-xl-12">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio at eius ipsam illum, amet repudiandae.</p>
                        </div>
                    </div>
                </div>
                <div class="column col-4 col-xs-12 col-sm-12 ">
                    <div class="columns spacer card-advantage2">
                        <div class="column col-4 col-sm-4 col-md-12 col-lg-12 col-xl-12 hex-adv">
                            <img src="../images/layout/home/hexagon.svg" width="70px;">
                        </div>
                        <div class="column col-sm-8 col-md-12 col-lg-12 col-xl-12">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio at eius ipsam illum, amet repudiandae.</p>
                        </div>
                    </div>
                </div>
                <div class="column col-4 col-xs-12 col-sm-12">
                    <div class="columns spacer card-advantage3">
                        <div class="column col-4 col-sm-4 col-md-12 col-lg-12 col-xl-12  hex-adv">
                            <img src="../images/layout/home/hexagon.svg" width="70px;">
                        </div>
                        <div class="column col-sm-8 col-md-12 col-lg-12 col-xl-12 ">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio at eius ipsam illum, amet repudiandae.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="highlighted-courses">
        <div class="container grid-md">
            <div class="columns">
                <div class="column col-12 course-row1">
                   <p style="color: #808080;"><strong> Destaques em <?php echo e($featured_category1); ?></strong></p>
                    <div class="slider">                        
                        <?php $__currentLoopData = $featured_courses1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a style="" href="<?php echo e(route('course.single', ['id' => $course->id])); ?>">
                                <div class="course-card">
                                    <div class="course-image" style="background-image: url(../images/aulas/<?php echo e($course->thumb_img); ?>)"></div>
                                    <div class="course-content">
                                        <p><b><?php echo e($course->name); ?></b></p>
                                        <p><?php echo e($course->desc); ?></p>
                                        <div class="course-price"><p><?php echo e($course->price); ?></p></div>
                                    </div>
                                </div>                                
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                        
                    </div>
                </div>
                <div class="column col-12 course-row1">
                    <p style="color: #808080;"><strong> Destaques em <?php echo e($featured_category2); ?></strong></p>
                    <div class="slider">                        
                        <?php $__currentLoopData = $featured_courses2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a  style=" display:block;" href="<?php echo e(route('course.single', ['id' => $course->id])); ?>">
                                <div class="course-card">
                                    <div class="course-image" style="background-image: url(../images/aulas/<?php echo e($course->thumb_img); ?>)"></div>
                                    <div class="course-content">
                                        <p><b><?php echo e($course->name); ?></b></p>
                                        <p><?php echo e($course->desc); ?></p>
                                        <div class="course-price"><p><?php echo e($course->price); ?></p></div>
                                    </div>
                                </div>                                
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about">
        <div class="container grid-md">
            <div class="columns spacer-2">
                <div class="column col-8 col-xs-12 col-sm-12 col-md-12"> 
                    <video controls poster="../images/layout/home/poster-video.PNG" width="500px">
                        <source src="../images/layout/home/presentation-tabula.mp4">
                    </video>
                </div>
                <div class="about-text column col-4 col-xs-12 col-sm-12 col-md-12">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti corporis, sed aperiam! Eum quae assumenda, optio suscipit fugiat facilis minima eos doloremque nostrum, modi quis est repudiandae eveniet tempora sapiente nihil. Quo enim animi accusantium, id sint doloribus obcaecati nulla beatae rerum vero dolore culpa unde delectus at. Voluptate, ex.</p>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>