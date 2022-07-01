<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="flex-1 font-semibold mt-2 pt-2 text-2xl text-gray-200 leading-tight">
                {{ __('Collectors') }}
            </h2>

            <div class=" pt-2 mr-6 mt-2">
                <a href="{{ route('collectors.create') }}"
                   class="flex-0 rounded text-stone-100 bg-RosyBrown-500 p-2 mx-2">
                    {{ __("Add Collector") }}
                </a>
            </div>

            <div>
                <form method="get" action="{{ route('collectors.index')}}">
                    <div class="relative">
                        <svg class="absolute z-20 cursor-pointer top-[18px] left-4" width="16" height="16"
                             viewBox="0 0 16 16"
                             fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.2716 13.1684L11.3313 10.2281C12.0391 9.28574 12.4213 8.13865 12.42 6.96C12.42 3.94938 9.97063 1.5 6.96 1.5C3.94938 1.5 1.5 3.94938 1.5 6.96C1.5 9.97063 3.94938 12.42 6.96 12.42C8.13865 12.4213 9.28574 12.0391 10.2281 11.3313L13.1684 14.2716C13.3173 14.4046 13.5114 14.4756 13.711 14.47C13.9105 14.4645 14.1004 14.3827 14.2415 14.2415C14.3827 14.1004 14.4645 13.9105 14.47 13.711C14.4756 13.5114 14.4046 13.3173 14.2716 13.1684ZM3.06 6.96C3.06 6.18865 3.28873 5.43463 3.71727 4.79328C4.14581 4.15192 4.7549 3.65205 5.46754 3.35687C6.18017 3.06169 6.96433 2.98446 7.72085 3.13494C8.47738 3.28542 9.17229 3.65686 9.71772 4.20228C10.2631 4.74771 10.6346 5.44262 10.7851 6.19915C10.9355 6.95567 10.8583 7.73983 10.5631 8.45247C10.268 9.1651 9.76808 9.77419 9.12673 10.2027C8.48537 10.6313 7.73135 10.86 6.96 10.86C5.92604 10.8588 4.93478 10.4475 4.20365 9.71635C3.47253 8.98522 3.06124 7.99396 3.06 6.96Z"
                                fill="#4B5563"/>
                        </svg>


                        <p onclick="eraseText();"
                           class="absolute z-20 text-xs font-medium leading-3 text-gray-600 underline right-4 top-[18px] cursor-pointer">
                            Clear</p>
                        <input id="output"
                               class="relative text-sm leading-none text-gray-600 bg-white rounded lg:max-w-[452px] w-full px-10 py-4 outline-none"
                               type="text" name="search" placeholder="Search for..." value="{{$searchFor??''}}">
                    </div>
                </form>
            </div>
        </div>
    </x-slot>

    {{--
     session messages
    --}}

    @if($message = Session::get('success'))
        <div
            class="errorBlock bg-teal-100 max-w-6xl border-t-4 border-teal-500 rounded-b text-teal-900 mx-auto px-4 py-3
            my-3 shadow-md"
            role="alert">
            <div class="errorBlock__wrapper flex">
                <div class="errorBlock__messageBlock max-w-2xl mx-auto p-2">
                    <i class="errorBlock__animatedIcon fa-solid fa-circle-info ml-5 pl-5 animate-bounce inline-block float-right"></i>
                    <p class="errorBlock__messageHeader font-bold">Attention:</p>
                    <p class="errorBlock__message text-sm">{{ $message }}</p>
                </div>
            </div>
        </div>
@endif

<!-- Main Content -->

    <div class="flex justify-center items-center m-10 p-10 rounded-md bg-CafeAuLait-50 h-4/5">
        @if(count($collectors??[])>0)
            <table
                class="table bg-amber-100 w-11/12 rounded-md overflow-hidden border border-amber-800 min-w-lg max-w-6xl mx-auto my-8 px-8 py-8">
                <thead class="bg-PewterBlue-500 text-amber-50">
                <tr class=" gap-2 ">
                    <th class="text-left py-2 px-2 mx-2">#</th>
                    <th class="text-left py-2 px-2 mx-2">{{ __('Given Name') }}</th>
                    <th class="text-left py-2 px-2 mx-2">{{ __('Family Name') }}</th>
                    <th class="text-left py-2 px-2 mx-2">{{ __('Cars Owned') }}</th>
                    <th class="text-right py-2 pr-4 mx-2">{{ __('Actions') }}</th>
                </tr>
                </thead>
                <tbody class="">
                @foreach ($collectors as $key=>$collector)
                    <tr class="gap-2 border border-stone-500
                       hover:bg-stone-200 hover:border-b-1 hover:border-stone-500
                       transition ease-in-out">
                        <td class="px-2 py-1">{{ $key+1 }}</td>
                        <td class="max-w-4/12 w-4/12 text-left px-2 py-1 text-ellipsis
                overflow-hidden">
                            {{ Str::of($collector->given_name)->limit(24) }}
                        </td>
                        <td class="max-w-4/12 w-4/12 text-left px-2 py-1 text-ellipsis overflow-hidden">
                            {{ Str::of($collector->family_name)->limit(24) }}
                        </td>
                        <td class="w-2/12 text-left px-2 py-1"> {{ count($collector->cars??[])  }}</td>
                        <td class="px-2 py-1">
                            <div class="flex justify-end gap-1">

                                <a href="{{ route('collectors.show', $collector->id) }}"
                                   class="mainContent__showButton transition ease-in-out delay-100 hover:-translate-y-1
                             hover:scale-110 hover:bg-blue-700 hover:shadow-inner duration-300 rounded bg-KhakiWeb-600 text-white m-1 p-1">
                                    {{ __('View') }}
                                </a>

                                <a href="{{ route('collectors.edit', $collector->id) }}"
                                   class="mainContent__editButton transition ease-in-out delay-100 hover:-translate-y-1
                             hover:scale-110 hover:bg-orange-700 duration-300 rounded bg-BlueSapphire-300 text-white m-1 p-1">
                                    {{ __('Edit') }}
                                </a>


                                <a href="{{ route('collectors.delete', $collector->id) }}"
                                   class="mainContent__deleteButton transition ease-in-out delay-100 hover:-translate-y-1
                             hover:scale-110 hover:bg-red-700 duration-300 rounded bg-CafeAuLait-300 text-white m-1 p-1">
                                    {{ __('Delete') }}
                                </a>

                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="5" class="p-2">
                        {{ $collectors->links() }}
                    </td>
                </tr>
                </tfoot>
            </table>
        @else
            <p>No collectors found</p>
        @endif
    </div>

    <script>
        function eraseText() {
            document.getElementById("output").value = "";
        }
    </script>

</x-app-layout>
