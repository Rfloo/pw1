<!DOCTYPE html>
<html>
<div class="content-wrapper">
    <section class="content">

        <head>
            <title>Grafik dengan Chart.js</title>
            <! -- Load file plugin Chart -->
                <script src="<?php echo base_url() ?>/aset/chart/Chart.js"></script>
        </head>

        <body>
            <br>
            <h4>Grafik Data Mahasiswa</h4>
            <canvas id="myChart"></canvas>
            <?php

            $nama_jurusan = "";
            $jumlah = null;
            foreach ($hasil as $item) {
                $jur = $item->tgl_lahir;
                $nama_jurusan .= "'$jur'" . ", ";
                $jum = $item->total;
                $jumlah .= "$jum" . ", ";
            }
            ?>
            <script>
                var ctx = document.getElementById('myChart').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'bar',

                    data: {
                        labels: [<?php echo $nama_jurusan; ?>],
                        datasets: [{
                            label: 'Data Jurusan Mahasiswa ',
                            backgroundColor: ['rgb(225, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60,179,113)', 'rgb(175, 230, 239'],
                            borderColor: ['rgb(225, 99, 132)'],
                            data: [<?php echo $jumlah; ?>]
                        }]
                    },

                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });

                var ctx = document.getElementById('myChart').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [<?php echo $nama_jurusan; ?>],
                        datasets: [{
                            label: 'Data Jurusan Mahasiswa ',
                            backgroundColor: ['rgb(225, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60,179,113)', 'rgb(175, 230, 239'],
                            borderColor: ['rgb(225, 99, 132)'],
                            data: [<?php echo $jumlah; ?>]
                        }]
                    },

                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            </script>
            <a href="<?php echo base_url('pegawai/index'); ?>" class="btn btn-primary">Kembali</a>
        </body>
    </section>
</div>