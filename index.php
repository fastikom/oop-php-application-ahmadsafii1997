<?php
    include "config.php"; //memanggil koneksi
    include "class_buku.php"; //memanggil class anggota
    $db = new Config(); //koneksi
    $db->koneksi();
    $buku = new Buku(); //anggota
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Buku">
    <meta name="author" content="Ahmad Safi">

    <title>Data Inventaris Buku</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Inventaris Buku</a>
            </div>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-book fa-fw"></i> Data Buku</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Buku</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Inventaris Buku

                        </div> 
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <?php

                        if (isset($_GET['aksi'])) {
                        if ($_GET['aksi'] == "edit") {
                            $id_buku = $_GET['id_buku'];
                            $a = mysqli_fetch_array($buku->editData($id_buku)); //mengisi form edit anggota
                            ?>
                            <h3>EDIT DATA</h3>
                            <form method="post" action="edit.php" role="form">
                                <input type="hidden" name="id_buku" value="<?php echo $id_buku; ?>">
                                <div class="form-group">
                                    <label>Judul Buku</label>
                                    <input name="judul_buku" class="form-control" value="<?php echo $a['judul_buku']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Pengarang</label>
                                    <input name="pengarang" class="form-control" value="<?php echo $a['pengarang']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Penerbit</label>
                                    <input name="penerbit" class="form-control" value="<?php echo $a['penerbit']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Tahun Terbit</label>
                                    <input name="tahun_terbit" class="form-control" value="<?php echo $a['tahun_terbit']; ?>" required>
                                </div>
                                <button type="submit" name="edit" class="btn btn-primary">Simpan Data</button>
                            </form>
                            <hr>
                            <?php
                        }
                    }
                    ?>
                        
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-10 pull-right" ><a href="input_data.php"><button type="button" class="btn btn-primary">Tambah Data</button>   </a>   
                           </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                        <br /><br />
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Judul</th>
                                        <th>Penerbit(s)</th>
                                        <th>Pengarang</th>
                                        <th>Tahun Terbit</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $databuku = $buku->tampildata(); //tampil anggota
                                        $x = 1;
                                        if (mysqli_num_rows($databuku) > 0) {
                                            while ($a = mysqli_fetch_array($databuku)) {
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $x; ?>.</td>
                                                    <td><?php echo $a['judul_buku']; ?></td>
                                                    <td><?php echo $a['penerbit']; ?></td>
                                                    <td><?php echo $a['pengarang']; ?></td>
                                                    <td><?php echo $a['tahun_terbit']; ?></td>
                                                    <td align="center"><a href="<?php $_SERVER['PHP_SELF']; ?>?aksi=edit&id_buku=<?php echo $a['id_buku']; ?>"><button type="button" class="btn btn-success"><i class="fa fa-edit fa-fw"></i></button></a> | <a href="hapus.php?aksi=hapus&id_buku=<?php echo $a['id_buku']; ?>" onclick="return confirm('Anda yakin ingin menghapus buku <?php echo $a['judul_buku']; ?>?');"><button type="button" class="btn btn-danger"><i class="fa fa-trash fa-fw"></i></button></a></td>
                                                </tr> 
                                                <?php
                                                $x++;
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="6" align="center">Data Kosong</td>

                                            </tr>   
                                            <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
