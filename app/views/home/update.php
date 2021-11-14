<body style="background-image : url('<?php echo MYURL; ?>/img/background.jpg'); opacity :5;">
    <div class="container mt-5">
        <center>
            <h2 style="color:white; margin-top:90px">U P D A T E&nbsp&nbsp&nbspM E N U</h2>
            <img src='<?php echo MYURL; ?>/img/spr.png' width='500px' height='100px;'>
            <form action="<?php echo MYURL; ?>/home/updateOrder" method="post">
                <div class="card" style="max-width: 540px;background-color:transparent; color:white;text-align:left;font-size:20px;">
                    <div class="card-header">
                        <h2><b>Update Order</b></h2>
                    </div>
                    <div class="card-body" style="color:white;font-size:20px">
                        <table style="color:white;font-size:20px">
                            <tr>
                                <input type="hidden" id="id" name="id" value="<?php echo $data['order']['id']; ?>">
                                <th><label>Nama Menu</label></th>
                                <th><input type="text" class="form-control" id="nama" name="nama" readonly value="<?php echo $data['order']['nama_menu'] ?>" /></th>
                            </tr>
                            <tr>
                                <th><label>qty</label></th>
                                <th><input type="number" class="form-control" id="qty" name="qty" value="<?php echo $data['order']['qty']; ?>"></th>
                            </tr>
                            <tr>
                                <th><label>Tambahan</label></th>
                                <th><input type="text" class="form-control" id="tambahan" name="tambahan" value="<?php echo $data['order']['tambahan']; ?>"></th>
                            </tr>
                        </table>
                        <button type="submit" class="btn btn-primary mr-2 mt-3">Update</a></button>
                        <a href="<?php echo MYURL; ?>/home" class="btn btn-secondary mt-3">Back</a>
                    </div>
                </div>
            </form>
        </center>
    </div>
</body>