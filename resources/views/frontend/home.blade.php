@include('frontend.head')

<body class="bg-gradient-to-br from-yellow-600 via-orange-700 to-pink-700 text-white">

  <!-- NAVBAR -->
  @include('frontend.navbar')

<!-- HERO SECTION -->
<section class="container mx-auto px-6 py-14 grid md:grid-cols-2 gap-10 items-center">
  <div>
    <h2 class="text-4xl md:text-5xl font-extrabold leading-tight">
      Play Ludo Online with Live Chat & Amazing Rewards
    </h2>
    <p class="mt-4 text-white/80 max-w-xl">
      Dive into a collection of exciting games like Ludo, Carrom, Chess, Cards, and more – all in one place. Whether you're here to challenge friends or just have fun, we’ve got it all!. Play games, win rewards, and manage your earnings with our built-in wallet. Track your balance and enjoy seamless transactions.  Keep playing and unlock new levels as you climb the leaderboard. Compete with friends and show off your rank!. We show minimal ads to keep your experience free and fun. Your support helps us keep improving.

      </p>

    <div class="mt-6 flex gap-4">
      <a href="#download" class="text-black px-6 py-3 rounded-full font-semibold">
        <img src="{{ asset('image/play.png') }}">
      </a>
      <!-- <a href="#features" class="border border-white/50 px-5 py-3 rounded-full">
        Learn More
      </a> -->
    </div>

    <!-- Stats -->
    <div class="mt-8 grid grid-cols-3 gap-3 max-w-sm">
      <div class="glass rounded-xl p-4 text-center">
        <div class="text-2xl font-bold">4M+</div>
        <div class="text-xs text-white/70">Players</div>
      </div>
      <div class="glass rounded-xl p-4 text-center">
        <div class="text-2xl font-bold">99ms</div>
        <div class="text-xs text-white/70">Latency</div>
      </div>
      <div class="glass rounded-xl p-4 text-center">
        <div class="text-2xl font-bold">Daily</div>
        <div class="text-xs text-white/70">Rewards</div>
      </div>
    </div>
  </div>

  <div class="relative">
    <div class="w-full rounded-3xl overflow-hidden shadow-2xl border border-white/10">
      <img src="{{ asset('image/home.png') }}" class="w-full h-auto">
    </div>

    <!-- <div class="absolute -bottom-6 left-6 bg-gradient-to-r from-green-400 to-blue-500 p-4 rounded-xl shadow-xl glass">
      <div class="text-sm font-bold text-black">Live Tournament</div>
      <div class="text-xs text-black/80">Join & win coins</div>
    </div> -->
  </div>
</section>

<!-- FEATURES -->
<section id="features" class="py-16">
  <div class="container mx-auto px-6">
    <h3 class="text-3xl font-bold">All Your Favorite Games</h3>

    <div class="mt-10 grid md:grid-cols-3 gap-8">

      <div class="glass p-6 rounded-2xl">
        <h4 class="font-semibold text-lg">Ludo</h4>
        <p class="text-white/70 mt-2 text-sm">Classic fun with friends.</p>
      </div>

      <div class="glass p-6 rounded-2xl">
        <h4 class="font-semibold text-lg">Carrom</h4>
        <p class="text-white/70 mt-2 text-sm">Smooth & realistic gameplay.</p>
      </div>

      <div class="glass p-6 rounded-2xl">
        <h4 class="font-semibold text-lg">Chess</h4>
        <p class="text-white/70 mt-2 text-sm">Challenge smart players worldwide.</p>
      </div>

       <div class="glass p-6 rounded-2xl">
        <h4 class="font-semibold text-lg">Cards</h4>
        <p class="text-white/70 mt-2 text-sm">Play multiple card games.</p>
      </div>

    </div>
  </div>
</section>

<!-- HOW TO PLAY -->
<section id="gameplay" class="py-16 bg-black/20">
  <div class="container mx-auto px-6">
    <h3 class="text-3xl font-bold">How to Play</h3>

    <div class="mt-8 grid md:grid-cols-3 gap-8">

      <div class="glass p-6 rounded-2xl">
        <h5 class="font-semibold text-lg">Create or Join Rooms</h5>
        <p class="text-white/70 mt-2 text-sm">Play with friends or join public matchmaking.</p>
      </div>

      <div class="glass p-6 rounded-2xl">
        <h5 class="font-semibold text-lg">Roll & Move</h5>
        <p class="text-white/70 mt-2 text-sm">Smooth dice animation and smart hints.</p>
      </div>

      <div class="glass p-6 rounded-2xl">
        <h5 class="font-semibold text-lg">Chat & Celebrate</h5>
        <p class="text-white/70 mt-2 text-sm">Send reactions and voice messages live!</p>
      </div>

    </div>
  </div>
</section>

<!-- SCREENSHOTS -->
<section id="screens" class="py-16">
  <div class="container mx-auto px-6">
    <h3 class="text-3xl font-bold">Screenshots</h3>

    <div class="mt-8 grid md:grid-cols-5 gap-2">
      <img src="{{ asset('image/1.png') }}" class="rounded-xl shadow-xl">
      <img src="{{ asset('image/2.png') }}" class="rounded-xl shadow-xl">
      <img src="{{ asset('image/3.png') }}" class="rounded-xl shadow-xl">
      <img src="{{ asset('image/4.png') }}" class="rounded-xl shadow-xl">
      <img src="{{ asset('image/5.png') }}" class="rounded-xl shadow-xl">
    </div>
  </div>
</section>

<!-- DOWNLOAD -->
<section class="py-16 bg-gradient-to-r from-pink-600 to-yellow-400 text-black">
  <div class="container mx-auto px-6 text-center">

    <h3 class="text-4xl font-extrabold">Ready to Play?</h3>
    <p class="mt-3 text-black/70">Download Renzu Ludo now and join millions!</p>

    <div class="mt-6 flex justify-center gap-5">
      <a href="#" class="text-white px-6 py-3 rounded-full font-semibold">
        <img src="{{ asset('image/play.png') }}" />
      </a>
      <!-- <a href="#" class="border border-black px-6 py-3 rounded-full font-semibold">App Store</a> -->
    </div>

  </div>
</section>

<!-- FOOTER -->
<footer class="py-10 text-center text-white/80">
  © 2025 Renzu Games. All Rights Reserved.
</footer>

</body>
</html>
