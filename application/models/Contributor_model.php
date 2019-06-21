<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contributor_model extends CI_model{

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



  //application
  public function addArchive()
  {
    if ($this->session->userdata['role']=='contributor' && $this->getDataRow('view_contributor', 'id', $this->session->userdata['id'])->storage_available > 0) {
      $data = array(
        'title' => $this->input->post('title'),
        'video_number' => $this->input->post('video_number'),
        'description' => $this->input->post('description'),
        'producer' => $this->input->post('producer'),
        'production_date' => $this->input->post('production_date'),
        'production_place' => $this->input->post('production_place'),
        'copyright' => $this->input->post('copyright'),
        'duration_hour' => $this->input->post('duration_hour'),
        'duration_minute' => $this->input->post('duration_minute'),
        'duration_second' => $this->input->post('duration_second'),
        'link' => $this->input->post('link'),
        'storage' => $this->input->post('storage'),
        'id_contributor' => $this->session->userdata['id'],
        'category' => $this->getDataRow('sub_category', 'id', $this->input->post('sub_category'))->id_category,
        'sub_category'=> $this->input->post('sub_category'),
       );
       $this->db->insert('archive', $data);

    }
  }

  public function cEditArchive($id)
  {
    $data['notification'] = 'no';
    $data['category'] = $this->getAllData('category');
    $data['sub_category'] = $this->getAllData('sub_category');
    $data['detail'] = $this->getDataRow('view_archive', 'id', $id);
    $data['title'] = 'Edit Arsip';
    $data['view_name'] = 'editArchive';
    return $data;
  }

  public function updateArchive($id)
  {
    $data = array(
      'title' => $this->input->post('title'),
      'video_number' => $this->input->post('video_number'),
      'description' => $this->input->post('description'),
      'producer' => $this->input->post('producer'),
      'production_date' => $this->input->post('production_date'),
      'production_place' => $this->input->post('production_place'),
      'copyright' => $this->input->post('copyright'),
      'duration_hour' => $this->input->post('duration_hour'),
      'duration_minute' => $this->input->post('duration_minute'),
      'duration_second' => $this->input->post('duration_second'),
      'link' => $this->input->post('link'),
      'storage' => $this->input->post('storage'),
      'id_contributor' => $this->session->userdata['id'],
      'category' => $this->getDataRow('sub_category', 'id', $this->input->post('sub_category'))->id_category,
      'sub_category'=> $this->input->post('sub_category'),
     );
     $where = array('id' => $id );
     $this->db->where($where);
     $this->db->update('archive', $data);
  }

}
 ?>
