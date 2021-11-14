<?php

class Karyawan_Service{
    private $dao;

    function __construct(){
        $this->dao = new Karyawan_DAO;
    }
    public function getDataKaryawan(){
        return $this->dao->getAll();
    }

    public function getKaryawanId($id){
        return $this->dao->getId($id);
    }

    public function addKaryawan($data){
        return $this->dao->addData($data);
    }

    public function deleteKaryawan($id){
        return $this->dao->deleteData($id);
    }

    public function updateDataKaryawan($data){
        return $this->dao->updateData($data);
    }

    public function getPass($data){
        return $this->dao->getPassData($data);
    }

    public function updatePass($data){
        return $this->dao->updatePassword($data);
    }
}
