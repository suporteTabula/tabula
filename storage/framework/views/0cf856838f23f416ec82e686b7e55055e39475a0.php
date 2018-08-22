<?php $__env->startSection('content'); ?>
    <section class="hero-landing">
        <div class="container grid-md">
            <div class="columns">
                <div class="column col-12 col-xs-12 col-sm-12 hero-text">
                    <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true, "autoPlay": 2500, "pageDots": false, "draggable": false}'>
                        <div class="carousel-cell--1">
                            <a id="carousel-redirect" href="#"></a>
                        </div>
                        <div class="carousel-cell--2">
                            <a id="carousel-redirect" href="#"></a>
                        </div>
                        <div class="carousel-cell--3">
                            <a id="carousel-redirect" href="#"></a>
                        </div>
                        <div class="carousel-cell--4">
                            <a id="carousel-redirect" href="#"></a>
                        </div>
                        <div class="carousel-cell--5">
                            <a id="carousel-redirect" href="#"></a>
                        </div>
                        <div class="carousel-cell--6">
                            <a id="carousel-redirect" href="#"></a>
                        </div>
                        <div class="carousel-cell--7">
                            <a id="carousel-redirect" href="#"></a>
                        </div>
                        <div class="carousel-cell--8">
                            <a id="carousel-redirect" href="#"></a>
                        </div>
                        <div class="carousel-cell--9">
                            <a id="carousel-redirect" href="#"></a>
                        </div>
                        <div class="carousel-cell--10">
                            <a id="carousel-redirect" href="#"></a>
                        </div>
                        <div class="carousel-cell--11">
                            <a id="carousel-redirect" href="#"></a>
                        </div>
                        <div class="carousel-cell--12">
                            <a id="carousel-redirect" href="#"></a>
                        </div>
                        <div class="carousel-cell--13">
                            <a id="carousel-redirect" href="#"></a>
                        </div>
                        <div class="carousel-cell--14">
                            <a id="carousel-redirect" href="#"></a>
                        </div>
                        <div class="carousel-cell--15">
                            <a id="carousel-redirect" href="#"></a>
                        </div>
                        <div class="carousel-cell--16">
                            <a id="carousel-redirect" href="#"></a>
                        </div>
                    </div>
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
                        <div class="column col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <p>O Tábula possui uma plataforma inédita e fácil de usar, com cursos das mais diversas áreas do conhecimento.</p>
                        </div>
                    </div>
                </div>
                <div class="column col-4 col-xs-12 col-sm-12 ">
                    <div class="columns spacer card-advantage2">
                        <div class="column col-4 col-sm-4 col-md-12 col-lg-12 col-xl-12 hex-adv">
                            <img src="../images/layout/home/hexagon.svg" width="70px;">
                        </div>
                        <div class="column col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <p>Para os alunos, há a disponibilidade de aprender e assistir aulas dos mais variados temas no tempo que quiser. Já aos professores, oferecemos a assessoria necessária, com salas para gravação e a edição destas.</p>
                        </div>
                    </div>
                </div>
                <div class="column col-4 col-xs-12 col-sm-12">
                    <div class="columns spacer card-advantage3">
                        <div class="column col-4 col-sm-4 col-md-12 col-lg-12 col-xl-12  hex-adv">
                            <img src="../images/layout/home/hexagon.svg" width="70px;">
                        </div>
                        <div class="column col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                            <p>Leve o Tábula para dentro de sua emrpesa através da realização de parcerias conosco. Procuramos realizar contratos com instituições de ensino que procuram crescer e disseminar uma educação de qualidade.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="highlighted-courses">
        <div class="container grid-md">
            <div class="columns">
            <h5>Cursos em destaque: <?php echo e($featured_category1); ?></h5>
                <div class="highlighted-carousel" data-flickity='{ "cellAlign": "left", "contain": true, "groupCells": true, "pageDots": false }'>
                    <?php $__currentLoopData = $featured_courses1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="course-card">
                        <a href="<?php echo e(route('course.single', ['id' => $course->id])); ?>">
                            <div class="course-card__image" style="background-image: url(../images/aulas/<?php echo e($course->thumb_img); ?>);"></div>
                            <div class="course-card__description">
                                <p><?php echo e($course->name); ?></p>
                                <p><?php echo e($course->desc); ?></p>
                                <div class="course-card__price"><?php echo e($course->price); ?></div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <h5>Cursos em destaque: Varejo e Consumo</h5>
                <div class="highlighted-carousel" data-flickity='{ "cellAlign": "left", "contain": true, "groupCells": true, "pageDots": false }'>
                    <?php $__currentLoopData = $featured_courses2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="course-card">
                        <a href="<?php echo e(route('course.single', ['id' => $course->id])); ?>">
                            <div class="course-card__image" style="background-image: url(../images/aulas/<?php echo e($course->thumb_img); ?>);"></div>
                            <div class="course-card__description">
                                <p><?php echo e($course->name); ?></p>
                                <p><?php echo e($course->desc); ?></p>
                                <div class="course-card__price"><?php echo e($course->price); ?></div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>


    <script>
        $('.highlighted-carousel').flickity({
        // options
        cellAlign: 'left',
        contain: true
    });
    </script>

    <section class="about">

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

    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>


    <script>
        $('.highlighted-carousel').flickity({
        // options
        cellAlign: 'left',
        contain: true
    });
    </script>
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <?php $__env->startSection('scripts'); ?>
        <script src="<?php echo e(asset('js/clamp.min.js')); ?>"></script>
        u
        <script>
            var title = document.getElementsByClassName("lineclamp-title");
            var desc = document.getElementsByClassName("lineclamp-desc");

            $clamp(title, {clamp: 1, useNativeClamp: false});
            $clamp(desc, {clamp: 3});
        </script>
    <?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>