@extends('layouts.app')
@section('content')


<x-setting heading="{{ 'Edit Post - ' . $post->title }}"> 
<form method="POST" action="/admin/posts/{{$post->id}}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="flex mt-6 justify-between">
        <img src="{{ asset('storage/'. $post->thumbnail) }}" alt="thumbnail" class="rounded-xl mr-6" width="100">

        <div class="flex-1">
          <x-form.input name="thumbnail" type="file" value="{{ $post->thumbnail}}"  />
        </div>
    </div>
    
    <x-form.input name="title" value="{{ $post->title }}" />

    <x-form.input name="slug" value="{{ $post->slug }}" />

   <x-form.textarea name="excerpt">
      {{ old('excerpt', $post->excerpt) }} 
   </x-form.textarea>
   
   <x-form.textarea name="body">
      {{ old('body', $post->body) }} 
   </x-form.textarea>
   


    <x-form.field>
        <x-form.label name="category" />

        <select name="category_id" id="category_id">
            @foreach (\App\Models\Category::all() as $category)
                <option value="{{ $category->id   }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}> {{ ucwords($category->name) }}  </option>
            @endforeach
        </select>

        <x-form.error  name="categroy"/>
      </x-form.field>

    <x-submit-button class="mt-4">
        Publish
    </x-submit-button>

</form>
</x-setting>
@endsection