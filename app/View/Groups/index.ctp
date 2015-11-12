
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
		
			<ul class="list-group">
				<div class="dropdown">
					<a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Groups')?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li class="list-group-item"><?php echo $this->Html->link(__('New Group'), array('action' => 'add'), array('class' => '')); ?></li>
					</ul>
				</div>
				<div class="dropdown">
					<a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Subjects') ?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li class="list-group-item"><?php echo $this->Html->link(__('List Subjects'), array('controller' => 'subjects', 'action' => 'index'), array('class' => '')); ?></li> 
						<li class="list-group-item"><?php echo $this->Html->link(__('New Subject'), array('controller' => 'subjects', 'action' => 'add'), array('class' => '')); ?></li> 
					</ul>
				</div>
				<div class="dropdown">
					<a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Students')?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li class="list-group-item"><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index'), array('class' => '')); ?></li> 
						<li class="list-group-item"><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add'), array('class' => '')); ?></li> 
					</ul>
				</div>
							<div class="dropdown">
				<a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Program')?> <b class="caret"></b></a>
				<ul class="dropdown-menu">	
					<li class="list-group-item"><?php echo $this->Html->link(__('List Program'), array('controller' => 'programs', 'action' => 'index')); ?> </li>
					<li class="list-group-item"><?php echo $this->Html->link(__('New Program'), array('controller' => 'programs', 'action' => 'add')); ?> </li>
				</ul>
			</div>	
				<div class="dropdown">
					<a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Teachers') ?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li class="list-group-item"><?php echo $this->Html->link(__('List Teachers'), array('controller' => 'teachers', 'action' => 'index'), array('class' => '')); ?></li> 
						<li class="list-group-item"><?php echo $this->Html->link(__('New Teacher'), array('controller' => 'teachers', 'action' => 'add'), array('class' => '')); ?></li> 
					</ul>
					</div>	
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	
	<div id="page-content" class="col-sm-9">

		<div class="groups index">
		
			<h2><?php echo __('Groups'); ?></h2>
			
			<div class="table-responsive">
				<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('groupe'); ?></th>
							<th><?php echo $this->Paginator->sort('local_num'); ?></th>
							<th><?php echo $this->Paginator->sort('session'); ?></th>
							<th><?php echo $this->Paginator->sort('maximum'); ?></th>
							<th><?php echo $this->Paginator->sort('program_id'); ?></th>
							<th><?php echo $this->Paginator->sort('subject_id'); ?></th>
							<th><?php echo $this->Paginator->sort('created'); ?></th>
							<th><?php echo $this->Paginator->sort('modified'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($groups as $group): ?>
	<tr>
		<td><?php echo h($group['Group']['groupe']); ?>&nbsp;</td>
		<td><?php echo h($group['Group']['local_num']); ?>&nbsp;</td>
		<td><?php echo h($group['Group']['session']); ?>&nbsp;</td>
		<td><?php echo h($group['Group']['maximum']); ?>&nbsp;</td>
		<td>
		<?php echo $this->Html->link($group['Subject']['program_id'], array('controller' => 'programs', 'action' => 'view', $group['Subject']['program_id']), array('class' => '')); ?>
		</td>
		<td>
			<?php echo $this->Html->link($group['Subject']['title'], array('controller' => 'subjects', 'action' => 'view', $group['Subject']['id'])); ?>
		</td>
		<td><?php echo h($group['Group']['created']); ?>&nbsp;</td>
		<td><?php echo h($group['Group']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $group['Group']['id']), array('class' => 'btn btn-default btn-xs')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $group['Group']['id']), array('class' => 'btn btn-default btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $group['Group']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->
			
			<p><small>
				<?php
					echo $this->Paginator->counter(array(
					'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
					));
				?>
			</small></p>

			<ul class="pagination">
				<?php
					echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
					echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
					echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
				?>
			</ul><!-- /.pagination -->
			
		</div><!-- /.index -->
	
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->