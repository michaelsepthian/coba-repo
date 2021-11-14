<?php

class Stock extends Controller
{
    public function index()
    {
        $data['judul'] = "Stock";
        $data['menu'] = $this->service('Stock_Service')->getAllMenu();
        $this->view('templates/header', $data);
        $this->view('stock/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->service('Stock_Service')->addMenu($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . MYURL . '/stock');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . MYURL . '/stock');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->service('Stock_Service')->getMenu($_POST['id']));
    }

    public function ubah()
    {
        if ($this->service('Stock_Service')->updateDataMenu($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . MYURL . '/stock');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . MYURL . '/stock');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = "Stock";
        $data['menu'] = $this->service('Stock_Service')->searchMenu($_POST);
        $this->view('templates/header', $data);
        $this->view('stock/index', $data);
        $this->view('templates/footer');
    }
}
