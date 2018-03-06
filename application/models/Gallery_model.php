<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends CI_Model {

	public function all()
	{
		$result = $this->db->get('images');
		return $result;
	}

	public function find($id)
	{
		$row = $this->db->where('id',$id)->limit(1)->get('images');
		return $row;
	}

	public function create($data)
	{
		try{
			$this->db->insert('images', $data);
			return true;
		}catch(Exception $e){
			return $e;
		}
	}

	public function update($id, $data)
	{
		try{
			$this->db->where('id',$id)->limit(1)->update('images', $data);
			return true;
		}catch(Exception $e){
			return $e;
		}
	}

	public function delete($id)
	{
		try {
			/*error_reporting(E_ALL); ini_set('display_errors', 1);
			$this->db->select('file');
			$this->db->from('images');
			$imageurl=$this->db->where('id',$id);
			//$this->db->where('id',$id)->delete('images');
			var_dump($imageurl);
			unlink($imageurl) or die("could not print");
			var_dump($imageurl);
			//return true;
			*/
			$this->db->select('file');
			$this->db->from('images');
			$this->db->where('id',$id);
			$resSQL = $this->db->get();
			if ($resSQL->num_rows() > 0) {
				$resultRaw = $resSQL->result_array();
				$result = $resultRaw[0];
				$imageurl = $result['file'];
				$this->db->where('id',$id)->delete('images');
		   unlink($imageurl) or die("Failed to delete");
			}
			//code for thumbnail deletion
			$old=$imageurl;
			$old=substr($old,7,-3);
			$old="thumbnail".$old."png";
			unlink($old);
			
		}

		//catch exception
		catch(Exception $e) {
		  echo $e->getMessage();
		}
	}

}