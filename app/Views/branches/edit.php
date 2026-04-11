<?= $this->extend('main') ?>

<?= $this->section('content') ?>
<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Branch</h2>

        <?php if (session()->has('branch_errors')): ?>
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
                <?php foreach (session('branch_errors') as $err): ?>
                    <p><?= esc($err) ?></p>
                <?php endforeach ?>
            </div>
        <?php endif ?>

        <form action="/branches/update" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="id" value="<?= $branch->id ?>">
            <div class="grid gap-4 sm:grid-cols-1 sm:gap-6">
                <div class="w-full">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Branch Name</label>
                    <input type="text" name="name" id="name"
                        value="<?= esc(old('name', $branch->name)) ?>"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        required>
                    <p class="mt-1 text-xs text-gray-500">Renaming a branch will automatically update all staff members assigned to it.</p>
                </div>
            </div>
            <div class="flex gap-3 mt-6">
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-200">
                    Update Branch
                </button>
                <a href="/branches"
                    class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</section>
<?= $this->endSection() ?>
