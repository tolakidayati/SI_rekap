<?php

use Master\Pegawai;
use Master\Menu;
use Master\riwayatjabatan;
use Master\riwayatpangkat;

include('autoload.php');
include('Config/Database.php');

$menu = new Menu();
$pegawai = new pegawai($dataKoneksi);
$riwayatjabatan = new riwayatjabatan($dataKoneksi);
$riwayatpangkat = new riwayatpangkat($dataKoneksi);
// $pegawai->tambah();
$target = @$_GET['target'];
$act = @$_GET['act'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UTS OOP Daun</title>
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">SIMPEG</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bd-target="#MyMenu" aria-controls="navbarNavDropdown" aria-expanded="false" arial-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="MyMenu">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
                        foreach ($menu->topMenu() as $r) {
                        ?>
                            <li class="nav-item">
                                <a href="<?php echo $r['Link']; ?>" class="nav-link">
                                    <?php echo $r['Text']; ?>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>    
        </nav>
        <br>
        <div class="content">
            <h5>Content <?php echo strtoupper($target); ?></h5>
            
            <?php
            if (!isset($target) or $target == "home") {
                echo "Hai, selamat datang di sistem informasi kepegawaian";
                //  =========== start kontent pegawai =========================
            } elseif ($target == "pegawai") {
                if ($act == "tambah_pegawai") {
                    echo $pegawai->tambah();
                } elseif ($act == "simpan_pegawai") {
                    if ($pegawai->simpan()) {
                        echo "<script>
                            alert('data sukses disimpan');
                            window.location.href='?target=pegawai';
                        </script>";
                    } else {
                        echo "<script>
                            alert('data gagal disimpan');
                            window.location.href='?target=pegawai';
                        </script>";
                    }
                } elseif ($act == "edit_pegawai") {
                    $id = $_GET['id'];
                    echo $pegawai->edit($id);
                } elseif ($act == "update_pegawai") {
                    if ($pegawai->update()) {
                        echo "<script>
                            alert('data sukses diubah');
                            window.location.href='?target=pegawai';
                        </script>"; 
                    } else {
                        echo "<script>
                        alert('data gagal diubah');
                        window.location.href='?target=pegawai';
                        </script>";
                    } 
                } elseif ($act == "delete_pegawai") {
                    $id = $_GET['id'];
                    if ($pegawai->delete($id)) {
                        echo "<script>
                            alert('data sukses dihapus');
                            window.location.href='?target=pegawai';
                        </script>";
                    } else {
                        echo "<script>
                            alert('data gagal dihapus');
                            window.location.href='?target=pegawai';
                        </script>";
                    }
                } else {
                    echo $pegawai->index();
                }
                // ========================== end konten pegawai =================
                // riwayatjabatan
            } elseif ($target == "riwayatjabatan") {
                if ($act == "tambah_riwayatjabatan") {
                    echo $riwayatjabatan->tambah();
                } elseif ($act == "simpan_riwayatjabatan") {
                    if ($riwayatjabatan->simpan()) {
                        echo "<script>
                            alert('data sukses disimpan');
                            window.location.href='?target=riwayatjabatan';
                        </script>";
                    } else {
                        echo "<script>
                            alert('data gagal disimpan');
                            window.location.href='?target=riwayatjabatan';
                        </script>";
                    }
                } elseif ($act == "edit_riwayatjabatan") {
                    $id = $_GET['id'];
                    echo $riwayatjabatan->edit($id);
                } elseif ($act == "update_pegawai") {
                    if ($riwayatjabatan->update()) {
                        echo "<script>
                            alert('data sukses diubah');
                            window.location.href='?target=riwayatjabatan';
                        </script>"; 
                    } else {
                        echo "<script>
                        alert('data gagal diubah');
                        window.location.href='?target=riwayatjabatan';
                        </script>";
                    } 
                } elseif ($act == "delete_riwayatjabatan") {
                    $id = $_GET['id'];
                    if ($riwayatjabatan->delete($id)) {
                        echo "<script>
                            alert('data sukses dihapus');
                            window.location.href='?target=riwayatjabatan';
                        </script>";
                    } else {
                        echo "<script>
                            alert('data gagal dihapus');
                            window.location.href='?target=riwayatjabatan';
                        </script>";
                    }
                } else {
                    echo $riwayatjabatan->index();
                }

                 // riwayatpangkat
        } elseif ($target == "riwayatpangkat") {
            if ($act == "tambah_riwayatpangkat") { 
                echo $riwayatpangkat->tambah();
            } elseif ($act == "simpan_riwayatpangkat") { 
                if ($riwayatpangkat->simpan()) {
                    echo "<script>
                        alert('data sukses disimpan');
                        window.location.href='?target=riwayatpangkat';
                    </script>";
                } else {
                    echo "<script>
                        alert('data gagal disimpan');
                        window.location.href='?target=riwayatpangkat';
                    </script>";
                }
            } elseif ($act == "edit_riwayatpangkat") {
                $id = $_GET['id'];
                echo $riwayatpangkat->edit($id);
            } elseif ($act == "update_riwayatpangkat") { 
                if ($riwayatpangkat->update()) {
                    echo "<script>
                        alert('data sukses diubah');
                        window.location.href='?target=riwayatpangkat';
                    </script>";
                } else {
                    echo "<script>
                        alert('data gagal diubah');
                        window.location.href='?target=riwayatpangkat';   
                    </script>";
                }
            } elseif ($act == "delete_riwayatpangkat") {
                $id = $_GET['id'];
                if ($riwayatpangkat->delete($id)) { 
                    echo "<script>
                        alert('data sukses dihapus');
                        window.location.href='?target=riwayatpangkat';
                    </script>";
            } else {
                echo "<script>
                    alert('data gagal dihapus');
                    window.location.href='?target=riwayatpangkat';
                </script>";
            }
        } else {
            echo $riwayatpangkat->index();
        }   
    }         
        ?>
    </div>

        </div>
    </div>

</body>

</html>