<?php
        require '../model/mahasiswaModel.php'; 
        session_start();             
        $mahasiswatb=isset($_SESSION['mahasiswatbl0'])?unserialize($_SESSION['mahasiswatbl0']):new mahasiswa();            
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2 style='margin-top:30px;'>Add mahasiswa</h2>
                    </div>
                    
                    <form action="../index.php?act=add" method="post" >
                        <div class="form-group <?php echo (!empty($mahasiswatb->nim_msg)) ? 'has-error' : ''; ?>">
                            <label>mahasiswa nim</label>
                            <input name="nim" class="form-control" value="<?php echo $mahasiswatb->nim; ?>">
                            <span class="help-block"><?php echo $mahasiswatb->nim_msg;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($mahasiswatb->nama_msg)) ? 'has-error' : ''; ?>">
                            <label>mahasiswa nama</label>
                            <input name="nama" class="form-control" value="<?php echo $mahasiswatb->nama; ?>">
                            <span class="help-block"><?php echo $mahasiswatb->nama_msg;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($mahasiswatb->angkatan_msg)) ? 'has-error' : ''; ?>">
                            <label>angkatan</label>
                            <input name="angkatan" class="form-control" value="<?php echo $mahasiswatb->angkatan; ?>">
                            <span class="help-block"><?php echo $mahasiswatb->angkatan_msg;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($mahasiswatb->fakultas_msg)) ? 'has-error' : ''; ?>">
                            <label>fakultas</label>
                            <input name="fakultas" class="form-control" value="<?php echo $mahasiswatb->fakultas; ?>">
                            <span class="help-block"><?php echo $mahasiswatb->fakultas_msg;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($mahasiswatb->prodi_msg)) ? 'has-error' : ''; ?>">
                            <label>prodi</label>
                            <input name="prodi" class="form-control" value="<?php echo $mahasiswatb->prodi; ?>">
                            <span class="help-block"><?php echo $mahasiswatb->prodi_msg;?></span>
                        </div>
                        <input type="submit" name="addbtn" class="btn btn-primary" value="Submit">
                        <a href="../index.php" style="background-color:grey;  border-style: solid;border-color: grey;" class="btn btn-primary">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>