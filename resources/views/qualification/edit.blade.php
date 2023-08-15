<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Qualification') }}
        </h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-medium">{{ $error }}</span>
                        </div>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="py-12">
            <div class="relative overflow-x-auto max-w-7xl mx-auto sm:px-6 lg:px-8">

                <form action="{{ route('qualification.update',$data->id) }}" method="POST" novalidate>
                    {{ csrf_field() }}
                    <div class="mb-6">
                        <label for="course_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Course</label>

                        <select id="course_id" name="course_id" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                            @foreach ($course as $item)
                            <option value="{{$item->id}}" {{$data->course_name==$item->course_name?'SELECTED':''}}>{{$item->course_name}}</option>
                           @endforeach
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="instructor_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Instruktor</label>

                        <select id="instructor_id" name="instructor_id" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                            @foreach ($instructor as $item)
                            <option value="{{$item->id}}" {{$data->instructor_name==$item->instructor_name?'SELECTED':''}}>{{$item->instructor_name}}</option>
                           @endforeach
                        </select>
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>
            </div>
        </div>
    </x-slot>
</x-app-layout>