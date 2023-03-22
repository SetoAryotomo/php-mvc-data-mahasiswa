<?php session_unset();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  
    <style>
        .wrapper{
            width: 80%;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
			margin-top: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
					
                        <h2 style='margin-top:30px;'>Data Mahasiswa <i class='fa fa-address-card' style='font-size:36px'></i>	</h2>					
                        
                    </div>
                    <?php
                        if($result->num_rows > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";                                     
                                        echo "<th>NIM</th>";
                                        echo "<th>Nama</th>";
										echo "<th>Angkatan</th>";
										echo "<th>Fakultas</th>";
										echo "<th>Prodi</th>";
                                        echo "<th>Aksi</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";                               
                                        echo "<td>" . $row['nim'] . "</td>";
                                        echo "<td>" . $row['nama'] . "</td>";
										echo "<td>" . $row['angkatan'] . "</td>";
										echo "<td>" . $row['fakultas'] . "</td>";
										echo "<td>" . $row['prodi'] . "</td>";
                                        echo "<td>";
                                        echo "<a href='index.php?act=update&id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><i class='fa fa-edit' style='font-size:24px'></i></a>";
                                        echo "<a href='index.php?act=delete&id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><i  class='fa fa-trash' style='font-size:24px'></i></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    ?>
					<a href="view/insert.php" class="btn btn-primary">Tambah Data Mahasiswa</a>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>