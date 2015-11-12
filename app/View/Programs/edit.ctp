
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">	
			<ul class="list-group">
			<div class="dropdown">
					<a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Programs')?><b class="caret"></b></a>
					<ul class="dropdown-menu">
					<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Programs.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Programs.id'))); ?></li>
						<li class="list-group-item"><?php echo $this->Html->link(__('List Programs'), array('action' => 'index')); ?></li>
						<li class="list-group-item"><?php echo $this->Html->link(__('New Program'), array('controller' => 'programs', 'action' => 'add')); ?> </li>
					</ul>
			</div>
			<div class="dropdown">
				<a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Students')?> <b class="caret"></b></a>
				<ul class="dropdown-menu">	
					<li class="list-group-item"><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
					<li class="list-group-item"><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
				</ul>
			</div>
			
			<div class="dropdown">
				<a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Subjects')?> <b class="caret"></b></a>
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
							<div class="dropdown">
				<a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Groups')?> <b class="caret"></b></a>
				<ul class="dropdown-menu">	
					<li class="list-group-item"><?php echo $this->Html->link(__('List Group'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
					<li class="list-group-item"><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
				</ul>
			</div>				
			</ul><!-- /.list-group -->
		
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	
	<div id="page-content" class="col-sm-9">

		<h2><?php echo __('Edit Program'); ?></h2>

		<div class="programs form">
		
			<?php echo $this->Form->create('Program', array('role' => 'form')); ?>

				<fieldset>

					<div class="form-group">
						<?php echo $this->Form->input('id', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('name', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->

					<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->