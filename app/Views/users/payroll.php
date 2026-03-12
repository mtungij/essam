<?= $this->extend('main') ;?>

<?= $this->section('content') ;?>

<form action="/salaryReport" method="post">
<section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
  <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
      <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
          <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
              <div class="flex items-center flex-1 space-x-4">
                  <h5>
                      <span class="text-gray-800">STAFF SALARY REPORT</span>
                    
                  </h5>
                  <h5>
                      <!-- <span class="text-gray-500">Total sales:</span>
                      <span class="dark:text-white">$88.4k</span> -->
                  </h5>
              </div>
              <form action="/salaryReport">
              <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                  <input type="date" name="from" class="flex items-center justify-center px-4 py-2 text-sm font-medium rounded-lg   focus:outline-none ">
                      
                  </input>
                  
                  <input type="date" name="to" class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium  bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-primary-700  focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                      
                  </input>
                  <button type="submit" class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg>
                      Filter
                  </button>
              </div>
              </form>
          </div>
          <div class="overflow-x-auto">
              <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-white  bg-blue-900 uppercase  dark:bg-gray-700 dark:text-gray-400">
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
                    <?php foreach ($user as $item) : ?>
                      <tr class="border-b dark:border-gray-600 hover:bg-gray-100">
                          <td class="w-4 px-4 py-3">
                              <div class="flex items-center">
                                  
                              </div>
                          </td>
                          <th scope="row" class="f px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                              <?= $item->name ?>
                          </th>
                          <td class="px-4 py-2  text-gray-900 ">
                         
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
         
      </div>
  </div>
</section>
</form>


<p class="mb-3 text-gray-500 dark:text-gray-400"></p>


<?= $this->endSection() ;?>





                            
          




                            
                            
                           