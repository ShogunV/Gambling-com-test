@if($affiliates->count() > 0)
<table class="w-full text-sm text-left text-gray-400 slide-in" id="affiliates-table">
    <thead class="text-xs text-white uppercase">
        <tr>
            <th scope="col" class="px-6 py-3 bg-gray-800">
                Id
            </th>
            <th scope="col" class="px-6 py-3">
                Name
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-800 hidden sm:table-cell">
                Latitude
            </th>
            <th scope="col" class="px-6 py-3 hidden sm:table-cell">
                Longitude
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-800 hidden sm:table-cell">
                Distance
            </th>
            <th scope="col" class="px-6 py-3 text-center">
                Invited
            </th>
        </tr>
    </thead>
    <tbody>

        @foreach($affiliates as $ind => $affiliate)
        <tr class="border-b border-gray-700">
            <td class="px-6 py-4 font-medium whitespace-nowrap text-white bg-gray-800">
                {{ $affiliate->affiliate_id }}
            </td>
            <td class="px-6 py-4">
                {{ $affiliate->name }}
            </td>
            <td class="px-6 py-4 bg-gray-800 hidden sm:table-cell">
                {{ $affiliate->latitude }}
            </td>
            <td class="px-6 py-4 hidden sm:table-cell">
                {{ $affiliate->longitude }}
            </td>
            <td class="px-6 py-4 bg-gray-800 hidden sm:table-cell">
                {{ $affiliate->distance }} km
            </td>
            <td class="px-6 py-4">
                @if($affiliate->invited)
                <svg class="w-4 fill-current text-green-600 mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                @else
                <svg class="w-4 fill-current text-red-500 mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
                @endif
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
@else
<h3 class="text-lg text-gray-400 text-center font-medium mb-6">There are no affiliates</h3>
@endif