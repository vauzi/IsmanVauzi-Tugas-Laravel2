<x-app-layout>

    <div class="w-[1070px] mx-auto mt-10 bg-white p-7 rounded-lg">
        <div class="flex justify-end mt-10">
            <div class="align-bottom flex items-center">
                <a href="{{ route('blog.blog') }}" 
                    class="text-white bg-gradient-to-r flex items-center gap-3 from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">
                    <p>Back</p>
                </a>
                <a href="{{ route('blog.edit', $data->id) }}" 
                    class="text-white bg-gradient-to-r flex items-center gap-3 from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>                              
                    <p>Edit</p>
                </a>
                <a href="{{ route('blog.delete', $data->id) }}" 
                    class="text-white flex items-center gap-3 bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>                              
                    <p>Delete</p>
                </a>
            </div>
        </div>

        <div class="flex justify-center">
            <div class="relative w-full flex flex-col">
                <h1 class="text-3xl font-extrabold uppercase text-center inline-block w-[600px] mx-auto">{{ $data->title }}</h1>
                <div class="text-xs flex items-center gap-10 text-blue-500 justify-center mt-5">
                    <p>Pengarang: {{ $data->writer }}</p>
                    <p>Post: {{ $data->time }}</p>
                </div>
                <img src="{{ asset($data->image) }}" alt="image blog content" class="w-1/2 mx-auto mt-10 rounded-md">
                <p class="text-xl font-normal leading-5 text-gray-700 mt-10">{{{ $data->content }}}</p>
            </div>
        </div>
    </div>

</x-app-layout>