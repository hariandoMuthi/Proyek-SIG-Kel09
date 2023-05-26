<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../tampil_data.php?pesan=belum_login");
}
include "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<?php include "header.php"; ?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include "menu_sidebar.php"; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php include "menu_topbar.php"; ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Sebaran TItik Api Provinsi Riau</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Kabupaten/Kota</th>
                                            <th>Ibukota</th>
                                            <th>Luas Wilayah</th>
                                            <th>Status</th>
                                            <th>Titik Panas</th>
                                            <th>Curah Hujan</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        $data = mysqli_query($koneksi, "select * from titik_api");
                                        while ($d = mysqli_fetch_array($data)) {
                                            $no++;
                                        ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><b><a href="detail_data.php?id_titik=<?php echo $d['id_titik']; ?> ">
                                                        <?php echo $d['kabupaten_kota']; ?> </a> </b></td>
                                            <td><?php echo $d['ibukota']; ?></td>
                                            <td><?php echo $d['luas_wilayah']; ?></td>
                                            <td><?php echo $d['status']; ?></td>
                                            <td><?php echo $d['titik_panas']; ?></td>
                                            <td><?php echo $d['curah_hujan']; ?></td>
                                            <td><?php echo $d['latitude']; ?></td>
                                            <td><?php echo $d['longitude']; ?></td>
                                            <td>
                                                <a href="edit_data.php?id_titik=<?php echo $d['id_titik']; ?> "
                                                    class="btn-sm btn-primary"><span class="fas fa-edit"></a>
                                                <a href="hapus_aksi.php?id_titik=<?php echo $d['id_titik']; ?>"
                                                    class="btn-sm btn-danger"><span class="fas fa-trash"></a>
                                            </td>
                                        </tr>
                            </div>
                            <?php
                                        }
                        ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <!-- End of Page Wrapper -->