
<div class="nav_bar" >
	<h1>Gestion des élèves</h1>
	<nav>
		<ul id="menu" >
			<li >
				<?php echo $this->Html->link('Ajouter', array('controller' => 'Students','action'=>'addStudent')); ?>
	        </li>
       		<li>
				<?php echo $this->Html->link('Modifier', array('controller' => 'Students','action'=>'chooseStudentModify')); ?>
			</li>
			<li>
				<?php echo $this->Html->link('Supprimer', array('controller' => 'Students','action'=>'remove')); ?>
			</li>
			<li>
				<?php echo $this->Html->link('Ajouter une note', array('controller' => 'Students','action'=>'chooseStudentAddNote')); ?>
			</li>
		</ul>
	</nav>
</div>
	
	