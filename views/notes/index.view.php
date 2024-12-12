<?php
require base_path('views/partials/head.php');
require base_path('views/partials/nav.php');
require base_path('views/partials/banner.php');
?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <ul>
      <?php foreach ($notes as $note) : ?>
        <li><a href='/note?id=<?= $note['id'] ?>' class='text-blue-900 hover:underline'><?= htmlspecialchars($note['body']) ?></a></li>
      <?php endforeach; ?>
    </ul>

    <p class='mt-6'><a href='/notes/create' class=' text-blue-900  bg-blue-100 hover:bg-blue-200 px-4 py-2 rounded '>Add New Note</a></p>
  </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>