@include('frontend.head')

<body class="bg-gradient-to-br from-yellow-600 via-orange-700 to-pink-700 text-white">

    <!-- NAVBAR -->
    @include('frontend.navbar')

    <!-- PROFILE SECTION -->
    <section id="profile" class="container mx-auto px-6 py-14">

        <h1 class="text-4xl font-extrabold mb-8 text-center">My Profile</h1>

        <div class="glass p-8 rounded-2xl max-w-lg mx-auto text-white/90">

            @if(session('success'))
                <div class="mb-4 p-3 bg-green-500/50 rounded-lg text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <!-- USER DETAILS -->
            <form action="{{ route('user.profile.update') }}" method="POST">
                @csrf

                <!-- Name -->
                <label class="block mb-2 text-sm font-semibold">Full Name</label>
                <input type="text" name="name" value="{{ $user->name }}" required
                       class="w-full mb-4 px-4 py-3 rounded-lg bg-white/10 border border-white/20 
                              focus:outline-none focus:ring-2 focus:ring-yellow-300 text-white">

                <!-- Phone -->
                <label class="block mb-2 text-sm font-semibold">Phone Number</label>
                <input type="text" name="phone" value="{{ $user->phone }}" required
                       class="w-full mb-6 px-4 py-3 rounded-lg bg-white/10 border border-white/20 
                              focus:outline-none focus:ring-2 focus:ring-yellow-300 text-white">

                <!-- Update Button -->
                <button type="submit"
                        class="w-full py-3 rounded-lg bg-yellow-400 text-black font-bold text-lg 
                               hover:bg-yellow-300 transition">
                    Update Profile
                </button>
            </form>

            <!-- Logout -->
            <form action="{{ route('user.logout') }}" method="POST" class="mt-6">
                @csrf
                <button type="submit"
                        class="w-full py-3 rounded-lg bg-blue-500/80 text-white font-bold text-lg 
                               hover:bg-blue-400 transition">
                    Logout
                </button>
            </form>

            <!-- Delete Account -->
            <form action="{{ route('user.delete') }}" method="POST"
                  class="mt-4"
                  onsubmit="return confirm('Are you sure you want to delete your account permanently?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="w-full py-3 rounded-lg bg-red-500/80 text-white font-bold text-lg 
                               hover:bg-red-400 transition">
                    Delete Account
                </button>
            </form>

        </div>
    </section>

    <!-- FOOTER -->
    <footer class="py-10 text-center text-white/80">
        © 2025 Renzu Games. All Rights Reserved.
    </footer>

</body>

</html>
