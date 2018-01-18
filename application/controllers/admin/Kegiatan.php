<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Kegiatan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kegiatan');
	}

	public function index()
	{
		$data = array(	
						'title' 	=>	'Guru & Staff Page',
						'isi'		=>	'admin/kegiatan/v_kegiatan' );
		$this->load->view('layouts/layout', $data, FALSE);
	}

	public function fetch_kegiatan()
	{
			$this->load->model("m_kegiatan");

			
			$get_all_kegiatan = $this->m_kegiatan->get_datatables();
			
			$no=1;
			foreach($get_all_kegiatan as $row)
			{
				//deklarasikan $sub_array menjadi array
				$sub_array = array();
					//meng-echo isi dari $sub_array
					$sub_array['id_kegiatan'] 		= '<a href="'.base_url().'admin/kegiatan/view/'.$row->id_kegiatan.'"><h5>'.$row->id_kegiatan. '</h5></a>';
					$sub_array['judul'] 			= '<a href="'.base_url().'admin/kegiatan/view/'.$row->id_kegiatan.'"><h5>'.$row->judul. '</h5></a>';
					$sub_array['tanggal_kegiatan'] 	= $row->tanggal_kegiatan;
					$sub_array['action'] 			= '<a target="blank" class="btn btn-sm btn-danger" href="javascript:void(0)" title="Edit" onclick="hapus_kegiatan('."'".$row->id_kegiatan."'".')"><i class="fa fa-trash"></i> Hapus </a>';
				
				//memasukan setiap isi array dari $sub_array ke dalam setiap array $data_kegiatan
				$data_kegiatan[] = $sub_array;
				$no++;
			}
			$output = array(
				//  "draw"					  =>	  intval($_POST['draw']),
				"recordsTotal"            =>     $this->m_kegiatan->count_all_data(),
				"recordsFiltered"         =>     $this->m_kegiatan->count_filtered_data(),
				"data"                    =>     $data_kegiatan
			);

			echo json_encode($output);
	}

	public function form_tambah()
	{
		// $this->session->unset_userdata('id_kegiatan');
		$data = array(	
			'title' 	=>	'Guru & Staff Page',
			'isi'		=>	'admin/kegiatan/v_kegiatan_tambah' 
		);
		$this->load->view('layouts/layout', $data);	
		$this->load->helper('form'); 
	}




















	public function tambah()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$v = $this->form_validation;
		$v->set_rules('judul','Judul Kegiatan','trim|required|min_length[8]|max_length[255]',array(
			'required'=>'judul kegiatan harus di isi',
			'min_length'=>'minimal karakter 8 karakter',
			'max_length'=>'maksimal 32 karakter'
		));
		$v->set_rules('deskripsi','Deskripsi Kegiatan','trim|required|min_length[50]',array(
			'required'=>'Deskripsi kegiatan harus di isi',
			'min_length'=>'Deskripsi minimal 50 karakter'
		));
		$v->set_rules('tanggal_kegiatan','Tanggal Kegiatan','trim|required',array(
			'required'=>'Tanggal kegiatan harus di isi'
		));
		
		if($this->form_validation->run()===FALSE ) {
			$validator['status'] = "false";
			foreach( $_POST as $key => $value ){
				$validator['msg'][$key] = form_error($key);
			}
			// echo json_encode($validator);
			$this->load->helper('form'); 
			
			$data = array(	
				'title' 	=>	'Guru & Staff Page',
				'isi'		=>	'admin/kegiatan/v_kegiatan_tambah' 
			);
			
			$this->session->set_flashdata('gagal','data gagal di input nih!');
			$this->load->view('layouts/layout', $data);	
			

		} else {
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
			$session_kegiatan = array(
				'id_kegiatan'	=> $id_baru 	
			);

			$this->session->set_userdata($session_kegiatan);
			$validator['status'] = "true";
			$avlidator['gambar'] = $this->input->post('gambar');
			echo json_encode($validator);
			redirect('admin/kegiatan/form_tambah');
		}
		
	}

	public function fetch_gambar()
	{
		$this->load->model('m_kegiatan');
		$this->load->database();
		$where=$this->session->userdata('id_kegiatan');
		$cek = $this->db->query("SELECT * FROM kegiatan_gambar 	WHERE id_kegiatan='$where' ");
		$result = $cek->num_rows();
		if ($result < 1){
				$sub_array = array();
				$sub_array['no'] 			= '';
				$sub_array['id_kegiatan']	= '';
				$sub_array['gambar'] 		= 'Gambar belum ada';	
				$sub_array['action']		= '';
				$data_kegiatan_gambar[] = $sub_array;
				$output = array(
					"recordsTotal" 		=> $this->m_kegiatan->count_all_data_gambar(),
					"recordsFiltered" 	=> $this->m_kegiatan->count_filtered_data_gambar(),
					"data"				=> $data_kegiatan_gambar
				);			
				echo json_encode($output);

		} else {
			$where=$this->session->userdata('id_kegiatan');
			$get_all_gambar=$this->m_kegiatan->get_datatables_gambar($where);
			$no = 1;
			foreach($get_all_gambar as $row )
			{
				$sub_array = array();
				$sub_array['no'] 			= $no;
				$sub_array['id_kegiatan']	= $row->id_kegiatan;
				$sub_array['gambar'] 		= '<img src="' .base_url().'assets-admin/gambar/kegiatan/'. $row->gambar . '"  class="img-thumbnail"  style="height:200px; max-width:100%;"  >';
				$sub_array['action']		= '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Edit" onclick="hapus_gambar('."'".$row->id."'".')"><i class="fa fa-trash"></i> Hapus </a>';	
				$data_kegiatan_gambar[] = $sub_array;
				$no++;
			}
			$output = array(
				"recordsTotal" 		=> $this->m_kegiatan->count_all_data_gambar(),
				"recordsFiltered" 	=> $this->m_kegiatan->count_filtered_data_gambar(),
				"data"				=> $data_kegiatan_gambar
			);			
			echo json_encode($output);
		}
	}

	public function upload_gambar()
	{
		$config = array(
			'upload_path'	=> './assets-admin/gambar/kegiatan/',
			'allowed_types' => 'jpg|png|gif',
			'max_size'		=> '5000'
			);

		if(isset($_FILES['gambar']['name'])){
			$this->load->library('upload',$config);
			if($this->upload->do_upload('gambar')){
				$gambar				= $this->upload->data();
				$data_gambar = array(
					'id_kegiatan' => $this->session->userdata('id_kegiatan'),
					'gambar'	  => $gambar['file_name']
				);
				$this->m_kegiatan->upload_gambar($data_gambar);
				echo "berhasil di input";
			}
		} else {

			echo "Anda belum memilih file untuk di upload";
		}
	}

	public function unset_session()
	{
		$this->session->unset_userdata('id_kegiatan');
		$data = array(	
			'title' 	=>	'Guru & Staff Page',
			'isi'		=>	'admin/kegiatan/v_kegiatan' );
		$this->load->view('layouts/layout', $data, FALSE);
	}






















	public function hapus_gambar($id)
	{
		$this->m_kegiatan->hapus_data_gambar($id);
		echo json_encode(array('status'=>'true'));
	}



	public function view($id_kegiatan)
	{			
		
		$kegiatan = $this->m_kegiatan->get_single_data($id_kegiatan);
		$kegiatan_gambar = $this->m_kegiatan->get_data_gambar($id_kegiatan);		
		$data = array(	'kegiatan' 	=> $kegiatan,
						'kegiatan_gambar'=>$kegiatan_gambar,
						'title'		=> 'Guru & Staff Page',
						'isi'		=> 'admin/kegiatan/v_kegiatan_detail' );
		$this->load->view('layouts/layout',$data, FALSE );
	}

	public function hapus($id_kegiatan)
	{
		$this->m_kegiatan->hapus_data($id_kegiatan);
		$this->m_kegiatan->hapus_gambar_kegiatan($id_kegiatan);
		echo json_encode(array('status'=>'true'));
	}

	public function edit($id_kegiatan)
	{
		$kegiatan = $this->m_kegiatan->get_single_data($id_kegiatan);
		$session_edit = array('id_kegiatan'=> $id_kegiatan);

		$this->session->set_userdata($session_edit);

		$data = array(
			'kegiatan'	=> $kegiatan,
			'title'		=> 'Guru & Staff Page',
			'isi'		=> 'admin/kegiatan/v_kegiatan_edit'
		);

		$this->load->view('layouts/layout',$data,FALSE);
		
	}

	public function update()
	{
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
			$tanggal_update		= date('Y-m-d');

			$data_baru	= array(
					'judul'				=> $judul,
					'deskripsi'			=> $deskripsi,
					'tanggal_kegiatan' 	=> $tanggal_kegiatan,
					'tanggal_update'	=> $tanggal_update
			);
			$this->m_kegiatan->update_data($data_baru,$id_kegiatan);
			$validator['status']='true';
			$validator['msg']='berhasil di update';
			echo json_encode($validator);
		} else {
			$validator['status'] = "false";
			foreach( $_POST as $key => $value ){
				$validator['msg'][$key] = form_error($key);
			}
			echo json_encode($validator);
			echo validation_errors();
		}
	}
}





?>