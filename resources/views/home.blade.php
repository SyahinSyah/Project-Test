<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Home Page</title>
</head>
<body>
    <div>
        <div class="flex h-screen overflow-y-hidden bg-white" x-data="setup()" x-init="$refs.loading.classList.add('hidden')">
          <!-- Loading screen -->
          <div
            x-ref="loading"
            class="fixed inset-0 z-50 flex items-center justify-center text-white bg-black bg-opacity-50"
            style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
          >
            Loading.....
          </div>
    
          <!-- Sidebar backdrop -->
          <div
            x-show.in.out.opacity="isSidebarOpen"
            class="fixed inset-0 z-10 bg-black bg-opacity-20 lg:hidden"
            style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
          ></div>
    
          <!-- Sidebar -->
          <aside
            x-transition:enter="transition transform duration-300"
            x-transition:enter-start="-translate-x-full opacity-30  ease-in"
            x-transition:enter-end="translate-x-0 opacity-100 ease-out"
            x-transition:leave="transition transform duration-300"
            x-transition:leave-start="translate-x-0 opacity-100 ease-out"
            x-transition:leave-end="-translate-x-full opacity-0 ease-in"
            class="fixed inset-y-0 z-10 flex flex-col flex-shrink-0 w-64 max-h-screen overflow-hidden transition-all transform bg-white border-r shadow-lg lg:z-auto lg:static lg:shadow-none"
            :class="{'-translate-x-full lg:translate-x-0 lg:w-20': !isSidebarOpen}"
          >
            <!-- sidebar header -->
            <div class="flex items-center justify-between flex-shrink-0 p-2" :class="{'lg:justify-center': !isSidebarOpen}">
              <span class="p-2 text-xl font-semibold leading-8 tracking-wider uppercase whitespace-nowrap">
                C<span :class="{'lg:hidden': !isSidebarOpen}">MS</span>
              </span>
              <button @click="toggleSidbarMenu()" class="p-2 rounded-md lg:hidden">
                <svg
                  class="w-6 h-6 text-gray-600"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
            <!-- Sidebar links -->
            <nav class="flex-1 overflow-hidden hover:overflow-y-auto">
              <ul class="p-2 overflow-hidden">
                <li>
                  <a
                    href="/home"
                    class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
                    :class="{'justify-center': !isSidebarOpen}"
                  >
                    <span>
                      <svg
                        class="w-6 h-6 text-gray-400"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                      <path fill="none" d="M10.001,9.658c-2.567,0-4.66-2.089-4.66-4.659c0-2.567,2.092-4.657,4.66-4.657s4.657,2.09,4.657,4.657
                      C14.658,7.569,12.569,9.658,10.001,9.658z M10.001,1.8c-1.765,0-3.202,1.437-3.202,3.2c0,1.766,1.437,3.202,3.202,3.202
                      c1.765,0,3.199-1.436,3.199-3.202C13.201,3.236,11.766,1.8,10.001,1.8z"></path>
                      <path fill="none" d="M9.939,19.658c-0.091,0-0.179-0.017-0.268-0.051l-7.09-2.803c-0.276-0.108-0.461-0.379-0.461-0.678
                      c0-4.343,3.535-7.876,7.881-7.876c4.343,0,7.878,3.533,7.878,7.876c0,0.302-0.182,0.572-0.464,0.68l-7.213,2.801
                      C10.118,19.64,10.03,19.658,9.939,19.658z M3.597,15.639l6.344,2.507l6.464-2.512c-0.253-3.312-3.029-5.927-6.404-5.927
                      C6.623,9.707,3.848,12.326,3.597,15.639z"></path>
                      <path fill="none" d="M9.939,19.658c0,0-0.003,0-0.006,0c-0.347-0.003-0.646-0.253-0.709-0.596L7.462,9.567
                      C7.389,9.172,7.65,8.79,8.046,8.718C8.442,8.643,8.82,8.906,8.894,9.301l1.076,5.796l1.158-5.741
                      c0.08-0.394,0.461-0.655,0.86-0.569c0.396,0.08,0.649,0.464,0.569,0.859l-1.904,9.427C10.585,19.413,10.286,19.658,9.939,19.658z"></path>
                      </svg>
                    </span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }">Employee</span>
                  </a>
                </li>
                <li>
                    <a
                    href="/company"
                    class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
                    :class="{'justify-center': !isSidebarOpen}"
                    >
                    <span>
                        <svg
                          class="w-6 h-6 text-gray-400"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                        <path d="M8.627,7.885C8.499,8.388,7.873,8.101,8.13,8.177L4.12,7.143c-0.218-0.057-0.351-0.28-0.293-0.498c0.057-0.218,0.279-0.351,0.497-0.294l4.011,1.037C8.552,7.444,8.685,7.667,8.627,7.885 M8.334,10.123L4.323,9.086C4.105,9.031,3.883,9.162,3.826,9.38C3.769,9.598,3.901,9.82,4.12,9.877l4.01,1.037c-0.262-0.062,0.373,0.192,0.497-0.294C8.685,10.401,8.552,10.18,8.334,10.123 M7.131,12.507L4.323,11.78c-0.218-0.057-0.44,0.076-0.497,0.295c-0.057,0.218,0.075,0.439,0.293,0.495l2.809,0.726c-0.265-0.062,0.37,0.193,0.495-0.293C7.48,12.784,7.35,12.562,7.131,12.507M18.159,3.677v10.701c0,0.186-0.126,0.348-0.306,0.393l-7.755,1.948c-0.07,0.016-0.134,0.016-0.204,0l-7.748-1.948c-0.179-0.045-0.306-0.207-0.306-0.393V3.677c0-0.267,0.249-0.461,0.509-0.396l7.646,1.921l7.654-1.921C17.91,3.216,18.159,3.41,18.159,3.677 M9.589,5.939L2.656,4.203v9.857l6.933,1.737V5.939z M17.344,4.203l-6.939,1.736v9.859l6.939-1.737V4.203z M16.168,6.645c-0.058-0.218-0.279-0.351-0.498-0.294l-4.011,1.037c-0.218,0.057-0.351,0.28-0.293,0.498c0.128,0.503,0.755,0.216,0.498,0.292l4.009-1.034C16.092,7.085,16.225,6.863,16.168,6.645 M16.168,9.38c-0.058-0.218-0.279-0.349-0.498-0.294l-4.011,1.036c-0.218,0.057-0.351,0.279-0.293,0.498c0.124,0.486,0.759,0.232,0.498,0.294l4.009-1.037C16.092,9.82,16.225,9.598,16.168,9.38 M14.963,12.385c-0.055-0.219-0.276-0.35-0.495-0.294l-2.809,0.726c-0.218,0.056-0.351,0.279-0.293,0.496c0.127,0.506,0.755,0.218,0.498,0.293l2.807-0.723C14.89,12.825,15.021,12.603,14.963,12.385"></path>
                        </svg>
                      </span>
                      <span :class="{ 'lg:hidden': !isSidebarOpen }">Company</span>
                    </a>
                </li>
                <!-- Sidebar Links... -->
              </ul>
            </nav>
            <!-- Sidebar footer -->
            <div class="flex-shrink-0 p-2 border-t max-h-14">
             <form action="logout" method="POST">
              @csrf
              <button type="submit"
                class="flex items-center justify-center w-full px-4 py-2 space-x-1 font-medium tracking-wider uppercase bg-gray-100 border rounded-md focus:outline-none focus:ring"
              >
                <span>
                  <svg
                    class="w-6 h-6"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                    />
                  </svg>
                </span>
                <span :class="{'lg:hidden': !isSidebarOpen}"> Logout </span>
              </button>
            </form>
            </div>
          </aside>
    
          <div class="flex flex-col flex-1 h-full overflow-hidden">
            <!-- Navbar -->
            <header class="flex-shrink-0 border-b">
              <div class="flex items-center justify-between p-2">
                <!-- Navbar left -->
                <div class="flex items-center space-x-3">
                  <span class="p-2 text-xl font-semibold tracking-wider uppercase lg:hidden">K-WD</span>
                  <!-- Toggle sidebar button -->
                  <button @click="toggleSidbarMenu()" class="p-2 rounded-md focus:outline-none focus:ring">
                    <svg
                      class="w-4 h-4 text-gray-600"
                      :class="{'transform transition-transform -rotate-180': isSidebarOpen}"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                    </svg>
                  </button>
                </div>
    
                <!-- Mobile search box -->
                <div
                  x-show.transition="isSearchBoxOpen"
                  class="fixed inset-0 z-10 bg-black bg-opacity-20"
                  style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
                >
                  <div
                    @click.away="isSearchBoxOpen = false"
                    class="absolute inset-x-0 flex items-center justify-between p-2 bg-white shadow-md"
                  >
                    <div class="flex items-center flex-1 px-2 space-x-2">
                      <!-- search icon -->
                      <span>
                        <svg
                          class="w-6 h-6 text-gray-500"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                          />
                        </svg>
                      </span>
                      <input
                        type="text"
                        placeholder="Search"
                        class="w-full px-4 py-3 text-gray-600 rounded-md focus:bg-gray-100 focus:outline-none"
                      />
                    </div>
                    <!-- close button -->
                    <button @click="isSearchBoxOpen = false" class="flex-shrink-0 p-4 rounded-md">
                      <svg
                        class="w-4 h-4 text-gray-500"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                      </svg>
                    </button>
                  </div>
                </div>
    
                <!-- Desktop search box -->
                <div class="items-center hidden px-2 space-x-2 md:flex-1 md:flex md:mr-auto md:ml-5">
                  <!-- search icon -->
                  <span>
                    <svg
                      class="w-5 h-5 text-gray-500"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                      />
                    </svg>
                  </span>
                  <input
                    type="text"
                    placeholder="Search"
                    class="px-4 py-3 rounded-md hover:bg-gray-100 lg:max-w-sm md:py-2 md:flex-1 focus:outline-none md:focus:bg-gray-100 md:focus:shadow md:focus:border"
                  />
                </div>
    
                <!-- Navbar right -->
                <div class="relative flex items-center space-x-3">
                  <!-- Search button -->
                  <button
                    @click="isSearchBoxOpen = true"
                    class="p-2 bg-gray-100 rounded-full md:hidden focus:outline-none focus:ring hover:bg-gray-200"
                  >
                    <svg
                      class="w-6 h-6 text-gray-500"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                      />
                    </svg>
                  </button>
    
                  <div class="items-center hidden space-x-3 md:flex">
                    <!-- Notification Button -->
                    <div class="relative" x-data="{ isOpen: false }">
                      <!-- red dot -->
                      <div class="absolute right-0 p-1 bg-red-400 rounded-full animate-ping"></div>
                      <div class="absolute right-0 p-1 bg-red-400 border rounded-full"></div>
                      <button
                        @click="isOpen = !isOpen"
                        class="p-2 bg-gray-100 rounded-full hover:bg-gray-200 focus:outline-none focus:ring"
                      >
                        <svg
                          class="w-6 h-6 text-gray-500"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                          />
                        </svg>
                      </button>
    
                      <!-- Dropdown card -->
                      <div
                        @click.away="isOpen = false"
                        x-show.transition.opacity="isOpen"
                        class="absolute w-48 max-w-md mt-3 transform bg-white rounded-md shadow-lg -translate-x-3/4 min-w-max"
                      >
                        <div class="p-4 font-medium border-b">
                          <span class="text-gray-800">Notification</span>
                        </div>
                        <ul class="flex flex-col p-2 my-2 space-y-1">
                          <li>
                            <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Link</a>
                          </li>
                          <li>
                            <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Another Link</a>
                          </li>
                        </ul>
                        <div class="flex items-center justify-center p-4 text-blue-700 underline border-t">
                          <a href="#">See All</a>
                        </div>
                      </div>
                    </div>
    
                    <!-- Services Button -->
                    <div x-data="{ isOpen: false }">
                      <button
                        @click="isOpen = !isOpen"
                        class="p-2 bg-gray-100 rounded-full hover:bg-gray-200 focus:outline-none focus:ring"
                      >
                        <svg
                          class="w-6 h-6 text-gray-500"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                          />
                        </svg>
                      </button>
    
                      <!-- Dropdown -->
                      <div
                        @click.away="isOpen = false"
                        @keydown.escape="isOpen = false"
                        x-show.transition.opacity="isOpen"
                        class="absolute mt-3 transform bg-white rounded-md shadow-lg -translate-x-3/4 min-w-max"
                      >
                        <div class="p-4 text-lg font-medium border-b">Web apps & services</div>
                        <ul class="flex flex-col p-2 my-3 space-y-3">
                          <li>
                            <a href="#" class="flex items-start px-2 py-1 space-x-2 rounded-md hover:bg-gray-100">
                              <span class="block mt-1">
                                <svg
                                  class="w-6 h-6 text-gray-500"
                                  xmlns="http://www.w3.org/2000/svg"
                                  fill="none"
                                  viewBox="0 0 24 24"
                                  stroke="currentColor"
                                >
                                  <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                  <path
                                    fill="#fff"
                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
                                  />
                                  <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"
                                  />
                                </svg>
                              </span>
                              <span class="flex flex-col">
                                <span class="text-lg">Atlassian</span>
                                <span class="text-sm text-gray-400">Lorem ipsum dolor sit.</span>
                              </span>
                            </a>
                          </li>
                          <li>
                            <a href="#" class="flex items-start px-2 py-1 space-x-2 rounded-md hover:bg-gray-100">
                              <span class="block mt-1">
                                <svg
                                  class="w-6 h-6 text-gray-500"
                                  xmlns="http://www.w3.org/2000/svg"
                                  fill="none"
                                  viewBox="0 0 24 24"
                                  stroke="currentColor"
                                >
                                  <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
                                  />
                                </svg>
                              </span>
                              <span class="flex flex-col">
                                <span class="text-lg">Slack</span>
                                <span class="text-sm text-gray-400"
                                  >Lorem ipsum, dolor sit amet consectetur adipisicing elit.</span
                                >
                              </span>
                            </a>
                          </li>
                        </ul>
                        <div class="flex items-center justify-center p-4 text-blue-700 underline border-t">
                          <a href="#">Show all apps</a>
                        </div>
                      </div>
                    </div>
    
                    <!-- Options Button -->
                    <div class="relative" x-data="{ isOpen: false }">
                      <button
                        @click="isOpen = !isOpen"
                        class="p-2 bg-gray-100 rounded-full hover:bg-gray-200 focus:outline-none focus:ring"
                      >
                        <svg
                          class="w-6 h-6 text-gray-500"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"
                          />
                        </svg>
                      </button>
    
                      <!-- Dropdown card -->
                      <div
                        @click.away="isOpen = false"
                        x-show.transition.opacity="isOpen"
                        class="absolute w-40 max-w-sm mt-3 transform bg-white rounded-md shadow-lg -translate-x-3/4 min-w-max"
                      >
                        <div class="p-4 font-medium border-b">
                          <span class="text-gray-800">Options</span>
                        </div>
                        <ul class="flex flex-col p-2 my-2 space-y-1">
                          <li>
                            <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Link</a>
                          </li>
                          <li>
                            <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Another Link</a>
                          </li>
                        </ul>
                        <div class="flex items-center justify-center p-4 text-blue-700 underline border-t">
                          <a href="#">See All</a>
                        </div>
                      </div>
                    </div>
                  </div>
    
                  <!-- avatar button -->
                  <div class="relative" x-data="{ isOpen: false }">
                    <button @click="isOpen = !isOpen" class="p-1 bg-gray-200 rounded-full focus:outline-none focus:ring">
                      <img
                        class="object-cover w-8 h-8 rounded-full"
                        src="https://avatars0.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
                        alt="Ahmed Kamel"
                      />
                    </button>
                    <!-- green dot -->
                    <div class="absolute right-0 p-1 bg-green-400 rounded-full bottom-3 animate-ping"></div>
                    <div class="absolute right-0 p-1 bg-green-400 border border-white rounded-full bottom-3"></div>
    
                    <!-- Dropdown card -->
                    <div
                      @click.away="isOpen = false"
                      x-show.transition.opacity="isOpen"
                      class="absolute mt-3 transform -translate-x-full bg-white rounded-md shadow-lg min-w-max"
                    >
                      <div class="flex flex-col p-4 space-y-1 font-medium border-b">
                        <span class="text-gray-800">{{$user->name}}</span>
                        <span class="text-sm text-gray-400">{{$user->email}}</span>
                      </div>
                      <ul class="flex flex-col p-2 my-2 space-y-1">
                        <li>
                          <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Link</a>
                        </li>
                        <li>
                          <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Another Link</a>
                        </li>
                      </ul>
                      <div class="flex items-center justify-center p-4 text-blue-700 underline border-t">
                        <form action="logout" method="POST">
                          @csrf
                        <button type="submit">Logout</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </header>
            <!-- Main content -->
            <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
              <!-- Main content header -->
              <div
                class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row"
              >
                <h1 class="text-2xl font-semibold whitespace-nowrap">Example Company</h1>
                {{-- <div class="space-y-6 md:space-x-2 md:space-y-0">
                  <a
                  href="https://github.com/Kamona-WD/starter-dashboard-layout"
                  target="_blank"
                  class="inline-flex items-center justify-center px-4 py-1 space-x-1 bg-gray-200 rounded-md shadow hover:bg-opacity-20"
                >
                  <span>
                    <svg class="w-4 h-4 text-gray-500" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                      <path
                        fill-rule="evenodd"
                        d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"
                      ></path>
                    </svg>
                  </span>
                  <span>View on Github</span>
                </a>
                <a
                  href="https://kamona-wd.github.io/kwd-dashboard/"
                  target="_blank"
                  class="inline-flex items-center justify-center px-4 py-1 space-x-1 bg-red-500 text-white rounded-md shadow animate-bounce hover:bg-red-600"
                >
                  <span>See Dark & Light version</span>
                </a>
                </div> --}}
              </div>
    
              <!-- Start Content -->
            
              <div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-4">
                {{-- <template x-for="i in 4" :key="i"> --}}
                <template>
                @foreach ($companies as $company)
                  <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
                    <div class="flex items-start justify-between">
                      <div class="flex flex-col space-y-2">
                        <span class="text-gray-400">{{$company->name}}</span>
                        <span class="text-lg font-semibold">{{$company->email}}</span>
                      </div>
                      <div class="flex-shrink-0 w-10 h-10">
                        <img
                          class="w-10 h-10 rounded-md"
                          src="{{ asset('images/'.$company->logo)}}"
                          alt=""
                        />
                      </div>
                    </div>
                    <div>
                      {{-- <span class="inline-block px-2 text-sm text-white bg-green-300 rounded">from</span>
                      <span class="font-mono">2020</span> --}}
                    </div>
                  </div>
                </template>
                @endforeach
              </div>
              
              <!-- Table see (https://tailwindui.com/components/application-ui/lists/tables) -->
              <h1 class="mt-6 text-2xl font-semibold whitespace-nowrap">Employees</h1>
              <div class="flex flex-row-reverse p-2"><a href="/createEmployee" class="bg-green-200 px-10  rounded-md hover:bg-gray-200">Create</a></div>
              <div class="flex flex-col mt-6">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                      <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                          <tr>
                            <th
                              scope="col"
                              class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                            >
                              Name
                            </th>
                            <th
                              scope="col"
                              class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                            >
                              Company
                            </th>
                            <th
                              scope="col"
                              class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                            >
                              Status
                            </th>
                            <th
                              scope="col"
                              class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase"
                            >
                              Phone
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                              <span class="sr-only">Edit</span>
                            </th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                          {{-- <template x-for="i in 10" :key="i"> --}}
                            <template>
                            @foreach ($employees as $employee)
                            <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                              <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                  <div class="flex-shrink-0 w-10 h-10">
                                    <img
                                      class="w-10 h-10 rounded-full"
                                      src="https://avatars0.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
                                      alt=""
                                    />
                                  </div>
                                  <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{$employee->first_name}}</div>
                                    <div class="text-sm text-gray-500">{{$employee->email}}</div>
                                  </div>
                                </div>
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$employee->company->name}}</div>
                                <div class="text-sm text-gray-500">{{$employee->company->email}}</div>
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                  class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full"
                                >
                                  Active
                                </span>
                              </td>
                              <td class="px-6 py-4 text-sm text-center text-gray-500 whitespace-nowrap">{{$employee->phone}}</td>
                              <td class="px-6 py-4 text-sm font-medium text-center whitespace-nowrap">
                                <a href="/home/{{$employee->id}}" class="text-indigo-600 hover:text-indigo-900">Update</a>
                                <form action="/home/{{$employee->id}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="font-bold text-red-600 hover:text-gray-500">Delete</button>
                                </form>
                              </td>
                            </tr>
                          </template>
                          @endforeach
                        </tbody>
                      </table>
                      <div class="p-3"> {{$employees->links()}} </div>
                    </div>
                  </div>
                </div>
              </div>
            </main>
            <!-- Main footer -->
            {{-- <footer class="flex items-center justify-between flex-shrink-0 p-4 border-t max-h-14">
              <div>K-WD &copy; 2020</div>
              <div class="text-sm">
                Made by
                <a
                  class="text-blue-400 underline"
                  href="https://github.com/Kamona-WD"
                  target="_blank"
                  rel="noopener noreferrer"
                  >Ahmed Kamel</a
                >
              </div>
              <div>
                <!-- Github svg -->
                <a
                  href="https://github.com/Kamona-WD/starter-dashboard-layout"
                  target="_blank"
                  class="flex items-center space-x-1"
                >
                  <svg class="w-6 h-6 text-gray-400" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                    <path
                      fill-rule="evenodd"
                      d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"
                    ></path>
                  </svg>
                  <span class="hidden text-sm md:block">View on Github</span>
                </a>
              </div>
            </footer> --}}
          </div>
    
          <!-- Setting panel button -->
          <div>
            <button
              @click="isSettingsPanelOpen = true"
              class="fixed right-0 px-4 py-2 text-sm font-medium text-white uppercase transform rotate-90 translate-x-8 bg-gray-600 top-1/2 rounded-b-md"
            >
              Settings
            </button>
          </div>
    
          <!-- Settings panel -->
          <div
            x-show="isSettingsPanelOpen"
            @click.away="isSettingsPanelOpen = false"
            x-transition:enter="transition transform duration-300"
            x-transition:enter-start="translate-x-full opacity-30  ease-in"
            x-transition:enter-end="translate-x-0 opacity-100 ease-out"
            x-transition:leave="transition transform duration-300"
            x-transition:leave-start="translate-x-0 opacity-100 ease-out"
            x-transition:leave-end="translate-x-full opacity-0 ease-in"
            class="fixed inset-y-0 right-0 flex flex-col bg-white shadow-lg bg-opacity-20 w-80"
            style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
          >
            <div class="flex items-center justify-between flex-shrink-0 p-2">
              <h6 class="p-2 text-lg">Settings</h6>
              <button @click="isSettingsPanelOpen = false" class="p-2 rounded-md focus:outline-none focus:ring">
                <svg
                  class="w-6 h-6 text-gray-600"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
            <div class="flex-1 max-h-full p-4 overflow-hidden hover:overflow-y-scroll">
              <span>Settings Content</span>
              <!-- Settings Panel Content ... -->
            </div>
          </div>
        </div>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
        <script>
          const setup = () => {
            return {
              loading: true,
              isSidebarOpen: false,
              toggleSidbarMenu() {
                this.isSidebarOpen = !this.isSidebarOpen
              },
              isSettingsPanelOpen: false,
              isSearchBoxOpen: false,
            }
          }
        </script>
    </div>
</body>
</html>