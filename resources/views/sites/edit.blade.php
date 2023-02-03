@extends('layouts.app')

@section('content')

<div class="container mx-auto pb-10">

    <h1 class="text-3xl mb-14 main-font">Edit Site</h1>


    {!! Form::open(['action' => ['App\Http\Controllers\SitesController@update', $sites->id], 'method' => 'PUT', 'class'=> 'flex flex-col',
    'enctype'=>'multipart/form-data']) !!}

    {{Form::label('site', 'Edit Site', ['class'=> 'mb-5 text-xl'])}}
    {{Form::text('site', $sites->site_name, ['class'=> 'mb-5 p-3 rounded-lg'])}}

    <p class="text-xl my-5">Current Image</p>
    <img style="width: 100px; height: 100px;" src="{{ $siteURL }}/storage/app/public/site_images/{{$sites->site_logo}}" alt="">

    <p class="text-xl my-5">Swap Image</p>
    {{Form::file('image', ['class' => 'cursor-pointer'])}}

    {{Form::label('url', 'Edit URL', ['class'=> 'my-5 text-xl'])}}
    {{Form::text('url', $sites->site_url, ['class'=> 'mb-10 p-3 rounded-lg'])}}

    {{Form::label('bio', 'Edit Bio', ['class'=> 'mb-5 text-xl'])}}
    {{Form::textarea('bio', $sites->site_bio, ['id'=> 'article-ckeditor', 'placeholder' => 'Site Bio Here'])}}

    {{-- {{Form::label('tag', 'Edit Tag', ['class'=> 'my-5 text-xl'])}}
    {{Form::text('tag', $sites->tag, ['class'=> 'mb-10 p-3 rounded-lg'])}} --}}

    <h2 class="mt-10 mb-10 text-xl">Edit Tags</h2>

    <div class="grid grid-cols-3 gap-4 mb-20">   
        <div>
            {{Form::label('html', 'HTML', ['class'=> 'mb-5 text-lg'])}}
            @if(str_contains($sites->tag, 'html'))
            {{Form::checkbox('tag[]', 'html', true )}}
            @else
            {{Form::checkbox('tag[]', 'html')}}
            @endif
        </div>
        <div>
            {{Form::label('css', 'CSS', ['class'=> 'mb-5 text-lg'])}}
            @if(str_contains($sites->tag, 'css'))
            {{Form::checkbox('tag[]', 'css', true)}}
            @else
            {{Form::checkbox('tag[]', 'css')}}
            @endif
        </div>
        <div>
            {{Form::label('sass', 'Sass', ['class'=> 'mb-5 textlg'])}}
            @if(str_contains($sites->tag, 'sass'))
            {{Form::checkbox('tag[]', 'sass', true)}}
            @else
            {{Form::checkbox('tag[]', 'sass')}}
            @endif
        </div>
        <div>
            {{Form::label('bootstrap', 'Bootstrap', ['class'=> 'mb-5 text-lg'])}}
            @if(str_contains($sites->tag, 'bootstrap'))
            {{Form::checkbox('tag[]', 'bootstrap', true)}}
            @else
            {{Form::checkbox('tag[]', 'bootstrap')}}
            @endif
        </div>
        <div>
            {{Form::label('tailwind', 'Tailwind', ['class'=> 'mb-5 text-lg'])}}
            @if(str_contains($sites->tag, 'tailwind'))
            {{Form::checkbox('tag[]', 'tailwind', true)}}
            @else
            {{Form::checkbox('tag[]', 'tailwind')}}
            @endif
        </div>
        <div>
            {{Form::label('javascript', 'Javascript', ['class'=> 'mb-5 text-lg'])}}
            @if(str_contains($sites->tag, 'javascript'))
            {{Form::checkbox('tag[]', 'javascript', true)}}
            @else
            {{Form::checkbox('tag[]', 'javascript')}}
            @endif
        </div>
        <div>
            {{Form::label('vue', 'Vue JS', ['class'=> 'mb-5 text-lg'])}}
            @if(str_contains($sites->tag, 'vue'))
            {{Form::checkbox('tag[]', 'vue', true)}}
            @else
            {{Form::checkbox('tag[]', 'vue')}}
            @endif    
        </div>
        <div>
            {{Form::label('php', 'PHP', ['class'=> 'mb-5 text-lg'])}}
            @if(str_contains($sites->tag, 'php'))
            {{Form::checkbox('tag[]', 'php', true)}}
            @else
            {{Form::checkbox('tag[]', 'php')}}
            @endif
        </div>
        <div>
            {{Form::label('sql', 'SQL', ['class'=> 'mb-5 text-lg'])}}
            @if(str_contains($sites->tag, 'sql'))
            {{Form::checkbox('tag[]', 'sql', true)}}
            @else
            {{Form::checkbox('tag[]', 'sql')}}
            @endif
        </div>
        <div>
            {{Form::label('laravel', 'Laravel', ['class'=> 'mb-5 text-lg'])}}
            @if(str_contains($sites->tag, 'laravel'))
            {{Form::checkbox('tag[]', 'laravel', true)}}
            @else
            {{Form::checkbox('tag[]', 'laravel')}}
            @endif    
        </div>
        <div>
            {{Form::label('wordpress', 'WordPress', ['class'=> 'mb-5 text-lg'])}}
            @if(str_contains($sites->tag, 'wordpress'))
            {{Form::checkbox('tag[]', 'wordpress', true)}}
            @else
            {{Form::checkbox('tag[]', 'wordpress')}}
            @endif    
        </div>
    </div>



    {{Form::submit('Submit', ['class'=> 'primary-background cursor-pointer p-5 text-white hover:bg-black rounded w-24 mt-5 mx-auto'])}}

    {!! Form::close() !!}

</div>

@endsection