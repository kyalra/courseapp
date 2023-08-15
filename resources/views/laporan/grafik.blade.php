<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Laporan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-10">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="relative overflow-x-auto">
                                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                    @php
                                            // $subtotal=[];
                                            // $diskon=[];
                                            // $total=[];


                                            @endphp
                                    <div class="p-6 text-gray-900 dark:text-gray-100">
                                        <div class="relative overflow-x-auto flex">
                                            
                                            <div class="mx-auto w-full overflow-hidden">
                                                <h2
                                                    class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center py-4">
                                                    {{ __('Transaksi') }}
                                                </h2>
                                                <canvas id="line-transaksi"></canvas>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <script src="
    ./tw.js
    "></script>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function () {
                const transaksi = {!!json_encode($transaksi)!!}
                const subtotal = {!!json_encode($subtotal)!!}
                const diskon = {!!json_encode($diskon)!!}
                const total = {!!json_encode($total)!!}


                // Chart
                const dataTransaksi = {
                    type: 'line',
                    data: {
                        labels: ['January', 'February' , 'March' , 'April' , 'May' , 'June' , 'July','August' , 'September' , 'October' ,'November', 'December'],
                        datasets: [{
                            label: 'Transaksi',
                            data: Object.values(transaksi).map((i) => Number(i)),
                            backgroundColor: [
                                'rgb(255,255,255)',
                        ],
                        borderColor: [
                                'rgb(255,255,255)',
                        ],
                        }, {
                            label: 'Sub Total',
                            data: Object.values(subtotal).map((i) => Number(i)),
                            backgroundColor: [
                                'rgb(255,255,0)',
                        ],
                        borderColor: [
                                'rgb(255,255,0)',
                        ],
                        }, {
                            label: 'Diskon',
                            data: Object.values(diskon).map((i) => Number(i)),
                            backgroundColor: [
                                'rgb(255,0,255)',
                        ],
                        borderColor: [
                                'rgb(255,0,255)',
                        ],
                        }, {
                            label: 'Total',
                            data: Object.values(total).map((i) => Number(i)),
                            backgroundColor: [
                                'rgb(0,255,255)',
                        ],
                        borderColor: [
                                'rgb(0,255,255)',
                        ],
                        }],
                    },
                };

                new te.Chart(document.getElementById('line-transaksi'), dataTransaksi);
            //     const subtotal = {!!json_encode($subtotal)!!}
            //     // Chart
            //     const dataKeuntungan = {
            //         type: 'doughnut',
            //         data: {
            //             labels: Object.keys(untung),
            //             datasets: [{
            //                 label: 'Traffic',
            //                 data: Object.values(untung).map((i) => Number(i)),
            //                 backgroundColor: [
            //                     ...Object.values(untung).map(() =>
            //                         `rgb(${Math.floor(Math.random()*256)}, ${Math.floor(Math.random()*256)}, ${Math.floor(Math.random()*256)}`
            //                     ),
            //                 ],
            //             }, ],
            //         },
            //     };

            //     new te.Chart(document.getElementById('chart-keuntungan'), dataKeuntungan);
            });

        </script>
</x-app-layout>
