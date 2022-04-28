@if(session()->has('success'))
        <div x-data="{show: true}"
             x-init="setTimeout(() => show = false, 4000 )"
             x-show="show"
        class="text-center p-4 bg-blue-500 text-gray-100 bottom-3 right-3 rounded-lg fixed">
            <p> 
                {{ session()->get('success') }}
            </p>
        </div>
    @endif