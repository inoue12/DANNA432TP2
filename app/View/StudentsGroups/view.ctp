
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Edit Students Group'), array('action' => 'edit', $studentsGroup['StudentsGroup']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Students Group'), array('action' => 'delete', $studentsGroup['StudentsGroup']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $studentsGroup['StudentsGroup']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Students Groups'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Students Group'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="studentsGroups view">

			<h2><?php  echo __('Students Group'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($studentsGroup['StudentsGroup']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Student'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($studentsGroup['Student']['name'], array('controller' => 'students', 'action' => 'view', $studentsGroup['Student']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Group'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($studentsGroup['Group']['id'], array('controller' => 'groups', 'action' => 'view', $studentsGroup['Group']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
