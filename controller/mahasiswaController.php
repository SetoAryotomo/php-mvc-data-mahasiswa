<?php
    require 'model/mahasiswaModel.php';
 
    require_once 'config.php';

    session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
    
	class mahasiswaController 
	{

 		function __construct() 
		{          
			$this->objconfig = new config();
			$this->objsm =  new mahasiswaModel($this->objconfig);
		}
        // mvc handler request
		public function mvcHandler() 
		{
			$act = isset($_GET['act']) ? $_GET['act'] : NULL;
			switch ($act) 
			{
                case 'add' :                    
					$this->insert();
					break;						
				case 'update':
					$this->update();
					break;				
				case 'delete' :					
					$this -> delete();
					break;								
				default:
                    $this->list();
			}
		}		
        // page redirection
		public function pageRedirect($url)
		{
			header('Location:'.$url);
		}	
        // check validation
		public function checkValidation($mahasiswatb)
        {    $noerror=true;
            // Validate nim        
            if(empty($mahasiswatb->nim)){
                $mahasiswatb->nim_msg = "Field is empty.";$noerror=false;
            }
            else{$mahasiswatb->nim_msg ="";}            
            // Validate nama            
            if(empty($mahasiswatb->nama)){
                $mahasiswatb->nama_msg = "Field is empty.";$noerror=false;     
            } 
            else{$mahasiswatb->nama_msg ="";}
            // Validate         
            if(empty($mahasiswatb->angkatan)){
                $mahasiswatb->angkatan_msg = "Field is empty.";$noerror=false;
            }
            else{$mahasiswatb->angkatan_msg ="";}
            // Validate   
            if(empty($mahasiswatb->fakultas)){
                $mahasiswatb->fakultas_msg = "Field is empty.";$noerror=false;
            }
            else{$mahasiswatb->fakultas_msg ="";}
            // Validate       
            if(empty($mahasiswatb->prodi)){
                $mahasiswatb->prodi_msg = "Field is empty.";$noerror=false;
            }
            else{$mahasiswatb->prodi_msg ="";}    			
            return $noerror;
        }
        // add new record
		public function insert()
		{
			error_reporting(0);
            try{
                $mahasiswatb=new mahasiswa();
                if (isset($_POST['addbtn'])) 
                {   
                    // read form value
                    $mahasiswatb->nim = trim($_POST['nim']);
                    $mahasiswatb->nama = trim($_POST['nama']);
					$mahasiswatb->angkatan = trim($_POST['angkatan']);
					$mahasiswatb->fakultas = trim($_POST['fakultas']);
					$mahasiswatb->prodi = trim($_POST['prodi']);
                    //call validation
                    $chk=$this->checkValidation($mahasiswatb);                    
                    if($chk)
                    {   
                        //call insert record            
                        $pid = $this -> objsm ->insertRecord($mahasiswatb);
                        if($pid>0){			
                            $this->list();
                        }else{
                            echo "Somthing is wrong..., try again.";
                        }
                    }else
                    {    
                        $_SESSION['mahasiswatbl0']=serialize($mahasiswatb);//add session obj           
                        $this->pageRedirect("view/insert.php");                
                    }
                }
            }catch (Exception $e) 
            {
                $this->close_db();	
                throw $e;
            }
        }
        // update record
        public function update()
		{
			error_reporting(0);
            try
            {
                
                if (isset($_POST['updatebtn'])) 
                {
                    $mahasiswatb=unserialize($_SESSION['mahasiswatbl0']);
                    $mahasiswatb->id = trim($_POST['id']);
                    $mahasiswatb->nim = trim($_POST['nim']);
                    $mahasiswatb->nama = trim($_POST['nama']);
					$mahasiswatb->angkatan = trim($_POST['angkatan']);
					$mahasiswatb->fakultas = trim($_POST['fakultas']);
					$mahasiswatb->prodi = trim($_POST['prodi']);      
                    // check validation  
                    $chk=$this->checkValidation($mahasiswatb);
                    if($chk)
                    {
                        $res = $this -> objsm ->updateRecord($mahasiswatb);	                        
                        if($res){			
                            $this->list();                           
                        }else{
                            echo "Somthing is wrong..., try again.";
                        }
                    }else
                    {         
                        $_SESSION['mahasiswatbl0']=serialize($mahasiswatb);      
                        $this->pageRedirect("view/update.php");                
                    }
                }elseif(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
                    $id=$_GET['id'];
                    $result=$this->objsm->selectRecord($id);
                    $row=mysqli_fetch_array($result);  
                    $mahasiswatb=new mahasiswa();                  
                    $mahasiswatb->id=$row["id"];
					$mahasiswatb->nim=$row["nim"];
                    $mahasiswatb->nama=$row["nama"];
					$mahasiswatb->angkatan=$row["angkatan"];
					$mahasiswatb->fakultas=$row["fakultas"];
					$mahasiswatb->prodi=$row["prodi"];
                    $_SESSION['mahasiswatbl0']=serialize($mahasiswatb);
                    $this->pageRedirect('view/update.php');

                }else{
                    echo "Invalid operation.";
                }
            }
            catch (Exception $e) 
            {
                $this->close_db();				
                throw $e;
            }
        }
        // delete record
        public function delete()
		{
			error_reporting(0);
            try
            {
                if (isset($_GET['id'])) 
                {
                    $id=$_GET['id'];
                    $res=$this->objsm->deleteRecord($id);                
                    if($res){
                        $this->pageRedirect('index.php');
                    }else{
                        echo "Somthing is wrong..., try again.";
                    }
                }else{
                    echo "Invalid operation.";
                }
            }
            catch (Exception $e) 
            {
                $this->close_db();				
                throw $e;
            }
        }
        public function list(){
            $result=$this->objsm->selectRecord(0);
            include "view/list.php";                                        
        }
    }
		
	
?>