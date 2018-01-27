<?php 

class M_kegiatan extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    var $table = "kegiatan";
    var $column_select = array("id_kegiatan", "judul", "tanggal_kegiatan");
    var $column_order = array("id_kegiatan", "judul", "tanggal_kegiatan");
    private function make_query()
    {
        $this->db->select($this->column_select);
        $this->db->from($this->table);

        if(isset($_POST['search']['value'])){
            $this->db->like('judul', $_POST['search']['value']);        
        }
        
        if(isset($_POST['order']))
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id_kegiatan','DESC');
        }
    }

    function get_datatables()
    {
        $this->make_query();
        if($_POST['length'] != -1 ){
            $this->db->limit($_POST['length'],$_POST['start']);
        }        
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_data()
    {
        $this->make_query();
        $query = $this->db->get();
        return $query->num_rows();

    }

    function count_all_data()
    {
        $this->db->select('*');
        $this->db->from('kegiatan');
        return $this->db->count_all_results();
    }

    var $column_select_gambar = array("id","id_kegiatan","gambar"); 
    function get_datatables_gambar($where)
    {
        $this->db->select($this->column_select_gambar);
        $this->db->from('kegiatan_gambar');
        $this->db->where('id_kegiatan',$where);

        if(isset($_POST['search']['value'])){
            $this->db->like('id_kegiatan', $_POST['search']['value']);        
        }
        
        $this->db->order_by('id','DESC');
        
        //gatau kenapa ini masih error 
        // if($_POST['length'] != -1){
        //     $this->db->limit($_POST['length'],$_POST['start']);   
        // }     

        $query = $this->db->get();
        return $query->result();
    }


    function count_filtered_data_gambar()
    {
        $this->db->select($this->column_select_gambar);
        $this->db->from('kegiatan_gambar');    
        if(isset($_POST['search']['value'])){
            $this->db->like('id_kegiatan', $_POST['search']['value']);        
        }
        $this->db->order_by('id','DESC');

        $query =  $this->db->get();
        return $query->num_rows();
    }

    function count_all_data_gambar()
    {
        $this->db->select('id_kegiatan');
        $this->db->from('kegiatan_gambar');
        return $this->db->count_all_results();
    }


    public function upload_gambar($data_gambar)
    {
        $this->db->insert('kegiatan_gambar',$data_gambar);
    } 


    public function hapus_data_gambar($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('kegiatan_gambar');
    }

    public function cek_id()
    {
        $this->db->select_max('id_kegiatan','max_id');
        $query = $this->db->get('kegiatan');
        return $query->row_array();
	}

    public function tambah_data($data_baru)
    {
        $this->db->insert('kegiatan',$data_baru);        
    }

    public function get_single_data($id_kegiatan)
    {
        $this->db->select('*');
        $this->db->from('kegiatan');
        $this->db->where('id_kegiatan',$id_kegiatan);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_data_gambar($id_kegiatan)
    {
        $this->db->select('*');
        $this->db->from('kegiatan_gambar');
        $this->db->where('id_kegiatan',$id_kegiatan);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function update_data($data_baru,$id_kegiatan)
    {
        $this->db->set($data_baru);
        $this->db->where('id_kegiatan',$id_kegiatan);
        $this->db->update('kegiatan');
       
    }

    public function hapus_data($id_kegiatan)
    {
        $this->db->where('id_kegiatan',$id_kegiatan);
        $this->db->delete('kegiatan');
    }

    public function hapus_gambar_kegiatan($id_kegiatan)
    {
        $this->db->where('id_kegiatan',$id_kegiatan);
        $this->db->delete('kegiatan_gambar');
    }


    public function get_all_kegiatan()
    {
        //return result_array();
    }



}




?>













































   
