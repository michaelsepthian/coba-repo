<?php
class Karyawan extends Controller
{
    public function index()
    {
        $data['judul'] = 'List Karyawan';
        $data['karyawan'] = $this->service('Karyawan_Service')->getDataKaryawan();
        $this->view('templates/header', $data);
        $this->view('karyawan/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Karyawan';
        $data['karyawan'] = $this->service('Karyawan_Service')->getKaryawanId($id);
        $this->view('templates/header', $data);
        $this->view('karyawan/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->service('Karyawan_Service')->addKaryawan($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . MYURL . '/karyawan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . MYURL . '/karyawan');
            exit;
        }
    }

    public function hapus($data)
    {
        if ($this->service('Karyawan_Service')->deleteKaryawan($data) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . MYURL . '/karyawan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . MYURL . '/karyawan');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->service('karyawan_Service')->getKaryawanId($_POST['id']));
    }

    public function ubah()
    {
        if ($this->service('Karyawan_Service')->updateDataKaryawan($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . MYURL . '/karyawan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . MYURL . '/karyawan');
            exit;
        }
    }

    public function password()
    {
        $data['judul'] = 'Konfigurasi Password';
        $data['karyawan'] = $this->service('Karyawan_Service')->getPass($_POST);
        $this->view('karyawan/konfigurasi_pass', $data);
    }

    public function update_pass()
    {
        if ($this->service('Karyawan_Service')->updatePass($_POST) > 0) {
            Flasher::setFlash('berhasil', 'Update Password', 'success');
            header('Location: ' . MYURL . '/karyawan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'Update Password', 'danger');
            header('Location: ' . MYURL . '/karyawan');
            exit;
        }
    }
}
