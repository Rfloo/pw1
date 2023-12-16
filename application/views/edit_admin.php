<div class="content-wrapper">
    <section class="content">
        <?php
        $start = 0;
        $admin_data = $this->db->query(
            "SELECT * FROM admin GROUP BY no ASC LIMIT 5"
        )->result();
        foreach ($admin_data as $profile) { ?>
            <?php echo form_open_multipart('pegawai/update_admin') ?>

            <div class="form-group">
                <label>Nama Admin</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $profile->nama ?>">
            </div>

            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="text" name="tgl_lahir" class="form-control" value="<?php echo $profile->tgl_lahir ?>">
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?php echo $profile->alamat ?>">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $profile->email ?>">
            </div>

            <div class="form-group">
                <label>No. Telepon</label>
                <input type="text" name="no_telp" class="form-control" value="<?php echo $profile->no_telp ?>">
            </div>

            <div class="form-group">
                <label>Upload Foto</label>
                <input type="file" name="foto" class="form-control">
            </div>

            <div>
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit " class="btn btn-primary">Simpan</button>
            </div>

            <?php echo form_close(); ?>


        <?php } ?>

    </section>
</div>