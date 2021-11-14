<?php

class Home_DAO{
    private $db;
    private $menu;
    private $order;
    private $payment;
    private $customer;

    function __construct()
	{
        $this->db = new Database;
        $this->menu = new Menu_entity;
        $this->order = new Order_entity;
        $this->customer = new Customer_entity;
        $this->payment = new Payment_entity;
        $this->customer = new Customer_entity;
    }

    public function getAll(){
        $this->db->query('select * from menu');
        return $this->db->resultSet(); 
    }

    public function getMenu($data){
        $this->menu->nama = $data['rowid'];

        $this->db->query('SELECT * FROM menu WHERE nama=:nama');
        $this->db->bind('nama',$this->menu->nama);
        return $this->db->single();
    }

    public function getDataCustomer(){
        $this->db->query("SELECT * FROM order_customer ORDER BY id DESC LIMIT 1");
        
        return $this->db->single();
    }

    public function getAllOrder(){
        $this->db->query('SELECT * FROM order_detail');
        return $this->db->resultSet();
    }

    public function getDataOrder($id){
        $this->order->id = $id;
        $this->db->query("SELECT * FROM order_detail where id=:id");

        $this->db->bind('id',$this->order->id);
        return $this->db->single();
    }

    public function cekOrder(){
        $this->db->query('SELECT * FROM order_detail WHERE status_order=0');
        return $this->db->resultSet();
    }

    public function updateData($data){
        $this->order->id = $data['id'];
        $this->order->qty = $data['qty'];
        $this->order->tambahan = $data['tambahan'];

        $this->db->query('UPDATE order_detail SET qty=:qty, tambahan=:tambahan WHERE id=:id');
        $this->db->bind('id',$this->order->id);
        $this->db->bind('qty',$this->order->qty);
        $this->db->bind('tambahan',$this->order->tambahan);

        $this->db->execute();

        return $this->db->rowCount();

    }

    public function cekStok($data){
        $this->menu->nama = $data;
        
        $this->db->query('SELECT * FROM menu WHERE nama=:nama');
        $this->db->bind('nama',$this->menu->nama);
        return $this->db->single();
    }

    public function simpanDataOrder($data){
        $this->customer->id = $data['id_customer'];
        $this->order->nama = $data['nama'];
        $this->order->qty = $data['qty'];
        $this->order->tambahan = $data['tambahan'];
        $this->order->status = 0;
        $this->order->harga = $data['harga'];
        $stok = $this->cekStok($this->order->nama);
        $result = 0;

        if($stok['stok'] <= ($this->order->qty)){
            $result = 0;
        }else{
            $this->db->query('INSERT INTO order_detail(id_customer,nama_menu,qty,harga,tambahan,status_order) VALUES (:id_customer,:nama, :qty, :harga, :tambahan, :status_) ');
    
            $this->db->bind('id_customer',$this->customer->id);
            $this->db->bind('nama',$this->order->nama);
            $this->db->bind('qty',$this->order->qty);
            $this->db->bind('harga',$this->order->harga);
            $this->db->bind('tambahan',$this->order->tambahan);
            $this->db->bind('status_',$this->order->status);
            
            $this->db->execute();
            $result = $this->db->rowCount();
        }


        return $result;
    }

    public function deleteDataOrder($data){
        $this->order->id = $data;

        $this->db->query("DELETE FROM order_detail WHERE id=:id");
        $this->db->bind('id',$this->order->id);
        
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cancelOrder(){
        $this->db->query('DELETE FROM order_detail WHERE status_order=0');

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateCustomer($data){
        $this->customer->id = $data['id_customer'];
        $this->customer->nama = $data['nama'];

        $this->db->query('UPDATE order_customer SET nama=:nama WHERE id=:id');
        $this->db->bind('id',$this->customer->id);
        $this->db->bind('nama',$this->customer->nama);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function payment($data){
        date_default_timezone_set('Asia/Jakarta');
        $this->payment->id_order_customer = $data['id_customer'];
        $this->payment->id_karyawan = $data['kasir'];
        $this->payment->total = $data['total'];
        $this->payment->waktu = date('H:i:s');
        $this->payment->tanggal = date('y-m-d');
        $this->payment->tipe = $data['tipe'];

        $this->db->query("INSERT INTO payment (id_order_customer,id_karyawan,tipe,total,tanggal,waktu) VALUES (:id_order_customer,:id_karyawan,:tipe,:total,:tanggal,:waktu)");
        $this->db->bind('id_order_customer',$this->payment->id_order_customer);
        $this->db->bind('id_karyawan',$this->payment->id_karyawan);
        $this->db->bind('tipe',$this->payment->tipe);
        $this->db->bind('total',$this->payment->total);
        $this->db->bind('tanggal',$this->payment->tanggal);
        $this->db->bind('waktu',$this->payment->waktu);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateStatusOrder($data){
        $this->customer->id = $data['id_customer'];
        $this->order->status = 1;

        $this->db->query('UPDATE order_detail SET status_order=:status_order WHERE id_customer=:id_customer');
        $this->db->bind('status_order',$this->order->status);
        $this->db->bind('id_customer',$this->customer->id);

        $this->db->execute();

        return $this->db->rowCount();
        
    }

    public function createCustomer(){
        date_default_timezone_set('Asia/Jakarta');
        $this->customer->nama = "";
        $this->customer->tanggal = date('y-m-d');
        $this->customer->waktu = date('H:i:s');

        $this->db->query('INSERT INTO order_customer (nama,tanggal,waktu) VALUES (:nama,:tanggal,:waktu)');

        $this->db->bind('nama',$this->customer->nama);
        $this->db->bind('tanggal',$this->customer->tanggal);
        $this->db->bind('waktu',$this->customer->waktu);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getStock($data){
        $this->menu->nama = $data;
        
        $this->db->query('SELECT stok FROM menu WHERE nama=:nama');

        $this->db->bind('nama',$this->menu->nama);

        return $this->db->single();
    }

    public function updateStock($data){
        $count = 0;
        foreach($data['nama_menu'] as $nama){
            $qty_before = $this->getStock($nama);
            $this->order->qty = $data['qty'][$count];

            $this->db->query('UPDATE menu SET stok=:stok WHERE nama=:nama');

            $this->db->bind('nama',$nama);
            $this->db->bind('stok',$qty_before['stok'] - $this->order->qty);
            $this->db->execute();
            $count++;
        }

        return $this->db->rowCount();
    }

    public function getAllDataKasir(){
        $this->db->query("SELECT * FROM karyawan WHERE jabatan='kasir'");
        return $this->db->resultSet();
    }
}
