<?php

class Pemasok_Service
{
    private $dao;

    function __construct()
    {
        $this->dao = new Pemasok_DAO;
    }

    public function getAll()
    {
        return $this->dao->getAllData();
    }

    public function addPemasok($data)
    {
        return $this->dao->addDataPemasok($data);
    }

    public function getPemasok($id)
    {
        return $this->dao->getPemasokId($id);
    }

    public function deletePemasok($id)
    {
        return $this->dao->deletePemasok($id);
    }

    public function getMakanan()
    {
        return $this->dao->getDataMakanan();
    }

    public function getAllOrder()
    {
        return $this->dao->getDataAllOrder();
    }

    public function simpanOrder($data)
    {
        return $this->dao->simpanDataOrder($data);
    }

    public function selesai($id)
    {
        return $this->dao->updateStok($id);
    }

    public function getOrderPemasok($id)
    {
        return $this->dao->getOrderPemasok($id);
    }

    public function updatePemasok($data)
    {
        return $this->dao->updateDataPemasok($data);
    }
}
