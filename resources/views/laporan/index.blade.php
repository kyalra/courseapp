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
                    <button  data-te-toggle="modal" data-te-target="#exampleModalLg" data-te-ripple-init
                    data-te-ripple-color="light" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 right">Filter</button>

                    {{-- <form action="{{ route('laporan.index') }}" method="get">
                        <label for="member_name">Filter</label>
                        <select id="member" name="member" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                            <option value="notmember">Bukan Member</option>
                            <option value="gold">GOLD</option>
                            <option value="silver">SILVER</option>
                            <option value="platinum">PLATINUM</option>
                        </select>
                        <select id="instruktur" name="instruktur" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                            <option value=""></option>
                            @foreach($instruktur as $value)
                            <option value="{{$value->id}}">{{$value->instructor_name}}</option>
                            @endforeach
                        </select>
                        
                        <button type="submit">Apply Filter</button>
                    </form> --}}
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-10">
                
                    <div class="relative overflow-x-auto">
                        
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Code Transaksi 
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Course
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Instruktur
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tanggal Mulai
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Lama Course
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Customer
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Member
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Subtotal
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Diskon
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Total
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $stok_laku=[];
                                    $untung=[];
                                @endphp
                                @foreach ($data as $item)
                              
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-small text-gray-900 whitespace-nowrap dark:text-white uppercase">
                                        {{$item->code_transaksi}}
                                    </th>
                                    <td class="px-6 py-4 capitalize">
                                        {{$item->course_name}}
                                    </td>
                                    <td class="px-6 py-4 capitalize">
                                        {{$item->instructor_name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$item->startdate}}
                                    </td>
                                    <td class="px-6 py-4">
                                       {{$item->course_days}} Hari
                                    </td>
                                    <td class="px-6 py-4 capitalize">
                                        {{$item->name}}
                                     </td>
                                     <td class="px-6 py-4 uppercase">
                                        {{$item->member}}
                                     </td>
                                     <td class="px-6 py-4">
                                       Rp. {{$item->price}}
                                     </td>
                                     <td class="px-6 py-4">
                                        Rp. {{$item->discount}}
                                     </td>
                                     <td class="px-6 py-4">
                                        Rp. {{$item->harga_total}}
                                     </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-10">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <div class="relative overflow-x-auto flex">
                                    <div class="mx-auto w-3/5 overflow-hidden w-3/6">
                                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                            {{ __('Stok Terjual') }}
                                        </h2>
                                        <canvas id="doughnut-chart"></canvas>
                                    </div>
                                    <div class="mx-auto w-3/5 overflow-hidden w-3/6">
                                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                            {{ __('Keuntungan') }}
                                        </h2>
                                        <canvas id="chart-keuntungan"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!--Large modal-->
    <div data-te-modal-init
        class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none pt-20"
        id="exampleModalLg" tabindex="-1" aria-labelledby="exampleModalLgLabel" aria-modal="true" role="dialog">
        <div data-te-modal-dialog-ref
            class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px]">
            <div
                class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-800">
                <div
                    class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <!--Modal title-->
                    <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                        id="exampleModalLgLabel">
                        Filter
                    </h5>
                    <!--Close button-->
                    <button type="button"
                        class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                        data-te-modal-dismiss aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!--Modal body-->
                <form action="{{ route('laporan.index') }}" method="GET" id="transaksi">
                    {{ csrf_field() }}
                    <div class="relative p-4">
                        <div class="mb-6">
                            <label for="course_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">MEMBER</label>
    
                                <select id="member" name="member" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                    <option value="">-</option>
                                    
                                    <option value="notmember">Bukan Member</option>
                                    <option value="gold">GOLD</option>
                                    <option value="silver">SILVER</option>
                                    <option value="platinum">PLATINUM</option>
                                </select>
                        </div>
                        <div class="mb-6">
                            <label for="instruktur"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NAMA INSTRUKTUR</label>
    
                                <select id="instruktur" name="instruktur" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                    <option value="">-</option>
                                    @foreach($instruktur as $value)
                                    <option value="{{$value->id}}">{{$value->instructor_name}}</option>
                                    @endforeach
                                </select>
                                
                        </div>
                        <div class="mb-6">
                            <label for="course"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NAMA COURSE</label>
    
                                <select id="course" name="course" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                    <option value="">-</option>
                                    @foreach($course as $value)
                                    <option value="{{$value->id}}">{{$value->course_name}}</option>
                                    @endforeach
                                </select>
                                
                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Apply Filter</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    <script src="
    ./tw.js
    "></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
        const stok_laku =    {!! json_encode($stok_laku)!!}
            // Chart
            const dataDoughnut = {
                type: 'doughnut',
                data: {
                    labels: Object.keys(stok_laku),
                    datasets: [{
                        label: 'Traffic',
                        data: Object.values(stok_laku).map((i) => Number(i)),
                        backgroundColor: [
                            ...Object.values(stok_laku).map(() =>`rgb(${Math.floor(Math.random()*256)}, ${Math.floor(Math.random()*256)}, ${Math.floor(Math.random()*256)}`),
                        ],
                    }, ],
                },
            };

            new te.Chart(document.getElementById('doughnut-chart'), dataDoughnut);
            const untung =    {!! json_encode($untung)!!}
                // Chart
                const dataKeuntungan = {
                    type: 'doughnut',
                    data: {
                        labels: Object.keys(untung),
                        datasets: [{
                            label: 'Traffic',
                            data: Object.values(untung).map((i) => Number(i)),
                            backgroundColor: [
                                ...Object.values(untung).map(() =>`rgb(${Math.floor(Math.random()*256)}, ${Math.floor(Math.random()*256)}, ${Math.floor(Math.random()*256)}`),
                            ],
                        }, ],
                    },
                };
    
                new te.Chart(document.getElementById('chart-keuntungan'), dataKeuntungan);
        });

    </script>
</x-app-layout>
