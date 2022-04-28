@props(['comment'])
<x-panel class='bg-gray-50'>
<article class="flex space-x-4">
                        <div class="flex-shrink-0">
                            <img class="rounded-xl" src="https://i.pravatar.cc/120?u={{$comment->user_id}}" alt="" width="60" height="60">
                        </div>
                        <div>
                            <header class="mb-4">
                                <strong>
                                    <i>
                                        {{$comment->author->username}}
                                    </i>
                                </strong>
                                <p class="text-xs mb-3">Posted {{ $comment->created_at->format('F j, Y, g:i a') }}</p>
                            </header>
                            <p>
                                {{ $comment->body }}
                            </p>
                        </div>
                    </article>
                    </x-panel>