<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Configuração de pagamento') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>

    </header>

    <div class="mt-4">
        <h3 class="text-md font-medium text-gray-900 dark:text-gray-100">
            {{ __('Stripe') }}
        </h3>
    </div>

    <form method="post" action="{{ route('settings.payment.setting.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')
        
        <div>
            <x-input-label for="update_stripe_current_key" :value="__('Chave')" />
            <x-text-input id="update_stripe_current_key" name="stripe_public_key" type="password" :value="old('stripe_public_key', $settings['stripe_public_key'])" class="mt-1 block w-full" autocomplete="stripe_public_key" />
        </div>
        <div>
            <x-input-label for="update_stripe_current_secret" :value="__('Segredo')" />
            <x-text-input id="update_stripe_current_secret" name="stripe_private_key" type="password" :value="old('stripe_private_key', $settings['stripe_private_key'])" class="mt-1 block w-full" autocomplete="stripe_private_key" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
