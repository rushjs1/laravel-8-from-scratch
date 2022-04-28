<x-dropdown>
                    <x-slot name="trigger" >
                        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full text-left flex lg:w-32 lg:inline-flex hover:bg-gray-200 rounded-lg" @click="show = !show">
                            {{ isset($currentCategories) ? ucwords($currentCategories->name) : 'Categories' }}
                            <x-icon />  
                        </button>
                    </x-slot>   

                    <x-dropdown-item href="/" :active="request()->routeIs('home')" > 
                        All
                    </x-dropdown-item>   
                        @foreach($categories as $category)
                            <x-dropdown-item 
                                href="/?category={{ $category->slug }}&{{http_build_query(request()->except('category', 'page'))}}" 
                                :active='request()->is("categories/{$category->slug}")'
                            > 
                                {{ucwords($category->name)}}
                            </x-dropdown-item>
                        @endforeach
                    </x-dropdown>