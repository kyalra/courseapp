<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Instructor View') }}
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

                <form>
                    {{ csrf_field() }}
                    <div class="mb-6">
                        <div>
                            <label for="instructor_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Instruktur</label>
                            <input type="text" id="instructor_name" name="instructor_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value={{$data->instructor_name}} disabled>
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Umur</label>
                            <input type="number" id="age" name="age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value={{$data->age}} disabled>
                        </div>
                        <div>
                            <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                            <input type="text" id="jenis_kelamin" name="jenis_kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value={{$data->jenis_kelamin}} disabled>
                        </div>
                    </div>
                    <div class="mb-6">
                        <div>
                            <label for="exp_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Exp Year</label>
                            <input type="number" id="exp_year" name="exp_year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value={{$data->exp_year}} disabled>
                        </div>
                    </div>
                    <div class="mb-6">
                        <div>
                            <label for="exp_desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Exp Desc</label>
                            <textarea id="exp_desc" name="exp_desc" rows="4" 
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="" disabled>{{$data->exp_desc}}</textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-app-layout>
