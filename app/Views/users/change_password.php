<?= $this->extend('main') ?>

<?= $this->section('content') ?>
<section class="bg-gray-50 p-3 sm:p-5">
    <div class="max-w-2xl mx-auto">

        <?php if (session()->has('profile_success')): ?>
            <div class="p-3 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                <?= session('profile_success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->has('profile_error')): ?>
            <div class="p-3 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                <?= session('profile_error') ?>
            </div>
        <?php endif; ?>

        <div class="bg-white rounded-lg shadow p-5">
            <h2 class="text-lg font-bold text-gray-900 mb-4">Change Password</h2>
            <form action="/profile/password" method="post" class="space-y-3">
                <?= csrf_field() ?>
                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">Current Password</label>
                    <input type="password" name="current_password"
                        class="w-full border border-gray-300 rounded-lg p-2.5 text-sm" required>
                </div>
                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">New Password</label>
                    <input type="password" name="new_password"
                        class="w-full border border-gray-300 rounded-lg p-2.5 text-sm" required>
                </div>
                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">Confirm New Password</label>
                    <input type="password" name="confirm_password"
                        class="w-full border border-gray-300 rounded-lg p-2.5 text-sm" required>
                </div>
                <button type="submit"
                    class="w-full text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2.5">
                    Change Password
                </button>
            </form>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
