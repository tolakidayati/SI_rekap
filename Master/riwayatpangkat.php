<?php

namespace Master;

use Config\Query_builder;

class riwayatpangkat  
{
    private $db;
    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }
    public function index()
    {
        $data = $this->db->table('riwayatpangkat')->get()->resultArray();
        $res = '<a href="?target=riwayatpangkat&act=tambah_riwayatpangkat" class="btn btn-info btn-sm">Tambah riwayatpangkat</a><br><br>
        <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>id pegawai</th>
                    <th>Nama pegawai</th>
                    <th>Jabatan</th>
                    <th>No Sk</th>
                    <th>Tanggal Mulai Tugas</th>
                    <th>JK</th>
                    <th>Act</th>
                </tr>
            </head>
            <tbody>';
            $no = 1;
            foreach ($data as $r) {
                $res .= '<tr>
                <td width="10">'.$no. '</td>
                <td width="100">'.$r['id_pegawai'].'</td>
                <td>'.$r['nama_pegawai'].'</td>
                <td>'.$r['jabatan'].'</td>
                <td>'.$r['no_sk'].'</td>
                <td>'.$r['tanggal_mulai_tugas'].'</td>
                <td width="10">'.$r['jk'].'</td>
                <td width="150">
                    <a href="?target=riwayatpangkat&act=edit_riwayatpangkat&id='.$r['id_pegawai'].'" class="btn btn-dark btn-sm">Edit</a>
                    <a href="?target=riwayatpangkat&act=delete_riwayatpangkat&id='.$r['id_pegawai'].'" class="btn btn-danger btn-sm">Hapus</a>
                </td>';
                $no++;
            }
        return $res; 
    }
    public function tambah()
    {
        $res = '<a href="?target=riwayatpangkat" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=riwayatpangkat&act=simpan_riwayatpangkat">
            <div class="mb-3">
                <label for="id_pegawai" class="form-label">id_pegawai</label>
                <input type="text" class="form-control" id="id_pegawai" name="id_pegawai">
            </div>
            <div class="mb-3">
                <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai">
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan">
            </div>
            <div class="mb-3">
                <label for="no_sk" class="form-label">No Sk</label>
                <input type="text" class="form-control" id="no_sk" name="no_sk">
            </div>
            <div class="mb-3">
                <label for="tanggal_mulai_tugas" class="form-label">Tanggal Mulai Tugas</label>
                <input type="text" class="form-control" id="tanggal_mulai_tugas" name="tanggal_mulai_tugas">
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
        $id_pegawai = $_POST['id_pegawai'];
        $nama_pegawai = $_POST['nama_pegawai'];
        $jabatan = $_POST['jabatan'];
        $no_sk = $_POST['no_sk'];
        $tanggal_mulai_tugas = $_POST['tanggal_mulai_tugas'];

        $data = array(
            'id_pegawai' => $id_pegawai,
            'nama_pegawai' => $nama_pegawai,
            'jabatan' => $jabatan,
            'no_sk' => $no_sk,
            'tanggal_mulai_tugas' => $tanggal_mulai_tugas,
        );
        return $this->db->table('riwayatpangkat')->insert($data);
    }
    public function edit($id)
    {
        // get data riwayatpangkat
        $r = $this->db->table('riwayatpangkat')->where("id_pegawai='$id'")->get()->rowArray();
        //cek radio

        $res = '<a href="?target=riwayatpangkat" class="btn btn-danger btn-sm">kembali</a><br>';
        $res .= '<form method="post" action="?target=riwayatpangkat&act=update_riwayatpangkat">
            <input type="hidden" class="form-control" id="param" name="param" value="'.$r['id_pegawai'].'">

            <div class="mb-3">
                <label for="id_pegawai" class="form-label">id_pegawai</label>
                <input type="text" class="form-control" id="id_pegawai" name="id_pegawai" value="'.$r['id_pegawai'].'">
            </div>
            <div class="mb-3">
                <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="'.$r['nama_pegawai'].'">
                </div>
                <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" value="'.$r['jabatan'].'">
                </div>
                <div class="mb-3">
                <label for="no_sk" class="form-label">No Sk</label>
                <input type="text" class="form-control" id="no_sk" name="no_sk" value="'.$r['no_sk'].'">
                </div>
                <div class="mb-3">
                <label for="tanggal_mulai_tugas" class="form-label">Tanggal Mulai Tugas</label>
                <input type="text" class="form-control" id="tanggal_mulai_tugas" name="tanggal_mulai_tugas" value="'.$r['tanggal_mulai_tugas'].'">
                </div>
                
                
        <button type="submit" class="btn btn-primary">Ubah</button>
        </form>';
        return $res;   
    }
    public function update()
    {
        $param = $_POST['param'];
        $id_pegawai = $_POST['id_pegawai'];
        $nama_pegawai = $_POST['nama_pegawai'];
        $jabatan = $_POST['jabatan'];
        $no_sk = $_POST['no_sk'];
        $tanggal_mulai_tugas = $_POST['tanggal_mulai_tugas'];
        $jk = $_POST['jk'];

        $data = array(
            'id_pegawai' => $id_pegawai,
            'nama_pegawai' => $nama_pegawai,
            'jabatan' => $jabatan,
            'no_sk' => $no_sk,
            'tanggal_mulai_tugas' => $tanggal_mulai_tugas,
            'jk' =>$jk
        );
        return $this->db->table('riwayatpangkat')->where("id_pegawai='$param'")->update($data);
    }

    public function delete($id)
    {
        return $this->db->table('riwayatpangkat')->where("id_pegawai='$id'")->delete();
    }
}