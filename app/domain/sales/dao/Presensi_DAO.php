<?php

class Presensi_DAO
{
    private $db;
    private $person;

    function __construct()
    {
        $this->db = new Database;
        $this->presensi = new Presensi_entity;
        $this->person = new Karyawan_entity;
    }


    public function getDataKaryawan($data)
    {
        $this->person->nama = $data['nama'];
        $this->person->password = $data['pass'];

        $this->db->query('select * from karyawan where nama_karyawan=:nama AND password=:pass');
        $this->db->bind('nama', $this->person->nama);
        $this->db->bind('pass', $this->person->password);
        return $this->db->single();
    }

    public function getAll()
    {
        $this->db->query('SELECT * FROM presensi ORDER BY id DESC');
        return $this->db->resultSet();
    }

    public function getPresensi($id)
    {
        $this->person->id = $id;
        $this->db->query('SELECT * FROM presensi WHERE id_karyawan=:id');
        $this->db->bind('id', $this->person->id);
        return $this->db->resultSet();
    }

    public function simpanPresensiKaryawan($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->presensi->id_karyawan = $id;
        $this->presensi->jam = date('H:i:s');
        $this->presensi->tanggal = date('y-m-d');
        $result = 1;

        $list = $this->getPresensi($this->presensi->id_karyawan);

        foreach ($list as $value) {
            if ($value['tanggal'] == $this->presensi->tanggal) {
                $result = 0;
                break;
            }
        }
        if ($result == 0) {
            $result = 0;
        } else {
            $this->db->query('INSERT INTO presensi (id_karyawan, jam, tanggal) VALUES (:id, :jam, :tanggal)');

            $this->db->bind('id', $this->presensi->id_karyawan);
            $this->db->bind('jam', $this->presensi->jam);
            $this->db->bind('tanggal', $this->presensi->tanggal);

            $this->db->execute();
            $result = $this->db->rowCount();
        }

        return $result;
    }
}
