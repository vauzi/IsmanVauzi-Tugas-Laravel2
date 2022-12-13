<x-app-layout>
    <div class="p-5 -mt-5">
        @foreach ($data as $d)
            <div class="w-[1070px] mx-auto mt-10 bg-white p-7 rounded-lg relative">
                <div class="flex gap-5 items-center font-serif">
                    <img src="{{ asset($d->image )}}" alt="asdf" class="w-96 overflow-hidden rounded-md">
                    <div class="">
                        <h1 class="pb-3 text-2xl font-semibold inline-block w-[400px] ">{{ $d->title}}</h1>
                        <div class="flex items-center gap-10 mb-5">
                            <p class="text-sm text-blue-400">Penulis : <span class="ml-3">{{ $d->writer }}</span></p>
                            <p class="text-sm text-blue-400">tanggal : <span class="ml-3">{{ $d->created_at }}</span></p>
                        </div>
                        <p class="inline-block w-[600px] truncate">
                            {{ $d->content}}
                        </p>
                        <div class="flex justify-end">
                            <a href="{{ route('user.readMore', $d->id)}}" class="text-blue-500 flex items-center mt-3">
                                reed more
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                    </svg>                                      
                                </span>
                            </a>
                        </div>
                        <div>
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
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>