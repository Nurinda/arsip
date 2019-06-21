<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contributor extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('contributor_model');
    error_reporting(0);
    if (!$this->session->userdata['login']) {
      redirect(base_url('login'));
    } elseif ($this->session->userdata['role']!='contributor') {
      redirect(base_url('error404'));
    }
  }

  public function editArchive($id)
  {
    if ($this->input->post('updateArchive')) {$this->contributor_model->updateArchive($id);}
    $data['content'] = $this->contributor_model->cEditArchive($id);
    $this->load->view('template', $data);
  }

}
 ?>
