<?php $__env->startSection('content'); ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>Macrotemas</th>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <a href="<?php echo e(route('category.single', ['id' => $category->id])); ?>">
                                    <div style="height:100%;width:100%">
                                        <?php echo e($category->desc); ?> (<?php echo e($category->courses->count()); ?>)
                                    </div>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <table class="table table-hover">
                <thead>
                    <th>CURSOS EM DESTAQUE EM <?php echo e($featured_category1); ?></th>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $featured_courses1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <a href="<?php echo e(route('course.single', ['id' => $course->id])); ?>">
                                    <?php echo e($course->name); ?>

                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <table class="table table-hover">
                <thead>
                    <th>CURSOS EM DESTAQUE EM <?php echo e($featured_category2); ?></th>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $featured_courses2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <a href="<?php echo e(route('course.single', ['id' => $course->id])); ?>">
                                    <?php echo e($course->name); ?>

                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <table class="table table-hover">
                <thead>
                    <th>BLOG</th>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $featured_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <a href="<?php echo e(route('course.single', ['id' => $post->id])); ?>">
                                    <?php echo e($post->name); ?>

                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>