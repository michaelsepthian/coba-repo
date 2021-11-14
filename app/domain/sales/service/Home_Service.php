<?php

class Home_Service{
    private $dao;

    function __construct(){
        $this->dao = new Home_DAO;
    }

    public function getAllMenu(){
        return $this->dao->getAll();
    }

    public function getMenu($data){
        return $this->dao->getMenu($data);
    }

    public function getAllOrder(){
        return $this->dao->getAllOrder();
    }

    public function simpanOrder($data){
        return $this->dao->simpanDataOrder($data);
    }

    public function deleteOrder($data){
        return $this->dao->deleteDataOrder($data);
    }

    public function getCustomer(){
        return $this->dao->getDataCustomer();
    }

    public function getOrder($id){
        return $this->dao->getDataOrder($id);
    }

    public function updateOrder($data){
        return $this->dao->updateData($data);
    }

    public function cancel(){
        return $this->dao->cancelOrder();
    }

    public function payment($data){
        $this->dao->updateCustomer($data);
        return $this->dao->payment($data);
    }

    public function updateStatus($data){
        $this->dao->updateStock($data);
        $this->dao->createCustomer();
        return $this->dao->updateStatusOrder($data);
    }

    public function getAllKasir(){
        return $this->dao->getAllDataKasir();
    }

    public function cekOrder(){
        return $this->dao->cekOrder();
    }
}