<div>
    <div class="flex flex-cols-2 gap-2 md:gap-6 mb-4">
        <div class="relative text-sm text-gray-800">
            <div class="absolute pl-2 left-0 top-0 bottom-0 flex items-center pointer-events-none text-gray-500">
                <x-icons.magnifying-glass />
            </div>
            <input id="search" name="search" type="search" wire:model.live.debounce.300ms="search" placeholder="Search full name, job title, nationality " 
            class="block w-full rounded-lg border-0 py-1.5 md:py-3 pl-10 pr-8 text-gray-900 ring-1 ring-inset ring-gray-600 
            placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-slate-600">
        </div>

        <select wire:model.live="statusFilter" class="block w-64 rounded-lg border-0 py-1.5 md:py-3 pl-10 pr-10 text-gray-900 ring-1 ring-inset ring-gray-600 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-slate-600">
            <option value="">All</option>
            <option value="pending">Pending</option>
            <option value="interview">Interview</option>
            <option value="hired">Hired</option>
        </select>
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
                        Status
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
                            <span 
                                class="px-2 py-1 text-sm rounded-full 
                                @if($listing->status === 'pending') bg-yellow-100 text-yellow-800
                                @elseif($listing->status === 'interview') bg-blue-100 text-blue-800
                                @elseif($listing->status === 'hired') bg-green-100 text-green-800
                                @endif"
                            >
                                {{ $listing->status }}
                            </span> 
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
                             <!-- Dropdown for Actions -->
                            <select 
                            wire:change="updateStatus({{ $listing->id }}, $event.target.value)"
                            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            @foreach (App\Status::cases() as $status)
                                <option value="{{ $status->value }}" {{ $listing->status === $status->value ? 'selected' : '' }}>
                                    {{ $status->label() }}
                                </option>
                            @endforeach
                        </select>
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


