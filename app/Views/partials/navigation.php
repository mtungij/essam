<nav
            class="bg-indigo-900 border-b border-gray-200 px-2 sm:px-4 py-2 dark:bg-gray-800 dark:border-gray-700 fixed left-0 right-0 top-0 z-50">
            <?php $avatar = session('profile_picture') ? '/uploads/profiles/' . session('profile_picture') : '/image/user.png'; ?>
            <div class="flex flex-nowrap justify-between items-center gap-2">
                <div class="flex justify-start items-center min-w-0">
                    <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation"
                        aria-controls="drawer-navigation"
                        class="p-2 mr-1 sm:mr-2 text-white rounded-lg cursor-pointer md:hidden hover:bg-indigo-800 focus:bg-indigo-800 focus:ring-2 focus:ring-indigo-300">
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg aria-hidden="true" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Toggle sidebar</span>
                    </button>
                    <a href="/" class="flex items-center gap-2 sm:gap-3 min-w-0">
                        <img class="w-8 h-8 sm:w-10 sm:h-10 rounded-md shrink-0" src="/image/logo.jpg" alt="Flowbite Logo" />
                        <span class="self-center text-base sm:text-lg md:text-xl font-bold whitespace-nowrap text-white">ESSAM</span>
                        <span class="hidden lg:inline self-center text-lg font-bold whitespace-nowrap text-white">DIGITAL CREATIVES</span>
                    </a>
                </div>
                <div class="flex items-center lg:order-2 shrink-0">
                    <button id="install-pwa-btn" type="button"
                        class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-xs sm:text-sm px-3 py-2 mr-2">
                        Install App
                    </button>

                    <a href="/logout" type="button" data-dropdown-toggle="apps-dropdown"
                        class="p-2 text-white rounded-lg hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300">
                        <span class="sr-only">View notifications</span>
                        <!-- Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
                    </a>
                  
                    <button type="button"
                        class="flex ml-2 sm:mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-indigo-300"
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full"
                            src="<?= esc($avatar) ?>"
                            alt="user photo" />
                    </button>
                    <!-- Dropdown menu -->
                    <div class="hidden z-50 my-4 w-64 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 rounded-xl"
                        id="dropdown">
                        <div class="py-3 px-4">
                            <span class="block text-sm font-semibold text-gray-700 dark:text-white">Welcome, <?= esc(session('name')) ?>!</span>
                        </div>
                        <ul class="py-1 text-gray-700 font-semibold dark:text-gray-300" aria-labelledby="dropdown">
                            <li>
                                <a href="/profile/picture" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Upload Profile Picture</a>
                            </li>
                            <li>
                                <a href="/profile/password" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Change Password</a>
                            </li>
                            <li>
                                <a href="/logout" class="block py-2 px-4 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600">Logout</a>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </nav>