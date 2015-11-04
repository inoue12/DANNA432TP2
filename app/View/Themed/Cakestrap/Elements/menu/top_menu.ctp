<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button><!-- /.navbar-toggle -->
		<?php echo $this->Html->Link(__("Home"), array(
                                            'controller' => 'subjects',
                                            'action' => 'index'),
                                            array('class' => 'navbar-brand')); ?>
	</div><!-- /.navbar-header -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
            <li class="active">
                <?php if ($this->Session->check('Auth.User')) {
                    echo $this->Html->link("Hello " . $this->Session->read('Auth.User.username'),
                                            array('controller' => 'users', 'action' => 'view', $this->Session->read('Auth.User.id')));
                    echo "</li><li>";
                    if ($this->Session->read('Auth.User.role') == "admin") {
                        echo $this->Html->link("[add user]", array(
                            'controller' => 'users',
                            'action' => 'add'));
                        echo "</li><li>";
                    }
                    echo $this->Html->link("[Logout]", array(
                        'controller' => 'users',
                        'action' => 'logout'));
                } else {
					echo "</li><li>";
                    echo $this->Html->link("[Login]", array(
                        'controller' => 'users',
                        'action' => 'login')
                    );
					echo "</li><li>";
					 echo $this->Html->link("[Register]", array(
                        'controller' => 'users',
                        'action' => 'register')
                    );
					echo "</li>";
                }
				
                ?>
            </li> 
			<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Languages <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <?php echo $this->I18n->flagSwitcher(array(
                       'class' => 'languages',
                       'id' => 'language-switcher'
                        ));
                ?>
                </ul>
            </li>
		</ul>
	</div>
</nav><!-- /.navbar navbar-default -->