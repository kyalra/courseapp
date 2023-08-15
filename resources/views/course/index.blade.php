<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{route('course.create')}}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 right">TAMBAH</a>
                    
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Nama Course
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Harga
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Hari
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Is Certificate
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Is Active
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($course as $item)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                       {{$item->course_name}}
                                    </th>
                                    <td class="px-6 py-4 text-center">
                                       Rp {{$item->price}}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{$item->days}} Hari
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @if ($item->IsCertificate)
                                            yes
                                        @else
                                            no
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @if ($item->IsActive)
                                            yes
                                        @else
                                            no
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <a href="{{ route('course.view', $item->id) }}">
                                            <button type="button" class="focus:outline-none text-white bg-blue-400 hover:bg-blue-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">View</button>
                                        </a>
                                        <a href="{{ route('course.edit', $item->id) }}">
                                            <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Edit</button>
                                        </a>
                                        <a href="{{ route('course.destroy', $item->id) }}">
                                            <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>    
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
