<div>
     <!-- Sidebar -->
      <div class="fixed left-0 z-10 flex flex-col h-full text-white transition-all duration-300 bg-blue-900 border-none top-14 w-14 hover:w-64 md:w-64 dark:bg-gray-900 sidebar">
        <div class="flex flex-col justify-between flex-grow overflow-x-hidden overflow-y-auto">
          <ul class="flex flex-col py-4 space-y-1">
            <li class="hidden px-5 md:block">
              <div class="flex flex-row items-center h-8">
                <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Main</div>
              </div>
            </li>
            <li>
              <a href="/" class="relative flex flex-row items-center pr-6 border-l-4 border-transparent h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 hover:border-blue-500 dark:hover:border-gray-800">
                <span class="inline-flex items-center justify-center ml-4">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
              </a>
            </li>
            <li>
              <a href="{{ route('pos') }}" class="relative flex flex-row items-center pr-6 border-l-4 border-transparent h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 hover:border-blue-500 dark:hover:border-gray-800">
                <span class="inline-flex items-center justify-center ml-4">
                 <i class="fas fa-box-open"></i>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Place Order</span>
                <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-500 bg-indigo-50 rounded-full">New</span>
              </a>
            </li>
            <li>
              <a href="{{ route('cashier') }}" class="relative flex flex-row items-center pr-6 border-l-4 border-transparent h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 hover:border-blue-500 dark:hover:border-gray-800">
                <span class="inline-flex items-center justify-center ml-4">
                 <i class="fas fa-cash-register"></i>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Cashier</span>
              </a>
            </li>
            <li class="hidden px-5 md:block">
              <div class="flex flex-row items-center h-8 mt-5">
                <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Tables</div>
              </div>
            </li>
            <li>
              <a href="{{ route('assign-tables') }}" class="relative flex flex-row items-center pr-6 border-l-4 border-transparent h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 hover:border-blue-500 dark:hover:border-gray-800">
                <span class="inline-flex items-center justify-center ml-4">
                 <i class="fas fa-star"></i>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Assign</span>
              </a>
            </li>
            <li class="hidden px-5 md:block">
              <div class="flex flex-row items-center h-8 mt-5">
                <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Sections</div>
              </div>
            </li>
           @forelse ($sections as $item)
                <li>
              <a href="/section/{{ $item->slug }}" class="relative flex flex-row items-center pr-6 border-l-4 border-transparent h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 hover:border-blue-500 dark:hover:border-gray-800">
                <span class="inline-flex items-center justify-center ml-4">
                  <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">{{ Str::upper($item->name) }}</span>
              </a>
            </li>
           @empty
            <li>
              <a href="#" class="relative flex flex-row items-center pr-6 border-l-4 border-transparent h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 hover:border-blue-500 dark:hover:border-gray-800">
                <span class="inline-flex items-center justify-center ml-4">
                  <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">No Registered Sections</span>
              </a>
            </li>
           @endforelse

          </ul>
          <p class="hidden px-5 py-3 text-xs text-center mb-14 md:block">Copyright @2021</p>
        </div>
      </div>
      <!-- ./Sidebar -->

</div>
