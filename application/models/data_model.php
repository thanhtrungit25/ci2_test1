<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_model extends CI_Model
{
	function getAll()
  	{
  		$q = $this->db->query("SELECT * FROM data");

  		if ($q->num_rows() > 0) {
  			foreach ($q->result() as $row)	 {
  				$data[] =  $row;
  			}
  		}
  		return $data;
	}
}