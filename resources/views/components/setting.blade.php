@props(['heading'])

<section class="px-6 py-8 max-w-4xl mx-auto">
    <h1 class="font-bold mb-4 text-xl mb-8 pb-2 border-b">
        {{ $heading }}
    </h1>
<div class="flex">
    <aside class="w-48 flex-shrink-0">
        <h4 class="font semibold mb-4"> <i>Links</i> </h4>
        <ul>
            <li class="{{ request()->is('admin/dashboard') ? 'bg-gray-200 pl-2 rounded-l-md' : 'pl-2 mb-1 hover:bg-gray-50' }}">
                <a class="{{ request()->is('admin/dashboard') ? 'text-blue-500' : '' }}" href="/admin/dashboard">Dashboard </a>
            </li>

            <li class="{{ request()->is('admin/posts') ? 'bg-gray-200 pl-2 rounded-l-md' : 'pl-2 mb-1 hover:bg-gray-50' }}">
                <a class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}" href="/admin/posts">All Posts </a>
            </li>

            <li class="{{ request()->is('admin/posts/create') ? 'bg-gray-200 pl-2 rounded-l-md' : 'pl-2 mb-1 hover:bg-gray-50' }}">
                <a class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}" href="/admin/posts/create">New Post</a>
            </li>

        </ul>
    </aside>

 <main class="flex-1"> 
 <x-panel>
    {{ $slot  }}
</x-panel>
 </main> 
 </div>
</sectiion>