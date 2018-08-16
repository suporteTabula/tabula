<?php $__env->startSection('content'); ?>
    <section class="hero-wrapper">
        <div class="hero-text">
            <h1>A mais simples e inovadora plataforma de ensino a distância</h1>
            <button class="tabula-button-inverted">Descubra</button>
        </div>
        <div class="presentation-video"></div>
    </section>
    <h1 style="color: #404040; margin-top: 120px; text-align: center;">MACROTEMAS</h1>
    <section class="macrotemas-mobile">
        <?php for($i = 0; $i<3; $i++): ?>
            <div class="hex-col-<?php echo e($i+1); ?>">
                <?php for($j = 0; $j < $mobile_col_limit; $j++): ?>
                    <div class="hexagon">
                        <a href="<?php echo e(route('category.single', ['id' => $mobile_categories[$mobile_category_count]->id])); ?>" class="hex-inner"> <img src="images/hex/mobile/<?php echo e($mobile_category_count); ?>.svg">
                            <p><?php echo e($mobile_categories[$mobile_category_count]->desc); ?></p> 
                            <img class="macro-icon" src="images/hex/icon/<?php echo e($mobile_category_count); ?>.svg" style="display: none;"> 
                        </a>
                        <?php ($mobile_category_count++); ?>
                    </div>
                <?php endfor; ?>
                <?php if($mobile_col_limit == 5): ?>
                    <?php ($mobile_col_limit = 6); ?>
                <?php else: ?>
                    <?php ($mobile_col_limit = 5); ?>
                <?php endif; ?>
            </div>
        <?php endfor; ?>
    </section>
    <section class="macrotemas-desktop">
        <?php for($i = 0; $i<3; $i++): ?>
            <div class="hex-row-<?php echo e($i+1); ?>">
                <?php for($j = 0; $j < $row_limit; $j++): ?>
                    <div class="hexagon">
                        <a href="<?php echo e(route('category.single', ['id' => $categories[$category_count]->id])); ?>" class="hex-inner"> <img src="images/hex/desktop/<?php echo e($category_count); ?>.svg">
                            <p><?php echo e($categories[$category_count]->desc); ?></p> 
                            <img class="macro-icon" src="images/hex/icon/<?php echo e($category_count); ?>.svg" style="display: none;"> 
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
    </section>
    <section class="most-viewed-wrapper">
        <h1 style="color: #404040; margin-top: 120px; text-align: center;">MAIS VISUALIZADOS</h1>
        <p style="color: #808080; padding-left: 35px;">Cursos populares em <?php echo e($featured_category1); ?></p>
        <div class="carousel1">
            <?php $__currentLoopData = $featured_courses1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('course.single', ['id' => $course->id])); ?>" class="card">
                    <div class="card-media" style="background-image: url(../images/aulas/<?php echo e($course->id); ?>.jpg);">
                        <div class="card-overlay"></div>
                    </div>
                    <p><b><?php echo e($course->name); ?></b></p>
                    <p><?php echo e($course->desc); ?></p>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <p style="color: #808080; padding-left: 35px;">Cursos populares em <?php echo e($featured_category2); ?></p>
        <div class="carousel2">
            <?php $__currentLoopData = $featured_courses2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('course.single', ['id' => $course->id])); ?>" class="card">
                    <div class="card-media" style="background-image: url(../images/aulas/<?php echo e($course->id); ?>.jpg);">
                        <div class="card-overlay"></div>
                    </div>
                    <p><b><?php echo e($course->name); ?></b></p>
                    <p><?php echo e($course->desc); ?></p>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
    <h1 style="color: #404040; margin-top: 120px; text-align: center;">BLOG</h1>
    <section class="blog-wrapper">
        <div class="carousel3">
            <?php $__currentLoopData = $featured_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('course.single', ['id' => $post->id])); ?>" class="card">
                    <div class="card-media" style="background-image: url(../images/aulas/<?php echo e($post->id); ?>.jpg);">
                        <div class="card-overlay"></div>
                    </div>
                    <p><b><?php echo e($post->name); ?></b></p>
                    <p><?php echo e($post->desc); ?></p>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>