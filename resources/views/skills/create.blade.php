@extends('layouts.app')

@section('content')

<div class="container mx-auto pb-10">

    <h1 class="text-3xl mb-14 main-font">Add Skill</h1>


{!! Form::open(['action' => 'App\Http\Controllers\SkillsController@store', 'method' => 'POST', 'class'=> 'flex flex-col', 'enctype' =>
'multipart/form-data' ]) !!}

{{Form::label('skill', 'Add a Skill', ['class'=> 'mb-5 text-xl'])}}
{{Form::text('skill', '', ['class'=> 'mb-10 p-3 rounded-lg', 'placeholder' => 'Skill Here'])}}

<p class="text-xl my-5">Skill Image</p>
{{Form::file('image', ['class' => 'cursor-pointer'])}}
{{Form::submit('Submit', ['class'=> 'primary-background cursor-pointer p-5 text-white hover:bg-black rounded w-24 mt-5 mx-auto'])}}
{!! Form::close() !!}

</div>

@endsection