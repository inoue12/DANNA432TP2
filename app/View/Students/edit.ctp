<?php
  //let's load jquery libs from google
  $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', array('inline' => false));
  $this->Html->script('https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js', array('inline' => false));

  //load file for this view to work on 'autocomplete' field
  $this->Html->script('View/Details/edit', array('inline' => false));
?>
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
		
	<div class="actions">	
			<ul class="list-group">
			<div class="dropdown">
				<a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Students')?> <b class="caret"></b></a>
				<ul class="dropdown-menu">
				<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Student.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Student.id'))); ?></li>				
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
				<a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Program')?> <b class="caret"></b></a>
				<ul class="dropdown-menu">	
					<li class="list-group-item"><?php echo $this->Html->link(__('List Program'), array('controller' => 'programs', 'action' => 'index')); ?> </li>
					<li class="list-group-item"><?php echo $this->Html->link(__('New Program'), array('controller' => 'programs', 'action' => 'add')); ?> </li>
				</ul>
			</div>	
			</ul><!-- /.list-group -->
		
		</div>
		
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	
	<div id="page-content" class="col-sm-9">

		<h2><?php echo __('Edit Student'); ?></h2>

		<div class="students form">
		
			<?php echo $this->Form->create('Student', array('role' => 'form', 'type' => 'file')); ?>

				<fieldset>

					<div class="form-group">
						<?php echo $this->Form->input('id', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('name', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('middle_name', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('last_name', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('other_details', array('class' => 'form-control','id' => 'autocomplete')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('thumb_file', array('type' => 'file')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
							<?php echo $this->Form->input('Group', array('multiple' => 'checkbox'));?>
					</div><!-- .form-group -->

					<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->