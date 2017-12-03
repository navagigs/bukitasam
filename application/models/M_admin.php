<?php
class M_admin extends CI_Model  {

    public function __contsruct(){
        parent::Model();
    }
	

    // ================================================== MODUL HOME ================================================== //
	//CONFIGURATION TABEL user
	public function insert_user($data){
        $this->db->insert("user",$data);
    }
    
    public function update_user($where,$data){
        $this->db->update("user",$data,$where);
    }

    public function delete_user($where){
        $this->db->delete("user", $where);
    }

	public function get_user($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("user");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}

    public function grid_all_user($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("user");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_user($where="", $like=""){
        $this->db->select("*");
        $this->db->from("user");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }

    //CONFIGURATION TABEL pegawai
    public function insert_pegawai($data){
        $this->db->insert("pegawai",$data);
    }
    
    public function update_pegawai($where,$data){
        $this->db->update("pegawai",$data,$where);
    }

    public function delete_pegawai($where){
        $this->db->delete("pegawai", $where);
    }

    public function get_pegawai($select, $where){
        $data = "";
        $this->db->select($select);
        $this->db->from("pegawai");
        $this->db->where($where);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data = $Q->row();
        }
        $Q->free_result();
        return $data;
    }

    public function grid_all_pegawai($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("pegawai");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_pegawai($where="", $like=""){
        $this->db->select("*");
        $this->db->from("pegawai");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }

       //CONFIGURATION TABEL stasiun
    public function insert_stasiun($data){
        $this->db->insert("stasiun",$data);
    }
    
    public function update_stasiun($where,$data){
        $this->db->update("stasiun",$data,$where);
    }

    public function delete_stasiun($where){
        $this->db->delete("stasiun", $where);
    }

    public function get_stasiun($select, $where){
        $data = "";
        $this->db->select($select);
        $this->db->from("stasiun");
        $this->db->where($where);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data = $Q->row();
        }
        $Q->free_result();
        return $data;
    }

    public function grid_all_stasiun($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("stasiun");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_stasiun($where="", $like=""){
        $this->db->select("*");
        $this->db->from("stasiun");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }

       //CONFIGURATION TABEL kereta
    public function insert_kereta($data){
        $this->db->insert("kereta",$data);
    }
    
    public function update_kereta($where,$data){
        $this->db->update("kereta",$data,$where);
    }

    public function delete_kereta($where){
        $this->db->delete("kereta", $where);
    }

    public function get_kereta($select, $where){
        $data = "";
        $this->db->select($select);
        $this->db->from("kereta");
        $this->db->where($where);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data = $Q->row();
        }
        $Q->free_result();
        return $data;
    }

    public function grid_all_kereta($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("kereta");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_kereta($where="", $like=""){
        $this->db->select("*");
        $this->db->from("kereta");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }


       //CONFIGURATION TABEL surat_angkut
    public function insert_surat($data){
        $this->db->insert("surat_angkut",$data);
    }
    
    public function update_surat($where,$data){
        $this->db->update("surat_angkut",$data,$where);
    }

    public function delete_surat($where){
        $this->db->delete("surat_angkut", $where);
    }

    public function get_surat($select, $where){
        $data = "";
        $this->db->select($select);
        $this->db->from("surat_angkut");
        $this->db->where($where);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data = $Q->row();
        }
        $Q->free_result();
        return $data;
    }

    public function grid_all_surat($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("surat_angkut");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_surat($where="", $like=""){
        $this->db->select("*");
        $this->db->from("surat_angkut");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }

       //CONFIGURATION TABEL tls
    public function insert_tls($data){
        $this->db->insert("tls",$data);
    }
    
    public function update_tls($where,$data){
        $this->db->update("tls",$data,$where);
    }

    public function delete_tls($where){
        $this->db->delete("tls", $where);
    }

    public function get_tls($select, $where){
        $data = "";
        $this->db->select($select);
        $this->db->from("tls t");
        $this->db->join('kereta k', 't.id_kereta= k.id_kereta', 'left');
        $this->db->where($where);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data = $Q->row();
        }
        $Q->free_result();
        return $data;
    }

    public function grid_all_tls($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("tls");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_tls($where="", $like=""){
        $this->db->select("*");
        $this->db->from("tls");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }

       //CONFIGURATION TABEL singgah
    public function insert_singgah($data){
        $this->db->insert("singgah",$data);
    }
    
    public function update_singgah($where,$data){
        $this->db->update("singgah",$data,$where);
    }

    public function delete_singgah($where){
        $this->db->delete("singgah", $where);
    }

    public function get_singgah($select, $where){
        $data = "";
        $this->db->select($select);
        $this->db->from("singgah");
        $this->db->where($where);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data = $Q->row();
        }
        $Q->free_result();
        return $data;
    }

