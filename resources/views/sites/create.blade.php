@extends('layouts.app')

@section('content')


<div class="container mx-auto pb-10">

    <h1 class="text-3xl mb-14 main-font">Add Site</h1>

    {!! Form::open(['action' => 'App\Http\Controllers\SitesController@store', 'class'=> 'flex flex-col', 'method' => 'POST', 'enctype' =>
    'multipart/form-data' ]) !!}

    {{Form::label('site', 'Add a Site', ['class'=> 'mb-5 text-xl'])}}
    {{Form::text('site', '', ['class'=> 'mb-5 p-3 rounded-lg', 'placeholder' => 'Site Here'])}}

    <p class="text-xl my-5">Add Logo</p>
    {{Form::file('image', ['class' => 'cursor-pointer'])}}

    {{Form::label('url', 'Add a URL', ['class'=> 'my-10 text-xl'])}}
    {{Form::text('url', '', ['class'=> 'mb-10 p-3 rounded-lg', 'placeholder' => 'URL Here'])}}

    {{Form::label('bio', 'Add a Site Bio', ['class'=> 'mb-5 text-xl'])}}
    {{Form::textarea('bio', '', ['id'=> 'article-ckeditor', 'placeholder' => 'Site Bio Here'])}}

    <h2 class="mt-10 mb-10 text-xl">Add Some Tags</h2>

    <div class="grid grid-cols-3 gap-4 mb-20">
    
    <div>
        {{Form::label('html', 'HTML', ['class'=> 'mb-5 text-lg'])}}
        {{Form::checkbox('tag[]', 'html')}}
    </div>
    <div>
        {{Form::label('css', 'CSS', ['class'=> 'mb-5 text-lg'])}}
        {{Form::checkbox('tag[]', 'css')}}
    </div>
    <div>
        {{Form::label('sass', 'Sass', ['class'=> 'mb-5 textlg'])}}
        {{Form::checkbox('tag[]', 'sass')}}
    </div>
    <div>
        {{Form::label('bootstrap', 'Bootstrap', ['class'=> 'mb-5 text-lg'])}}
        {{Form::checkbox('tag[]', 'bootstrap')}}
    </div>
    <div>
        {{Form::label('tailwind', 'Tailwind', ['class'=> 'mb-5 text-lg'])}}
        {{Form::checkbox('tag[]', 'tailwind')}}
    </div>
    <div>
        {{Form::label('javascript', 'Javascript', ['class'=> 'mb-5 text-lg'])}}
        {{Form::checkbox('tag[]', 'javascript')}}
    </div>
    <div>
        {{Form::label('vue', 'Vue JS', ['class'=> 'mb-5 text-lg'])}}
        {{Form::checkbox('tag[]', 'vue')}}
    </div>
    <div>
        {{Form::label('php', 'PHP', ['class'=> 'mb-5 text-lg'])}}
        {{Form::checkbox('tag[]', 'php')}}
    </div>
    <div>
        {{Form::label('sql', 'SQL', ['class'=> 'mb-5 text-lg'])}}
        {{Form::checkbox('tag[]', 'sql')}}
    </div>
    <div>
        {{Form::label('laravel', 'Laravel', ['class'=> 'mb-5 text-lg'])}}
        {{Form::checkbox('tag[]', 'laravel')}}
    </div>
    <div>
        {{Form::label('wordpress', 'WordPress', ['class'=> 'mb-5 text-lg'])}}
        {{Form::checkbox('tag[]', 'wordpress')}}
    </div>

    </div>

    {{Form::submit('Submit', ['class'=> 'primary-background cursor-pointer p-5 text-white hover:bg-black rounded w-24 mt-5 mx-auto'])}}

    {!! Form::close() !!}

</div>

@endsection