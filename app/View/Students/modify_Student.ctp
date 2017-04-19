
<div>
	<fieldset>
	<legend>Modifier les informations de l'élève</legend>
		<?php
			echo $this->Form->create('Student', array(
													'url' => array(
																'controller' => 'Students', 
																'action' => 'index'
															)));
			echo $this->Form->input('id', array('value' => $chosenStudent['Student']['id']));
			echo $this->Form->input('nom', array(
												'label' => 'Nom :', 
												'required' => 'true', 
												'value' => $chosenStudent['Student']['nom']
											));
		?>
	<br />
		<?php echo $this->Form->input('prenom', array(
													
													'label' => 'Prénom :', 
													'required' => 'true', 
													'value' => $chosenStudent['Student']['prenom']
												)); ?>
	<br />
		<?php echo $this->Form->input('date_naissance', array(
															'label' => 'Date de naissance :', 
															'required' => 'true', 
															'dateFormat' => 'DMY',
															'minYear' => date('Y') -70,
															'value' => $chosenStudent['Student']['date_naissance'],
															'type' => 'date'
														)); ?>
	<br />
		<?php echo $this->Form->end('Valider'); ?>
	</fieldset>
</div>


