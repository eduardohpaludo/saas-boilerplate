<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tenants') }}
            <x-link class="ml-4 float-right" href="{{ route('tenants.create') }}">Add Tenant</x-link>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-left">
                                Domínio
                            </th>
                            <th scope="col" class="px-6 py-3 text-left">
                                Plano
                            </th>
                            <th scope="col" class="px-6 py-3 text-left">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Açoes
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($tenants as $tenant)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $tenant->name }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $tenant->email }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    @foreach($tenant->domains as $domain)
                                        {{ $domain->domain }}{{ $loop->last ? '' : ',' }}
                                    @endforeach
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    Trial
                                </td>
                                <td class="px-6 py-4">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" value="" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    </label>      
                                </td>

                                <td class="px-6 py-4">
                                    <x-link href="#">Edit</x-link>
                                    <form method="POST" action="#" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <x-button class="bg-red-600" onclick="return confirm('Are you sure?')">Delete</x-button>
                                    </form>
                                </td>
                        
                            </tr>
                        @empty
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td colspan="2"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ __('No projects found') }}
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
