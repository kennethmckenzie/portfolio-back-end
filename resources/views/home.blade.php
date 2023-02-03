@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
        <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4"
            role="alert">
            {{ session('status') }}
        </div>
        @endif

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-lg">

            <header class="font-semibold primary-background text-white py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                <h1>Dashboard</h1>
            </header>

            <div class="w-full p-6 bg-gray-200 text-white">
                <a href="{{url('/')}}/general-settings/1/edit" class="secondary-color">
                    General Settings
                </a>
            </div>

            <div class="w-full p-6 secondary-background text-white">
                <a href="{{url('/')}}/header-settings/1/edit" class="text-white">
                    Header Settings
                </a>
            </div>

            <div class="w-full p-6 bg-gray-200 text-white">
                <a href="{{url('/')}}/about-settings/1/edit" class="secondary-color">
                    About Settings
                </a>
            </div>

            <div class="w-full p-6 secondary-background text-white">
                <a href="{{url('/')}}/skills" class="text-white">
                    Add / Edit Skills
                </a>
            </div>
            
            <div class="w-full p-6 bg-gray-200 text-white">
                <a href="{{url('/')}}/featured-settings/1/edit" class="secondary-color">
                    Featured Settings
                </a>
            </div>

            <div class="w-full p-6 secondary-background">
                <a href="{{url('/')}}/sites" class="text-white">
                    Add / Edit Portfolio Items
                </a>
            </div>
            
             <div class="w-full p-6 bg-gray-200 text-white">
                <a href="{{url('/')}}/companies" class="secondary-color">
                    Add / Edit Companies
                </a>
            </div>

        </section>
    </div>
</main>
@endsection