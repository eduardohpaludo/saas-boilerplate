<x-central-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Planos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('plans.store') }}">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Nome')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="price" :value="__('Preço')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required autocomplete="price" />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="duration" :value="__('Duração')" />
                            <x-text-input id="duration" class="block mt-1 w-full" type="number" name="duration" :value="old('duration')" required autocomplete="duration" />
                            <x-input-error :messages="$errors->get('duration')" class="mt-2" />
                        </div>

                        <div class="mt-4">

                            <x-input-label for="durationtype" :value="__('Tipo da duração')" />
                            <select id="durationtype" name="durationtype" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Escolha a duração</option>
                                <option value="trial">Trial</option>
                                <option value="month">Mensal</option>
                                <option value="year">Anual</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="max_users" :value="__('Número máximo de usuários')" />
                            <x-text-input id="max_users" class="block mt-1 w-full" type="number" name="max_users" :value="old('max_users')" required autocomplete="max_users" />
                            <x-input-error :messages="$errors->get('max_users')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <x-primary-button class="ms-4">
                                {{ __('Create') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
