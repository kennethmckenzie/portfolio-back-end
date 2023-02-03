@extends('layouts.app')

@section('content')

<div class="container mx-auto pb-10">

<h1 class="text-3xl mb-14 main-font">Edit Featured Settings</h1>

{!! Form::open(['action' => ['App\Http\Controllers\FeaturedSettingsController@update', $featured->id], 'method' => 'PUT', 'class'=> 'flex flex-col',
'enctype'=>'multipart/form-data']) !!}

{{Form::label('text', 'Edit Featured Text', ['class'=> 'mb-5 text-xl'])}}
{{Form::textarea('text', $featured->text, ['id'=> 'article-ckeditor'])}}

{{Form::submit('Submit', ['class'=> 'primary-background p-5 cursor-pointer text-white hover:bg-black rounded w-24 mt-5 mx-auto'])}}
{!! Form::close() !!}

</div>

@endsection