<?php

class Stock_Service
{
    private $dao;

    function __construct()
    {
        $this->dao = new Stock_DAO;
    }

    public function getAllMenu()
    {
        return $this->dao->getAll();
    }

    public function addMenu($data)
    {
        return $this->dao->addMenu($data);
    }

    public function getMenu($data)
    {
        return $this->dao->getMenu($data);
    }

    public function updateDataMenu($data)
    {
        return $this->dao->updateMenu($data);
    }

    public function searchMenu($data)
    {
        return $this->dao->searchData($data);
    }
}
