<?php
class StudentsController extends AppController{
	//	La vue index sert de page d'accueil
	public function index() {
		//	On test si des paramètres sont passés dans  $_POST
		if(!empty($this->data)){
			
			//	Test des paramètres si ils sont suffisant pour modifier un élève
			if(is_string($this->data['Student']['id']) && is_string($this->data['Student']['nom'])){
				//	Requête pour update de l'élève
				$this->Student->save($this->data);
				$this->Flash('Modification effectué', '../');
				
			//	Si les paramètres sont insuffisant pour un update, on ajoute un nouvel élève
			} else if(is_string($this->data['Student']['nom'])) {
				//	Requête pour l'ajout d'un élève
				$this->Student->save($this->data);
				$this->Flash('Enregistrement effectué', '../');
				
			//	Test des paramètres pour supprimer un élève
			} else if(is_numeric($this->data['Student']['liste_eleves'])) {
				//	On récupère la liste des élèves classés par nom
				$chosenStudent= $this->select_name();
				//	On supprime l'élève
				$this->Student->delete($chosenStudent['Student']['id']);
				$this->Flash('Suppression effectué', '../');
			
			//	Test des paramètres pour la condition d'ajout d'une note
			} else if(is_string($this->data['Student']['id']) && is_string($this->data['Student']['matiere']) && is_string($this->data['Student']['note'])) {
				//	On récupère le nom de l'élève
				$resultStudent = $this->Student->find('all', array(
																'conditions' => array(
																				'Student.id' => $this->data['Student']['id']
																		)));
				$chosenStudent = $resultStudent[0];
				//	On charge le modèle Subject puis on récupére la liste des matières
				$this->loadModel(Subject::class);
				$resultSubject = $this->Subject->find('all', array('order' => 'matiere'));
				$idmatiere = $resultSubject[$this->data['Student']['matiere']];
				//	On charge le modèle Bulletin pour insertion (nom prénom/matière/note)
				$this->loadModel(Bulletin::class);
				$this->Bulletin->save(array(
										'Bulletin' => array(
														'nom_eleve' => $chosenStudent['Student']['nom'].' '.$chosenStudent['Student']['prenom'],
														'matiere' => $idmatiere['Subject']['matiere'],
														'note' => $this->data['Student']['note']
													)));
				$this->Flash('Note ajoutée', '../');
			}
		}
	}
	
	//	Action pour l'ajout d'un élève
	public function addStudent() {

	}
	
	//	Action choix de l'élève à modifier
	public function chooseStudentModify() {
		//	Récupération de la liste d'élève classé par nom
		$options = $this->select_list_name();
		$this->set(compact('options'));
	}
	
	//	Action pour modifier les valeurs d'un élève
	public function modifyStudent() {
		//	Récupération de la liste d'élève classé par nom
		$chosenStudent = $this->select_name();
		$this->set(compact('chosenStudent'));
	}
	
	//	Action pour choix de l'élève à supprimer
	public function remove() {
		//	Récupération de la liste d'élève classé par nom
		$options = $this->select_list_name();
		$this->set(compact('options'));
	}
	
	//	Action choix de l'élève pour ajouter une note
	public function chooseStudentAddNote() {
		//	Récupération de la liste d'élève classé par nom
		$options = $this->select_list_name();
		$this->set(compact('options'));
	}
	
	//	Action pour sélectionner la matière et la note
	public function studentAddNote() {
		//	Remplit le champ nom prénom de l'élève auquel sera ajoutée la note 
		$chosenStudent = $this->select_name();
		$this->set(compact('chosenStudent'));
		
		//	Remplit le champ du choix de la matière
		$matieres = $this->select_list_subject();
		$this->set(compact('matieres'));
		
		//	Remplit le champ du choix de la note
		$notes = $this->select_list_note();
		$this->set(compact('notes'));
	}

////////////////////////////////////////////////////////////////////
//
//						FONCTIONS
//
///////////////////////////////////////////////////////////////////

	public function select_list_name() {
		$result = $this->Student->find('all', array('order' => 'nom'));
		//	Création d'un tableau de (noms prénoms) pour les passer à la vue
		foreach ($result as $name):
			$options[] = $name['Student']['nom'].' '.$name['Student']['prenom'];
		endforeach;
		return $options;
	}
	
	public function select_name() {
		$result = $this->Student->find('all', array('order' => 'nom'));
		//	On met le nom dans une variable pour l'envoyer à la vue
		$chosenStudent = $result[$this->data['Student']['liste_eleves']];
		return $chosenStudent;
	}
	
	public function select_list_subject() {
		$this->loadModel(Subject::class);
		$resultSubjects = $this->Subject->find('all', array('order' => 'matiere'));
		//	Création d'un tableau des matières pour les passer à la vue
		foreach ($resultSubjects as $matiere):
			$matieres[] = $matiere['Subject']['matiere'];
		endforeach;
		return $matieres;
	}
	
	public function select_list_note() {
		$this->loadModel(Note::class);
		$resultNotes = $this->Note->find('all', array('order' => 'note'));
		//	Création d'un tableau des notes pour les passer à la vue
		foreach ($resultNotes as $note):
			$notes[] = $note['Note']['note'];
		endforeach;
		return $notes;
	}
	
}
?>

