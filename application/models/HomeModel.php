<?php
class HomeModel extends CI_Model {
 
function getPosts(){
	$query = $this->db->query('SELECT * FROM users');
	$cars[0]=$query->num_rows();
	$query = $this->db->query('SELECT * FROM images');
	$cars[1]=$query->num_rows();
	return $cars;

	
}
function getimg(){
	
	$query = $this->db->query('select * from images order by id desc limit 8');
	//$row = $this->db->limit(8)->get('images');
	return $query;
	
}
	
 
}
?>