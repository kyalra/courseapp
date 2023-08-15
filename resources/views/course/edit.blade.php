<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Course') }}
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

                <form action="{{ route('course.update',$course->id) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="mb-6">
                        <div>
                            <label for="course_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Course</label>
                            <input value="{{ $course->course_name}}" type="text" id="course_name" name="course_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama Course" required>
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                            <input value="{{ $course->price}}" type="number" id="price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Harga" required>
                        </div>
                        <div>
                            <label for="days" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hari</label>
                            <input value="{{ $course->days}}" type="number" id="days" name="days" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Hari" required>
                        </div>

                    </div>
                    <div class="mb-6">
                        <label for="IsCertificate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Is Certificate</label>

                        <select id="IsCertificate" name="IsCertificate" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                            @if($course->IsCertificate == "1")
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            @else
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            @endif
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="IsActive" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Is Active</label>

                        <select id="IsActive" name="IsActive" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                            @if($course->IsActive == "1")
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            @else
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>
            </div>
        </div>
    </x-slot>
</x-app-layout>