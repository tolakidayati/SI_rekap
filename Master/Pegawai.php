<?php

namespace Master;

use Config\Query_builder;

class Pegawai 
{
    private $db;
    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }
    public function index()
    {
        $data = $this->db->table('pegawai')->get()->resultArray();
        $res = '<a href="?target=pegawai&act=tambah_pegawai" class="btn btn-info btn-sm">Tambah pegawai</a><br><br>
        <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama Pegawai</th>
                    <th>Alamat Pegawai</th>
                    <th>No Hp</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Status Pegawai</th>
                    <th>Agama</th>
                    <th>JK</th>
                    <th>Act</th>
                </tr>
            </head>
            <tbody>';
            $no = 1;
            foreach ($data as $r) {
                $res .= '<tr>
                <td width="10">'.$no. '</td>
                <td width="100">'.$r['NIP'].'</td>
                <td>'.$r['nama_pegawai'].'</td>
                <td>'.$r['alamat_pegawai'].'</td>
                <td>'.$r['no_hp'].'</td>
                <td>'.$r['jenis_kelamin'].'</td>
                <td>'.$r['tempat_lahir'].'</td>
                <td>'.$r['status_pegawai'].'</td>
                <td>'.$r['agama'].'</td>
                <td width="10">'.$r['jk'].'</td>
                <td width="150">
                    <a href="?target=pegawai&act=edit_pegawai&id='.$r['NIP'].'" class="btn btn-dark btn-sm">Edit</a>
                    <a href="?target=pegawai&act=delete_pegawai&id='.$r['NIP'].'" class="btn btn-danger btn-sm">Hapus</a>
                </td>';
                $no++;
            }
        return $res;
    }
    public function tambah()
    {
        $res = '<a href="?target=pegawai" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=pegawai&act=simpan_pegawai">
            <div class="mb-3">
                <label for="NIP" class="form-label">NIP</label>
                <input type="text" class="form-control" id="NIP" name="NIP">
            </div>
            <div class="mb-3">
                <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai">
            </div>
            <div class="mb-3">
                <label for="alamat_pegawai" class="form-label">Alamat Pegawai</label>
                <input type="text" class="form-control" id="alamat_pegawai" name="alamat_pegawai">
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">No Hp</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp">
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin">
            </div>
            <div class="mb-3">
                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
            </div>
            <div class="mb-3">
                <label for="status_pegawai" class="form-label">Status Pegawai</label>
                <input type="text" class="form-control" id="status_pegawai" name="status_pegawai">
            </div>
            <div class="mb-3">
                <label for="agama" class="form-label">Agama</label>
                <input type="text" class="form-control" id="agama" name="agama">
            </div>
            <div class="mb-3">
                <label for="JK" class="form-label">JK</label><br>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="jk" id="jk1" value="1">
                    <label class="form-check-label" for="jk1">
                        L
                    </lebel>
                </div>
                <div class="form=check-inline">
                    <input class="form-check-input" type="radio" name="jk" id="jk0" value="0">
                    <label class="from-check-label" for=jk0">
                        P
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>';

        return $res;                   
    }  

    public function simpan(){
        $NIP = $_POST['NIP'];
        $nama_pegawai = $_POST['nama_pegawai'];
        $alamat_pegawai = $_POST['alamat_pegawai'];
        $no_hp = $_POST['no_hp'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $status_pegawai = $_POST['status_pegawai'];
        $agama = $_POST['agama'];


        $data = array(
            'NIP' => $NIP,
            'nama_pegawai' => $nama_pegawai,
            'alamat_pegawai' => $alamat_pegawai,
            'no_hp' => $no_hp,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir' => $tempat_lahir,
            'status_pegawai' => $status_pegawai,
            'agama' => $agama,
        );
        return $this->db->table('pegawai')->insert($data);
    }
    public function edit($id)
    {
        // get data pegawai
        $r = $this->db->table('pegawai')->where("NIP='$id'")->get()->rowArray();
        //cek radio

        $res = '<a href="?target=pegawai" class="btn btn-danger btn-sm">kembali</a><br>';
        $res .= '<form method="post" action="?target=pegawai&act=update_pegawai">
            <input type="hidden" class="form-control" id="param" name="param" value="'.$r['NIP'].'">

            <div class="mb-3">
                <label for="NIP" class="form-label">NIP</label>
                <input type="text" class="form-control" id="NIP" name="NIP" value="'.$r['NIP'].'">
            </div>
            <div class="mb-3">
                <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="'.$r['nama_pegawai'].'">
                </div>
                <div class="mb-3">
                <label for="alamat_pegawai" class="form-label">Alamat Pegawai</label>
                <input type="text" class="form-control" id="alamat_pegawai" name="alamat_pegawai" value="'.$r['alamat_pegawai'].'">
                </div>
                <div class="mb-3">
                <label for="no_hp" class="form-label">No Hp</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" value="'.$r['no_hp'].'">
                </div>
                <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="'.$r['jenis_kelamin'].'">
                </div>
                <div class="mb-3">
                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="'.$r['tempat_lahir'].'">
                </div>
                <div class="mb-3">
                <label for="status_pegawai" class="form-label">Status Pegawai</label>
                <input type="text" class="form-control" id="status_pegawai" name="status_pegawai" value="'.$r['status_pegawai'].'">
                </div>
                <div class="mb-3">
                <label for="agama" class="form-label">Agama</label>
                <input type="text" class="form-control" id="agama" name="agama" value="'.$r['agama'].'">
                </div>
                <div class="mb-3">
                
        <button type="submit" class="btn btn-primary">Ubah</button>
        </form>';
        return $res;   
    }
    public function update()
    {
        $param = $_POST['param'];
        $NIP = $_POST['NIP'];
        $nama_pegawai = $_POST['nama_pegawai'];
        $alamat_pegawai = $_POST['alamat_pegawai'];
        $no_hp = $_POST['no_hp'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $status_pegawai = $_POST['status_pegawai'];
        $agama = $_POST['agama'];
        $jk = $_POST['jk'];

        $data = array(
            'NIP' => $NIP,
            'nama_pegawai' => $nama_pegawai,
            'alamat_pegawai' => $alamat_pegawai,
            'no_hp' => $no_hp,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir' => $tempat_lahir,
            'status_pegawai' => $status_pegawai,
            'agama' => $agama,
            'jk' =>$jk
        );
        return $this->db->table('pegawai')->where("NIP='$param'")->update($data);
    }

    public function delete($id)
    {
        return $this->db->table('pegawai')->where("NIP='$id'")->delete();
    }
}