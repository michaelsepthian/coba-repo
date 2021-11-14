<?php

class Presensi extends Controller
{
    public function index()
    {
        $data['judul'] = 'Presensi';
        $data['daftar'] = $this->service('Presensi_Service')->getAllPresensi();
        $data['karyawan'] = $this->service('Karyawan_Service')->getDataKaryawan();
        $this->view('templates/header', $data);
        $this->view('presensi/index', $data);
        $this->view('templates/footer');
    }

    public function absen()
    {
        $data['logIn'] = $this->service('Presensi_Service')->getKaryawan($_POST);

        if ($data['logIn'] == null) {
            Flasher::setFlash('Salah', 'Username / Password', 'danger');
            header('Location: ' . MYURL . '/presensi');
            exit;
        } else {
            $id = $data['logIn']['id'];

            if ($this->service('Presensi_Service')->simpanPresensi($id) > 0) {
                Flasher::setFlash('berhasil', 'Absen', 'success');
                header('Location: ' . MYURL . '/presensi');
                exit;
            } else {
                Flasher::setFlash('gagal', 'Absen', 'danger');
                header('Location: ' . MYURL . '/presensi');
                exit;
            }
        }
    }
}
