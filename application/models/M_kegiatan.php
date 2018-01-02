<?php 

class M_kegiatan extends CI_Model{

    
    public function __construct(){
        parent::__construct();
        $this->load->database();

    }

    var $table = "kegiatan";
    var $column_select = array("id_kegiatan", "judul", "deskripsi", "gambar","tanggal_kegiatan");
    var $column_order = array("id_kegiatan", "judul", "deskripsi", "gambar","tanggal_kegiatan");

    private function make_query()
    {
        $this->db->select($this->column_select);
        $this->db->from($this->table);

        if(isset($_POST['search']['value'])){
            $this->db->like('judul', $_POST['search']['value']);        
        }
        
        if(isset($_POST['order'])){
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id_kegiatan','DESC');
        }
        
    }


    function get_datatables(){
        $this->make_query();
        // if($_POST['length'] != -1){
        //     $this->db->limit($_POST['length'],$_POST['start']);
            
        // }        
        $query = $this->db->get();
        return $query->result();
    }




    function count_filtered_data(){
        $this->make_query();
        $query = $this->db->get();
        return $query->num_rows();

    }


    function count_all_data(){
        $this->db->select('*');
        $this->db->from('kegiatan');
        return $this->db->count_all_results();
    }



    public function tambah_data($data_baru){
        $this->db->insert('kegiatan',$data_baru);
        
    }

    public function get_single_data($id_kegiatan){
            
    }

    
    public function update_data(){
        $this->db->update('');
    }

    public function delete_data($id_kegiatan){

    }


}

?>













































   
