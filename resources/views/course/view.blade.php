<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Course View') }}
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
                            <label for="course_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama course</label>
                            <input type="text" id="course_name" name="course_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value={{$course->course_name}} disabled>
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                            <input type="number" id="price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value={{$course->price}} disabled>
                        </div>
                        <div>
                            <label for="days" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hari</label>
                            <input type="text" id="days" name="days" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value={{$course->days}} disabled>
                        </div>
                    </div>
                    <div class="mb-6">
                        <div>
                            <label for="IsCertificate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Is Certificate</label>
                            <input type="text" id="IsCertificate" name="IsCertificate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value=@if ($course->IsCertificate)
                                Yes
                            @else
                                No
                            @endif disabled>
                        </div>
                    </div>
                    <div class="mb-6">
                        <div>
                            <label for="IsActive" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Is Active</label>
                            <input type="text" id="IsActive" name="IsActive" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value=@if ($course->IsActive)
                                Yes
                            @else
                                No
                            @endif disabled>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-app-layout>
