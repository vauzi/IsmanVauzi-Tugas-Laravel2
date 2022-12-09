<x-app-layout>

    <!-- component -->
<main class="flex min-h-screen flex-col justify-center bg-cyan-500 p-16">
    <h1 class="text-3xl font-bold text-white">Input designs</h1>
    <p class="mb-8 font-semibold text-gray-100">Created by Gezellligheid</p>
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
  </main>

</x-app-layout>