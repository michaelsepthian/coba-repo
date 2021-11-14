<?php

class History_Service
{
    private $dao;

    function __construct()
    {
        $this->dao = new History_DAO;
    }

    public function getAllHistory()
    {
        return $this->dao->getAllHistoryData();
    }

    public function getAllCustomer()
    {
        return $this->dao->getAllDataCustomer();
    }

    public function getOrder($data)
    {
        return $this->dao->getOrderData($data);
    }

    public function getPayment($data)
    {
        return $this->dao->getDataPayment($data);
    }

    public function cek($data)
    {
        return $this->dao->cekData($data);
    }

    public function getAllKaryawan()
    {
        return $this->dao->getAllDataKaryawan();
    }
}
