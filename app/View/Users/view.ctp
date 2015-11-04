
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">
			<div class="dropdown">
				<a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Users')?> <b class="caret"></b></a>
				<ul class="dropdown-menu">	
					<li class="list-group-item"><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id']), array('class' => '')); ?> </li>
					<li class="list-group-item"><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
					<li class="list-group-item"><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
				</ul>
			</div>	
			<div class="dropdown">
				<a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Students')?><b class="caret"></b></a>
				<ul class="dropdown-menu">	
					<li class="list-group-item"><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
					<li class="list-group-item"><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
				</ul>
			</div>
			<div class="dropdown">
					<a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Groups')?><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li class="list-group-item"><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups','action' => 'index')); ?></li>
						<li class="list-group-item"><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
					</ul>
			</div>			
			<div class="dropdown">
				<a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Subjects')?><b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li class="list-group-item"><?php echo $this->Html->link(__('List Subjects'), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
					<li class="list-group-item"><?php echo $this->Html->link(__('New Subject'), array('controller' => 'subjects', 'action' => 'add')); ?> </li>
				</ul>
			</div>
			<div class="dropdown">
				<a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Teachers')?><b class="caret"></b></a>
				<ul class="dropdown-menu">	
					<li class="list-group-item"><?php echo $this->Html->link(__('List Teachers'), array('controller' => 'teachers', 'action' => 'index')); ?> </li>
					<li class="list-group-item"><?php echo $this->Html->link(__('New Teacher'), array('controller' => 'teachers', 'action' => 'add')); ?> </li>
				</ul>
			</div>	
	
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="users view">

			<h2><?php  echo __('User'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
					<tr>		<td><strong><?php echo __('Username'); ?></strong></td>
		<td>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Role'); ?></strong></td>
		<td>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Email'); ?></strong></td>
		<td>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
