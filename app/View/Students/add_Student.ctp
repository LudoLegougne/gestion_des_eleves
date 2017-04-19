
<div>
	<fieldset>
	<legend>Ajouter un nouvel élève</legend>
		<?php	//	Formulaire pour ajouter un élève
			echo $this->Form->create('Student', array(
													'url' => array(
																'controller' => 'Students', 
																'action' => 'index'
															)));
			echo $this->Form->input('nom', array(
												'label' => 'Nom :', 
												'required' => 'true', 
												'placeholder' => 'Ex: DUPONT'
											));
		?>
	<br />
		<?php echo $this->Form->input('prenom', array(
													
													'label' => 'Prénom :', 
													'required' => 'true', 
													'placeholder' => 'Ex: Eric'
												)); 
		?>
	<br />
		<?php echo $this->Form->input('date_naissance', array(
															'label' => 'Date de naissance :', 
															'required' => 'true', 
															'dateFormat' => 'DMY',
															'minYear' => date('Y') -70,
															'placeholder' => 'Ex: Jour/Mois/Année',
															'type' => 'date'
														)); ?>
	<br />
		<?php echo $this->Form->end('Valider'); ?>
	</fieldset>
</div>


