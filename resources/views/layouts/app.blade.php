<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>

    @include('includes.style')
    @stack('after-style')
    
  </head>
  <body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen }"
    >
      @include('sweetalert::alert')
      @include('includes.sidebar')

      <div class="flex flex-col flex-1 w-full">
        @include('includes.navbar')
        @yield('content')
      </div>

    </div>

    @stack('before-script')
    @include('includes.script')
    @stack('after-script')
  </body>
</html>
