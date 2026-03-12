<aside
            class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-indigo-900  border-r  md:translate-x-0 "
            aria-label="Sidenav" id="drawer-navigation">
            <div class="overflow-y-auto py-5 px-3 h-full dark:bg-slate-900">
                <form action="#" method="GET" class="md:hidden mb-2">
                    <label for="sidebar-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z">
                                </path>
                            </svg>
                        </div>
                        <input type="text" name="search" id="sidebar-search"
                            class="bg-gray-50 border border-gray-300 text-white text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Search" />
                    </div>
                </form>


<div class="mb-4 border-b  dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2  text-white font-bold  hover:bg-yellow-400 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Menu</button>
        </li>
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-600 text-white font-bold  hover:bg-yellow-400" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Reports</button>
        </li>
      
    </ul>
</div>
<div id="default-tab-content">
    <div class="hidden p-4 rounded-lg  dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <ul class="space-y-2">
                    <li>
                        <a href="/"
                            class="flex items-center p-2 text-base font-medium text-white rounded-lg dark:text-white hover:bg-yellow-400   dark:hover:bg-gray-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-gauge"><path d="m12 14 4-4"/><path d="M3.34 19a10 10 0 1 1 17.32 0"/></svg>
                            <span class="ml-3">Overview</span>
                        </a>
                    </li>
                    
                    <li>
                        <button type="button"
                            class="flex items-center p-2 w-full text-base font-medium text-white rounded-lg transition duration-75 group hover:bg-yellow-400 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-pages" data-collapse-toggle="dropdown-pages">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-open-text"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/><path d="M6 8h2"/><path d="M6 12h2"/><path d="M16 8h2"/><path d="M16 12h2"/></svg>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">Orders</span>
                            <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <ul id="dropdown-pages" class="hidden py-2 space-y-2">
                            <li>
                                <a href="/orders"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-white rounded-lg transition duration-75 group hover:bg-yellow-400 dark:text-white dark:hover:bg-gray-700">Create Orders</a>
                            </li>
                        </ul>                                                                                
                    </li>
                    <?php if(session('position')=="Admin"):?>
                    <li>
                        <button type="button"
                            class="flex items-center p-2 w-full text-base font-medium text-white rounded-lg transition duration-75 group hover:bg-yellow-400 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">Staff</span>
                            <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <ul id="dropdown-sales" class="hidden py-2 space-y-2">
                            <li>
                            <a href="/users"
                            class="flex items-center p-2 pl-11 w-full text-base font-medium text-white rounded-lg transition duration-75 group hover:bg-yellow-400 dark:text-white dark:hover:bg-gray-700">Register Staff
                        </a>
                            </li>
                            <li>
                                <a href="/salary"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-white rounded-lg transition duration-75 group hover:bg-yellow-400 dark:text-white dark:hover:bg-gray-700">Pay Salary</a>
                            </li>
                            <!-- <li>
                                <a href="/payroll"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-white rounded-lg transition duration-75 group hover:bg-yellow-400 dark:text-white dark:hover:bg-gray-700">Salary Sheet</a>
                            </li> -->
                        </ul>
                    </li>
                    <?php endif ?>
                    <?php if(session('position')=='Admin'):?>
                    <li>
                        <a href="/salio"
                            class="flex items-center p-2 text-base font-medium text-white rounded-lg dark:text-white hover:bg-yellow-400 dark:hover:bg-gray-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-scale"><path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="M7 21h10"/><path d="M12 3v18"/><path d="M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2"/></svg>
                            <span class="flex-1 ml-3 whitespace-nowrap text-white">Monthly Balance</span>
                        </a>
                    </li>
                    
                    <li>
                
              
                        <a href="/maintanance"
                            class="flex items-center p-2 text-base font-medium text-white rounded-lg transition duration-75 hover:bg-yellow-400 dark:hover:bg-gray-700 dark:text-white group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                            <span class="ml-3 text-white">Maintenance</span>
                        </a>
                    </li>
                    
                    <?php endif ?>
            </div>
          
    </div>
    <div class="hidden p-4 rounded-lg  dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
      <ul>
        <li>
        <a href="/orders/todayorders"
                            class="flex items-center p-2 text-base font-medium text-white rounded-lg dark:text-white hover:bg-yellow-400 dark:hover:bg-gray-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sticky-note"><path d="M15.5 3H5a2 2 0 0 0-2 2v14c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2V8.5L15.5 3Z"/><path d="M15 3v6h6"/></svg>
                            <span class="ml-3 text-white">Today Orders</span>
                        </a>
        </li>
        
        <li>
        <a href="/orders/searchorders"
                            class="flex items-center p-2 text-base font-medium text-white rounded-lg dark:text-white hover:bg-yellow-400 dark:hover:bg-gray-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sticky-note"><path d="M15.5 3H5a2 2 0 0 0-2 2v14c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2V8.5L15.5 3Z"/><path d="M15 3v6h6"/></svg>
                            <span class="ml-3 text-white">Search Orders</span>
                        </a>
     
        </li>
      </ul>
    </div>

</div>



                
        </aside>
