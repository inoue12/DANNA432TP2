
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
		
			<ul class="list-group">
			<div class="dropdown">
				<a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Teachers')?> <b class="caret"></b></a>
				<ul class="dropdown-menu">	
					<li class="list-group-item"><?php echo $this->Html->link(__('New Teacher'), array('controller' => 'teachers', 'action' => 'add')); ?> </li>
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
				<a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Program')?> <b class="caret"></b></a>
				<ul class="dropdown-menu">	
					<li class="list-group-item"><?php echo $this->Html->link(__('List Program'), array('controller' => 'programs', 'action' => 'index')); ?> </li>
					<li class="list-group-item"><?php echo $this->Html->link(__('New Program'), array('controller' => 'programs', 'action' => 'add')); ?> </li>
				</ul>
			</div>
	
	
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	
	<div id="page-content" class="col-sm-9">

		<div class="teachers index">
		
			<h2><?php echo __('Teachers'); ?></h2>
			
			<div class="table-responsive">
				<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('name'); ?></th>
							<th><?php echo $this->Paginator->sort('last_name'); ?></th>
							<th><?php echo $this->Paginator->sort('Groupe'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($teachers as $teacher): ?>
	<tr>
		<td><?php echo h($teacher['Teacher']['name']); ?>&nbsp;</td>
		<td><?php echo h($teacher['Teacher']['last_name']); ?>&nbsp;</td>
				<td><?php 
                    foreach ($teacher['Group'] as $tag) { 
                        // echo h($tag['id']) . ' '; 
                        // echo $this->Html->tag('span', $tag['groupe'] . ' ', array('class' => 'label label-info')) . " &nbsp;";
						echo $this->Html->link(__($tag['groupe']), array('controller' => 'groups', 'action' => 'view', $tag['id']), array('class' => 'btn btn-default btn-xs'));
                    } 
                    ?>
                    &nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $teacher['Teacher']['id']), array('class' => 'btn btn-default btn-xs')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $teacher['Teacher']['id']), array('class' => 'btn btn-default btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $teacher['Teacher']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $teacher['Teacher']['id'])); ?>
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