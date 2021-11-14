<?php

class History extends Controller
{
    public function index()
    {
        $data['judul'] = 'History Transaksi';
        $data['history'] = $this->service('History_Service')->getAllHistory();
        $data['order'] = $this->service('Home_Service')->getAllOrder();
        $data['customer'] = $this->service('History_Service')->getAllCustomer();
        $this->view('templates/header', $data);
        $this->view('history/index', $data);
        $this->view('templates/footer');
    }

    public function getOrder()
    {
        $data['judul'] = 'Detail Transaksi';
        $data['order'] = $this->service('History_Service')->getOrder($_POST);
        $data['payment'] = $this->service('History_Service')->getPayment($_POST);
        $data['customer'] = $this->service('History_Service')->getAllCustomer();
        $data['karyawan'] = $this->service('History_Service')->getAllKaryawan();
        $this->view('history/detail', $data);
    }

    public function get_total()
    {
        $data['judul'] = 'Total harian';
        $data['cek'] = 0;
        $this->view('templates/header', $data);
        $this->view('history/total', $data);
        $this->view('templates/footer');
    }

    public function cek()
    {
        $data['judul'] = 'Total harian';
        $data['cek'] = $this->service('History_Service')->cek($_POST);
        $data['tanggal'] = $_POST['tanggal'];
        $this->view('templates/header', $data);
        $this->view('history/total', $data);
        $this->view('templates/footer');
    }
}
