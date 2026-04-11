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
            <h2 class="text-lg font-bold text-gray-900 mb-4">Upload Profile Picture</h2>

            <?php $avatar = !empty($user->profile_picture) ? '/uploads/profiles/' . $user->profile_picture : '/image/user.png'; ?>
            <div class="mb-4 flex items-center gap-3">
                <img src="<?= esc($avatar) ?>" alt="profile" class="w-16 h-16 rounded-full object-cover border">
                <div>
                    <p class="text-sm text-gray-800 font-semibold"><?= esc(session('name')) ?></p>
                    <p class="text-xs text-gray-500"><?= esc(session('username')) ?></p>
                </div>
            </div>

            <form id="profile-picture-form" action="/profile/picture" method="post" enctype="multipart/form-data" class="space-y-3">
                <?= csrf_field() ?>
                <input id="profile-picture-input" type="file" name="profile_picture" accept="image/*"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2" required>
                <input type="hidden" name="cropped_image" id="cropped_image">
                <p class="text-xs text-gray-500">After selecting image, cropper opens in a modal before upload.</p>
                <button type="submit"
                    class="w-full text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2.5">
                    Upload Picture
                </button>
            </form>
        </div>
    </div>
</section>

<div id="cropper-modal" class="hidden fixed inset-0 z-50 items-center justify-center p-4 bg-black/70">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl">
        <div class="flex items-center justify-between px-4 py-3 border-b">
            <h3 class="text-base font-semibold text-gray-900">Crop Profile Picture</h3>
            <button type="button" id="cropper-close" class="text-gray-500 hover:text-gray-800">Close</button>
        </div>
        <div class="p-4">
            <div class="max-h-[60vh] overflow-hidden rounded-lg border border-gray-200 bg-gray-50">
                <img id="cropper-image" src="" alt="Crop preview" class="max-w-full">
            </div>
            <p id="cropper-hint" class="text-xs text-gray-500 mt-2">Drag and zoom to adjust the square crop area.</p>
        </div>
        <div class="px-4 py-3 border-t flex justify-end gap-2">
            <button type="button" id="cropper-cancel" class="px-4 py-2 text-sm rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200">Cancel</button>
            <button type="button" id="cropper-apply" class="px-4 py-2 text-sm rounded-lg bg-indigo-700 text-white hover:bg-indigo-800">Apply Crop</button>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://unpkg.com/cropperjs@1.6.2/dist/cropper.min.css">
<script src="https://unpkg.com/cropperjs@1.6.2/dist/cropper.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var fileInput = document.getElementById('profile-picture-input');
    var form = document.getElementById('profile-picture-form');
    var cropperImage = document.getElementById('cropper-image');
    var croppedField = document.getElementById('cropped_image');
    var cropperModal = document.getElementById('cropper-modal');
    var closeBtn = document.getElementById('cropper-close');
    var cancelBtn = document.getElementById('cropper-cancel');
    var applyBtn = document.getElementById('cropper-apply');
    var cropper = null;

    function openModal() {
        cropperModal.classList.remove('hidden');
        cropperModal.classList.add('flex');
    }

    function closeModal() {
        cropperModal.classList.add('hidden');
        cropperModal.classList.remove('flex');
    }

    function buildCropper() {
        if (cropper) {
            cropper.destroy();
        }

        cropper = new Cropper(cropperImage, {
            aspectRatio: 1,
            viewMode: 1,
            autoCropArea: 1,
            dragMode: 'move',
            responsive: true,
            background: false
        });
    }

    fileInput.addEventListener('change', function (e) {
        var file = e.target.files && e.target.files[0] ? e.target.files[0] : null;
        if (!file) {
            return;
        }

        croppedField.value = '';

        var reader = new FileReader();
        reader.onload = function (event) {
            cropperImage.src = event.target.result;
            openModal();
            cropperImage.onload = buildCropper;
        };
        reader.readAsDataURL(file);
    });

    function applyCrop() {
        if (!cropper) {
            return;
        }

        var canvas = cropper.getCroppedCanvas({
            width: 512,
            height: 512,
            imageSmoothingEnabled: true,
            imageSmoothingQuality: 'high'
        });

        croppedField.value = canvas.toDataURL('image/jpeg', 0.9);
        closeModal();
    }

    applyBtn.addEventListener('click', applyCrop);
    closeBtn.addEventListener('click', closeModal);
    cancelBtn.addEventListener('click', closeModal);

    form.addEventListener('submit', function (e) {
        if (!fileInput.files || !fileInput.files.length) {
            return;
        }

        if (!croppedField.value) {
            e.preventDefault();
            openModal();
        }
    });
});
</script>

<?= $this->endSection() ?>
