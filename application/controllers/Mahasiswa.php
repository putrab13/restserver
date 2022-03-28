<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;
require APPPATH . '/libraries/REST_Controller.php';

class Mahasiswa extends REST_Controller{
    public function __construct(){
      // construct
    parent::__construct();
    $this->load->model('MahasiswaModel', 'm_mhs');
  }
  // method index untuk menampilkan semua data menggunakan method get
  public function index_get(){
      
      //cek id
    
     $id = $this->get('id');
     if($id === null){

         $mahasiswa = $this->m_mhs->getMahasiswa();
        } else{
         $mahasiswa = $this->m_mhs->getMahasiswa($id);

     }

      if($mahasiswa){
          $this->response([
              'status'=>true,
              'data'=>$mahasiswa
          ], REST_Controller::HTTP_OK);
      }else{
           $this->response([
              'status'=>false,
              'massage'=>'id not found'
          ], REST_Controller::HTTP_NOT_FOUND);
      }

  }

  public function index_delete()
    {
    $id=$this->delete('id');

    if($id===null){
      $this->response([
              'status'=>false,
              'massage'=>'provide an id'
          ], REST_Controller::HTTP_BAD_REQUEST);
    }else{
      if($this->m_mhs->deleteMahasiswa($id)>0){

         $this->response([
              'status'=>true,
              'id'=>$id,
              'massage'=>'deleted'
          ], REST_Controller::HTTP_OK);
      }else{
          $this->response([
              'status'=>false,
              'massage'=>'id not found'
          ], REST_Controller::HTTP_NOT_FOUND);
      }
    } 
 }
public function index_post (){
  $data =[
    'nrp'=> $this->post('nrp'),
    'nama'=> $this->post('nama'),
    'email'=> $this->post('email'),
    'jurusan'=> $this->post('jurusan')
  ];
  if($this->m_mhs->createMahasiswa($data)>0){
      $this->response([
                    'status'=>true,
                    'massage'=>'New mahasiswa has been created.'
                ], REST_Controller::HTTP_CREATED);
  }else{
    $this->response([
                    'status'=>false,
                    'massage'=>'Failed to created data.'
                ], REST_Controller::HTTP_BAD_REQUEST);
  }
  }

  public function index_put (){
    $id=$this->put('id');
     $data =[
    'nrp'=> $this->put('nrp'),
    'nama'=> $this->put('nama'),
    'email'=> $this->put('email'),
    'jurusan'=> $this->put('jurusan')
  ];
  if($this->m_mhs->updateMahasiswa($data, $id)>0){
      $this->response([
                    'status'=>true,
                    'massage'=>'data mahasiswa has been updated.'
                ], REST_Controller::HTTP_CREATED);
  }else{
    $this->response([
                    'status'=>false,
                    'massage'=>'Failed to update data.'
                ], REST_Controller::HTTP_BAD_REQUEST);
  }
  }
}

  ?>