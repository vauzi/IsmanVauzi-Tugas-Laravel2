<x-app-layout>

    <div class="w-[1070px] mx-auto mt-10 bg-white p-7 rounded-lg">
        <div class="flex items-center justify-between mb-6">
            <H1 class="text-2xl text-center mt-5">Form Input Product</H1>
            <div class="flex justify-end">
                <a href="{{ route('product') }}" class="mr-10 text-white bg-gradient-to-br from-green-600 to-green-300 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2">Back</a>
            </div>
        </div>

        <div class="flex justify-center">
            <div class="relative shadow-md sm:rounded-lg w-full">
                <div class="w-full rounded-xl bg-white p-4 shadow-2xl shadow-white/40">
                    <form action="{{ route('product.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4 grid grid-cols-2 gap-4">
                            <div class="flex flex-col">
                                <label for="text" class="mb-2 font-semibold">Name</label>
                                <input type="text" name="name" id="name"
                                class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-3 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                            </div>
                            <div class="flex flex-col">
                                <labelclass="mb-2 font-semibold">Image</labelclass=>
                                <input type="file" name="image" id="image"
                                class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-3 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                            </div>
                        </div>
                        <div class="mb-4 grid grid-cols-2 gap-4">
                            <div class="flex flex-col">
                                <label class="mb-2 font-semibold">Stock</label>
                                <input type="number" name="stock" id="stock"
                                class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-3 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                            </div>
                            <div class="flex flex-col">
                                <label class="mb-2 font-semibold">Price</label>
                                <input type="number" name="price" id="price"
                                class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-3 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <label class="mb-2 font-semibold">Description</label>
                            <textarea name="description" id="description" cols="10" rows="3" class="w-full rounded-lg border border-slate-200 px-2 py-3 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"></textarea>
                        </div>
                        <button type="submit" class="block uppercase mt-10  shadow bg-indigo-800 hover:bg-indigo-700 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 rounded">
                            Save
                        </button>
                    </form>
                </div> 
            </div>
        </div>
    </div>

</x-app-layout>