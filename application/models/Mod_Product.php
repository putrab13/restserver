<?php
  
Class Mod_product extends CI_Model
{
	public $tablename="produk";

   public function create_product(string $nama, int $harga, string $deskripsi, string $image)
   {
	   
      $data = [
         'catalog_nama' => $nama,
         'catalog_harga' => $harga,
         'catalog_deskripsi' => $deskripsi,
         'catalog_image' => $image,
      ];
      $insert = $this->db->insert($this->$tablename, $data);
      if ($insert) {
         $response = array();
         $response['error'] = false;
         $response['message'] = 'Successfully added product data';
         return $response;
      }
      return false;
   }
 
   public function read_product()
   {
	   //die(var_dump($this->tablename));
      $this->db->order_by('catalog_id', 'DESC');
      $query = $this->db->get($this->tablename);
      if ($query->num_rows() > 0) {
         $response = array();
         $response['error'] = false;
         $response['message'] = 'Successfully retrieved product data';
         foreach ($query->result() as $row) {
            $harga = $row->catalog_harga;
            $tempArray = array();
            $tempArray['product_id'] = (int)$row->catalog_id;
            $tempArray['product_name'] = $row->catalog_nama;
            $tempArray['price'] = (int)$harga;
            $tempArray['note'] = $row->catalog_deskripsi;
            $tempArray['image'] = 'http://127.0.0.1:8000/image/'.$row->catalog_image;
            $response['data'][] = $tempArray;
         }
         return $response;
      }
      return false;
   }
 
   public function update_product(int $id, string $nama, int $harga, string $deskripsi, string $image)
   {
      $update = $this->db->query(
         "UPDATE '$tablename' 
          SET 
            catalog_nama='$nama', 
            catalog_harga=$harga, 
            catalog_deskripsi='$deskripsi', 
            catalog_image='$image'
          WHERE catalog_id = $id "
      );
      if ($update) {
         $response = array();
         $response['error'] = false;
         $response['message'] = 'Successfully changed product data';
         return $response;
      }
      return false;
   }
 
   public function delete_product(int $id)
   {
      $id = $id;
      $delete = $this->db->query('DELETE FROM '.$tablename.' WHERE catalog_id = '. $id);
      if ($delete) {
         $response = array();
         $response['error'] = false;
         $response['message'] = 'Successfully deleted product data';
         return $response;
      }
   }
}