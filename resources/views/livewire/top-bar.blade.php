<div>
    <!-- Header -->
      <div class="fixed z-10 flex items-center justify-between w-full text-white h-14">
        <div class="flex items-center justify-start pl-3 bg-blue-800 border-none md:justify-center w-14 md:w-64 h-14 dark:bg-gray-800">
          <span class="hidden md:block">{{ Auth::user()->name }}</span>
        </div>
        <div class="flex items-center justify-between bg-blue-800 h-14 dark:bg-gray-800 header-right">
          <div class="flex items-center w-full max-w-xl p-2 mr-4 bg-white border border-gray-200 rounded shadow-sm">
            <button class="outline-none focus:outline-none">
              <svg class="w-5 h-5 text-gray-600 cursor-pointer" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </button>
            <form wire:submit.prevent="searchOrder">
            <input wire:model="term" type="search" placeholder="Search" class="w-full pl-3 text-sm text-black bg-transparent outline-none focus:outline-none" />
            </form>
            @if ($term_results)
                      <div  class="absolute z-20 mt-2 overflow-hidden bg-white rounded-md shadow-lg left-70 top-10" style="width:20rem;">
                        <div class="py-2">
                                 <a href="/order/{{ $term_results->id }}" class="flex items-center px-4 py-3 -mx-2 border-b hover:bg-gray-100">
                                    <p class="mx-2 text-sm text-gray-600">
                                        <span class="font-bold">
                                            Order {{ $term_results->id }}
                                        </span>
                                    </p>
                                </a>
                        </div>
                    </div>
            @endif
          </div>
          <ul wire:poll class="flex items-center">
            <li>
                 <div x-data="{ dropdownOpen: false }" class="relative my-32">
                    <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 flex block p-3 mx-2 bg-white rounded-full focus:outline-none">
                        @if (count($notifications))
                            <p class="font-bold text-indigo-600 ">{{ count($notifications) }}</p>
                        @endif
                        <svg class="w-5 h-5 text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                        </svg>
                    </button>

                    <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 z-10 w-full h-full"></div>

                    <div x-show="dropdownOpen" class="absolute right-0 z-20 mt-2 overflow-hidden bg-white rounded-md shadow-lg" style="width:20rem;">
                        <div class="py-2">
                            @forelse ($notifications as $notification)
                            <form wire:submit.prevent="clearNotification({{ $notification->id }})" class="pt-3">
                                <button type="submit"
                                    class="flex items-center px-4 py-3 -mx-2 border-b hover:bg-gray-100">
                                    <p class="mx-2 text-sm text-gray-600">{{ $loop->iteration }}</p>
                                    <p class="mx-2 text-sm text-gray-600">
                                        <span class="font-bold">
                                            {{ $notification->message }}
                                        </span>
                                    </p>
                                </button>
                                </form>
                            @empty
                                 <a href="#" class="flex items-center px-4 py-3 -mx-2 border-b hover:bg-gray-100">
                                    <p class="mx-2 text-sm text-gray-600">
                                        <span class="font-bold">
                                            No New Notifications
                                        </span>
                                    </p>
                                </a>
                            @endforelse

                        </div>
                        <a href="#" class="block py-2 font-bold text-center text-white bg-gray-800">My Order Notifications</a>
                    </div>
                </div>
            </li>
            <li>
              <button wire:ignore
                aria-hidden="true"
                @click="toggleTheme"
                class="p-2 text-gray-900 transition-colors duration-200 bg-blue-200 rounded-full shadow-md group hover:bg-blue-200 dark:bg-gray-50 dark:hover:bg-gray-200 focus:outline-none"
              >
                <svg
                  x-show="isDark"
                  width="24"
                  height="24"
                  class="text-gray-700 fill-current group-hover:text-gray-500 group-focus:text-gray-700 dark:text-gray-700 dark:group-hover:text-gray-500 dark:group-focus:text-gray-700"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke=""
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                  />
                </svg>
                <svg
                  x-show="!isDark"
                  width="24"
                  height="24"
                  class="text-gray-700 fill-current group-hover:text-gray-500 group-focus:text-gray-700 dark:text-gray-700 dark:group-hover:text-gray-500 dark:group-focus:text-gray-700"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke=""
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
                  />
                </svg>
              </button>
            </li>
            <li>
              <div class="block w-px h-6 mx-3 bg-gray-400 dark:bg-gray-700"></div>
            </li>
            <li>
              <a href="/logout" class="flex items-center mr-4 hover:text-blue-100">
                <span class="inline-flex mr-1">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                </span>
                Logout
              </a>
            </li>
          </ul>
        </div>
      </div>
      <!-- ./Header -->

</div>
