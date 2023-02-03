@extends('layouts.app')

@section('content')

<div class="container mx-auto pb-10">

    <h1 class="text-3xl mb-14 main-font">Edit Company</h1>


    {!! Form::open(['action' => ['App\Http\Controllers\CompaniesController@update', $companies->id], 'method' => 'PUT', 'class'=> 'flex flex-col',
    'enctype'=>'multipart/form-data']) !!}

    {{Form::label('company', 'Edit Company', ['class'=> 'mb-5 text-xl'])}}
    {{Form::text('company', $companies->company_name, ['class'=> 'mb-5 p-3 rounded-lg'])}}

    <p class="text-xl my-5">Current Image</p>
    <img style="width: 100px; height: 100px;" src="{{ $siteURL }}/storage/app/public/site_images/{{$companies->company_logo}}" alt="">

    <p class="text-xl my-5">Swap Image</p>
    {{Form::file('image', ['class' => 'cursor-pointer'])}}

    {{Form::label('url', 'Edit URL', ['class'=> 'my-5 text-xl'])}}
    {{Form::text('url', $companies->company_url, ['class'=> 'mb-10 p-3 rounded-lg'])}}

    {{Form::label('bio', 'Edit Bio', ['class'=> 'mb-5 text-xl'])}}
    {{Form::textarea('bio', $companies->company_bio, ['id'=> 'article-ckeditor', 'placeholder' => 'Company Bio Here'])}}



    {{Form::submit('Submit', ['class'=> 'primary-background cursor-pointer p-5 text-white hover:bg-black rounded w-24 mt-5 mx-auto'])}}

    {!! Form::close() !!}

</div>

@endsection