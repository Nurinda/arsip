<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('account_model');
    $this->load->model('contributor_model');
    error_reporting(0);
  }


  public function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url(''));
  }

  public function dashboard()
  {
    if (!$this->session->userdata['login']) {redirect(base_url('archive'));}

    $data['content'] = $this->account_model->cDashboard();
    // $data['video']   = $this->account_model->video(); //INI SALAHH
    $this->load->view('template', $data);
  }

  public function profile()
  {
    if (!$this->session->userdata['login']) {redirect(base_url('archive'));}

    $update['status'] = 2;
    if ($this->input->post('updateAccount')) {
      $update = $this->account_model->updateAccount();
      if ($update['status']==1) {$this->session->set_userdata($update['session']);}
    } elseif ($this->input->post('uploadFile')) {
      $update = $this->account_model->updatePicture();
      if ($update['status']==4) {$this->session->set_userdata($update['session']);}
    } elseif ($this->input->post('deleteFile')) {
      $delete = $this->account_model->deleteDP($this->session->userdata['display_picture']);
      if ($delete['status']==1) {$this->session->set_userdata($delete['session']);}
    }
    $data['content'] = $this->account_model->cProfile($update['status']);
    $this->load->view('template', $data);
  }


  public function error404()
  {
    $data['content'] = $this->account_model->cError404();
    $this->load->view('template', $data);
  }

  public function detailArchive($id)
  {
    $status = 2;
    if($this->input->post('loginValidation')) {$account = $this->account_model->loginValidation();$status = $account['status'];if ($status==1) {$this->session->set_userdata($account['account']); redirect(base_url('dashboard'));}}
    elseif ($this->input->post('deleteArchive')) {$status = $this->account_model->deleteArchive($id); if($status==1){redirect(base_url('archive'));}}
    $data['content'] = $this->account_model->cDetailArchive($id, $status);
    $this->load->view('template', $data);
  }

  public function archive()
  {
    $update['file'] = null;$status = 2;
    if($this->input->post('addArchive')){$update = $this->contributor_model->addArchive();}
    elseif($this->input->post('search')){$update['file'] = $this->input->post('keyword');}
    elseif($this->input->post('loginValidation')) {$account = $this->account_model->loginValidation();$status = $account['status'];if ($status==1) {$this->session->set_userdata($account['account']); redirect(base_url('dashboard'));}}
    $data['content'] = $this->account_model->cArchive($update['file'],$status);
      $this->load->view('template', $data);
  }

  public function download($id)
  {
    $this->load->helper('download');
    force_download('./assets/upload/'.$this->account_model->getDataRow('document', 'id', $id)->address, null);
  }
}

 ?>
