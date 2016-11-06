<?php

class CrudModel extends CI_Model {

    public function getRecords(){
        $query = $this->db->get('customer');
        return $query->result();
    }

    public function saveRecord($data){

        return $this->db->insert('customer', $data);
    }

    public function getAllRecords($record_id){

        $query = $this->db->get_where('customer', array('id' => $record_id));
        if($query->num_rows())
            return $query->row();

    }


    public function updateRecords($record_id, $data){

        return $this->db->where('id', $record_id)->update('customer', $data);
    }


    public function deleteRecord($record_id){
       return $this->db->delete('customer', array('id' => $record_id));
    }


}