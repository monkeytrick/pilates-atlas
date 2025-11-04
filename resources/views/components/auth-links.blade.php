<div>
    <!-- When there is no desire, all things are at peace. - Laozi -->
     <div>
        @auth
    <div class="flex items-center ms-6">
        <span class="text-gray-600">{{ Auth::user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="ms-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
@else
    <div class="flex items-center ms-6">
        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            {{ __('Log in') }}
        </a>
    
        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ms-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                {{ __('Register') }}
            </a>
        @endif
    </div>
@endauth
     </div>
</div>