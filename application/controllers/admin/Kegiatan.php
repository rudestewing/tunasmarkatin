<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Kegiatan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_kegiatan');
	}

	public function index(){
		$data = array(	
						'title' 	=>	'Guru & Staff Page',
						'isi'		=>	'admin/kegiatan/v_kegiatan' );
		$this->load->view('layouts/layout', $data, FALSE);
	}



	public function fetch_kegiatan(){
			$this->load->model("m_kegiatan");
			$fetch_kegiatan = $this->m_kegiatan->get_datatables();
			$data_kegiatan = array();
			
			$no=1;
			foreach($fetch_kegiatan as $row)
			{
				
				$sub_array = array();
				$sub_array[] = $no;
				$sub_array[] = '<a href="'.base_url().'admin/kegiatan/view/'.$row->id_kegiatan.'"> <img style="width: 100px; height: 100px;"  src="'.base_url().'assets-admin/gambar/kegiatan/'.$row->gambar.'"></a>';
				$sub_array[] = $row->judul;
				// $sub_array[] = $row->deskripsi;
				$sub_array[] = $row->tanggal_kegiatan;
				$sub_array[] = '<a target="blank" class="btn btn-sm btn-danger" href="javascript:void(0)" title="Edit" onclick="hapus_kegiatan('."'".$row->id_kegiatan."'".')"><i class="fa fa-trash"></i> Hapus </a>';
				$data_kegiatan[] = $sub_array;
				$no++;

			}
			$output = array(
				//  "draw"					   =>	  intval($_POST['draw']),
				"recordsTotal"            =>     $this->m_kegiatan->count_all_data(),
				"recordsFiltered"         =>     $this->m_kegiatan->count_filtered_data(),
				"data"                    =>     $data_kegiatan
			);

			echo json_encode($output);
	}






















	public function tambah(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$v = $this->form_validation;
		$v->set_rules('judul','Judul Kegiatan','trim|required|min_length[4]|max_length[255]',array(
			'required'=>'judul kegiatan harus di isi',
			'min_length'=>'minimal karakter 8 karakter',
			'max_length'=>'maksimal 32 karakter'
		));
		
		$v->set_rules('deskripsi','Deskripsi Kegiatan','trim|required|min_length[50]',array(
			'required'=>'Deskripsi kegiatan harus di isi',
			'min_length'=>'minimal 50 karakter'
		));
		
		$v->set_rules('tanggal_kegiatan','Tanggal Kegiatan','trim|required',array(
			'required'=>'Tanggal kegiatan harus di isi'
		));

		$data = array(	
			'title' 	=>	'Guru & Staff Page',
			'isi'		=>	'admin/kegiatan/v_kegiatan_tambah' );
		$this->load->view('layouts/layout', $data);
		
		if( $v -> run() === TRUE ) {
			$id_kegiatan_terakhir= $this->m_kegiatan->cek_id();
			$last_id 	=  $id_kegiatan_terakhir['max_id'];
			$char		= "keg";
			$nourut		= (int) substr($last_id,3,5);
			$nourut ++;
			$id_baru	= $char.sprintf("%05s",$nourut);

			
			$judul 				= $this->input->post('judul');
			$deskripsi 			= $this->input->post('deskripsi');
			$tanggal			= $this->input->post('tanggal_kegiatan');
			
			$date 				= date_create($tanggal); 
			$tanggal_kegiatan 	= date_format($date,'Y-m-d');
			$tanggal_buat		= date('Y-m-d');

			$data_baru = array(
				'id_kegiatan'		=> $id_baru,
				'judul'				=> $judul,
				'deskripsi'			=> $deskripsi,
				'tanggal_kegiatan' 	=> $tanggal_kegiatan,				
				'tanggal_buat'		=> $tanggal_buat
				);
			$this->m_kegiatan->tambah_data($data_baru);
			redirect('admin/kegiatan');

		} else {
		$data = array(	
			'title' 	=>	'Guru & Staff Page',
			'isi'		=>	'admin/kegiatan/v_kegiatan_tambah' );
		
		$this->load->view('layouts/layout', $data);
		}
	}












	public function upload_gambar(){
		if($_FILES['gambar']['name']){

			$config = array(
				'upload_path'	=> './assets-admin/gambar/kegiatan/',
				'allowed_types' => 'jpg|png',
				'max_size'		=> '5000'
				);
				
			$this->load->library('upload',$config);
			if($this->upload->do_upload('gambar')){
				$gambar				= $this->upload->data();

			}

		}
	}














	public function view($id_kegiatan){
		$kegiatan = $this->m_kegiatan->get_single_data($id_kegiatan);

		$data['kegiatan'] 	= $kegiatan;
		$data['title']		= 'Guru & Staff Page';
		$data['isi']		= 'admin/kegiatan/v_kegiatan_detail';

		$data = array(	'kegiatan' 	=> $kegiatan,
						'title'		=> 'Guru & Staff Page',
						'isi'		=> 'admin/kegiatan/v_kegiatan_detail' );

		$this->load->view('layouts/layout',$data, FALSE );
	}

	public function hapus($id_kegiatan){
		$this->m_kegiatan->hapus_data($id_kegiatan);
		echo json_encode(array('status'=>'true'));

	}

	public function edit($id_kegiatan){
		$kegiatan = $this->m_kegiatan->get_single_data($id_kegiatan);


		$data = array(
			'kegiatan'	=> $kegiatan,
			'title'		=> 'Guru & Staff Page',
			'isi'		=> 'admin/kegiatan/v_kegiatan_edit'
		);

		$this->load->view('layouts/layout',$data,FALSE);
		
	}

	public function update(){
		$this->load->library('form_validation');
		$v = $this->form_validation;

		$v->set_rules('judul','Judul Kegiatan','trim|required|min_length[8]|max_length[255]',array(
			'required'=>'judul kegiatan harus di isi',
			'min_length'=>'minimal karakter 8 karakter',
			'max_length'=>'maksimal 32 karakter'
		));
		
		$v->set_rules('deskripsi','Deskripsi Kegiatan','trim|required|min_length[50]',array(
			'required'=>'Deskripsi kegiatan harus di isi',
			'min_length'=>'minimal 50 karakter'
		));
		
		$v->set_rules('tanggal_kegiatan','Tanggal Kegiatan','trim|required',array(
			'required'=>'Tanggal kegiatan harus di isi'
		));

		if($v -> run() === TRUE ){

			$id_kegiatan		= $this->input->post('id_kegiatan');	
			$judul 				= $this->input->post('judul');
			$deskripsi 			= $this->input->post('deskripsi');
			
			$tanggal			= $this->input->post('tanggal_kegiatan');
			$date 				= date_create($tanggal); 
			$tanggal_kegiatan 	= date_format($date,'Y-m-d');
			$tanggal_update		= date('Y-m-d','');

			
			$data_baru	= array(
					'judul'				=> $judul,
					'deskripsi'			=> $deskripsi,
					'tanggal_kegiatan' 	=> $tanggal_kegiatan,
					'tanggal_update'	=> $tanggal_update
			);
			// echo $tanggal_kegiatan;
			$this->m_kegiatan->update_data($data_baru,$id_kegiatan);
		} else {
			echo validation_errors();

		}


	}

}






?>