<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Instructor') }}
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

                <form action="{{ route('instructor.update',$data->id) }}" method="POST">
                    {{ csrf_field() }}
                    
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="instructor_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Instruktur</label>
                            <input type="text" id="instructor_name" name="instructor_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value={{$data->instructor_name}}>
                        </div>
                        <div>
                            <label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Umur</label>
                            <input value="{{ $data->age}}" type="number" id="age" name="age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Umur" required>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>

                        <select id="jenis_kelamin" name="jenis_kelamin" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                            @if($data->jenis_kelamin == "Perempuan")
                                <option value="Perempuan">Perempuan</option>
                                <option value="Laki-laki">Laki-laki</option>
                            @else
                                <option value="Laki-laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            @endif
                        </select>
                    </div>
                    <div class="mb-6">
                        <div>
                            <label for="exp_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Exp Year</label>
                            <input value="{{ $data->exp_year}}" type="number" id="exp_year" name="exp_year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Exp year" required>
                        </div>
                    </div>
                    <div class="mb-6">
                        <div>
                            <label for="exp_desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Exp Desc</label>
                            <textarea id="exp_desc" name="exp_desc" rows="4" 
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="">{{$data->exp_desc}}</textarea>
                        </div>
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>
            </div>
        </div>
    </x-slot>
</x-app-layout>