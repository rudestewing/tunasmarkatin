<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_guru');
		$this->load->helper(array('url','form'));

	}


	public function index()
	{
		$guru = $this->M_guru->listing();

		
		$data = array(

						'title' 	=>	'Guru & Staff Page',
						'isi'		=>	'admin/guru/v_guru',
						'guru'		=>	$guru,
						'header'	=>	'Daftar Guru' );

		$this->load->view('layouts/layout', $data, FALSE);
    }


    public function tambah()
    {

        if (isset($_POST['tambah'])){

    	$this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[5]',
    			array(
    				'required'			=>	'Kolom nama belum di isi',
    				'min_length'		=>	'Nama minimal 5 karakter'

    			));
    	$this->form_validation->set_rules('nip', 'NIP', 'trim|numeric',
    			array(
    				'numeric'			=>	'Mohon  isi form NIP dengan angka'

    			));
    			}

    if ($this->form_validation->run() == TRUE) {
    	
  		
       if(!empty($_FILES['path_foto']['name']))
      {
        $config['upload_path']     = './assets/upload/path_foto/';
        $config['allowed_types']   = 'gif|jpg|jpeg|png';
        $config['max_size']      = '12000';
        $config['file_ext_tolower'] = TRUE;
        $config['encrypt_name']    = FALSE;
        $this->load->library('upload', $config);

        if(! $this->upload->do_upload('path_foto'))
        {
        	$error = $this->upload->display_errors();
          $data = array(
            'title'      => 'Tambah Guru&Staff',
            'header'    => 'Tambah Data Guru&Staff',
            
            'isi'      => 'admin/guru/tambah'
          );
          print_r($error);
          $this->load->view('layouts/layout', $data);
          // Masuk database
        }
        else
        {
          $upload_data        = array('uploads' =>$this->upload->data());
          // Image Editor
          $config['image_library']  = 'gd2';
          $config['source_image']   = './assets/upload/path_foto/'.$upload_data['uploads']['file_name']; 
          $config['new_image']     = './assets/upload/path_foto/thumbs/';
          $config['create_thumb']   = TRUE;
          $config['quality']       = "100%";
          $config['maintain_ratio']   = FALSE;
          $config['width']       = 360; // Pixel
          $config['height']       = 360; // Pixel
          $config['x_axis']       = 0;
          $config['y_axis']       = 0;
          $config['thumb_marker']   = '';
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();
          echo "berhasil";
          $error = $this->upload->display_errors();
           $i = $this->input;
            $data = array(

            		'nama_guru'			=> $i->post('nama'),
            		'nip_guru'			=> $i->post('nip'),
            		'jenis_kelamin'		=> $i->post('kelamin'),
            		'tempat_lahir'		=> $i->post('tempat_lahir'),
            		'tanggal_lahir'		=> $i->post('tanggal_lahir'),
            		'pendidikan'		=> $i->post('pendidikan'),
            		'status'			=> $i->post('status'),
            		'matpel'			=> $i->post('matpel'),
            		'alamat'			=> $i->post('alamat'),
            		'facebook'			=> $i->post('facebook'),
            		'instagram'			=> $i->post('instagram'),
            		'about_me'			=> $i->post('about_me'),
            		'path_foto'			=> $upload_data['uploads']['file_name'] 
            	);
            print_r($error);
           $this->M_guru->tambah($data);
          $this->session->set_flashdata('sukses','<div class="alert alert-success">Data berhasil di tambah</div>');
          redirect(base_url('admin/guru'));
        }
      }
      else
      {
      	//$error = $this->upload->display_errors();
      	// print_r($error);
        $i = $this->input;
        $data = array(
          			'nama_guru'			=> $i->post('nama'),
            		'nip_guru'			=> $i->post('nip'),
            		'jenis_kelamin'		=> $i->post('kelamin'),
            		'tempat_lahir'		=> $i->post('tempat_lahir'),
            		'tanggal_lahir'		=> $i->post('tanggal_lahir'),
            		'pendidikan'		=> $i->post('pendidikan'),
            		'status'			=> $i->post('status'),
            		'matpel'			=> $i->post('matpel'),
            		'path_foto'			=> $upload_data['uploads']['file_name'] 
        );
        $this->M_guru->tambah($data);
        $this->session->set_flashdata('sukses','Data user berhasil ditambah tanpa foto');
        redirect(base_url('admin/guru'));
      }
    }

    	$data = array(

    					'title'		=>	'Edit/Guru',
    					'isi'		=>	'admin/guru/tambah',
    					'header'	=>	'Isi Formulir', 
    					);
    	$this->load->view('layouts/layout', $data, FALSE);
    }


	public function edit($id = "")
    {

    	 if($id == "")
    {
      show_404();
    }

    $guru = $this->M_guru->get_by($id);

    $v = $this->form_validation;
    
    $this->form_validation->set_rules('nip', 'NIP', 'trim|numeric',
    			array(
    				'numeric'			=>	'Mohon  isi form NIP dengan angka'

    			));
    		

    if($v->run())
    {
      if(!empty($_FILES['path_foto']['name']))
      {
        $config['upload_path']     = './assets/upload/path_foto/';
        $config['allowed_types']   = 'gif|jpg|jpeg|png';
        $config['max_size']      = '12000';
        $config['file_ext_tolower'] = TRUE;
        $config['encrypt_name']    = FALSE;
        $this->load->library('upload', $config);

        if(! $this->upload->do_upload('path_foto'))
        {
          $data = array(
            'title'      => 'Guru & staff',
            'header'    => 'Edit Data Guru & Staff',
            'error'      => $this->upload->display_errors(),
            'guru'      => $guru,
            'isi'      => 'admin/guru/edit'
          );
          $this->load->view('layouts/layout', $data, FALSE);
          // Masuk database
        }
        else
        {
          $upload_data        = array('uploads' =>$this->upload->data());
          // Image Editor
          $config['image_library']  = 'gd2';
          $config['source_image']   = './assets/upload/path_foto/'.$upload_data['uploads']['file_name']; 
          $config['new_image']     = './assets/upload/path_foto/thumbs/';
          $config['create_thumb']   = TRUE;
          $config['quality']       = "100%";
          $config['maintain_ratio']   = FALSE;
          $config['width']       = 360; // Pixel
          $config['height']       = 360; // Pixel
          $config['x_axis']       = 0;
          $config['y_axis']       = 0;
          $config['thumb_marker']   = '';
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();




          
          $gambar = base_url('assets/upload/path_foto/' . $admin['path_foto']);
          $thumbs = base_url('assets/upload/path_foto/thumbs' . $admin['path_foto']);

           if (count($gambar) > 0 OR count($thumbs) > 0 ){
            unlink('./assets/upload/path_foto/'.$admin['path_foto']);
            unlink('./assets/upload/path_foto/thumbs/'.$admin['path_foto']);}

          $i = $this->input;
          $data = array(
            		
            		'nip_guru'			=> $i->post('nip'),
            		'jenis_kelamin'		=> $i->post('kelamin'),
            		'tempat_lahir'		=> $i->post('tempat_lahir'),
            		'tanggal_lahir'		=> $i->post('tanggal_lahir'),
            		'pendidikan'		=> $i->post('pendidikan'),
            		'status'			=> $i->post('status'),
            		'matpel'			=> $i->post('matpel'),
            		'path_foto'			=> $upload_data['uploads']['file_name']
          );
          $this->M_guru->edit($data, $id);
          $this->session->set_flashdata('sukses','Data dan foto admin berhasil diupdate');
          redirect(base_url('admin/guru'));
        }
      }
      else
      {
        $i = $this->input;
        $data = array(
         'nama_guru'			=> $i->post('nama'),
            		'nip_guru'			=> $i->post('nip'),
            		'jenis_kelamin'		=> $i->post('kelamin'),
            		'tempat_lahir'		=> $i->post('tempat_lahir'),
            		'tanggal_lahir'		=> $i->post('tanggal_lahir'),
            		'pendidikan'		=> $i->post('pendidikan'),
            		'status'			=> $i->post('status'),
            		'matpel'			=> $i->post('matpel'),
            		
        );
        $this->M_guru->edit($data, $id);
        $this->session->set_flashdata('sukses','Data admin berhasil diupdate tanpa upload foto');
        redirect(base_url('layout/layout'));
      }
    }
    $data = array(
      'title'      => 'Guru & Staff',
      'header'    => ' Edit Data Guru & Staff',
      'guru'      => $guru,
      'isi'      => 'admin/guru/edit'
    );
    $this->load->view('layouts/layout', $data, FALSE);
    }    


    public function hapus($id)
    {

    	 if($id == "")
    {
      show_404();
    }

    $admin      = $this->M_guru->get_by($id);
    $path_foto    = $admin['path_foto'];

    if($path_foto != "")
    {
      unlink('./assets/upload/path_foto/' . $path_foto);
      unlink('./assets/upload/path_foto/thumbs/' . $path_foto);
    }
    $gambar = base_url('assets/upload/foto_profil/' . $admin['path_foto']);
    $thumbs = base_url('assets/upload/foto_profil/thumbs' . $admin['path_foto']);

           if (count($gambar) > 0 OR count($thumbs) > 0 ){
            unlink('./assets/upload/path_foto/'.$admin['path_foto']);
            unlink('./assets/upload/path_foto/thumbs/'.$admin['path_foto']);}

    $data = array(
      'admin_id' => $id
    );
    $this->M_guru->hapus($data, $id);
    $this->session->set_flashdata('sukses', '<div class="alert alert-danger">Data dan foto admin berhasil dihapus</div>');
    redirect(base_url('admin/guru'));
    		
    }
    public function detail($id = '')
    {
    	$guru = $this->M_guru->get_by($id);
    	$data = array(

    				'title' 		=> 	'Detail',
    				'guru'			=>	$guru,
    				'header'		=>	'Detail',
    				'isi'			=>	'admin/guru/detail');
    	$this->load->view('layouts/layout', $data, FALSE);
    }


}

?>
