@extends('layouts.base')

@section('body')

<main class="bg-gray-100 h-screen overflow-hidden relative">
    <div class="flex items-start justify-between">
        <div class="h-screen hidden lg:flex lg:flex-col shadow-lg relative w-32 bg-blue-800">
            <div class="h-full dark:bg-gray-700">
                <nav>
                    <div class="space-y-0">
                        <a class="w-full text-gray-100 dark:text-white flex flex-col items-center transition-colors duration-200 justify-start hover:bg-blue-900 p-2 @if(Route::currentRouteName() == 'home') bg-blue-900 text-white @else @endif"
                            href="{{route('home')}}">
                            <span class="text-left">
                                <svg class="h-12" fill="currentColor" viewBox="0 0 1792 1792"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1472 992v480q0 26-19 45t-45 19h-384v-384h-256v384h-384q-26 0-45-19t-19-45v-480q0-1 .5-3t.5-3l575-474 575 474q1 2 1 6zm223-69l-62 74q-8 9-21 11h-3q-13 0-21-7l-692-577-692 577q-12 8-24 7-13-2-21-11l-62-74q-8-10-7-23.5t11-21.5l719-599q32-26 76-26t76 26l244 204v-195q0-14 9-23t23-9h192q14 0 23 9t9 23v408l219 182q10 8 11 21.5t-7 23.5z">
                                    </path>
                                </svg>
                            </span>
                            <span class="mx-2 text-sm font-normal">
                                @lang("Dashboard")
                            </span>
                        </a>
                        @role("admin|sale|super-admin")
                        <a class="w-full text-gray-100 dark:text-white flex flex-col items-center transition-colors duration-200 justify-start hover:bg-blue-900 p-2 @if(Route::currentRouteName() == 'sales.index') bg-blue-900 text-white @else @endif"
                            href="{{route('sales.index')}}">
                            <span class="text-left">
                                <x-icon name="currency-bangladeshi" class="h-12"></x-icon>
                            </span>
                            <span class="mx-2 text-sm font-normal">
                                @lang("Sales")
                            </span>
                        </a>
                        @endrole
                        @role("admin|invoice|super-admin")
                        <a class="w-full text-gray-100 dark:text-white flex flex-col items-center transition-colors duration-200 justify-start hover:bg-blue-900 p-2 @if(Route::currentRouteName() == 'invoices.index') bg-blue-900 text-white @else @endif"
                            href="{{route('invoices.index')}}">
                            <span class="text-left">
                                <x-icon name="cash" class="h-12"></x-icon>
                            </span>
                            <span class="mx-2 text-sm font-normal">
                                @lang("Invoices")
                            </span>
                        </a>
                        @endrole
                        @role("warehouse|admin|super-admin")
                        <a class="w-full text-gray-100 dark:text-white flex flex-col items-center transition-colors duration-200 justify-start hover:bg-blue-900 p-2 @if(Route::currentRouteName() == 'stocks.index') bg-blue-900 text-white @else @endif"
                            href="{{route('stocks.index')}}">
                            <span class="text-left">
                                <x-icon name="view-grid" class="h-12"></x-icon>
                            </span>
                            <span class="mx-2 text-sm font-normal">
                                @lang("Stock")
                            </span>
                        </a>
                        @endrole
                        @role("admin|super-admin")
                        <a class="w-full text-gray-100 dark:text-white flex flex-col items-center transition-colors duration-200 justify-start hover:bg-blue-900 p-2 @if(Route::currentRouteName() == 'customers.index') bg-blue-900 text-white @else @endif"
                            href="{{route('customers.index')}}">
                            <span class="text-left">
                                <x-icon name="user-group" class="h-12"></x-icon>
                            </span>
                            <span class="mx-2 text-sm font-normal">
                                @lang("Customers")
                            </span>
                        </a>
                        @endrole
                        @role("admin|super-admin")
                        <a class="w-full text-gray-100 dark:text-white flex flex-col items-center transition-colors duration-200 justify-start hover:bg-blue-900 p-2 @if(Route::currentRouteName() == 'providers.index') bg-blue-900 text-white @else @endif"
                            href="{{route('providers.index')}}">
                            <span class="text-left">
                                <x-icon name="truck" class="h-12"></x-icon>
                            </span>
                            <span class="mx-2 text-sm font-normal">
                                @lang("Providers")
                            </span>
                        </a>
                        @endrole
                        @role('admin|super-admin')
                        <a class="w-full text-gray-100 dark:text-white flex flex-col items-center transition-colors duration-200 justify-start hover:bg-blue-900 p-2 @if(Route::currentRouteName() == 'team.index') bg-blue-900 text-white @else @endif"
                            href="{{route('team.index')}}">
                            <span class="text-left">
                                <x-icon name="users" class="h-12"></x-icon>
                            </span>
                            <span class="mx-2 text-sm font-normal">
                                @lang("Team")
                            </span>
                        </a>
                        @endrole

                    </div>
                </nav>
            </div>
        </div>
        <div class="flex flex-col w-full md:space-y-4">
            <header class="w-full shadow bg-white items-center h-16 rounded-b-2xl">
                <div class="relative z-20 flex justify-center h-full px-3 mx-auto flex-center">
                    <div class="relative p-1 flex items-center justify-end w-full sm:right-auto">
                        <x-dropdown>
                            <x-slot name="trigger">
                                <div class="flex space-y-2  flex-col">
                                    <div class="flex items-center space-x-2">
                                        <x-icon name="user" class="h-8 w-8" src="{{Auth::user()->avatar}}"></x-icon>
                                        <span class="text-sm font-medium">{{Auth::user()->name}}</span>
                                    </div>
                                </div>
                            </x-slot>

                            <x-dropdown.item icon="user" :label="__('Profile')" :href="route('profile')" />
                            <form action="{{route('logout')}}" method="POST">
                                @method("post")
                                @csrf

                                <x-dropdown.item separator icon="logout" type="submit" :href="route('logout')"
                                    :label="__('Logout')" />
                            </form>
                        </x-dropdown>
                    </div>
                </div>
            </header>
            <div class="overflow-auto h-screen pb-24">
                @yield('content')
                @isset($slot)
                {{ $slot }}
                @endisset
            </div>
        </div>
    </div>
</main>

@endsection