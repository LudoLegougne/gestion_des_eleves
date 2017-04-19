
<div>
	<fieldset>
	<legend>Choisisez l'élève à modifier</legend>
		<?php
			echo $this->Form->create('Student', array(
													'required' => 'true', 
													'url' => array(
																'controller' => 'Students', 
																'action' => 'modifyStudent'
															)));
			echo $this->Form->input('liste_eleves', array(
														'options' => $options, 
														'label' => 'Choisisez le nom de l\'élève à modifier :'
													));
		?>
		<br />
		<?php echo $this->Form->end('Valider'); ?>
    </fieldset>
</div>
