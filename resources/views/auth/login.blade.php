<x-app-layout>
    @if ($errors->any())
        <h1 style="color: rgb(231, 85, 85)">
            {{ $errors->first() }}
        </h1>  
    @endif
    
    <form method="post" class="mt-24 ml-9">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="masukkan email anda">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="masukkan password">
        </div>
        <button type="submit">Login</button>
    </form>

</x-app-layout>