@extends('layouts.app')
@section('content')
    <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl"> 
        <h1 class="text-center font-bold text-xl"> Log In!</h1>
        <div>
        <form method="POST" action="/login" class="mt-10">
            @csrf

            <x-form.input name="email" type="email" required />
            
            <x-form.input name="password" type="password" required />

            <x-submit-button class="mt-6">
                Log In
            </x-submit-button>
        </form>
        </div>
    </main>
@endsection 
