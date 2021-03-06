<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_model{

  public function __construct()
  {
    $this->load->model('account_model');
  }

  //core
  public function getAllData($table)
  {
    $query = $this->db->get($table);
    return $query->result();
  }

  public function getDataRow($table, $var, $val)
  {
    $where = array($var => $val);
    $query = $this->db->get_where($table, $where);
    return $query->row();
  }

  public function getSomeData($table, $var, $val)
  {
    $where = array($var => $val);
    $query = $this->db->get_where($table, $where);
    return $query->result();
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

  public function uploadPicture($filename)
  {
    $config['upload_path'] = APPPATH.'../assets/upload/';
    $config['overwrite'] = TRUE;
    $config['file_name']     = $filename;
    $config['allowed_types'] = 'jpg|png';
    $this->load->library('upload', $config);
    if (!$this->upload->do_upload('fileUpload')) {
      $upload['status']=0;
      $upload['message']= "Mohon maaf terjadi error saat proses upload : ".$this->upload->display_errors();
    } else {
      $upload['status']=1;
      $upload['message'] = "File berhasil di upload";
    }
    return $upload;
  }

  public function deleteData($table, $var, $val)
  {
    $where = array($var => $val);
    $query = $this->db->delete($table, $where);
    return $query;
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
  public function getRole($id)
  {
    return ($this->getDataRow('account', 'id', $id)->role);
  }


  //application
  public function cWebConf($notification)
  {
    $data['config'] = $this->admin_model->getDataRow('webconf', 'id', 1);
    $data['title'] = 'Konfigurasi Website';
    $data['view_name'] = 'webConf';
    $data['notification'] = 'webConf'.$notification;
    return $data;
  }

  public function updateEmail()
  {
    $where = array('id' => 1 );
    $data = array(
      'client_name' => $this->input->post('client_name'),
      'web_name' => $this->input->post('web_name')
    );
    $this->db->where($where);
    $update['status']  = $this->db->update('webconf',$data);
    return $update;
  }

  public function updateWallpaper()
  {
    $status['upload'] = $this->uploadPicture('login_image');
    $status['status'] = $status['upload']['status'];
    $this->updateData('webconf', 'id', 1, 'login_image', 'login_image.jpg');
    return $status;
  }

  public function cAccount($notification, $keyword)
  {
    if ($keyword!=null) {$data['account'] = $this->db->query('select * from account where username LIKE "%'.$keyword.'%" or fullname LIKE "%'.$keyword.'%" or email LIKE "%'.$keyword.'%" ')->result();}
    else {$data['account'] = $this->admin_model->getAllData('account');}
    $data['title'] = 'Pengaturan Akun';
    $data['view_name'] = 'account';
    $data['notification'] = 'account'.$notification;
    return $data;
  }

  public function createAccount()
  {
    $data = array('username' => $this->input->post('username'), 'fullname' => $this->input->post('fullname'), 'role' => 'contributor', 'password'=>md5('0000'), 'display_picture' => 'no.jpg');
    $this->db->insert('account', $data);
    $data = array('id' => $this->db->insert_id(), 'institute' => $this->input->post('institute'), 'capacity'=> 100);
    $status['status'] = $this->db->insert('contributor', $data);
    return $status;
  }

  public function cDetailAccount($id, $notification,$keyword)
  {
    if ($keyword=null) {$data['archive'] = $this->getSomeData('view_archive', 'id_contributor', $id);}
    else {$data['archive']=$this->db->query('select * from view_archive where title LIKE "%'.$keyword.'%" and id_contributor = '.$id.' or description LIKE "%'.$keyword.'%" or producer LIKE "%'.$keyword.'%" or copyright LIKE "%'.$keyword.'%" or production_place LIKE "%'.$keyword.'%" or filetype LIKE "%'.$keyword.'%" ')->result(); }
    $data['account'] = $this->admin_model->getDataRow('view_contributor', 'id', $id);
    $data['title'] = 'Detail Akun @'.$data['account']->username;
    $data['view_name'] = 'detailAccount';
    $data['notification'] = 'detailAccount'.$notification;
    return $data;
  }

  public function deleteAccount($id)
  {
    if (md5($this->input->post('password'))==$this->session->userdata['password']) {
      $delete['status'] = $this->deleteData('account', 'id', $id);
    } else {
      $delete['status'] = 0;
    }
    return (int)$delete['status']+1;
  }

  public function resetPassword($id)
  {
    $operation['status'] =  $this->updateData('account', 'id', $id, 'password', md5('0000'));
    return $operation;
  }


  public function updateCapacity($id)
  {
    return $this->updateData('contributor', 'id', $id, 'capacity', $this->input->post('capacity'));
  }

  public function cCategory($keyword)
  {
    if ($keyword == null) {$data['category'] = $this->getAllData('view_category');}
    else {$data['category'] = $this->db->query('select * from view_category where category LIKE "%'.$keyword.'%" or id LIKE "%'.$keyword.'%"')->result();}
    $data['title'] = 'Konfigurasi Kategori Arsip';
    $data['view_name'] = 'category';
    $data['notification'] = 'no';
    return $data;
  }

  public function createCategory()
  {
    return $this->db->insert('category', $data = array('id'=> $this->input->post('id'), 'category' => $this->input->post('category')));
  }

  public function cDetailCategory($id, $keyword)
  {
    if ($keyword==null) {$data['subcategory'] = $this->getSomeData('sub_category', 'id_category', $id);}
    else {$data['subcategory'] = $this->db->query('select * from sub_category where id_category = '.$id.' and sub_category LIKE "%'.$keyword.'%" or id LIKE "%'.$keyword.'%" order by id')->result();}
    $data['detail'] = $this->getDataRow('category', 'id', $id);
    $data['title'] = 'Detail Kategori Arsip';
    $data['view_name'] = 'detailCategory';
    $data['notification'] = 'no';
    return $data;
  }

  public function updateCategory($id)
  {
    $this->updateData('category', 'id', $id, 'id', $this->input->post('id'));
    $this->updateData('category', 'id', $id, 'category', $this->input->post('category'));
    $this->updateData('sub_category', 'id_category', $id, 'id_category', $this->input->post('id'));
    $this->updateData('archive', 'category', $id, 'id_category', $this->input->post('id'));
  }

  public function createSubcategory($id)
  {
    $data = array('id' => $this->input->post('id'), 'id_category' => $id, 'sub_category' => $this->input->post('sub_category'));
    $this->db->insert('sub_category', $data);
  }

  public function cDetailSubcategory($id)
  {
    $data['detail'] = $this->getDataRow('sub_category', 'id', $id);
    $data['title'] = 'Detail Sub Kategori Arsip';
    $data['view_name'] = 'detailSubcategory';
    $data['notification'] = 'no';
    return $data;
  }

  public function updateSubcategory($id)
  {
    $this->updateData('sub_category', 'id', $id, 'id', $this->input->post('id'));
    $this->updateData('sub_category', 'id', $id, 'sub_category', $this->input->post('sub_category'));
    $this->updateData('archive', 'sub_category', $id, 'sub_category', $this->input->post('id'));
  }

  public function deleteSubcategory($id)
  {
    $this->deleteData('sub_category', 'id', $id);
    
  }
  public function deletecategory($id)
  {
    if (md5($this->input->post('password'))==$this->session->userdata['password']) {
      $delete['status'] = $this->deleteData('category', 'id', $id);
    } else {
      $delete['status'] = 0;
    }
    return (int)$delete['status']+1;
    //$this->deleteData('category', 'id', $id);
    
  }
}
 ?>
