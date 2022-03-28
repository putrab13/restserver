<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
 
class Produk extends REST_Controller{
     
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_product');
    }
     
    public function index_post(){
        $nama = $_POST['catalog_nama'];
        $harga = $_POST['catalog_harga'];
        $deskripsi = $_POST['catalog_deskripsi'];
        $image = '';
        $response = $this->mod_product->create_product($nama, $harga, $deskripsi, $image);
        $this->response($response);
    }
    public function index_get(){
        $response = $this->mod_product->read_product();
        $this->response($response);
    }
    public function index_put(){
        $id = $_POST['id'];
        $nama = $_POST['catalog_nama'];
        $harga = $_POST['catalog_harga'];
        $deskripsi = $_POST['catalog_deskripsi'];
        $image = '';
        $response = $this->mod_product->update_product($id, $nama, $harga, $deskripsi, $image);
        $this->response($response);
    }
     public function index_delete(){
        $id = $_POST['id'];
        $response = $this->mod_product->delete_product($id);
        $this->response($response);
    }
} 
?>