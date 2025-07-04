<nav  x-data="{ open: false, mobileMenuOpen:false }" class="fixed left-0 top-0  w-full z-50" >
    <div class="relative  text-white">
        <div class="bg-[#2C3E50] text-white flex flex-row items-center flex-nowrap gap-5 p-3 justify-between">
          <a href="/"><img src="/Asset/Logo Tripnesia.png" alt="Logo Tripnesia" class=" h-8"></a>
          <form action="{{ route('search') }}" method="GET" class="flex w-[30%] bg-white rounded-full items-center p-2 mr-5">
                <button type="submit" class="ml-3 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1116.65 16.65z" />
                    </svg>
                </button>

                <input 
                    type="text" 
                    name="search" 
                    id="search"
                    placeholder="Search"
                    class="bg-transparent outline-none w-full placeholder-gray-500 placeholder:text-sm text-left text-black ml-4"
                    autocomplete="off"
                >
            </form>

          
          <div class="hidden md:flex flex-grow md:flex-row gap-4">
              <a href="/" class="flex rounded-md text-center p-2 hover:text-[#7CA4BC] transition-all duration-300  ease-in-out">Home</a>
              <a href="/destination" class="flex rounded-md text-center p-2 hover:text-[#7CA4BC] transition-all duration-300  ease-in-out">Destination</a>
              <a href="/package" class="flex rounded-md text-center p-2 hover:text-[#7CA4BC] transition-all duration-300  ease-in-out">Package</a>
              <a href="/event" class="flex rounded-md text-center p-2 hover:text-[#7CA4BC] transition-all duration-300  ease-in-out">Event</a>
              <a href="/about" class="flex rounded-md text-center p-2 hover:text-[#7CA4BC] transition-all duration-300  ease-in-out">About</a>
          </div>

          @auth
              
          <div class="hidden md:flex md:flex-row">
              <div class=" font-semibold text-white">
                {{ Auth::user()->nama ?? 'User Name' }}
            </div>

              <div class="relative ml-5">
                  <div>
                      <button @click="open = !open" type="button" class="relative flex items-center rounded-full size-8 ring-gray-600">
                          <img src="/storage/Asset/{{ Auth::user()->profilePicture ?? 'profilekosong.jpg' }}" alt="foto profile" class="rounded-full ">
                      </button>

                      <div 
                              x-cloak
                              x-show="open"
                              x-transition
                              @click.outside="open = false"
                              class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50"
                          >
                          <div class="flex items-center px-4 py-1">
                            <div class="shrink-0">
                                <img src="/Storage/Asset/{{ Auth::user()->profilePicture ?? 'profilekosong.jpg' }}" alt="foto profile" class="rounded-full size-8">
                            </div>
                            <div class="ml-3 w-40">
                                <div class="text-base/4 font-medium text-gray-400">{{ Auth::user()->nama ?? 'Guest Account' }}</div>
                                <div class="text-sm font-medium text-gray-400">{{ Auth::user()->email ?? 'guest@gmail.com' }}</div>
                            </div>
                          </div>
                          <a href="{{ route('account.settings') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                          <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Sign out
                            </button>
                        </form>
                      </div>
                  </div>
              </div>
          </div>
          @else
          <a href="/register" class="
            border-2 border-amber-400  text-white font-semibold px-6 py-2 rounded-lg transition-all duration-300  ease-in-out hover:bg-amber-400 hover:text-slate-800">
            Login
        </a>
          
          @endauth

          <div class="md:hidden">
              <div>
                  <button @click="mobileMenuOpen = !mobileMenuOpen"
                  class="relative items-center rounded-md bg-[#2C3E50] p-2 text-white hover:bg-sky-500 hover:text-gray">
                  
                      <svg x-show="!mobileMenuOpen" class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                          stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                      </svg>

                      <svg x-show="mobileMenuOpen" class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                          stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round"
                          d="M6 18L18 6M6 6l12 12" />
                      </svg>
                  </button>
              </div>
          </div>
      </div>
          <div class="w-full md:hidden absolute rounded-1 bg-[#0c4574]" x-show="mobileMenuOpen" x-transition>
              <div class="space-y-1 px-2 pt-2 pb-3">
                <a href="/" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-400 hover:text-white">Home</a>
                <a href="/destination" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-400 hover:text-white">Destination</a>
                <a href="/package" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-400 hover:text-white">Package</a>
                <a href="/event" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-400 hover:text-white">Event</a>
                <a href="/about" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-400 hover:text-white">About</a>
              </div>

              <div class="border-t border-gray-600 pt-4 pb-3">
                <div class="flex items-center px-4">
                    <div class="shrink-0">
                        <img src="/storage/Asset/{{ Auth::user()->profilePicture ?? 'profilekosong.jpg' }}" alt="foto profile" class="rounded-full size-8">
                    </div>
                    <div class="ml-3">
                        <div class="text-base/4 font-medium text-gray-400">{{ Auth::user()->nama ?? 'Guest Account' }}</div>
                        <div class="text-sm font-medium text-gray-400">{{ Auth::user()->email ?? 'guest@gmail.com'  }}</div>
                    </div>
                  <div class="ml-auto flex items-center md:ml-6">
                    <button type="button" class="text-gray-300 hover:text-white">
                        <svg class="size-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"/>
                        </svg>
                    </button>
                  </div>
                </div>
              </div>

              <div class="space-y-1 mt-4 mb-3">
                <a href="#" class="block px-4 py-2 text-sm text-white hover:bg-gray-100">Settings</a>
                <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                          Sign out
                      </button>
                </form>
              </div>


          </div>
      </div>
    </div> 
    
    
  </nav>