<?php $__env->startSection('content'); ?>
	<div class="panel panel-default">
		<div class="panel-heading" style="position: relative; height:80x; ">
			<p style="line-height: 40px;">Todos Usuários</p>
			
			<a href="<?php echo e(route('user.create')); ?>">
				<img style=" width:35px; position: absolute; right:15px; top: 12px;" src="<?php echo e(asset('images\add.svg')); ?>">
			</a>

			<input class="form-control" type="text" id="search" onkeyup="Search()" placeholder="Digite um nome de usuário..." style="width: 300px;">

			<select id="usersType" onchange="Filter()">
				<option value="all">Todos tipos de usuário</option>
				<?php $__currentLoopData = $usersType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($userType->desc); ?>"><?php echo e($userType->desc); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>

		</div>
		<div class="panel-body">
			<table class="table table-hover" id="userTable">
				<thead>
					<th>Login</th>
					<th>Nome Completo</th>
					<th>E-mail</th>
					<th>Tipo de Usário</th>
					<th>Editar</th>
					<th>Deletar</th>
				</thead>
				<tbody>
					<?php if($users->count() > 0): ?>
						<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td style="vertical-align: middle !important;"><?php echo e($user->login); ?></td>
								<td style="vertical-align: middle !important;"><?php echo e($user->first_name. ' ' .$user->last_name); ?></td>
								<td style="vertical-align: middle !important;"><?php echo e($user->email); ?></td>
								<td style="vertical-align: middle !important;">
									<?php $__currentLoopData = $user->userTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php echo e($userType->desc); ?>

									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
								</td>
								<td>
									<a href="<?php echo e(route('user.edit', ['id' => $user->id])); ?>">
										<img style=" width:35px; " src="<?php echo e(asset('images\edit.svg')); ?>">
									</a>
								</td>
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

	<?php $__env->startSection('scripts'); ?>
		<script>
			function Search() {
				var input, filter, table, tr, td, i;
				input = document.getElementById("search");
				filter = input.value.toUpperCase();
				table = document.getElementById("userTable");
				tr = table.getElementsByTagName("tr");
				for (i = 0; i < tr.length; i++) {
					td = tr[i].getElementsByTagName("td")[1];
					if (td) {
						if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
							tr[i].style.display = "";
						} else {
							tr[i].style.display = "none";
						}
					}        
				}
			}

			function Filter() {
				var select, option, table, tr, td, i;
				select = document.getElementById("usersType");
				option = select.options[select.selectedIndex].value;
				table = document.getElementById("userTable");
			  	tr = table.getElementsByTagName("tr");
			  	if(option == 'all'){
			  		for (i = 0; i < tr.length; i++) {
			  			tr[i].style.display = "";
        
			  		}
			  	}
			  	else{
			  		for (i = 0; i < tr.length; i++) {
				  		td = tr[i].getElementsByTagName("td")[3];
				  		if (td) {
				  			if (td.innerHTML.indexOf(option) > -1) {
				  				tr[i].style.display = "";
				  			} else {
				  				tr[i].style.display = "none";
				  			}
				  		}        
			  		}	
			  	}
			  	
			}
		</script>
	<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>