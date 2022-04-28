@extends("layouts.app")
@section('content')
    <main class="max-w-lg mx-auto mt-10 bg-gray-100 border-gray-200 p-6 rounded-lg">
        <h1 class="text-center font-bold text-xl">Register</h1>
        <form method="POST" action="/register" class="mt-10">
            @csrf
        <div class="mb-6">
            
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    name
                </label>

                <input type="text" class="border border-gray-400 rounded-lg p-2 w-full" name="name" id="name" value="{{ old('name')}}" required>
                
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">
                    Username
                </label>

                <input type="text" class="border border-gray-400 rounded-lg p-2 w-full" name="username" id="username" value="{{ old('username')}}" required>
                @error('username')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                    Email
                </label>
                <input type="email" class="border border-gray-400 rounded-lg p-2 w-full" name="email" id="email" value="{{ old('email') }}" required>
                @error('email')
                <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>
                @enderror
            </div>

            <div class="mb-6">
                
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">
                    password
                </label>
                <input type="password" class="border border-gray-400 rounded-lg p-2 w-full" name="password" id="password" required>
                @error('password')
                <p class="text-red-500 text-xs mt-1"> {{$message}} </p>
                @enderror
            </div>
            
            <div class="mb-6 text-center">
                <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                    Submit
                </button>
            </div>
        </form>
    </main>
@endsection