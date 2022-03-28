<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;
require APPPATH . '/libraries/REST_Controller.php';

class Auth extends REST_Controller{
    
    public function __construct(){
      // construct
    parent::__construct();
    $this->load->model('LoginModel', 'm_login');
  }
  
  public function createToken (){
      $jwt=new JWT();
  }
}

  ?>