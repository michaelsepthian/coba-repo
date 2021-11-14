<form action="<?php echo MYURL; ?>/karyawan/update_pass" method="post">
    <table>
        <tr>
            <input type="hidden" id="id" name="id" value="<?php echo $data['karyawan']['id']; ?>">
            <th>Masukkan Password Lama : </th>
            <td><input type="password" class="form-control" id="password_lama" name="password_lama" placeholder="Jika Belum Ada Lewati"></td>
        <tr>
        <tr>
            <th>Masukkan Password Baru : </th>
            <td><input type="password" class="form-control" id="password_baru" name="password_baru" placeholder="Masukkan Password Yang Baru"></td>
        </tr>
    </table>
    <br>
    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Tutup</button>
    <button type="submit" class="btn btn-primary float-right mr-3">Submit</button>
</form>