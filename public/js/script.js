$(function () {
    $('.tombolTambahData').on('click', function () {
        $('#staticBackdropLabel').html('Tambah Data Karyawan');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#nama').val("");
        $('#umur').val("");
        $('#jabatan').val("");
        $('#notelp').val("");
        $('#alamat').val("");
    });

    $('.tampilModalUbah').on('click', function () {
        $('#staticBackdropLabel').html('Ubah Data Karyawan');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/CoffeeShop-1/public/karyawan/ubah');

        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/CoffeeShop-1/public/karyawan/getubah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nama').val(data.nama_karyawan);
                $('#umur').val(data.umur);
                $('#jabatan').val(data.jabatan);
                $('#notelp').val(data.notelp);
                $('#alamat').val(data.alamat);
                $('#id').val(data.id);
            }
        });
    });

    $('.tombolTambahMenu').on('click', function () {
        $('#staticBackdropLabel').html('Tambah Menu');
        $('.modal-footer button[type=submit]').html('Simpan');
        $('#nama').val("");
        $('#stock').val("");
        $('#harga').val("");
        $('#tipe').val("");
    });

    $('.tombolUpdate').on('click', function () {
        $('#staticBackdropLabel').html('Ubah Data Menu');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/CoffeeShop-1/public/stock/ubah');

        const id = $(this).data('id');
        console.log(id);
        $.ajax({
            url: 'http://localhost/CoffeeShop-1/public/stock/getubah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nama').val(data.nama);
                $('#stock').val(data.stok);
                $('#harga').val(data.harga);
                $('#tipe').val(data.tipe);
            }
        });

    });

    $('.tambahPemasok').on('click', function () {
        $('#staticBackdropLabel').html('Tambah Data Pemasok');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#nama').val("");
        $('#alamat').val("");
        $('#notelp').val("");
    });

    $('.ubahPemasok').on('click', function () {
        $('#staticBackdropLabel').html('Ubah Data Pemasok');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/CoffeeShop-1/public/pemasok/ubah');

        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/CoffeeShop-1/public/pemasok/getubah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nama').val(data.nama);
                $('#alamat').val(data.alamat);
                $('#notelp').val(data.notelp);
                $('#id').val(data.id);
            }
        });
    });

    $(".selector").datepicker({
        dateFormat: "yyyy/mm/dd"
    });
});

$(document).ready(function () {
    $('#formOrder').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type: 'post',
            url: 'http://localhost/CoffeeShop-1/public/home/getMenu',
            data: 'rowid=' + rowid,
            success: function (data) {
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
            }
        });
    });
});

$(document).ready(function () {
    $('#formDetail').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type: 'post',
            url: 'http://localhost/CoffeeShop-1/public/history/getOrder',
            data: 'rowid=' + rowid,
            success: function (data) {
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
            }
        });
    });
});

$(document).ready(function () {
    $('#formPassword').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type: 'post',
            url: 'http://localhost/CoffeeShop-1/public/karyawan/password',
            data: 'rowid=' + rowid,
            success: function (data) {
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
            }
        });
    });
});
