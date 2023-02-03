@extends('layouts.app')

@section('content')

<div class="container mx-auto pb-10">

<h1 class="text-3xl mb-14 main-font">Edit Header Settings</h1>

{!! Form::open(['action' => ['App\Http\Controllers\HeaderSettingsController@update', $header->id], 'method' => 'PUT', 'class'=> 'flex flex-col',
'enctype'=>'multipart/form-data']) !!}

{{Form::label('header_text', 'Edit Header Text', ['class'=> 'mb-5 text-xl'])}}
{{Form::textarea('header_text', $header->header_text, ['id' => 'article-ckeditor'])}}

{{Form::label('sub_text', 'Edit Sub Text', ['class'=> 'my-5 text-xl'])}}
{{Form::textarea('sub_text', $header->sub_text,  ['id' => 'article-ckeditor2'])}}

<p class="my-5 text-xl">Current Video</p>
<video width="100%" controls>
    <source src="{{ $siteURL }}/storage/app/public/site_images/{{$header->video}}" type="video/mp4">
    Your browser does not support the video tag.
</video>

<p class="my-5 text-xl">Swap Video</p>

{{Form::file('video', ['class' => 'cursor-pointer'])}}
{{Form::submit('Submit', ['class'=> 'primary-background p-5 cursor-pointer text-white hover:bg-black rounded w-24 mt-5 mx-auto'])}}
{!! Form::close() !!}


</div> 
@endsection