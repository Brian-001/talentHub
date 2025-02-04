<div>
    <div class="grid grid-cols-2 gap-2 mb-4">
        <div class="relative text-sm text-gray-800">
            <div class="absolute pl-2 left-0 top-0 bottom-0 flex items-center pointer-events-none text-gray-500">
                <x-icons.magnifying-glass />
            </div>
            <input id="search" name="search" type="search" wire:model.live.debounce.300ms="search" placeholder="Search..." class="block w-full rounded-lg border-0 py-1.5 md:py-3 
            pl-10 pr-8 text-gray-900 ring-1 ring-inset ring-gray-600 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-slate-600">
        </div>
    </div>

    {{-- table --}}
    <div class="relative">
        @if ($listings->isEmpty())
            <p class="text-gray-600">No employee listings found.</p>
        @else
            <table class="min-w-full table-fixed divide-y divide-gray-300 text-gray-900">
                <thead>
                    <tr>
                        <th class="p-3 text-left text-sm font-semibold text-gray-900">
                            Full Name
                        </th>
                        <th class="p-3 text-left text-sm font-semibold text-gray-900">
                            Phone Number
                        </th>
                        <th class="p-3 text-left text-sm font-semibold text-gray-900">
                            Nationality
                        </th>
                        <th class="p-3 text-left text-sm font-semibold text-gray-900">
                            Job Title
                        </th>
                        <th class="p-3 text-left text-sm font-semibold text-gray-900">
                            Job Qualifications
                        </th>
                        <th class="p-3 text-left text-sm font-semibold text-gray-900">
                            Resume/CV
                        </th>
                        <th class="p-3 text-left text-sm font-semibold text-gray-900">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300 bg-white text-gray-700">
                    @foreach ($listings as $listing)
                        <tr wire:key="{{$listing->id}}">
                            <td class="whitespace-nowrap p-3 text-sm">
                                {{$listing->full_name}}
                            </td>
                            <td class="whitespace-nowrap p-3 text-sm">
                                {{$listing->phone_number}}
                            </td>
                            <td class="whitespace-nowrap p-3 text-sm">
                                {{$listing->nationality}}
                            </td>
                            <td class="whitespace-nowrap p-3 text-sm">
                                {{$listing->job_title}}
                            </td>
                            <td class="whitespace-wrap p-3 text-sm">
                                {{$listing->job_qualifications}}
                            </td>
                            <td class="whitespace-nowrap p-3 text-sm">
                                <a href="{{ asset('storage/' . $listing->resumecv_path) }}" target="_blank">View Resume/CV</a>
                            </td>
                            <td class="whitespace-nowrap p-3 text-sm">
                                <div class="flex items-center justify-end">
                                    <x-menu>
                                        <x-menu.button class="hover:bg-gray-200 rounded" >
                                            <x-icons.ellipsis-horizontal />
                                        </x-menu.button>
                                        <x-menu.items>
                                            <x-menu.close>
                                                <x-menu.item 
                                                {{-- wire:click="refund({{$listing->id}})" --}}
                                                wire:confirm="Are you sure you want to view details of this person?">
                                                    View
                                                </x-menu.item>
                                            </x-menu.close>
                                            <x-menu.close>
                                                <x-menu.item 
                                                {{-- wire:click="archive({{$listing->id}})" --}}
                                                wire:confirm="Are you sure you want to Hire this person?">
                                                    Hire
                                                </x-menu.item>
                                            </x-menu.close>
                                        </x-menu.items>
                                    </x-menu>
                                </div>
                            </td>
                        </tr>  
                    @endforeach  
                </tbody>
            </table>
        @endif

        {{-- Loading Spinner --}}
        <div wire:loading wire:target="search, nextPage, previousPage" class="absolute inset-0 bg-white opacity-50"></div>
        <div wire:loading.flex wire:target="search, nextPage, previousPage" class="flex items-center justify-center absolute inset-0">
            <x-icons.spinner class="h-10 w-10"/>
        </div>
    </div>
    <div class="flex items-center justify-center p-4">
        {{ $listings->links('pagination') }}
    </div>  
</div>


