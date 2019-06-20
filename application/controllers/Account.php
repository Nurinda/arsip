<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('account_model');
    error_reporting(0);

  }

  //nah berhubung fungsi login ada, berarti ci jalanin semua yang ada di fungsi login. Okaayy paham, lalu ?
  //terus $this->input->post('blablabla'), itu maksudnya kalo ada interaksi dari pengguna, misal mejet button namanya apa gitu,

  //pahaamm ndaaa :(( iyaa tiitt, pahaamm. jelasin alurnyaa ajaa. soal kodingan kan bisa beljar di internet :v
  //okayy, nah biasanya controller itu butih model, model ini buat ngolah data, ibarat kalo di restoran,contrroller itu pelayannya, model itu kokinya hehee, misal di baris 24 ya,
  //dia butuh konten  buat login, dia panggil cLogin yang ada di account_model

  public function login()
  {
    if ($this->input->post('loginValidation')) {
      $account = $this->account_model->loginValidation();
      $status = $account['status'];
      if ($status==1) {$this->session->set_userdata($account['account']); redirect(base_url('dashboard'));} else {  $data['content'] = $this->account_model->cLogin($status);}
    } else {
      $data['content'] = $this->account_model->cLogin(1);
    }

    //nah data yang dikirim dari model tadi diterima sama kontroller dalam bentuk $data[''], terus ditampilin ke view namanya LOGIN, gitu ajaa siii hehee. Okaayy pahaaamm, ku coba otak atik duluu yaakk, ntar kalo bingung ku tanyaa kamu lagiii. MAKASIIHHH ITsipIpTOpTOTO siapp dadaah

    $this->load->view('login', $data);
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url(''));
  }

  public function dashboard()
  {
    $data['content'] = $this->account_model->cDashboard();
    // $data['video']   = $this->account_model->video(); //INI SALAHH
    $this->load->view('template', $data);
  }

  public function profile()
  {
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
    $data['content'] = $this->account_model->cDetailArchive($id);
    $this->load->view('template', $data);
  }

  public function archive()
  {
    $update['file'] = null;
    if($this->input->post('uploadFile')){$update = $this->account_model->processUploadFile();}
    elseif($this->input->post('search')){$update['file'] = $this->input->post('keyword');}
    $data['content'] = $this->account_model->cDocument($update['file']);
      $this->load->view('template', $data);
  }

  public function download($id)
  {
    $this->load->helper('download');
    force_download('./assets/upload/'.$this->account_model->getDataRow('document', 'id', $id)->address, null);
  }
}

 ?>
