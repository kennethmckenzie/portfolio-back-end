@extends('layouts.app')

@section('content')


<div class="container mx-auto pb-10">

<h1 class="text-3xl mb-14 main-font">General Settings</h1>

{!! Form::open(['action' => ['App\Http\Controllers\GeneralSettingsController@update', $general->id], 'method' => 'PUT', 'class'=> 'flex flex-col',
'enctype'=>'multipart/form-data']) !!}

{{Form::label('name', 'Name', ['class'=> 'mb-5 text-xl'])}}
{{Form::text('name', $general->name, ['class'=> 'mb-10 p-3 rounded-lg'])}}
{{Form::label('email_address', 'Email Address', ['class'=> 'mb-5 text-xl'])}}
{{Form::text('email_address', $general->email_address, ['class'=> 'mb-10 p-3 rounded-lg'])}}
{{Form::label('linkedin_url', 'LinkedIn Address', ['class'=> 'mb-5 text-xl'])}}
{{Form::text('linkedin_url', $general->linkedin_url, ['class'=> 'mb-10 p-3 rounded-lg'])}}

<div class="flex justify-between py-5">
    <div>
        {{Form::label('primary_color', 'Primary Colour', ['class'=> 'mb-5 text-xl'])}}
        {{Form::color('primary_color', $general->primary_color, ['class'=> 'mb-10 cursor-pointer'])}}
    </div>
    <div>
        {{Form::label('secondary_color', 'Secondary Colour', ['class'=> 'mb-5 text-xl'])}}
        {{Form::color('secondary_color', $general->secondary_color, ['class'=> 'mb-10 cursor-pointer'])}}
    </div>
    <div>
        {{Form::label('third_color', 'Third Colour', ['class'=> 'mb-5 text-xl'])}}
        {{Form::color('third_color', $general->third_color, ['class'=> 'mb-10 cursor-pointer'])}}
    </div>
</div>

{{Form::label('main_font', 'Main Font', ['class'=> 'mb-5 text-xl'])}}
{{Form::text('main_font', $general->main_font, ['class'=> 'mb-10 p-3 rounded-lg'])}}
{{Form::label('secondary_font', 'Secondary Font', ['class'=> 'mb-3 text-xl'])}}
{{Form::text('secondary_font', $general->secondary_font, ['class'=> 'mb-10 p-3 rounded-lg'])}}
<p class="text-xl mb-5">CV</p>
<p class="mb-5">Current CV: {{$general->cv}}</p>
{{Form::file('cv', ['class' => 'cursor-pointer'])}}
{{Form::submit('Submit', ['class'=> 'primary-background p-5 text-white hover:bg-black rounded w-24 mt-5 mx-auto cursor-pointer'])}}
{!! Form::close() !!}

</div>

@endsection