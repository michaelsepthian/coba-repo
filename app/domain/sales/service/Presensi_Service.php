<?php

class Presensi_Service
{
    private $dao;

    function __construct()
    {
        $this->dao = new Presensi_DAO;
    }

    public function getAllPresensi()
    {
        return $this->dao->getAll();
    }

    public function getKaryawan($data)
    {
        return $this->dao->getDataKaryawan($data);
    }

    public function simpanPresensi($id)
    {
        return $this->dao->simpanPresensiKaryawan($id);
    }
}
