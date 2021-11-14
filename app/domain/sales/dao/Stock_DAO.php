<?php

class Stock_DAO
{
    private $db;
    private $menu;

    function __construct()
    {
        $this->db = new Database;
        $this->menu = new Menu_entity;
    }

    public function getAll()
    {
        $this->db->query('select * from menu');
        return $this->db->resultSet();
    }

    public function addMenu($data)
    {
        $this->menu->nama = $data['nama'];
        $this->menu->harga = $data['harga'];
        $this->menu->stock = $data['stock'];
        $this->menu->tipe = $data['tipe'];

        $this->db->query('INSERT into menu (nama,harga,stok,tipe) VALUES (:nama,:harga,:stock,:tipe)');

        $this->db->bind('nama', $this->menu->nama);
        $this->db->bind('harga', $this->menu->harga);
        $this->db->bind('stock', $this->menu->stock);
        $this->db->bind('tipe', $this->menu->tipe);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getMenu($nama)
    {
        $this->db->query('select * from menu where nama=:nama');
        $this->db->bind('nama', $nama);
        return $this->db->single();
    }

    public function updateMenu($data)
    {
        $this->menu->nama = $data['nama'];
        $this->menu->harga = $data['harga'];
        $this->menu->tipe = $data['tipe'];
        $result = 0;

        if ($this->menu->tipe == "kopi") {
            $this->menu->stok = $data['stock'];
            $this->db->query('UPDATE menu SET stok=:stok,harga=:harga,tipe=:tipe WHERE nama=:nama');

            $this->db->bind('stok', $this->menu->stok);
            $this->db->bind('nama', $this->menu->nama);
            $this->db->bind('tipe', $this->menu->tipe);
            $this->db->bind('harga', $this->menu->harga);

            $this->db->execute();

            $result = $this->db->rowCount();
        } else {
            $this->db->query('UPDATE menu SET harga=:harga,tipe=:tipe WHERE nama=:nama');

            $this->db->bind('nama', $this->menu->nama);
            $this->db->bind('tipe', $this->menu->tipe);
            $this->db->bind('harga', $this->menu->harga);

            $this->db->execute();

            $result = $this->db->rowCount();
        }

        return $result;
    }

    public function searchData($data)
    {
        $this->menu->nama = $data['keyword'];
        $keyword = $this->menu->nama;

        $this->db->query('SELECT * from menu where nama LIKE :nama');
        $this->db->bind('nama', "%$keyword%");

        return $this->db->resultSet();
    }
}
