<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="grid-cols-1 sm:grid md:grid-cols-2 gap-4">
                        @foreach ($data as $item)
                        @if ($item->course_active == 1)
                        <div
                            class="mx-3 mt-6 flex flex-col self-start bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            {{-- <a href="#">
                                <img class="p-8 rounded-t-lg w-full h-80" src=""
                                    alt="product image" />
                            </a> --}}
                            <div class="px-5 pb-5 p-8">
                                <div class="h-48 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-t-lg">
                                    <h5
                                        class="text-7xl font-semibold tracking-tight text-gray-900 dark:text-white text-center pt-10">
                                        {{$item->course_name}}</h5>
                                </div>

                            </div>
                            <div class="px-5 pb-5">
                                <a href="#">
                                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                        {{$item->course_name}}</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$item->course_days}} Hari
                                </p>
                                <div class="flex items-center justify-between">
                                    <span
                                        class="text-3xl font-bold text-gray-900 dark:text-white">Rp.{{$item->course_price}},-</span>
                                    <button data-te-toggle="modal" data-te-target="#exampleModalLg" data-te-ripple-init
                                        data-te-ripple-color="light"
                                        onclick="window.onCourseSelect('{{$item->course_name}}')"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Lanjut</button>
                                </div>
                            </div>
                        </div>
                        @endif

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Large modal-->
    <div data-te-modal-init
        class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none pt-20"
        id="exampleModalLg" tabindex="-1" aria-labelledby="exampleModalLgLabel" aria-modal="true" role="dialog">
        <div data-te-modal-dialog-ref
            class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px]">
            <div
                class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-700">
                <div
                    class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <!--Modal title-->
                    <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                        id="exampleModalLgLabel">
                        Data Tambahan
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
                <form action="{{ route('transaksi.beli') }}" method="POST" id="transaksi" novalidate>
                    {{ csrf_field() }}
                    <div class="relative p-4">
                        <div class="mb-6">
                            <label for="course_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instructor Name</label>
    
                            <select id="insc_select" name="instructor_id"
                                class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                          
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="member"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Member</label>
    
                            <select id="member" name="member"
                                class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                <option value="">pilih Jenis Member</option>
                                <option value="notmember">Bukan Member</option>
                                <option value="silver">Silver</option>
                                <option value="gold">Gold</option>
                                <option value="platinum">Platinum</option>
    
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="startdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal mulai</label>
                            <input type="text" id="startdate" name="startdate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="2000-01-30" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required>
                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Beli</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    @if(session('success'))
    <div id="toast-default"
        class="flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 ml-10"
        role="alert">
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function () {
                setTimeout(() => {

                    document.querySelector('#toast-default').classList.add('hidden');
                }, 2000);

            });

        </script>
        <div
            class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:bg-blue-800 dark:text-blue-200">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15.147 15.085a7.159 7.159 0 0 1-6.189 3.307A6.713 6.713 0 0 1 3.1 15.444c-2.679-4.513.287-8.737.888-9.548A4.373 4.373 0 0 0 5 1.608c1.287.953 6.445 3.218 5.537 10.5 1.5-1.122 2.706-3.01 2.853-6.14 1.433 1.049 3.993 5.395 1.757 9.117Z" />
            </svg>
            <span class="sr-only">Fire icon</span>
        </div>
        <div class="ml-3 text-sm font-normal">{{session('success')}}</div>
        <button type="button"
            class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
            data-dismiss-target="#toast-default" aria-label="Close">
            <span class="sr-only">Close</span>

        </button>
    </div>
    @endif
    <script src="
    ./tw.js
    "></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
           te.initTE({ Modal:te.Modal, Ripple:te.Ripple });
           window.former = document.querySelector('#transaksi').innerHTML;
            
        });


        window.instructor_ready = {!! json_encode($instructor_ready)!!};

        window.onCourseSelect = (course)=>{
            console.log("course", course, window.instructor_ready)
            const {course_price,course_id,instructor_id} = window.instructor_ready.filter(({course_name})=>course==course_name)[0];
            document.querySelector('#transaksi').innerHTML = window.former +`<input type="hidden" name="price" value="${course_price}"/><input type="hidden" name="course_id" value="${course_id}"/>`

                            
            document.querySelector('#insc_select').innerHTML = '<option value="">pilih inst</option>' + window.instructor_ready.filter(({course_name})=>course==course_name).map(({instructor_name, instructor_id})=>{
                return `<option value="${instructor_id}">${instructor_name}</option>`
            }).join('');

            // set select option inner html
        }
        



        

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/datepicker.min.js"></script>
</x-app-layout>
