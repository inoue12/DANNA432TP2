<?php

if (!Configure::read('debug')):
	throw new NotFoundException();
endif;

App::uses('Debugger', 'Utility');
?>
<ul>
	<li><h4>NOM, Prénom</h4>
	<ul><li><?php echo __d('cake_dev', 'DANANE, Nawar'); ?></li></ul></li>
	<li><h4><?php echo __d('cake_dev', 'Titre du cours: '); ?> </h4>
	<ul><li><?php echo __d('cake_dev', '420-267 MO Développer un site Web et une application pour Internet.'); ?></li>
		<li><?php echo __d('cake_dev', 'Automne 2015, Collège Montmorency.'); ?></li></ul></li>
	<li><h4><?php echo __d('cake_dev', 'Etapes d\'utilisation typiques '); ?> </h4>
	<ul><li><?php echo __d('cake_dev', 'Pour le téléversement de l\'image est situé au niveau de la table étudiant, lorsqu\'on crée un étudiant, l\'étudiant a le choix d\'ajouter une image.'); ?></li>
		<li><?php echo __d('cake_dev', 'Pour les liste liée est situé au niveau de la table groupe, lorsqu\'un professeur ajoute un groupe ou un admin. Pour avoir des programme et des sujets il faut les créer et les liés ensemble.'); ?></li>
		<li><?php echo __d('cake_dev', 'Pour l\'autocomplete, c\'est au niveau des étudiant également, c\'est lorsqu\'on veut ajouter des details sur l\'étudiant.'); ?></li>
		<li><?php echo __d('cake_dev', 'Pour l\'email, lorsqu\'on active l\'utilisateur, cet utilisateur devient vraiment un student. Seul les admin pourrait changer les utilisateur student à teacher ansi de suite.'); ?></li>
	</ul></li>
	<li><h4><?php echo __d('cake_dev', 'Résultat attendu'); ?> </h4>
	<ul><li><?php echo __d('cake_dev', 'Pour le téléversement de l\'image, l\'utilisateur doit mettre ou bien une image pgn gif ou jpeg, les images très grands format font planter l\'enregistrement'); ?></li>
		<li><?php echo __d('cake_dev', 'Pour les liste liée, il faut d\'abord ajouter des programmes et des sujets pour l\'utiliser après on peut ajouter des groupes.'); ?></li>
		<li><?php echo __d('cake_dev', 'Pour l\'autocomplete,on ne peut pas ajouter de suggestion, par contre au niveau d\'e l\'utilisateur s\'il tapper une lettre il recevra des suggestions.'); ?></li>
		<li><?php echo __d('cake_dev', 'Pour l\'email, quand on s\'inscrit, on recevra un email pour une confirmation du compte.'); ?></li>
	</ul></li>
	<li><h4><?php echo __d('cake_dev', 'Database'); ?> </h4>
	<ul><li><?php echo $this->Html->image('db.png', array('alt' => 'CakePHP', 'border' => '0', 'data-src' => 'holder.js/100%x100')); ?></li>
	<li><a href="http://www.databaseanswers.org/data_models/school_management_systems/index.htm"> Inspiration de base de données </a></li></ul></li>
</ul>
