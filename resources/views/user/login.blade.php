@include('frontend.head')

<body class="bg-gradient-to-br from-yellow-600 via-orange-700 to-pink-700 text-white">

    <!-- NAVBAR -->
    @include('frontend.navbar')

    <!-- LOGIN SECTION -->
    <section id="login" class="container mx-auto px-6 py-14">

        <h1 class="text-4xl font-extrabold mb-8 text-center">Login</h1>

        <div class="glass p-8 rounded-2xl max-w-md mx-auto text-white/90">

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-500/50 rounded-lg">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="mb-4 p-3 bg-green-500/50 rounded-lg text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('user.login.post') }}" method="POST">
                @csrf

                <!-- Phone -->
                <label class="block mb-2 text-sm font-semibold">Phone Number</label>
                <input type="text" name="phone" required
                       class="w-full mb-4 px-4 py-3 rounded-lg bg-white/10 border border-white/20 
                              focus:outline-none focus:ring-2 focus:ring-yellow-300 text-white">

                <!-- Password -->
                <label class="block mb-2 text-sm font-semibold">Password</label>
                <input type="password" name="password" required
                       class="w-full mb-6 px-4 py-3 rounded-lg bg-white/10 border border-white/20 
                              focus:outline-none focus:ring-2 focus:ring-yellow-300 text-white">

                <button type="submit"
                        class="w-full py-3 rounded-lg bg-yellow-400 text-black font-bold text-lg 
                               hover:bg-yellow-300 transition">
                    Login
                </button>
            </form>
        </div>

        {{-- <p class="mt-6 text-center text-white/80">
            Don't have an account? <a href="#" class="text-white font-semibold underline">Register</a>
        </p> --}}

    </section>

    <!-- FOOTER -->
    <footer class="py-10 text-center text-white/80">
        © 2025 Renzu Games. All Rights Reserved.
    </footer>

</body>

</html>
