<?php

class Karyawan_DAO
{
    private $db;
    private $person;

    function __construct()
    {
        $this->db = new Database;
        $this->person = new Karyawan_entity;
    }

    public function getAll()
    {
        $this->db->query('select * from karyawan');
        return $this->db->resultSet();
    }

    public function getId($id)
    {
        $this->person->id = $id;
        $this->db->query('select * from karyawan where id=:id');
        $this->db->bind('id', $this->person->id);
        return $this->db->single();
    }

    public function addData($data)
    {
        $this->person->nama_karyawan = $data['nama'];
        $this->person->jabatan = $data['jabatan'];
        $this->person->gaji = 0;
        $this->person->alamat = $data['alamat'];
        $this->person->umur = $data['umur'];
        $this->person->notelp = $data['notelp'];


        if ($this->person->jabatan == "manager") {
            $this->person->gaji = 5000000;
        } else {
            $this->person->gaji = 2500000;
        }

        $this->db->query('INSERT INTO karyawan (nama_karyawan, jabatan, gaji, alamat, umur, notelp) VALUES (:nama, :jabatan, :gaji, :alamat, :umur, :notelp)');

        $this->db->bind('nama', $this->person->nama_karyawan);
        $this->db->bind('jabatan', $this->person->jabatan);
        $this->db->bind('gaji', $this->person->gaji);
        $this->db->bind('alamat', $this->person->alamat);
        $this->db->bind('umur', $this->person->umur);
        $this->db->bind('notelp', $this->person->notelp);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteData($id)
    {
        $this->person->id = $id;

        $this->db->query('DELETE FROM karyawan WHERE id =:id');

        $this->db->bind('id', $this->person->id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateData($data)
    {
        $this->person->id = $data['id'];
        $this->person->nama_karyawan = $data['nama'];
        $this->person->jabatan = $data['jabatan'];
        $this->person->alamat = $data['alamat'];
        $this->person->umur = $data['umur'];
        $this->person->notelp = $data['notelp'];

        $this->db->query('UPDATE karyawan SET nama_karyawan = :nama, jabatan = :jabatan, alamat = :alamat, umur = :umur, notelp = :notelp WHERE id = :id');

        $this->db->bind('nama', $this->person->nama_karyawan);
        $this->db->bind('jabatan', $this->person->jabatan);
        $this->db->bind('alamat', $this->person->alamat);
        $this->db->bind('umur', $this->person->umur);
        $this->db->bind('notelp', $this->person->notelp);
        $this->db->bind('id', $this->person->id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getPassData($data)
    {
        $this->person->id = $data['rowid'];

        $this->db->query('SELECT * FROM karyawan WHERE id=:id');
        $this->db->bind('id', $this->person->id);
        return $this->db->single();
    }

    public function getPassword($id)
    {
        $this->person->id = $id;

        $this->db->query('SELECT * FROM karyawan WHERE id=:id');
        $this->db->bind('id', $this->person->id);
        return $this->db->single();
    }

    public function updatePassword($data)
    {
        $this->person->id = $data['id'];
        $this->person->password = $data['password_baru'];
        $karyawan = $this->getPassword($this->person->id);
        $result = 0;

        if (($karyawan['password'] == $data['password_lama']) or ($karyawan['password'] == null)) {
            $this->db->query("UPDATE karyawan SET password=:pass WHERE id=:id");
            $this->db->bind('id', $this->person->id);
            $this->db->bind('pass', $this->person->password);
            $this->db->execute();
            $result = $this->db->rowCount();
        } else {
            $result = 0;
        }

        return $result;
    }
}
