<?php

	class MY_Model extends CI_Model {
		 const DB_TABLE = 'abstract';
		 const DB_TABLE_PK = 'abstract';

		 // create record
		 private function insert() {
		 	$this->db->insert($this::DB_TABLE, $this);
		 	$this->{$this::DB_TABLE_PK} = $this->db->insert_id();
		 }

		 // update record
		 private function update(){
		 	$this->db->update($this::DB_TABLE, $this, $this::DB_TABLE_PK);
		 }


		 // populate from and array or standard class
		 // @param mixed row
		 public function populate($row){
		 	foreach($row as $key => $value){
		 		$this->$key	= $value;
		 	}
		 }

		 // public function load from db 
		 // @param int $id
		 public function load($id){
		 	$query = $this->db->get_where($this::DB_TABLE, array($this::DB_TABLE_PK => $id));
		 	$this->populate($query->row());
		 }


		// delete record
		 public function delete(){
		 	$this->db->delete($this::DB_TABLE, array($this::DB_TABLE_PK => $this));
		 	unset($this->{$this::DB_TABLE_PK});
		 }

		 // save the record
		 public function save() {
		 	if(isset($this->{$this::DB_TABLE_PK}))	{
		 		$this->update();
		 	} else {
		 		$this->insert();
		 	}
		 }

		 // get an array of models with optional limit, offset
		 // @param int limit optional
		 // @param int offset optional, if set, requires limit
		 // return array of models populated by database keyed by PK

		 public function get($limit = 0, $offset = 0){
		 	if($limit){
		 		$query = $this->db->get($this::DB_TABLE, $limit, $offset);
		 	} else {
		 		$query = $this->db->get($this::DB_TABLE);
		 	}

		 	$ret_val = array();
		 	$class = get_class($this);

		 	foreach($query->result() as $row){
		 		$model = new $class;
		 		$model->populate($row);
		 		$ret_val[$row->{$this::DB_TABLE_PK} = $model];

		 		return $ret_val;
		 	}
		 }
	}