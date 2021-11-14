<?php

class Home extends Controller
{
    public function index()
    {
        $data['judul'] = 'Menu';
        $data['menu'] = $this->service('Home_Service')->getAllMenu();
        $data['order'] = $this->service('Home_Service')->getAllOrder();
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function getMenu()
    {
        $data['judul'] = 'Menu';
        $data['menu'] = $this->service('Home_Service')->getMenu($_POST);
        $data['customer'] = $this->service('Home_Service')->getCustomer();
        $this->view('home/detail', $data);
    }

    public function order()
    {
        if ($_POST['qty'] <= 0) {
            Flasher::setFlash('Order Gagal', 'Ditambahkan', 'danger');
            header('Location: ' . MYURL . '/home');
            exit;
        } else {
            if ($this->service('Home_Service')->simpanOrder($_POST) > 0) {
                Flasher::setFlash('Order Berhasil', 'Ditambahkan', 'success');
                header('Location: ' . MYURL . '/home');
                exit;
            } else {
                Flasher::setFlash('Order Gagal', 'Ditambahkan', 'danger');
                header('Location: ' . MYURL . '/home');
                exit;
            }
        }
    }

    public function delete($id)
    {
        if ($this->service('Home_Service')->deleteOrder($id) > 0) {
            Flasher::setFlash('Order Berhasil', 'Dihapus', 'success');
            header('Location: ' . MYURL . '/home');
            exit;
        } else {
            Flasher::setFlash('Order Gagal', 'Ditambahkan', 'danger');
            header('Location: ' . MYURL . '/home');
            exit;
        }
    }

    public function update($id)
    {
        $data['judul'] = "Update Order";
        $data['order'] = $this->service('Home_Service')->getOrder($id);
        $this->view('templates/header', $data);
        $this->view('home/update', $data);
        $this->view('templates/footer');
    }

    public function updateOrder()
    {
        if ($this->service('Home_Service')->updateOrder($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diupdate', 'success');
            header('Location: ' . MYURL . '/home');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diupdate', 'danger');
            header('Location: ' . MYURL . '/home');
            exit;
        }
    }

    public function cancel()
    {
        if ($this->service('Home_Service')->cancel() > 0) {
            Flasher::setFlash('berhasil', 'dicancel', 'success');
            header('Location: ' . MYURL . '/home');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dicancel', 'danger');
            header('Location: ' . MYURL . '/home');
            exit;
        }
    }

    public function payment()
    {
        $data['judul'] = "Pembayaran";
        $data['order'] = $this->service('Home_Service')->getAllOrder();
        $data['karyawan'] = $this->service('Home_Service')->getAllKasir();
        $data['cek'] = $this->service('Home_Service')->cekOrder();
        if ($data['cek'] == null) {
            Flasher::setFlash('gagal', 'dibayar', 'danger');
            header('Location: ' . MYURL . '/home');
            exit;
        } else {
            $this->view('templates/header', $data);
            $this->view('home/payment', $data);
            $this->view('templates/footer');
        }
    }

    public function paymentSubmit()
    {
        if ($_POST['tipe'] == 'TUNAI' and $_POST['tunai'] != 0 and $_POST['nama'] != null and $_POST['tunai'] >= $_POST['total']) {
            if ($this->service('Home_Service')->payment($_POST) > 0) {
                $kembalian = $_POST['tunai'] - $_POST['total'];
                $this->service('Home_Service')->updateStatus($_POST);
                Flasher::setFlash('berhasil', 'dibayar, Kembaliannya Rp.' . $kembalian, 'success');
                header('Location: ' . MYURL . '/home');
                exit;
            } else {
                Flasher::setFlash('gagal', 'dibayar', 'danger');
                header('Location: ' . MYURL . '/home');
                exit;
            }
        } elseif ($_POST['tipe'] == 'TUNAI' and ($_POST['tunai'] == 0 or $_POST['tunai'] < $_POST['total'])) {
            Flasher::setFlash('gagal', 'Dibayar, Masukkan Uang Tunai Dengan Benar', 'danger');
            header('Location: ' . MYURL . '/home/payment');
            exit;
        } elseif ($_POST['tipe'] == 'TUNAI' and ($_POST['tunai'] != 0 or $_POST['nama'] == null)) {
            Flasher::setFlash('gagal', 'dibayar, Masukkan Nama Customer Terlebih Dahulu !', 'danger');
            header('Location: ' . MYURL . '/home/payment');
            exit;
        } elseif ($_POST['nama'] != null) {
            if ($this->service('Home_Service')->payment($_POST) > 0) {
                $this->service('Home_Service')->updateStatus($_POST);
                Flasher::setFlash('berhasil', 'dibayar, pembayaran lewat ' . $_POST['tipe'], 'success');
                header('Location: ' . MYURL . '/home');
                exit;
            }
        } else {
            Flasher::setFlash('gagal', 'dibayar, Masukkan Nama Customer Terlebih Dahulu !', 'danger');
            header('Location: ' . MYURL . '/home/payment');
            exit;
        }
    }
}
