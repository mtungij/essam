<?= $this->extend('main') ;?>

<?= $this->section('content') ;?>


<section class="bg-gray-50 w-full dark:bg-gray-900 py-3 sm:py-5">
  <div class=" w-full">
      <div class="relative overflow-hidden bg-white  dark:bg-gray-800 sm:rounded-lg">
          <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
              <div class="flex items-center flex-1 space-x-4">

              
                                    
                 
              </div>
              <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                  <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-yellow-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                      Record Maintanance
                 </button>
              </div>

    <!-- Modal start     -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Record Matengenezo
                </h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->

            <form action="/store" method="post">
            <div class="p-4 md:p-5">
                    <div>
                        <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Expenses</label>
                        <input type="text" name="expenses" id="password" placeholder="example Gross paper" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" autocomplete="off" required>
                    </div>

                    <div>
                        <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                        <input  x-data  x-mask:dynamic="$money($input)" name="amount" id="password" placeholder="eg 150,000" class="bg-gray-50 border border-gray-300 text-blue-900  text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" autocomplete="off" required>

                        <div>
                        <label for="suggestion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Suggestion</label>
                        <input type="text" name="suggestion" id="password" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" autocomplete="off" required>
                    </div>
                    </div>
                    <div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">SAVE</button>
                    </div>
            </div>
            </form>   
        </div>
    </div>
</div> 





              
          </div>
          <div class="overflow-x-auto">
              <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-xs  uppercase bg-blue-900 dark:bg-gray-700 text-white">
                    
                      
                      <tr>
                          <th scope="col" class="p-4">
                              <div class="flex items-center">
                                  
                                  <label for="checkbox-all" class="sr-only">checkbox</label>
                              </div>
                          </th>
                         
                          
                          <th scope="col" class="px-4 py-3">DATE</th>
                          <th scope="col" class="px-4 py-3">EXPENSES</th>
                          <th scope="col" class="px-4 py-3">AMOUNT</th>
                         <th scope="col" class="px-4 py-3">SUGGESTION</th>
                         
                         
                      </tr>
                     
                  </thead>
                  <tbody>
                  <!-- #region-->
                        <?php foreach ($maoni as $value) : ?>
                
                      <tr class="border-b dark:border-gray-600 hover:bg-gray-100">
                          <td class="w-4 px-4 py-3">
                              <div class="flex items-center">
                                  
                                  <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                              </div>
                          </td>
                          <th scope="row" class="f px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          <?= $value->created_at ?>
                        
                          </th>
                          <td class="px-4 py-2  text-gray-900 ">
                          <?= $value->expenses ?>
                          </td>
                          <td class="px-4 py-2  text-gray-900 ">
                          <?= number_format($value->amount) ?>
                          </td>
                          <td class="px-4 py-2  text-gray-900 ">
                          <?= $value->suggestion ?>
                          </td>
                      </tr>
                      <?php endforeach ?>
                  </tbody>
              </table>
          </div>
          <nav class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0" aria-label="Table navigation">
              <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                  Showing
                  <span class="font-semibold text-gray-900 dark:text-white">1-10</span>
                  of
                  <span class="font-semibold text-gray-900 dark:text-white">1000</span>
              </span>
              <ul class="inline-flex items-stretch -space-x-px">
                  <li>
                      <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                          <span class="sr-only">Previous</span>
                          <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                          </svg>
                      </a>
                  </li>
                  <li>
                      <a href="#" class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                  </li>
                  <li>
                      <a href="#" class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                  </li>
                  <li>
                      <a href="#" aria-current="page" class="z-10 flex items-center justify-center px-3 py-2 text-sm leading-tight border text-primary-600 bg-primary-50 border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                  </li>
                  <li>
                      <a href="#" class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                  </li>
                  <li>
                      <a href="#" class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                  </li>
                  <li>
                      <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                          <span class="sr-only">Next</span>
                          <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                          </svg>
                      </a>
                  </li>
              </ul>
          </nav>
      </div>
  </div>
</section>


<?= $this->endSection() ;?>