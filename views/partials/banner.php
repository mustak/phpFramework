<header class="shadow">
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex justify-between  align-middle">
    <h1 class="text-3xl font-bold tracking-tight text-gray-900"><?= $heading ?? 'No Heading' ?></h1><span class=" text-gray-900 text-base flex items-center align-middle">Welcome, <?= $_SESSION['user']['email'] ?? 'Guest' ?></span>
  </div>
</header>