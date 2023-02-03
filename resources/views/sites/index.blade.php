@extends('layouts.app')

@section('content')


<div class="container mx-auto pb-10">

    <h1 class="text-3xl mb-14 main-font">Sites</h1>

    <div class="sites flex flex-wrap">

        @if (count($sites) > 0)
        @foreach($sites as $sites)

        <div class="p-5 w-1/2">
            <div class="site text-center bg-gray-300 rounded p-10">

                <img class="mx-auto" style="width: 100px; height: 100px;" src="{{ $siteURL }}/storage/app/public/site_images/{{$sites -> site_logo}}" alt="">

                <h3 class="text-2xl text-black py-5">{{$sites -> site_name}}</h3>
                <h3 class="py-5">{{$sites -> site_url}}</h3>
                <h3 class="py-5">{!!$sites -> site_bio!!}</h3>
                <h3 class="py-5">  {!!$sites -> tag!!} </h3>

                @auth

                <div class="buttons flex w-100 mt-3 mx-auto justify-around">

                    <a class="secondary-background p-5 text-white hover:bg-black rounded w-24 mt-5"  href="{{url('/')}}/sites/{{$sites->id}}/edit"> Edit </a><br>

                    {!! Form::open(['action' => ['App\Http\Controllers\SitesController@destroy', $sites->id], 'method' => 'DELETE']) !!}
                    {{Form::submit('Delete', ['class'=> 'secondary-background cursor-pointer p-5 text-white hover:bg-black rounded w-24 mt-5'])}}
                    {!! Form::close() !!}

                </div>
                
                @endauth

                
            </div>
        </div>

        @endforeach
        @else

        <p>No Sites Found</p>

        @endif

    </div>

    <a class="primary-background mt-24 block cursor-pointer p-5 text-white hover:bg-black rounded w-48 text-center mx-auto" href="{{url('/')}}/sites/create">
        Add A New Site
    </a>

</div>

@endsection