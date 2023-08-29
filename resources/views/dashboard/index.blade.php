<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-2">
                        <div class="text-base text-gray-900 dark:text-gray-100">
                            <span class="font-bold">BANYAK KOMENTAR</span>
                        </div>
                        <div class="text-xl text-gray-900 dark:text-gray-100">
                            {{ $totalkomentar }}
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-2">
                        <div class="text-base text-gray-900 dark:text-gray-100">
                            <span class="font-bold">BANYAK BERITA</span>
                        </div>
                        <div class="text-xl text-green-500 dark:text-green-300">
                            {{ $totalberita }}
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-2">
                        <div class="text-base text-gray-900 dark:text-gray-100">
                            <span class="font-bold">BANYAK USER</span>
                        </div>
                        <div class="text-xl text-red-500 dark:text-red-300">
                            {{ $totaluser }}
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-2">
                        <div class="text-base text-gray-900 dark:text-gray-100">
                            <span class="font-bold">BANYAK VISITOR</span>
                        </div>
                        <div class="text-xl text-yellow-500 dark:text-yellow-300">
                            {{ $totalvisitor }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class="page-section" id="services">
                        <div class="container">
                            <div class="text-center">
                                <h2 class="section-heading text-uppercase">Grafik Tanggapan</h2>
                                <h3 class="section-subheading text-muted">Melihat banyaknya tanggapan positif dan negatif dari keseluruhan</h3>
                            </div>
                            <div class="card">
                                <div class="card-header">Grafik Tanggapan</div>
                                <div class="card-body">
                                    <div id="grafik"></div>
                                </div>
                            </div>
                            <script src="https://code.highcharts.com/highcharts.js"></script>
                            <script type="text/javascript">
                                var datagrafik = @json($datagrafik);
                                var seriesData = [
                                    { name: 'Positif', data: [datagrafik.x] },
                                    { name: 'Negatif', data: [datagrafik.y] },
                                    { name: 'Netral', data: [datagrafik.z] }
                                ];
                    
                                Highcharts.chart('grafik', {
                                    chart: {
                                        type: 'column'
                                    },
                                    title: {
                                        text: 'Grafik Tanggapan Terhadap Berita Terkini Kota Deli Serdang'
                                    },
                                    xAxis: {
                                        categories: ['Sentimen'] // Menggunakan kategori "Sentimen"
                                    },
                                    yAxis: {
                                        title: {
                                            text: 'Jumlah'
                                        }
                                    },
                                    series: seriesData
                                });
                            </script>
                        </div>
                    </section>
                    
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
