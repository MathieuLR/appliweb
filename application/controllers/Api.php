<?php 
class Api extends CI_controller {
	
	public function liste ($id) {
		
		$liste = $this->db->query("SELECT * from produit where IdentifiantRubrique = ?", array($id))->result();
		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($liste));
	}
	// function recherche ($mot) {
	// 	$liste = $this->db->query("SELECT * from Produit where IdentifiantRubrique = ?")->result();
		
	// 	echo json_encode($liste);
	// }
}