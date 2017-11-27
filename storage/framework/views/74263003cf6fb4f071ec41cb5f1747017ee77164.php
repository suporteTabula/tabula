<?php $__env->startSection('content'); ?>
	<div class="panel panel-default">
		<div class="panel-heading" style="position: relative; height:80x; ">
			<p style="line-height: 40px;">Todos Usuários</p>
			
			<a href="<?php echo e(route('user.create')); ?>">
				<img style=" width:35px; position: absolute; right:15px; top: 12px;" src="<?php echo e(asset('images\add.svg')); ?>">
			</a>

						
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>Nome</th>
					<th>Tipo de Usário</th>
					<th>Editar</th>
					<th>Deletar</th>
				</thead>
				<tbody>
					<?php if($users->count() > 0): ?>
						<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td style="vertical-align: middle !important;"><?php echo e($user->name); ?></td>
								<td style="vertical-align: middle !important;"><?php echo e($user->usersType->type_name); ?></td>
								<td><img style=" width:35px; " src="<?php echo e(asset('images\edit.svg')); ?>"></td>
								<td>
									<?php if(Auth::id() !== $user->id): ?>
										<a href="<?php echo e(route('user.delete', ['id' => $user->id])); ?> ">
											<img style=" width:35px; " src="<?php echo e(asset('images\error.svg')); ?>">
										</a>
									<?php endif; ?>
								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php else: ?>						
					<tr>
							<td colspan="4" class="text-center">Sem usuários</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>