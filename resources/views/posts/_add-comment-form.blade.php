@auth
                    <x-panel>
                    <form action="/posts/{{$post->slug}}/comments" method="POST" class="mb-0">
                        @csrf
                        <header class="flex items-center space-x-3">
                        <img src="https://i.pravatar.cc/60?u={{ auth()->user()->id }}" width="40" height="40" class="rounded-full"/>
                        <h2>
                            Want to participate?
                        </h2>
                        </header>
                        <div>
                        <textarea name="body" class="w-full mt-6 text-sm focus:outline-none focus:ring" rows="5" placeholder="Quick, think of something to say!" required></textarea>
                        @error('body')
                        <span class="text-red-500 font-semibold">  {{$message}} </span>
                        @enderror
                        </div>
                        <div class="flex justify-end border-t-2 border-gray-100 pt-3">
                           <x-submit-button>
                              Post
                           </x-submit-button>
                        </div>
                    </form>
                    </x-panel>
                    @else
                    <span class="font-semibold"> <a href="/register"><i class="text-blue-500 hover:underline">Register</i></a> or <a href="/login"> <i class="text-blue-500 hover:underline">login</i></a> to leave a comment.</span>
                    @endauth
