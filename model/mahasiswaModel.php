<?php
	class mahasiswaModel
	{
		// set database config for mysql
		function __construct($consetup)
		{
			$this->host = $consetup->host;
			$this->user = $consetup->user;
			$this->pass =  $consetup->pass;
			$this->db = $consetup->db;            					
		}
		// open mysql data base
		public function open_db()
		{
			error_reporting(0);
			$this->condb=new mysqli($this->host,$this->user,$this->pass,$this->db);
		}
		// close database
		public function close_db()
		{
			$this->condb->close();
		}	

		// insert record
		public function insertRecord($obj)
		{
			try
			{	
				$this->open_db();
				$query=$this->condb->prepare("INSERT INTO mahasiswa (nim,nama,angkatan,fakultas,prodi) VALUES (?,?,?,?,?)");
				$query->bind_param("isiss",$obj->nim,$obj->nama,$obj->angkatan,$obj->fakultas,$obj->prodi);
				$query->execute();
				$res= $query->get_result();
				$last_id=$this->condb->insert_id;
				$query->close();
				$this->close_db();
				return $last_id;
			}
			catch (Exception $e) 
			{
				$this->close_db();	
            	throw $e;
        	}
		}
        //update record
		public function updateRecord($obj)
		{
			try
			{	
				$this->open_db();
				$query=$this->condb->prepare("UPDATE mahasiswa SET nim=?,nama=?,angkatan=?,fakultas=?,prodi=? WHERE id=?");
				$query->bind_param("isissi", $obj->nim,$obj->nama,$obj->angkatan,$obj->fakultas,$obj->prodi,$obj->id);
				$query->execute();
				$res=$query->get_result();						
				$query->close();
				$this->close_db();
				return true;
			}
			catch (Exception $e) 
			{
            	$this->close_db();
            	throw $e;
        	}
        }
         // delete record
		public function deleteRecord($id)
		{	
			try{
				$this->open_db();
				$query=$this->condb->prepare("DELETE FROM mahasiswa WHERE id=?");
				$query->bind_param("i",$id);
				$query->execute();
				$res=$query->get_result();
				$query->close();
				$this->close_db();
				return true;	
			}
			catch (Exception $e) 
			{
            	$this->closeDb();
            	throw $e;
        	}		
        }   
        // select record     
		public function selectRecord($id)
		{
			try
			{
                $this->open_db();
                if($id>0)
				{	
					$query=$this->condb->prepare("SELECT * FROM mahasiswa WHERE id=?");
					$query->bind_param("i",$id);
				}
                else
                {$query=$this->condb->prepare("SELECT * FROM mahasiswa");	}		
				
				$query->execute();
				$res=$query->get_result();	
				$query->close();				
				$this->close_db();                
                return $res;
			}
			catch(Exception $e)
			{
				$this->close_db();
				throw $e; 	
			}
			
		}
	}

class mahasiswa
{
    // table fields
    public $id;
    public $nim;
    public $nama;
	public $angkatan;
	public $fakultas;
	public $prodi;
    // message string
    public $id_msg;
    public $nim_msg;
    public $nama_msg;
	public $angkatan_msg;
	public $fakultas_msg;
	public $prodi_msg;
    // constructor set default value
    function __construct()
    {
        $id=0;$nim=$nama=$angkatan=$fakultas=$prodi="";
        $id_msg=$nim_msg=$nama_msg=$angkatan_msg=$fakultas_msg=$prodi_msg="";
		
    }
}
?>