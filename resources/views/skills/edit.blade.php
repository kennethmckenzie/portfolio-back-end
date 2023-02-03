@extends('layouts.app')

@section('content')


<div class="container mx-auto pb-10">

    <h1 class="text-3xl mb-14 main-font">Edit Skill</h1>


{!! Form::open(['action' => ['App\Http\Controllers\SkillsController@update', $skill->id], 'method' => 'PUT', 'class'=> 'flex flex-col',
'enctype'=>'multipart/form-data']) !!}

{{Form::label('skill', 'Edit Skill', ['class'=> 'mb-5 text-xl'])}}
{{Form::text('skill', $skill->skill_name, ['class'=> 'mb-10 p-3 rounded-lg'])}}

<p class="text-xl my-5">Current Image</p>
<img style="width: 100px; height: 100px;" src="{{ $siteURL }}/storage/app/public/site_images/{{$skill->skill_image}}" alt="">

<p class="text-xl my-5">Swap Image</p>
{{Form::file('image', ['class' => 'cursor-pointer'])}}

{{Form::submit('Submit', ['class'=> 'primary-background p-5 cursor-pointer text-white hover:bg-black rounded w-24 mt-5 mx-auto'])}}

{!! Form::close() !!}


</div>


@endsection