    public function grid_all_singgah($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("singgah");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_singgah($where="", $like=""){
        $this->db->select("*");
        $this->db->from("singgah");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }

    // CONFIGURATION COMBO BOX WITH DATABASE WITH VALIDASI
    public function combo_box($table, $name, $value, $name_value, $pilihan, $js='', $label='', $width=''){
        echo "<select name='$name' id='$name' onchange='$js' required class='form-control input-sm' style='width:$width'>";
        echo "<option value=''>".$label."</option>";
        $query = $this->db->query($table);
        foreach ($query->result() as $row){
            if ($pilihan == $row->$value){
                echo "<option value='".$row->$value."' selected>".$row->$name_value."</option>";
            } else {
                echo "<option value='".$row->$value."'>".$row->$name_value."</option>";
            }
        }
        echo "</select>";
    }
    
    // CONFIGURATION COMBO BOX WITH DATABASE NO VALIDASI
    public function combo_box2($table, $name, $value, $name_value, $pilihan, $js='', $label='', $width=''){
        echo "<select name='$name' id='$name' onchange='$js' required class='form-control input-sm' style='width:$width'>";
        echo "<option value=''>".$label."</option>";
        $query = $this->db->query($table);
        foreach ($query->result() as $row){
            if ($pilihan == $row->$value){
                echo "<option value='".$row->$value."' selected>".$row->$name_value."</option>";
            } else {
                echo "<option value='".$row->$value."'>".$row->$name_value."</option>";
            }
        }
        echo "</select>";
    }
    
       // CONFIGURATION COMBO BOX WITH DATABASE NO VALIDASI
    public function combo_box3($table, $name, $value, $name_value, $pilihan, $js='', $label='', $width=''){
        echo "<select name='$name'  style='display:none;' id='$name' onchange='$js' class='form-control input-sm' style='width:$width'>";
        $query = $this->db->query($table);
        foreach ($query->result() as $row){
            if ($pilihan == $row->$value){
                echo "<option value='".$row->$value."' selected>".$row->$name_value."</option>";
            } else {
                echo "<option value='".$row->$value."'>".$row->$name_value."</option>";
            }
        }
        echo "</select>";
    }
    
    //CONFIGURATION CHECKBOX ARRAY WITH DATABASE
    public function checkbox($table, $name, $value, $name_value, $pilihan=''){
        $query = $this->db->query($table);
        $array_tag = explode(',', $pilihan);
        $ceked = "";
        foreach ($query->result() as $row){
            $ceked = (array_search($row->tag_id, $array_tag) === false)? '' : 'checked';
            echo "<label for='".$row->$value."'><input type='checkbox' class='icheck' name='$name' id='".$row->$value."' value='".$row->$value."' ".$ceked."/> ".$row->$name_value."</label> ";
        }
    }
    //CONFIGURATION CHECKBOX ARRAY WITH DATABASE
    public function checkbox_kelas($table, $name, $value, $name_value, $pilihan=''){
        $query = $this->db->query($table);
        $array_tag = explode(',', $pilihan);
        $ceked = "";
        foreach ($query->result() as $row){
            $ceked = (array_search($row->kelas_id, $array_tag) === false)? '' : 'checked';
            echo "<label for='".$row->$value."'><input type='checkbox' class='icheck' name='$name' id='".$row->$value."' value='".$row->$value."' ".$ceked."/> ".$row->$name_value."</label> ";
        }
    }
    
    //CONFIGURATION CHECKBOX ARRAY WITH DATABASE
    public function checkbox_status($table, $name, $value, $name_value, $pilihan=''){
        $query = $this->db->query($table);
        $array_tag = explode(',', $pilihan);
        $ceked = "";
        foreach ($query->result() as $row){
            $ceked = (array_search($row->status_perkawinan_kode, $array_tag) === false)? '' : 'checked';
            echo "<input type='checkbox' name='$name' id='".$row->$value."' style='display: inline-block;' value='".$row->$value."' ".$ceked."/><label for='".$row->$value."' style='display: inline-block; margin-right: 10px;'>".$row->$name_value."</label>";
        }
    }
    
    //CONFIGURATION LIST ARRAY WITH DATABASE AND EXPLODE
    public function listarray($table, $name, $value, $name_value, $pilihan=''){
        $query = $this->db->query($table);
        $array_tag = explode(',', $pilihan);
        $ceked = "";
        foreach ($query->result() as $row){
            if (array_search($row->tag_id, $array_tag) === false) {
            } else {
            echo $row->$name_value.", ";
            }
        }
    }
    
    //CONFIGURATION LIST ARRAY WITH DATABASE AND EXPLODE
    public function tagsberita($table, $name, $value, $name_value, $pilihan=''){
        $query = $this->db->query($table);
        $array_tag = explode(',', $pilihan);
        $ceked = "";
        foreach ($query->result() as $row){
            if (array_search($row->tag_id, $array_tag) === false) {
            } else {
            echo "<a href='".site_url()."news/tags/".$row->tag_id."' class='tag'>".$row->$name_value."</a> ";
            }
        }
    }
}