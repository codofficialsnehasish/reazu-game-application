<header class="py-4">
    <div class="container mx-auto px-6 flex items-center justify-between">
      <div class="flex items-center gap-3 logo_warp">
        <img src="{{ asset('image/logo.png') }}" class="w-16 drop-shadow-xl" alt="Renzu Logo">
      </div>

      <nav class="hidden md:flex gap-6 text-white/90 font-medium">
        <a href="{{ route('home') }}" class="hover:text-yellow-300">Home</a>
        <a href="{{ route('terms') }}" class="hover:text-yellow-300">Terms</a>
        <a href="{{ route('privacy') }}" class="hover:text-yellow-300">Privacy</a>
        @auth
            <a href="{{ route('user.logout') }}" 
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
              class="hover:text-yellow-300">
                Logout
            </a>

            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        @else
            <a href="{{ route('user.login') }}" class="hover:text-yellow-300">Login</a>
        @endauth

      </nav>
    </div>
  </header>