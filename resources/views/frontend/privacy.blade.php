@include('frontend.head')

<body class="bg-gradient-to-br from-yellow-600 via-orange-700 to-pink-700 text-white">

  <!-- NAVBAR -->
  @include('frontend.navbar')

  <!-- PRIVACY CONTENT -->
  <section id="privacy" class="container mx-auto px-6 py-14">
    <h1 class="text-4xl font-extrabold mb-6">Privacy Policy</h1>

    <div class="space-y-8 text-white/90 leading-relaxed">

      <div class="glass p-6 rounded-xl">
        <h2 class="text-2xl font-bold mb-2">1. Introduction</h2>
        <p>This Privacy Policy explains how Renzu Games ("we", "our") collects, uses, and protects your information when you use our mobile application and services.</p>
      </div>

      <div class="glass p-6 rounded-xl">
        <h2 class="text-2xl font-bold mb-2">2. Information We Collect</h2>
        <ul class="list-disc ml-6 mt-2 space-y-1">
          <li>Basic profile details (name, phone number, or email if provided)</li>
          <li>Gameplay data, scores, matches, rewards</li>
          <li>Device information (model, OS version, IP, app version)</li>
          <li>Crash logs & performance data</li>
          <li>Information collected by third-party SDKs (Google, Ads networks, etc.)</li>
        </ul>
      </div>

      <div class="glass p-6 rounded-xl">
        <h2 class="text-2xl font-bold mb-2">3. How We Use Your Information</h2>
        <ul class="list-disc ml-6 mt-2 space-y-1">
          <li>To operate gameplay and matchmaking</li>
          <li>To manage your wallet, coins, and rewards</li>
          <li>To improve app performance and user experience</li>
          <li>To show minimal and relevant ads</li>
          <li>To prevent fraud, cheating, or unauthorized access</li>
        </ul>
      </div>

      <div class="glass p-6 rounded-xl">
        <h2 class="text-2xl font-bold mb-2">4. Sharing of Information</h2>
        <p>We may share information with:</p>
        <ul class="list-disc ml-6 mt-2 space-y-1">
          <li>Third-party ad networks (for showing ads)</li>
          <li>Analytics providers to monitor app performance</li>
          <li>Payment gateways for wallet transactions</li>
        </ul>
        <p class="mt-2">We never sell your personal data.</p>
      </div>

      <div class="glass p-6 rounded-xl">
        <h2 class="text-2xl font-bold mb-2">5. Security</h2>
        <p>We use standard security practices to protect your data, but no system is 100% secure. Users are advised to keep their device safe and updated.</p>
      </div>

      <div class="glass p-6 rounded-xl">
        <h2 class="text-2xl font-bold mb-2">6. Children’s Privacy</h2>
        <p>Renzu Games is not intended for users under 18. We do not knowingly collect data from children.</p>
      </div>

      <div class="glass p-6 rounded-xl">
        <h2 class="text-2xl font-bold mb-2">7. Third-Party Services</h2>
        <p>Our app may use third-party tools for ads, analytics, and crash reporting. These services follow their own privacy policies.</p>
      </div>

      <div class="glass p-6 rounded-xl">
        <h2 class="text-2xl font-bold mb-2">8. Changes to This Privacy Policy</h2>
        <p>We may update this Privacy Policy occasionally. If you continue using the app after updates, it means you agree to the changes.</p>
      </div>

      <div class="glass p-6 rounded-xl">
        <h2 class="text-2xl font-bold mb-2">9. Contact Us</h2>
        <p>If you have any questions about this Privacy Policy, contact us at:</p>
        <p class="font-semibold mt-2">support@renzugames.com</p>
      </div>

    </div>
  </section>

  <!-- FOOTER -->
  <footer class="py-10 text-center text-white/80">
    © 2025 Renzu Games. All Rights Reserved.
  </footer>

</body>

</html>
