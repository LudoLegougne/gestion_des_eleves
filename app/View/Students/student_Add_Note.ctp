
<div>
	<fieldset>
	<legend>Ajouter la matière et la note</legend>
		<?php
			echo $this->Form->create('Student', array(
													'required' => 'true', 
													'url' => array(
																'controller' => 'Students', 
																'action' => 'index',
															)));
			echo $this->Form->input('id', array('value' => $chosenStudent['Student']['id']));
			echo $this->Form->input('nom', array(
												'disabled' => 'disabled',
												'label' => 'Nom de l\'élève :',  
												'value' => $chosenStudent['Student']['nom'].' '.$chosenStudent['Student']['prenom']
											));
		?>
		<br /><br />
		<?php
			echo $this->Form->input('matiere', array(
												'options' => $matieres, 
												'label' => 'Matières :'
											));
		?>
		<br />
		<?php echo $this->Form->input('note', array(
													'options' => $notes, 
													'label' => 'Notes :'
												)); ?>
		<br />
		<?php echo $this->Form->end('Valider'); ?>
    </fieldset>
</div>