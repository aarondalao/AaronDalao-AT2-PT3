{{--
    written by: aaron dalao
--}}
<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Welcome to Cars-n-Collectors") }}
        </h2>
    </x-slot>

    
    <div class="flex justify-center items-center h-screen bg-CafeAuLait-50 ">
        <div class="max-w-7xl my-auto mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-md shadow-gray-400 sm:rounded-lg">

                <div class="card-header flex w-full bg-PewterBlue-500 text-stone-100 rounded-md">
                    <h3 class="ml-2 my-1 flex-1 text-2xl">
                        {{ __('Total document count:')  }}
                    </h3>
                </div>

                <div class="flex justify-center align-middle p-6 bg-white border-b border-gray-200">
                    <div class="bg-amber-100 mr-4 rounded w-96 mx-auto rounded-2xl shadow-lg border-emerald-800 border border-1
                    overflow-hidden">
                        <div class="h-48 p-3 overflow-hidden text-stone-500 font-black text-10xl text-center">
                            {{ $cars }}
                        </div>
                        <div class="bg-KhakiWeb-500 text-stone-100 p-3">
                            <p class="text-2xl text-center">
                                Cars
                            </p>
                        </div>
                    </div>

                    <div class="bg-amber-100 mx-2 rounded w-96 mx-auto rounded-2xl shadow-lg border-emerald-800 border border-1
                    overflow-hidden">
                        <div class="h-48 p-3 overflow-hidden text-stone-500 font-black text-10xl text-center">
                            {{ $collectors }}
                        </div>
                        <div class="bg-KhakiWeb-500 text-stone-100 p-3">
                            <p class="text-2xl text-center">
                                Collectors
                            </p>
                        </div>
                    </div>

                    <div class="bg-amber-100 mx-2 rounded w-96 mx-auto rounded-2xl shadow-lg border-emerald-800 border border-1
                    overflow-hidden">
                        <div class="h-48 p-3 overflow-hidden text-stone-500 font-black text-10xl text-center">
                            {{ $users }}
                        </div>
                        <div class="bg-KhakiWeb-500 text-stone-100 p-3">
                            <p class="text-2xl text-center">
                                Users
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

