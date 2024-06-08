<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ config('app.name') }}</title>
        <link rel="icon" href="favicon.ico"/>
        <link href="{{ asset('build/style.css') }}" rel="stylesheet">
    </head>

    <body x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
        x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
        :class="{'dark text-bodydark bg-boxdark-2': darkMode === true}">
    
        <!-- ===== Preloader Start ===== -->
        <div 
            x-show="loaded" x-init="window.addEventListener('DOMContentLoaded', () => {setTimeout(() => loaded = false, 500)})"
            class="fixed left-0 top-0 z-999999 flex h-screen w-screen items-center justify-center bg-white dark:bg-black">
            <div class="h-16 w-16 animate-spin rounded-full border-4 border-solid border-primary border-t-transparent"></div>
        </div>
        <!-- ===== Preloader End ===== -->

        <!-- ===== Page Wrapper Start ===== -->
        <div class="flex h-screen overflow-hidden">
      <!-- ===== Sidebar Start ===== -->
           @include('_includes.sidebar')

      <!-- ===== Sidebar End ===== -->

      <!-- ===== Content Area Start ===== -->
        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
        <!-- ===== Header Start ===== -->
        <header class="sticky top-0 z-999 flex w-full bg-white drop-shadow-1 dark:bg-boxdark dark:drop-shadow-none">
            @include('_includes.navbar')
        </header>

        <!-- ===== Header End ===== -->

        <!-- ===== Main Content Start ===== -->
        <main>
            <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10"  x-data="{modalOpen: false, userId: null, modalType: ''}">
                <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <h2 class="text-title-md2 font-bold text-black dark:text-white">@yield('title')</h2>

                    @yield('action')
                </div>
                <div class="flex flex-col gap-9">
                    @include('components.alert-success')
                    @include('components.alert-errors')
                    @include('components.alert-warning')

                    @yield('content')
                </div>
            </div>
        </main>
        <!-- ===== Main Content End ===== -->
      </div>
      <!-- ===== Content Area End ===== -->
    </div>
    <!-- ===== Page Wrapper End ===== -->
    <script defer src="{{ asset('build/bundle.js') }}"></script></body>
    @yield('scripts')
</html>
