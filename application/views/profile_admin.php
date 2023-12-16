<div class="content-wrapper py-3">
    <section class="content-header">
        <h4><strong>DETAIL DATA ADMIN</strong></h4>
        <br>
        <?php
        $start = 0;
        $admin_data = $this->db->query(
            "SELECT * FROM admin GROUP BY no ASC LIMIT 5"
        )->result();
        foreach ($admin_data as $profile) : ?>
            <table class="table">
                <tr>
                    <th>Nama Lengkap</th>
                    <td><?php echo $profile->nama ?></td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td><?php echo $profile->tgl_lahir ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><?php echo $profile->alamat ?></td>
                </tr>
                <tr>
                    <th>E-Mail</th>
                    <td><?php echo $profile->email ?></td>
                </tr>
                <tr>
                    <th>No. Telepon</th>
                    <td><?php echo $profile->no_telp ?></td>
                </tr>

                <tr>
                    <td>
                        <img src="<?php echo base_url(); ?>aset/foto/<?php echo $profile->foto; ?>" width="136" height="136">
                    </td>
                </tr>
            </table>
            <td><a href="<?php echo base_url('pegawai/home'); ?>" class="btn btn-primary">Kembali</a></td>
            <!-- <td><?php echo anchor('pegawai/edit_admin/' . $profile->no, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
        <?php endforeach; ?> -->
    </section>
</div>