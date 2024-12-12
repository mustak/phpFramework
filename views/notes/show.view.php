<?php
require base_path('views/partials/head.php');
require base_path('views/partials/nav.php');
require base_path('views/partials/banner.php');
?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

    <p>
      <a href='/notes' class='text-blue-900 hover:underline'>View all notes</a>
    </p>
    <div class='mt-6'><?= htmlspecialchars($note['body']) ?></div>


    <!-- <form method="post">
      <input type="hidden" name="_method_" value="DELETE">
      <input type="hidden" name="id" value="<?= $note['id'] ?>">
      <button type="submit" class='text-red-500 font-bold rounded bg-gray-200 mt-6 px-4 py-2 hover:underline'>Delete</button>
    </form> -->
    <div class='mt-6'>
      <a href="/notes/edit?id=<?= $note['id'] ?>" class='text-blue-500 font-bold rounded bg-gray-200 px-4 py-2 hover:underline'>Edit</a>
    </div>
  </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>