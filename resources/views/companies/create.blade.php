@extends('layouts.app')

@section('content')


<div class="container mx-auto pb-10">

    <h1 class="text-3xl mb-14 main-font">Add Company</h1>

    {!! Form::open(['action' => 'App\Http\Controllers\CompaniesController@store', 'class'=> 'flex flex-col', 'method' => 'POST', 'enctype' =>
    'multipart/form-data' ]) !!}

    {{Form::label('company', 'Add a Company', ['class'=> 'mb-5 text-xl'])}}
    {{Form::text('company', '', ['class'=> 'mb-5 p-3 rounded-lg', 'placeholder' => 'Company Here'])}}

    <p class="text-xl my-5">Add Logo</p>
    {{Form::file('image', ['class' => 'cursor-pointer'])}}

    {{Form::label('url', 'Add a URL', ['class'=> 'my-10 text-xl'])}}
    {{Form::text('url', '', ['class'=> 'mb-10 p-3 rounded-lg', 'placeholder' => 'URL Here'])}}

    {{Form::label('bio', 'Add a Company Bio', ['class'=> 'mb-5 text-xl'])}}
    {{Form::textarea('bio', '', ['id'=> 'article-ckeditor', 'placeholder' => 'Company Bio Here'])}}

    {{Form::submit('Submit', ['class'=> 'primary-background cursor-pointer p-5 text-white hover:bg-black rounded w-24 mt-5 mx-auto'])}}

    {!! Form::close() !!}

</div>

@endsection