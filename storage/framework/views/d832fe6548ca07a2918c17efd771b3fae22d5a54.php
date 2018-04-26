<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registre-se</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="<?php echo e(route('register')); ?>">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group<?php echo e($errors->has('first_name') ? ' has-error' : ''); ?>">
                                <label for="first_name" class="col-md-4 control-label">Nome</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control" name="first_name" value="<?php echo e(old('first_name')); ?>" required autofocus>

                                    <?php if($errors->has('first_name')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('first_name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>                            
                            </div>

                            <div class="form-group<?php echo e($errors->has('last_name') ? ' has-error' : ''); ?>">
                                <label for="last_name" class="col-md-4 control-label">Sobrenome</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" name="last_name" value="<?php echo e(old('last_name')); ?>" required autofocus>

                                    <?php if($errors->has('last_name')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('last_name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('login') ? ' has-error' : ''); ?>">
                                <label for="login" class="col-md-4 control-label">Login</label>

                                <div class="col-md-6">
                                    <input id="login" type="text" class="form-control" name="login" value="<?php echo e(old('login')); ?>" required autofocus>

                                    <?php if($errors->has('login')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('login')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <label for="email" class="col-md-4 control-label">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('nickname') ? ' has-error' : ''); ?>">
                                <label for="nickname" class="col-md-4 control-label">Apelido</label>

                                <div class="col-md-6">
                                    <input id="nickname" type="nickname" class="form-control" name="nickname" value="<?php echo e(old('nickname')); ?>" required>

                                    <?php if($errors->has('nickname')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('nickname')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('sex') ? ' has-error' : ''); ?>">
                                <label for="sex" class="col-md-4 control-label">Sexo</label>

                                <div class="col-md-6">
                                    <label class="radio-inline"><input type="radio" name="sex" value="Masculino">Masculino</label>
                                    <label class="radio-inline"><input type="radio" name="sex" value="Feminino">Feminino</label>

                                    <?php if($errors->has('sex')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('sex')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('country') ? ' has-error' : ''); ?>">
                                <label for="country" class="col-md-4 control-label">País</label>

                                <div class="col-md-6">
                                    <select id="country" name="country_id" class="form-control">
                                        <option value="" selected disabled hidden>Escolha um...</option>
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($country->id); ?>"> <?php echo e($country->name); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                    <?php if($errors->has('country')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('country')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="state">
                                <div class="form-group<?php echo e($errors->has('state') ? ' has-error' : ''); ?>">
                                    <label for="state" class="col-md-4 control-label">Estado</label>

                                    <div class="col-md-6">
                                        <select id="state" name="state_id" class="form-control">
                                            <option value="" selected disabled hidden>Escolha um...</option>
                                            <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($state->id); ?>"> <?php echo e($state->name); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                        <?php if($errors->has('state')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('state')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                <label for="password" class="col-md-4 control-label">Senha</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    <?php if($errors->has('password')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirmar Senha</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('schooling') ? ' has-error' : ''); ?>">
                                    <label for="country" class="col-md-4 control-label">Escolaridade</label>

                                    <div class="col-md-6">
                                        <select id="schooling" name="schooling_id" class="form-control">
                                            <option value="" selected disabled hidden>Escolha um...</option>
                                            <?php $__currentLoopData = $schoolings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schooling): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($schooling->id); ?>"> <?php echo e($schooling->desc); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                        <?php if($errors->has('schooling')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('schooling')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Registre-se
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php $__env->startSection('scripts'); ?>
        <script>

            $('.state').hide();
            $('#country').change(function(){
                if($('#country').val() == 1){
                    $('.state').show();
                } else{
                    $('.state').hide();
                }
            });

        </script>
    <?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>