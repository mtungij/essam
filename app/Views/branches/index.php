<?= $this->extend('main') ?>

<?= $this->section('content') ?>
<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">

    <?php if (session()->has('success')): ?>
        <div class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <div class="ms-3 text-sm font-medium"><?= session('success') ?></div>
        </div>
    <?php elseif (session()->has('error')): ?>
        <div class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <div class="ms-3 text-sm font-medium"><?= session('error') ?></div>
        </div>
    <?php endif ?>

    <div class="mx-auto bg-white py-4 rounded-md max-w-screen-xl px-4 lg:px-12">
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <h2 class="text-xl font-bold text-gray-800 dark:text-white">Branches</h2>
                </div>
                <div class="w-full md:w-auto flex justify-end">
                    <button type="button" data-modal-target="add-branch-modal" data-modal-toggle="add-branch-modal"
                        class="flex items-center justify-center text-white bg-yellow-400 hover:bg-indigo-800 focus:ring-4 font-bold rounded-lg text-sm px-4 py-2">
                        + Add Branch
                    </button>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">S/N</th>
                        <th scope="col" class="px-4 py-3">BRANCH NAME</th>
                        <th scope="col" class="px-4 py-3">CREATED</th>
                        <th scope="col" class="px-4 py-3"><span class="sr-only">Actions</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach ($branches as $branch): ?>
                        <tr class="border-b dark:border-gray-700">
                            <td class="px-4 py-3"><?= $i < 10 ? '0' . $i++ : $i++ ?></td>
                            <td class="px-4 py-3 font-medium text-gray-900 dark:text-white"><?= esc($branch->name) ?></td>
                            <td class="px-4 py-3"><?= date('d/m/Y', strtotime($branch->created_at)) ?></td>
                            <td class="px-4 py-3 flex items-center justify-end gap-2">
                                <a href="<?= base_url('branches/edit/' . $branch->id) ?>"
                                    class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                                    Edit
                                </a>
                                <form action="/branches/delete" method="post" onsubmit="return confirm('Delete this branch?')">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="id" value="<?= $branch->id ?>">
                                    <button type="submit"
                                        class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-white bg-red-600 rounded-lg hover:bg-red-700">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    <?php if (empty($branches)): ?>
                        <tr>
                            <td colspan="4" class="px-4 py-6 text-center text-gray-400">No branches found. Add one above.</td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Add Branch Modal -->
<div id="add-branch-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-yellow-300 rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-bold text-white dark:text-white">ADD BRANCH</h3>
                <button type="button"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="add-branch-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            <div class="p-4 md:p-5">
                <?php if (session()->has('branch_errors')): ?>
                    <div class="p-3 mb-3 text-sm text-red-800 rounded-lg bg-red-50">
                        <?php foreach (session('branch_errors') as $err): ?>
                            <p><?= esc($err) ?></p>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
                <form class="space-y-4" action="/branches/store" method="post">
                    <?= csrf_field() ?>
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Branch Name</label>
                        <input type="text" name="name" id="name" value="<?= old('name') ?>"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="e.g. Main Office" required>
                    </div>
                    <button type="submit"
                        class="w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center text-white">
                        Save Branch
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php if (session()->has('branch_errors')): ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('add-branch-modal').classList.remove('hidden');
        document.getElementById('add-branch-modal').classList.add('flex');
    });
</script>
<?php endif ?>

<?= $this->endSection() ?>
