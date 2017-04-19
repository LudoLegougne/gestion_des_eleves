
<div>
	<fieldset>
	<legend>Choisisez l'élève auquel ajouter une note</legend>
		<?php
			echo $this->Form->create('Student', array(
													'required' => 'true', 
													'url' => array(
																'controller' => 'Students', 
																'action' => 'studentAddNote'
															)));
			echo $this->Form->input('liste_eleves', array(
														'options' => $options, 
														'label' => 'Choisisez le nom de l\'élève auquel ajouter une note :'
													));
		?>
		<br />
		<?php echo $this->Form->end('Valider'); ?>
    </fieldset>
</div>
