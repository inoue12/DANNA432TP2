
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Edit Teachers Group'), array('action' => 'edit', $teachersGroup['TeachersGroup']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Teachers Group'), array('action' => 'delete', $teachersGroup['TeachersGroup']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $teachersGroup['TeachersGroup']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Teachers Groups'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Teachers Group'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Teachers'), array('controller' => 'teachers', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Teacher'), array('controller' => 'teachers', 'action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="teachersGroups view">

			<h2><?php  echo __('Teachers Group'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($teachersGroup['TeachersGroup']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Teacher'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($teachersGroup['Teacher']['name'], array('controller' => 'teachers', 'action' => 'view', $teachersGroup['Teacher']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Group'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($teachersGroup['Group']['id'], array('controller' => 'groups', 'action' => 'view', $teachersGroup['Group']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
