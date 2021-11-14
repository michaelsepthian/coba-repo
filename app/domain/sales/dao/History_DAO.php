<?php

class History_DAO
{
    private $db;
    private $order;
    private $payment;

    function __construct()
    {
        $this->db = new Database;
        $this->order = new Order_entity;
        $this->payment = new Payment_entity;
    }

    public function getAllHistoryData()
    {
        $this->db->query('SELECT * FROM payment ORDER BY id DESC');
        return $this->db->resultSet();
    }

    public function getAllDataCustomer()
    {
        $this->db->query('SELECT * FROM order_customer');
        return $this->db->resultSet();
    }

    public function getOrderData($data)
    {
        $this->order->id_customer = $data['rowid'];

        $this->db->query('SELECT * FROM order_detail WHERE id_customer=:id_customer');
        $this->db->bind('id_customer', $this->order->id_customer);
        return $this->db->resultSet();
    }

    public function getDataPayment($data)
    {
        $this->payment->id_order_customer = $data['rowid'];

        $this->db->query('SELECT * FROM payment WHERE id_order_customer=:id');
        $this->db->bind('id', $this->payment->id_order_customer);
        return $this->db->single();
    }

    public function cekData($data)
    {
        $this->payment->tanggal = $data['tanggal'];

        $this->db->query('SELECT * FROM payment WHERE tanggal=:tanggal');
        $this->db->bind('tanggal', $this->payment->tanggal);

        return $this->db->resultSet();
    }

    public function getAllDataKaryawan()
    {
        $this->db->query('SELECT * FROM karyawan');
        return $this->db->resultSet();
    }
}
