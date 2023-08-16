<section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Grafik Tanggapan</h2>
                <h3 class="section-subheading text-muted">Melihat banyaknya tanggapan positif dan negatif dari
                    keseluruhan</h3>
            </div>
            <div class="card">
                <div class="card-header">Grafik Tanggapan</div>
                <div class="card-body">
                    <div id="grafik"></div>
                </div>
            </div>
        </div>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script type="text/javascript">
            var datagrafik = @json($datagrafik);
            Highcharts.chart('grafik', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Grafik Tanggapan Terhadap Berita Terkini Kota Deli Serdang'
                },
                xAxis: {
                    categories: ['positive', 'negative']
                },
                yAxis: {
                    title: {
                        text: 'Jumlah'
                    }
                },
                series: [{
                    name: 'positive',
                    data: datagrafik.x
                }, {
                    name: 'negative',
                    data: datagrafik.y
                }]
            })
        </script>
    </section>