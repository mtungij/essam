<?= $this->extend('main') ?>

<?= $this->section('content'); ?>

<form action="/paysalary" method="post">

    <div class="grid gap-4 mb-6 md:grid-cols-2">
        <div>
        <label for="visitors" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Staff Name</label>
        <select name="userId" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
         <?php foreach ($user as $item) : ?>
            <option value="<?= $item->id ?>"><?= $item->name ?></option>
            <?php endforeach ?>
        </select>
        </div>
        <div>
            <label for="visitors" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">salary amount</label>
            <input type="number" name="amount" id="visitors" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
        </div>
        <div class="flex flex-row-reverse ">  
      <button type="submit" class=" focus:outline-none text-white bg-yellow-400 hover:bg-indigo-800 focus:ring-4  font-bold rounded-lg text-sm px-4 py-2 dark:bg-primary-600   w-full sm:w-auto text-center ">Submit</button>
    </div>
    </div> 
    
</form>

<div class="overflow-x-auto">
              <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-white  bg-blue-900  uppercase  ">
                      <tr>
                          <th scope="col" class="p-4">
                              <div class="flex items-center">
                                  
                                  <label for="checkbox-all" class="sr-only">checkbox</label>
                              </div>
                          </th>
                         
                          <th scope="col" class="px-4 py-3">Staff Name</th>
                          <th scope="col" class="px-4 py-3">Salary Payment</th>
                          <th scope="col" class="px-4 py-3">Payment Date</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($salary as $item) : ?>
                      <tr class="border-b dark:border-gray-600 hover:bg-gray-100">
                          <td class="w-4 px-4 py-3">
                              <div class="flex items-center">
        
                                  <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                              </div>
                          </td>
                          <th scope="row" class="f px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                              <?= $item->name ?>
                          </th>
                          <td class="px-4 py-2  text-gray-900 ">
                          <?= $item->amount ?>
                          </td>
                          <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                              <div class="flex items-center">
                                  <div class="inline-block w-4 h-4 mr-2"></div>
                                  <?= $item->created_at ?>
                              </div>
                          </td>
                      </tr>
                      <?php endforeach ?>
                  </tbody>
              </table>
          </div>

<?= $this->endSection(); ?>