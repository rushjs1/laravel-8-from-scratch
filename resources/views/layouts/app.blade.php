<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<style>
    html{
        scroll-behavior: smooth;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
                @auth
                <x-dropdown>
                    <x-slot name="trigger">
                    <button class="text-xs font-bold uppercase p-2 rounded-lg hover:bg-gray-200" @click="show = !show">Welcome, {{ auth()->user()->name }}</button>
                    </x-slot>
                    <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')" >New Post</x-dropdown-items>
                    <x-dropdown-item href="/admin/dashboard" :active="request()->is('admin/dashboard')"> Dashboard </x-dropdown-items>
                    <x-dropdown-item x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()"  href="#" > Log Out </x-dropdown-items>
                    <form id="logout-form" method="POST" action="/logout" class="hidden">
                    @csrf
                    <button type="submit">Log Out</button>
                    </form>
                </x-dropdown> 
                @else
                <a href="/register" class="text-xs font-bold uppercase">Register</a>
                <a href="/login" class="text-xs font-bold uppercase ml-6">Login</a>
                @endauth
                <a href="#newsletter" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
                
            </div>
        </nav>

        @include('posts._header')

       <div>
       @yield('content') 
       </div>
        
        @include('_posts-footer')
    
    </section>
    <x-flash />
</body>