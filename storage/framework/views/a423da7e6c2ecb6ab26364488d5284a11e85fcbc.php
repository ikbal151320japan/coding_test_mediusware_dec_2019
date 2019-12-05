<?php $__env->startSection('content'); ?>

	<div class="container-fluid app-body">
		<h3>Recents Posts Sent To Buffer</h3>
			<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered table-hover"> 
				<thead> 
					<tr><th>Group Name</th> <th>Group Type</th> <th>Account Name</th> <th>Post Text</th> <th>Time</th> </tr> 
				</thead> 
				<tbody> 
				<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td width="350">
							<?php echo e($post->groupInfo->name); ?>

						</td> 
						<td>
							<?php echo e($post->groupInfo->type); ?>

						</td> 
						<td>
							<div class="media">
								<div class="media-left">
									<a href="">
										<span class="fa fa-<?php echo e($post->accountInfo->type); ?>"></span>
										<img width="50" class="media-object img-circle" src="<?php echo e($post->accountInfo->avatar); ?>" alt="">
									</a>
								</div>
							</div>
						</td> 
						<td>
							<?php echo e($post->post_text); ?>

						</td> 
						<td>
							<?php echo e($post->formatDateTime()); ?>

						</td> 
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody> 
			</table>
			<?php echo e($posts->links()); ?>

		</div>
	</div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>