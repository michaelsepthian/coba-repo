<?php

class Pemasok extends Controller
{

    public function index()
    {
        $data['judul'] = 'Pemasok';
        $data['pemasok'] = $this->service('Pemasok_Service')->getAll();
        $this->view('templates/header', $data);
        $this->view('pemasok/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->service('Pemasok_Service')->addPemasok($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . MYURL . '/pemasok');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . MYURL . '/pemasok');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->service('Pemasok_Service')->getPemasok($_POST['id']));
    }

    public function ubah()
    {
        if ($this->service('Pemasok_Service')->updatePemasok($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . MYURL . '/pemasok');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . MYURL . '/pemasok');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->service('Pemasok_Service')->deletePemasok($id) > 0) {
            Flasher::setFlash('Pemasok Berhasil', 'Dihapus', 'success');
            header('Location: ' . MYURL . '/pemasok');
            exit;
        } else {
            Flasher::setFlash('Pemasok', 'Gagal', 'danger');
            header('Location: ' . MYURL . '/pemasok');
            exit;
        }
    }

    public function order($pemasok)
    {
        $data['judul'] = 'Order Pemasok';
        $data['pemasok'] = $pemasok;
        $data['makanan'] = $this->service('Pemasok_Service')->getMakanan();
        $data['histori'] = $this->service('Pemasok_Service')->getAllOrder();
        $this->view('templates/header', $data);
        $this->view('pemasok/order', $data);
        $this->view('templates/footer');
    }

    public function simpan_order()
    {
        if ($_POST['qty'] > 0) {
            if ($this->service('Pemasok_Service')->simpanOrder($_POST) > 0) {
                Flasher::setFlash('Order Ke Pemasok', 'Berhasil Ditambahkan', 'success');
                header('Location: ' . MYURL . '/pemasok/order/' . $_POST['pemasok']);
                exit;
            } else {
                Flasher::setFlash('Order Ke Pemasok', 'Gagal Ditambahkan', 'danger');
                header('Location: ' . MYURL . '/pemasok/order/' . $_POST['pemasok']);
                exit;
            }
        } else {
            Flasher::setFlash('Order Ke Pemasok', 'Gagal Mohon Masukkan qty Dengan Betul', 'danger');
            header('Location: ' . MYURL . '/pemasok/order/' . $_POST['pemasok']);
            exit;
        }
    }

    public function selesai($id)
    {
        $data['order'] = $this->service('Pemasok_Service')->getOrderPemasok($id);
        if ($this->service('Pemasok_Service')->selesai($id) > 0) {
            Flasher::setFlash('Orderan Telah Selesai Proses', ', Stok Berhasil Ditambahkan', 'success');
            header('Location: ' . MYURL . '/pemasok/order/' . $data['order']['pemasok']);
            exit;
        } else {
            Flasher::setFlash('Orderan Belum Selesai', ', Stok Gagal Ditambahkan', 'danger');
            header('Location: ' . MYURL . '/pemasok/order/' . $data['order']['pemasok']);
            exit;
        }
    }

    public function detail()
    {
        $data['judul'] = 'Detail Order Pemasok';
        $data['histori'] = $this->service('Pemasok_Service')->getAllOrder();
        $this->view('templates/header', $data);
        $this->view('pemasok/detail', $data);
        $this->view('templates/footer');
    }
}
