<?php
  
Class MahasiswaModel extends CI_Model
{
    
	public $tablename="mahasiswa";
    
    public function getMahasiswa($id=null)
    {
    
        if($id===null){
            return $this->db->get($this->tablename)->result_array();
            
        } else {
            return $this->db->get_where($this->tablename, ['id'=>$id])->result_array();

        }
    }
    public function deleteMahasiswa($id)
    {

      $this->db->delete($this->tablename, ['id'=>$id]);
      
      return $this->db->affected_rows();
    }

    public function createMahasiswa ($data){
       $this->db->insert($this->tablename, $data);
       return $this->db->affected_rows();
    }
    public function updateMahasiswa ($data, $id){
      $this->db->update($this->tablename, $data, ['id'=>$id]);
      
      return $this->db->affected_rows(); 
    }
}