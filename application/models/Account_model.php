<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_model{

  public function __construct()
  {

  }

  //core
  public function getAllData($table)
  {
    return $this->db->get($table)->result();
  }

  public function getDataRow($table, $var, $val)
  {
    $where = array($var => $val);
    $query = $this->db->get_where($table, $where);
    return $query->row();
  }

  public function getDataRow2($table, $var1, $val1, $var2, $val2)
  {
    $where = array($var1 => $val1, $var2 => $val2);
    $data = $this->db->get_where($table, $where);
    return $data->row();
  }

  public function getNumRows($table, $var, $val)
  {
    $where = array($var => $val);
    $query = $this->db->get_where($table, $where);
    return $query->num_rows();
  }

  public function getNumRows2($table, $var1, $val1, $var2, $val2)
  {
    $where = array($var1 => $val1, $var2 => $val2);
    $data = $this->db->get_where($table, $where);
    return $data->num_rows();
  }

  public function updateData($table, $varWhere, $valWhere, $varSet, $valSet)
  {
    $where = array($varWhere => $valWhere);
    $data = array($varSet => $valSet);
    $this->db->where($where);
    $status = $this->db->update($table, $data);
    return $status;
  }

  public function deleteData($table, $var, $val)
  {
    $where = array($var => $val);
    return $this->db->delete($table, $where);

  }


  public function uploadFile($filename,$allowedFile)
  {
    $config['upload_path'] = APPPATH.'../assets/upload/';
    $config['overwrite'] = TRUE;
    $config['file_name']     =  str_replace(' ','_',$filename);
    $config['allowed_types'] = $allowedFile;
    $this->load->library('upload', $config);
    if (!$this->upload->do_upload('fileUpload')) {
      $upload['status']=0;
      $upload['message']= "Mohon maaf terjadi error saat proses upload : ".$this->upload->display_errors();
    } else {
      $upload['status']=1;
      $upload['message'] = "File berhasil di upload";
      $upload['ext'] = $this->upload->data('file_ext');
    }
    return $upload;
  }

  //functional
  public function findUsername($username)
  {
    $data['status'] = $this->getNumRows('account', 'username', $username);
    if ($data['status']==1) {
      $data['account'] = $this->getDataRow('account', 'username', $username);
    }
    return $data;
  }

  public function setSession($id)
  {
    $account = $this->getDataRow('account', 'id', $id);
    if ($account->role == 'admin') {
      $data= array(
        'login' => true,
        'role' => $account->role,
        'id' => $account->id,
        'username' => $account->username,
        'password' => $account->password,
        'fullname' => $account->fullname,
        'email'     => $account->email,
        'display_picture' => $account->display_picture,
      );
    } elseif ($account->role == 'contributor') {
      $data= array(
        'login' => true,
        'role' => $account->role,
        'id' => $account->id,
        'username' => $account->username,
        'password' => $account->password,
        'fullname' => $account->fullname,
        'email'     => $account->email,
        'display_picture' => $account->display_picture,
        'institute' => $this->getDataRow('contributor', 'id', $id)->institute,
        'address' => $this->getDataRow('contributor', 'id', $id)->address,
      );

    }
    return $data;
  }


  //application

  public function loginValidation()
  {
    $data['status'] = $this->getNumRows2('account', 'username', $this->input->post('username'), 'password', md5($this->input->post('password')));
    if ($data['status']==1) {
      $data['account'] = $this->setSession($this->getDataRow2('account', 'username', $this->input->post('username'), 'password', md5($this->input->post('password')))->id);
    }
    return $data;
  }

  public function cProfile($notification)
  {
    $data['notification'] = 'profile'.$notification.ucfirst($this->session->userdata['role']);
    $data['view_name'] = 'profile';
    $data['title'] = 'Profil';
    return $data;
  }

  public function updateAccount()
  {
    $where = array('id' => $this->session->userdata['id']);
    if ($this->input->post('password')=="") {
      $this->updateData('account', 'id', $this->session->userdata['id'], 'username', $this->input->post('username'));
      $this->updateData('account', 'id', $this->session->userdata['id'], 'fullname', $this->input->post('fullname'));
      $this->updateData('contributor', 'id', $this->session->userdata['id'], 'institute', $this->input->post('institute'));
      $this->updateData('contributor', 'id', $this->session->userdata['id'], 'address', $this->input->post('address'));
      $account['status'] = $this->updateData('account', 'id', $this->session->userdata['id'], 'email', $this->input->post('email'));
    } else {
      $this->updateData('account', 'id', $this->session->userdata['id'], 'username', $this->input->post('username'));
      $this->updateData('account', 'id', $this->session->userdata['id'], 'password', md5($this->input->post('username')));
      $this->updateData('contributor', 'id', $this->session->userdata['id'], 'institute', $this->input->post('institute'));
      $this->updateData('contributor', 'id', $this->session->userdata['id'], 'address', $this->input->post('address'));
      $this->updateData('account', 'id', $this->session->userdata['id'], 'fullname', $this->input->post('fullname'));
      $account['status'] = $this->updateData('account', 'id', $this->session->userdata['id'], 'email', $this->input->post('email'));
    }
    $account['session'] = $this->setSession($this->session->userdata['id']);
    return $account;
  }

  public function updatePicture()
  {
    $status['upload'] = $this->uploadFile("display_picture_".$this->session->userdata['id'],'jpg|png');
    $status['status'] = $status['upload']['status']+3;
    $this->updateData('account', 'id', $this->session->userdata['id'], 'display_picture', "display_picture_".$this->session->userdata['id'].'.jpg');
    $status['session'] = $this->setSession($this->session->userdata['id']);
    return $status;
  }

  public function deleteDP($filename)
  {
    $status['status'] = $this->updateData('account', 'id', $this->session->userdata['id'], 'display_picture', 'no.jpg');
    $status['session'] = $this->setSession($this->session->userdata['id']);
    return $status;
  }

  public function cDashboard()
  {//kalo mau nambahin data dimodelnyaa nurinn
    $data['video'] = $this->getAllData('view_archive'); //INI YANG BENERR
    $data['title'] = 'Dashboard';
    $data['view_name'] = 'no';
    $data['notification'] = 'dashboard'.ucfirst($this->session->userdata['role']);
    return $data;
  }

  public function cError404()
  {
    $data['title'] = 'Error';
    $data['view_name'] = 'no';
    $data['notification'] = 'error404';
    return $data;
  }

  public function cArchive($keyword, $status)
  {

    $data['notification'] = 'no';
    if ($keyword==null & $status==2) {
      $data['video'] = $this->getAllData('view_archive');
    } elseif ($status==0) {
      $data['video'] = $this->db->query('select * from view_archive where title LIKE "%'.$keyword.'%" or description LIKE "%'.$keyword.'%" or producer LIKE "%'.$keyword.'%" or copyright LIKE "%'.$keyword.'%" or production_place LIKE "%'.$keyword.'%" or contributor LIKE "%'.$keyword.'%" or filetype LIKE "%'.$keyword.'%" ')->result();
      $data['notification'] = 'login0';
//      var_dump($status==0);die;
    } else {
      $data['video'] = $this->db->query('select * from view_archive where title LIKE "%'.$keyword.'%" or description LIKE "%'.$keyword.'%" or producer LIKE "%'.$keyword.'%" or copyright LIKE "%'.$keyword.'%" or production_place LIKE "%'.$keyword.'%" or contributor LIKE "%'.$keyword.'%" or filetype LIKE "%'.$keyword.'%" ')->result();
    }
    $data['category'] = $this->getAllData('category');
//    var_dump($data['category']);die;
    $data['sub_category'] = $this->getAllData('sub_category');
    $data['title'] = 'Rekap Video';
    $data['view_name'] = 'archive';
    return $data;
  }

  public function processUploadFile()
  {
    $upload = $this->uploadFile($this->input->post('document_name'), 'pdf|xls|xlsx|doc|docx|jpg');
    if($upload['status']==1){
      $data = array('document_name' => $this->input->post('document_name'), 'document_info' => $this->input->post('document_info'), 'contributor_id' => $this->session->userdata['id'], 'address' => str_replace(' ','_',$this->input->post('document_name')).$this->upload->data('file_ext'));
      $this->db->insert('document', $data);
    }
    return $upload;
  }

  public function cDetailArchive($id, $status)
  {
    $data['notification'] = 'no';
    if ($status==0 || $status==3) {$data['notification'] = 'login0';}

    $data['detail'] = $this->getDataRow('view_archive', 'id', $id);
    $data['title'] = 'Detail Video';
    $data['view_name'] = 'detailArchive';
    return $data;
  }

  public function deleteArchive($id)
  {
    $data = 3;
    if (md5($this->input->post('password'))==$this->session->userdata['password']) {$data = $this->deleteData('archive', 'id', $id);}
    return $data;
  }

}

 ?>
