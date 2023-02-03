<header class="primary-background py-6 main-font">
    <div class="container mx-auto flex justify-between items-center">
        <div>
            <a href="{{ url('/') }}" class="text-lg font-semibold text-white no-underline">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>
        <nav class="space-x-4 text-white text-sm sm:text-base">
            @auth
            <a href="{{ url('/') }}/home" class="no-underline hover:underline">Dashboard</a>
            <a href="{{ route('logout') }}" class="no-underline hover:underline" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                {{ csrf_field() }}
            </form>
            @endauth
        </nav>
    </div>
</header>