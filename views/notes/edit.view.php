<?php
require base_path('views/partials/head.php');
require base_path('views/partials/nav.php');
require base_path('views/partials/banner.php');

$bodyDefault = $_POST['body'] ?? $note['body'] ?? '';
$bodyDefault = trim($bodyDefault);
?>
<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

    <form action="/notes" method="post">
      <input type="hidden" name="_method_" value="PATCH">
      <input type="hidden" name="id" value="<?= $note['id'] ?>">
      <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">

          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="col-span-full">
              <label for="about" class="block text-sm/6 font-medium text-gray-900">Edit Note</label>
              <div class="mt-2">
                <textarea id="body" name="body" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6" placeholder="Write your note here..."><?= $bodyDefault ?></textarea>
              </div>
              <?php if (isset($errors['body'])) : ?>
                <p class="text-sm text-red-600 ml-1 mt-1"><?php echo $errors['body'] ?></span>
                <?php endif; ?>

            </div>
          </div>
        </div>
      </div>

      <div class="mt-6 flex items-center justify-end gap-x-6">
        <a href="/note?id=<?= $note['id'] ?>" class="text-sm/6 font-semibold text-gray-900 bg-gray-200 px-4 py-2 hover:underline">Cancel</a>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
      </div>
    </form>

  </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>