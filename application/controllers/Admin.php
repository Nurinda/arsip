<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin_model');
//    error_reporting(0);
    if (!$this->session->userdata['login']) {
      redirect(base_url('login'));
    } elseif ($this->session->userdata['role']!='admin') {
      redirect(base_url('error404'));
    }
  }

  public function webConf()
  {
    $update['status'] = 0;
    if ($this->input->post('updateEmail')) {$this->admin_model->updateEmail();}
    elseif ($this->input->post('updateWallpaper')) {$this->admin_model->updateWallpaper();}
    elseif ($this->input->post('resetWallpaper')) {$this->admin_model->updateData('webconf', 'id', 1, 'login_image', 'default.jpg');}
    $data['content'] = $this->admin_model->cWebConf($update['status']);
    $this->load->view('template', $data);
  }

  public function account()
  {
    $create['status'] = 0; $keyword= null;
    if ($this->input->post('createAccount')) {$create = $this->admin_model->createAccount();}
    elseif ($this->input->post('search')) {$keyword = $this->input->post('keyword');}
    $data['content'] = $this->admin_model->cAccount($create['status'], $keyword);
    $this->load->view('template', $data);
  }

  public function detailAccount($id)
  {
    $operation['status'] = 0;$keyword=null;
    if ($this->input->post('deleteAccount')) {$operation = $this->admin_model->deleteAccount($id); redirect(base_url('account'));}
    elseif ($this->input->post('resetPassword')) {$operation = $this->admin_model->resetPassword($id);}
    elseif ($this->input->post('search')) {$keyword = $this->input->post('keyword'); }
    elseif ($this->input->post('updateCapacity')) {$this->admin_model->updateCapacity($id); }

    $data['content'] = $this->admin_model->cDetailAccount($id, $operation['status'], $keyword);
    $this->load->view('template', $data);
  }

  public function category()
  {
    $keyword = null;
    if($this->input->post('search')){$keyword = $this->input->post('keyword');}
    else if($this->input->post('createCategory')){$this->admin_model->createCategory(); redirect(base_url('category'));}
    $data['content'] = $this->admin_model->cCategory($keyword);
    $this->load->view('template', $data);
  }

  public function detailCategory($id)
  {
    $keyword = null;
    if ($this->input->post('search')) {$keyword = $this->input->post('keyword');}
    elseif ($this->input->post('updateCategory')) {$this->admin_model->updateCategory($id);redirect(base_url('detailCategory/'.$this->input->post('id')));}
    elseif ($this->input->post('createSubcategory')) {$this->admin_model->createSubcategory($id);}
    $data['content'] = $this->admin_model->cDetailCategory($id, $keyword);
    $this->load->view('template', $data);
  }

  public function detailSubcategory($id)
  {
    if ($this->input->post('updateSubcategory')) {$this->admin_model->updateSubcategory($id); redirect(base_url('detailSubcategory/'.$this->input->post('id')));}
    elseif ($this->input->post('deleteSubcategory')) {$this->admin_model->deleteSubcategory($id);redirect(base_url('category'));}
    $data['content'] = $this->admin_model->cDetailSubcategory($id);
    $this->load->view('template', $data);
  }

}
 ?>
