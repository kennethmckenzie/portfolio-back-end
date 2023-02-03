@extends('layouts.app')

@section('content')

<div class="container mx-auto pb-10">

    <h1 class="text-3xl mb-14 main-font">Skills</h1>

    <div class="skills flex flex-wrap">

        @if (count($skills) > 0)
        @foreach($skills as $skills)

        <div class="p-5 w-1/3">
            <div class="skill text-center bg-gray-300 rounded p-10">

                <img class="mx-auto" style="width: 100px; height: 100px;" src="{{ $siteURL }}/storage/app/public/site_images/{{$skills->skill_image}}" alt="">

                <h3 class="text-2xl text-black py-5">{{$skills -> skill_name}}</h3>
                
                @auth

                <div class="buttons flex w-100 mt-3 mx-auto justify-around">

                    <a class="secondary-background p-5 text-white hover:bg-black rounded w-24 mt-5" href="{{url('/')}}/skills/{{$skills->id}}/edit"> Edit </a>

                    {!! Form::open(['action' => ['App\Http\Controllers\SkillsController@destroy', $skills->id], 'method' => 'DELETE']) !!}
                    {{Form::submit('Delete', ['class'=> 'secondary-background p-5 cursor-pointer text-white hover:bg-black rounded w-24 mt-5'])}}
                    {!! Form::close() !!}

                </div>

                @endauth

            </div>
        </div>
        @endforeach
        @else

        <p>No Skills Found</p>

        @endif

    </div>

    <a class="primary-background mt-24 block p-5 text-white hover:bg-black rounded w-48 text-center mx-auto" href="{{url('/')}}/skills/create">
        Add A New Skill
    </a>

 
  
</div>

@endsection