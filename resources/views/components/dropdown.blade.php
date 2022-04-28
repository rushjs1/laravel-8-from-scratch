@props(['trigger'])
<div x-data="{ show: false }">
    <div slot="show = !show">
        {{ $trigger }}
    
    </div>
            
    <div 
       class="absolute bg-gray-100 p-2 rounded-lg w-full z-50 overflow-auto max-h-52" 
       x-show="show"
    >
        {{ $slot }}          
    </div>
</div>