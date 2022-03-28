<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Person extends REST_Controller{
    // construct
  public function __construct(){
    parent::__construct();
    $this->load->model('PersonModel');
  }
  // method index untuk menampilkan semua data person menggunakan method get
  public function index_get(){
    $response = $this->PersonModel->all_person();
    $this->response($response);
  }
  // untuk menambah person menaggunakan method post
  public function index_post(){
    $response = $this->PersonModel->add_person(
        $this->post('name'),
        $this->post('address'),
        $this->post('phone')
      );
    $this->response($response);
  }
  // update data person menggunakan method put
  public function index_put(){
    $response = $this->PersonModel->update_person(
        $this->put('id'),
        $this->put('name'),
        $this->put('address'),
        $this->put('phone')
      );
    $this->response($response);
  }
  // hapus data person menggunakan method delete
  public function index_delete(){
    $response = $this->PersonModel->delete_person(
        $this->delete('id')
      );
    $this->response($response);
  }
  }
  ?>