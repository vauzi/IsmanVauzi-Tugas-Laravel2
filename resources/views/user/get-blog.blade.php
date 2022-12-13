<x-app-layout>

    <div class="w-[1070px] mx-auto mt-10 bg-white p-7 rounded-lg">

        <div class="flex justify-center">
            <div class="relative w-full flex flex-col">
                <h1 class="text-3xl font-extrabold uppercase text-center inline-block w-[600px] mx-auto">{{ $data->title }}</h1>
                <div class="text-xs flex items-center gap-10 text-blue-500 justify-center mt-5">
                    <p>Pengarang: {{ $data->writer }}</p>
                    <p>Post: {{ $data->time }}</p>
                </div>
                <div class="flex justify-center mt-5">
                    <div class="flex items-center justify-between text-slate-500">
                        <div class="flex space-x-4 md:space-x-8">
                            <div class="flex cursor-pointer items-center transition hover:text-slate-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                </svg>
                                <span>125</span>
                            </div>
                            <div class="flex cursor-pointer items-center transition hover:text-slate-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                </svg>
                                <span>4</span>
                            </div>
                        </div>
                    </div>
                </div>
                <img src="{{ asset($data->image) }}" alt="image blog content" class="w-1/2 mx-auto mt-10 rounded-md">
                <p class="text-xl font-normal leading-5 text-gray-700 mt-10 p-16">{{{ $data->content }}}</p>
            </div>
        </div>
    </div>

</x-app-layout>