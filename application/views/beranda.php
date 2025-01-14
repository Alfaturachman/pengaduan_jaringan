<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <style>
        /* Tambahkan CSS untuk tata letak */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #007bff;
            color: white;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
            background-color: #f8f9fa;
        }

        h1 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <?php $this->load->view('templates/sidebar'); ?>
        </div>

        <!-- Content -->
        <div class="content">
            <h1>Selamat Datang di Beranda</h1>
            <div id="columnChart"></div>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Udinus Semarang - <?= date('Y'); ?></span>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Pastikan dataSeries didefinisikan di controller
            var dataSeries = <?= json_encode($data_series) ?>;

            new ApexCharts(document.querySelector("#columnChart"), {
                series: Object.keys(dataSeries).map(judul => ({
                    name: judul,
                    data: dataSeries[judul]
                })),
                chart: {
                    type: 'bar',
                    height: 400,
                    stacked: false
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '50%',
                        endingShape: 'rounded'
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"]
                },
                yaxis: {
                    title: {
                        text: 'Jumlah Pengaduan'
                    }
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val + " pengaduan";
                        }
                    }
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'center'
                },
                colors: ['#1E90FF', '#FF6347', '#32CD32', '#FFD700']
            }).render();
        });
    </script>
</body>
</html>
