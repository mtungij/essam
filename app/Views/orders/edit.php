
<?= $this->extend('main') ;?>

<?= $this->section('content') ;?>

<div class="flex p-4  mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
  <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
  </svg>
  <span class="sr-only">Danger</span>
  <div>
    <span class="font-medium">Ensure that these requirements are met:</span>
      <ul class="mt-1.5 list-disc list-inside">
        <li>At least 10 characters (and up to 100 characters)</li>
        <li>At least one lowercase character</li>
        <li>Inclusion of at least one special character, e.g., ! @ # ?</li>
    </ul>
  </div>
</div>



<form action="<?= url_to("orders/update")?>"  method="post">
<?= csrf_field()?>
    <div class="grid gap-6 mb-6 md:grid-cols-2">
 
         <input type="hidden" name="id" value="<?= $order->id ?>">

        <div>
            <label for="customer_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer name</label>
            <input type="text" name="customer" value="<?= $order->customer ?>" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
        </div>
        <div>
            <label for="phone number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
            <input type="number" name="phone" value="<?= $order->phone ?>" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required>
        </div>
        <div>
            <label for="order type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Order Type</label>
            <input type="text" name="order_type" value="<?= $order->order_type?>" id="company" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Flowbite" required>
        </div>  
        <div>
            <label for="budget" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Work Price</label>
            <input type="number" name="budget" value="<?= $order->budget ?>" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
        </div>
        <div>
            <label for="cost" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Work Expenses Cost</label>
            <input type="number" id="cost" name="cost" value="<?= $order->cost ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required>
        </div>
        <div>
    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Expense materials</label>
    <textarea id="message" name="expenses" id="massage" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <?= $order->expenses ?>
    </textarea>
</div>
    <div class="flex justify-center">
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
    </div>
</form>

<form action="/orders/delete" method="post">
    
    <input type="hidden" name="id" value="<?= $order->id ?>">
    <div class="flex justify-center py-0">
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Delete</button>
    </div>
</form>

<?= $this->endSection() ;?>
