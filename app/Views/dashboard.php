<?= $this->extend('main')?>

<?= $this->section('content')?>

<div class="bg-gray-100  flex ">
    <div class="grid grid-cols-1 md:grid-cols-3 w-full gap-4">
        <!-- Project Completion Card -->
        <div class="bg-gradient-to-r from-yellow-300 to-yellow-300 p-6  rounded-lg shadow-lg text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-semibold">Number Of Staff</h2>
                    <p class="text-3xl text-blue-800 font-bold mt-2"><?= $usercount ?></p>
                </div>
                <div class="bg-white p-3 rounded-full">
                    <svg class="text-pink-500 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4">
               
            </div>
        </div>

        <div class="bg-gradient-to-r from-yellow-300 to-yellow-300 p-6  rounded-lg shadow-lg text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-semibold">Today Customer</h2>
                    <p class="text-3xl text-blue-800 font-bold mt-2"><?= $customercount ?></p>
                </div>
                <div class="bg-white p-3 rounded-full">
                    <svg class="text-pink-500 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4">
               
            </div>
        </div>

        <!-- Health Tracker Card -->
        <div class="bg-gradient-to-r from-yellow-300 to-yellow-300 p-6 rounded-lg shadow-lg text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-semibold">Today Order</h2>
                    <p class="text-3xl text-blue-800 font-bold mt-2"><?= number_format($todaybudget)?></p>
                </div>
                <div class="bg-white p-3 rounded-full">
                    <svg class="text-blue-500 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4">
               
            </div>
        </div>
     
        <?php if(session('position') == 'Admin') : ?>
            <div class="bg-gradient-to-r from-yellow-300 to-yellow-300 p-6 rounded-lg shadow-lg text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold">Monthly Balance</h2>
                        <p class="text-3xl text-blue-800 font-bold mt-2"><?= number_format($monthlybalance) ?></p>
                    </div>
                    <div class="bg-white p-3 rounded-full">
                        <svg class="text-blue-500 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    
                </div>
            </div>

            <div class="bg-gradient-to-r from-yellow-300 to-yellow-300 p-6 rounded-lg shadow-lg text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold">Today Profit</h2>
                        <p class="text-3xl text-blue-800 font-bold mt-2"><?= number_format($todayprofit) ?></p>
                    </div>
                    <div class="bg-white p-3 rounded-full">
                        <svg class="text-blue-700 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    
                </div>
            </div>
             
            <div class="bg-gradient-to-r from-yellow-300 to-yellow-300 p-6  rounded-lg shadow-lg text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-semibold">Year Profit</h2>
                        <p class="text-3xl text-blue-800 font-bold mt-2"><?= number_format($yearprofit) ?></p>
                    </div>
                    <div class="bg-white p-3 rounded-full">
                        <svg class="text-pink-500 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    
                </div>
            </div>

            <!-- <div class="bg-gradient-to-r from-yellow-300 to-yellow-300 p-6  rounded-lg shadow-lg text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-semibold">Monthly Profit</h2>
                        <p class="text-3xl font-bold mt-2"><?= number_format($monthlyprofit) ?></p>
                    </div>
                    <div class="bg-white p-3 rounded-full">
                        <svg class="text-pink-500 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    
                </div>
            </div> -->

            <!-- <div class="bg-gradient-to-r from-yellow-300 to-yellow-300 p-6  rounded-lg shadow-lg text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-semibold">Monthly Salary</h2>
                        <p class="text-3xl font-bold mt-2"><?= number_format($monthlysalary) ?></p>
                    </div>
                    <div class="bg-white p-3 rounded-full">
                        <svg class="text-pink-500 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    
                </div>
            </div> -->
            <?php endif ?>
                
            </div> 
</div>

<?= $this->endSection()?>