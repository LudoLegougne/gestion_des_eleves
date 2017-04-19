
<div>
	<fieldset>
	<legend>Choisisez l'élève à supprimer</legend>
		<?php
			echo $this->Form->create('Student', array(
													'required' => 'true', 
													'url' => array(
																'controller' => 'Students', 
																'action' => 'index',
															)));
			echo $this->Form->input('liste_eleves', array(
														'options' => $options, 
														'label' => 'Choisisez le nom de l\'élève à supprimer :'
													));
		?>
		<br />
		<?php echo $this->Form->end('Valider'); ?>
    </fieldset>
</div>


