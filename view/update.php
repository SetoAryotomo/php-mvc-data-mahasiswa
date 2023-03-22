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
                        <h2 style='margin-top:30px;'>Update mahasiswa</h2>
                    </div>
                  
                    <form action="../index.php?act=update" method="post" >
                        <div class="form-group <?php echo (!empty($mahasiswatb->nim_msg)) ? 'has-error' : ''; ?>">
                            <label>nim</label>
                            <input type="text" name="nim" class="form-control" value="<?php echo $mahasiswatb->nim; ?>">
                            <span class="help-block"><?php echo $mahasiswatb->nim_msg;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($mahasiswatb->nama_msg)) ? 'has-error' : ''; ?>">
                            <label>nama</label>
                            <input type="text" name="nama" class="form-control" value="<?php echo $mahasiswatb->nama; ?> ">
                            <span class="help-block"><?php echo $mahasiswatb->nama_msg;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($mahasiswatb->angkatan_msg)) ? 'has-error' : ''; ?>">
                            <label>angkatan</label>
                            <input type="text" name="angkatan" class="form-control" value="<?php echo $mahasiswatb->angkatan; ?>">
                            <span class="help-block"><?php echo $mahasiswatb->angkatan_msg;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($mahasiswatb->fakultas_msg)) ? 'has-error' : ''; ?>">
                            <label>fakultas</label>
                            <input type="text" name="fakultas" class="form-control" value="<?php echo $mahasiswatb->fakultas; ?>">
                            <span class="help-block"><?php echo $mahasiswatb->fakultas_msg;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($mahasiswatb->prodi_msg)) ? 'has-error' : ''; ?>">
                            <label>prodi</label>
                            <input type="text" name="prodi" class="form-control" value="<?php echo $mahasiswatb->prodi; ?>">
                            <span class="help-block"><?php echo $mahasiswatb->prodi_msg;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $mahasiswatb->id; ?>"/>
                        <input type="submit" name="updatebtn" class="btn btn-primary" value="Submit">
                        <a href="../index.php" style="background-color:grey;  border-style: solid;border-color: grey;" class="btn btn-primary">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>