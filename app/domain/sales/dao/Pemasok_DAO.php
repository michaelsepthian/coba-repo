<?php

class Pemasok_DAO
{
    private $db;
    private $pemasok;
    private $order;

    function __construct()
    {
        $this->db = new Database;
        $this->pemasok = new Pemasok_entity;
        $this->order = new Order_Pemasok_entity;
    }

    public function getAllData()
    {
        $this->db->query('SELECT * FROM pemasok');
        return $this->db->resultSet();
    }

    public function addDataPemasok($data)
    {
        $this->pemasok->nama = $data['nama'];
        $this->pemasok->alamat = $data['alamat'];
        $this->pemasok->notelp = $data['notelp'];

        $this->db->query('INSERT INTO pemasok (nama,alamat,notelp) VALUES (:nama,:alamat,:notelp)');
        $this->db->bind('nama', $this->pemasok->nama);
        $this->db->bind('alamat', $this->pemasok->alamat);
        $this->db->bind('notelp', $this->pemasok->notelp);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getPemasokId($id)
    {
        $this->pemasok->id = $id;
        $this->db->query('SELECT * FROM pemasok WHERE id=:id');
        $this->db->bind('id', $this->pemasok->id);

        return $this->db->single();
    }

    public function deletePemasok($id)
    {
        $this->pemasok->id = $id;

        $this->db->query('DELETE FROM pemasok where id=:id');

        $this->db->bind('id', $this->pemasok->id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getDataMakanan()
    {
        $this->db->query("SELECT * FROM menu WHERE tipe='makanan'");
        return $this->db->resultSet();
    }

    public function getDataAllOrder()
    {
        $this->db->query("SELECT * FROM order_pemasok ORDER BY tanggal DESC");
        return $this->db->resultSet();
    }

    public function simpanDataOrder($data)
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->order->makanan = $data['makanan'];
        $this->order->pemasok = $data['pemasok'];
        $this->order->qty = $data['qty'];
        $this->order->catatan = $data['catatan'];
        $this->order->tanggal = date('y-m-d');
        $this->order->waktu = date('H:i:s');
        $this->order->status_order = 0;

        $this->db->query('INSERT INTO order_pemasok (makanan,pemasok,qty,catatan,tanggal,waktu,status_order) VALUES (:makanan,:pemasok,:qty,:catatan,:tanggal,:waktu,:status_order)');
        $this->db->bind('makanan', $this->order->makanan);
        $this->db->bind('pemasok', $this->order->pemasok);
        $this->db->bind('qty', $this->order->qty);
        $this->db->bind('catatan', $this->order->catatan);
        $this->db->bind('tanggal', $this->order->tanggal);
        $this->db->bind('waktu', $this->order->waktu);
        $this->db->bind('status_order', $this->order->status_order);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getAllMenu()
    {
        $this->db->query('SELECT * FROM menu');
        return $this->db->resultSet();
    }

    public function getOrder($id)
    {
        $this->order->id = $id;
        $this->db->query('SELECT * FROM order_pemasok WHERE id=:id');
        $this->db->bind('id', $this->order->id);

        return $this->db->single();
    }

    public function stok($nama)
    {
        $this->db->query('SELECT * FROM menu WHERE nama=:nama');
        $this->db->bind('nama', $nama);
        return $this->db->single();
    }

    public function updateStatus($id)
    {
        $this->order->id = $id;
        $this->db->query('UPDATE order_pemasok SET status_order=1 WHERE id=:id');
        $this->db->bind('id', $this->order->id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateStok($id)
    {
        $data['menu'] = $this->getAllMenu();
        $order = $this->getOrder($id);
        $this->order->qty = $order['qty'];

        foreach ($data['menu'] as $menu) {
            if ($menu['nama'] == $order['makanan']) {
                $stok = $this->stok($menu['nama']);
                $stokUpdate = $stok['stok'] + $this->order->qty;
                $this->updateStatus($id);
                $this->db->query('UPDATE menu SET stok=:stok WHERE nama=:nama');
                $this->db->bind('stok', $stokUpdate);
                $this->db->bind('nama', $menu['nama']);

                $this->db->execute();

                return $this->db->rowCount();
            }
        }
    }

    public function getOrderPemasok($id)
    {
        $this->order->id = $id;
        $this->db->query('SELECT * FROM order_pemasok WHERE id=:id');
        $this->db->bind('id', $this->order->id);

        return $this->db->single();
    }

    public function updateDataPemasok($data)
    {
        $this->pemasok->id = $data['id'];
        $this->pemasok->nama = $data['nama'];
        $this->pemasok->alamat = $data['alamat'];
        $this->pemasok->notelp = $data['notelp'];

        $this->db->query('UPDATE pemasok SET nama=:nama,alamat=:alamat,notelp=:notelp WHERE id=:id');
        $this->db->bind('id', $this->pemasok->id);
        $this->db->bind('nama', $this->pemasok->nama);
        $this->db->bind('alamat', $this->pemasok->alamat);
        $this->db->bind('notelp', $this->pemasok->notelp);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
