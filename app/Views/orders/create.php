<?= $this->extend('main') ;?>

<?= $this->section('content') ;?>
<section class="bg-white dark:bg-gray-900">
<?php if(session()->has('errors')): ?>
            <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Danger</span>
            <div>
                <span class="font-medium">Ensure that these requirements are met:</span>
                <ul class="mt-1.5 list-disc list-inside">
                    <?php foreach(session()->get('errors') as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach?>
                </ul>
            </div>
            </div>
        <?php endif ?>

        <div class="sm:px-6 py-8 flex flex-col rounded-xl bg-white dark:bg-gray-900">
          <?php if(session()->getFlashdata('successcreate')): ?>
            <div id="alert-1" class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
           </svg>
           <div class="ms-3 text-sm font-medium">
           <p> <?= session()->getFlashdata('successcreate') ?></p> 
            </div>
            </div>
            </div>
      <?php endif?>
        </div>

        



  <div class="py-8 px-4 pb-14 w-l ">
      <h2 class="mb-4 text-xl  font-bold text-gray-900 dark:text-white">Add a new order</h2>
      <form action="<?= url_to('orders/store') ?>" method="post">
        <?= csrf_field() ?>
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
              <div class="sm:col-span-2">
                  <label for="customer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer Name</label>
                  <input type="text" name="customer" id="customer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Customer name" value="<?= old('customer') ?>" required="">
              </div>
              <div class="w-full">
                  <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone number</label>
                  <input type="number" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= old('phone') ?>" required="">
              </div>
              <div class="w-full">
                  <label for="order_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Order Type</label>
                  <input type="text" name="order_type" id="order_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= old('order_type') ?>" required="">
              </div>
                <div class="w-full">
                    <label for="budget" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Budget</label>
                    <input x-data  x-mask:dynamic="$money($input)" name="budget" id="budget" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= old('budget') ?>" required="">
                </div>
              <div>
                  <label for="cost" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Expenses Cost</label>
                  <input x-data  x-mask:dynamic="$money($input)" name="cost" id="cost" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= old('cost') ?>" required="">
              </div> 
              <div class="sm:col-span-2">
                  <label for="expenses" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Order Materials</label>
                  <textarea id="expenses" rows="8" name="expenses" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Expenses " value="<?= old('expenses') ?>"></textarea>
              </div>
          </div>
          <button type="submit" class="  px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-yellow-400 hover:bg-indigo-800">
              Add Order
          </button>
          
      </form>
  </div>
</section>
<?= $this->endSection() ;?>