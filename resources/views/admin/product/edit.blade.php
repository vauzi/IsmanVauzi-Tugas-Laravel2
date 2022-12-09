<x-app-layout>

    <!-- component -->
<main class="flex min-h-screen flex-col justify-center bg-cyan-500 p-16">
    <h1 class="text-3xl font-bold text-white">Form Update</h1>
    <p class="mb-8 font-semibold text-gray-100">Product Update</p>
    <div class="w-full rounded-xl bg-white p-4 shadow-2xl shadow-white/40">
        <form action="{{ route('product.update',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div class="flex flex-col">
                    <label for="text" class="mb-2 font-semibold">Name</label>
                    <input type="text" name="name" value="{{ $data->name }}"
                    class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-3 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                </div>
                <div class="flex flex-col">
                    <label for="text" class="mb-2 font-semibold">Image</label>
                    <input type="file" name="image" 
                    class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-3 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                </div>
            </div>
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div class="flex flex-col">
                    <label class="mb-2 font-semibold">Stock</label>
                    <input type="number" name="stock" value="{{ $data->stock }}"
                    class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-3 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                </div>
                <div class="flex flex-col">
                    <label class="mb-2 font-semibold">Price</label>
                    <input type="number" name="price" value="{{ $data->price }}"
                    class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-3 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                </div>
            </div>
            <div class="flex flex-col">
                <label class="mb-2 font-semibold">Description</label>
                <textarea name="description" cols="10" rows="3" class="w-full rounded-lg border border-slate-200 px-2 py-3 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40">{{$data->description}}</textarea>
            </div>
            <button type="submit" class="block uppercase mt-10  shadow bg-indigo-800 hover:bg-indigo-700 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 rounded">
                Save
            </button>
        </form>
  </main>

</x-app-layout>