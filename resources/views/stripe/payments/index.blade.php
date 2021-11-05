<x-guest-layout>

    <section class="container pt-16 mx-auto mb-32">

        {{-- Header --}}
        <header class="flex flex-col py-8 mt-8 mb-12 space-y-6 text-center">
            <h2 class="font-serif text-5xl font-bold">Checkout</h2>
            <hr class="self-center w-40 border-b-4 border-theme-blue-200">
        </header>

        <div class="flex flex-col items-center max-w-4xl mx-auto">
            <div class="w-full p-10 m-4 leading-loose border border-gray-200 shadow-lg bg-gray-50">

                {{-- Payment Form --}}
                <form id="payment-form" class="space-y-8" action="{{ route('payments.store') }}" method="POST">
                    @csrf
                    
                    <h2 class="relative font-serif text-xl font-bold">
                        <span class="side-title">
                            Customer information
                        </span>
                    </h2>

                    {{-- Plan --}}
                    <input type="hidden" name="plan" id="plan" value="{{ request('plan') }}">

                    {{-- Payment Method --}}
                    <input type="hidden" name="payment-method" id="payment-method">

                    <div class="space-y-2">
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input class="block w-full mt-1" type="text" name="name" :value="auth()->user()->name() ?? old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div class="space-y-2">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block w-full mt-1" type="text" name="email" :value="auth()->user()->email() ?? old('email')" required autocomplete="email" disabled />
                    </div>

                    <div class="space-y-2">
                        <x-jet-label for="line1" value="{{ __('Street, PO Box, or Company name') }}" />
                        <x-jet-input id="line1" class="block w-full mt-1" type="text" name="line1" :value="auth()->user()->line1() ?? old('line1')" required autocomplete="line1" />
                    </div>

                    <div class="space-y-2">
                        <x-jet-label for="line2" value="{{ __('Apartment, Suite, Unit, or Building') }}" />
                        <x-jet-input id="line2" class="block w-full mt-1" type="text" name="line2" :value="auth()->user()->line2() ?? old('line2')" required autocomplete="line2" />
                    </div>

                    <div class="space-y-2">
                        <x-jet-label for="city" value="{{ __('City') }}" />
                        <x-jet-input id="city" class="block w-full mt-1" type="text" name="city" :value="auth()->user()->city() ?? old('city')" required autocomplete="city" />
                    </div>

                    <div class="space-y-2">
                        <x-jet-label for="state" value="{{ __('State') }}" />
                        <x-jet-input id="state" class="block w-full mt-1" type="text" name="state" :value="auth()->user()->state() ?? old('state')" required autocomplete="state" />
                    </div>

                    <div class="inline-block w-1/2 pr-2 ">
                        <x-jet-label for="country" value="{{ __('Country') }}" />
                        <x-jet-input id="country" class="block w-full mt-1" type="text" name="country" :value="auth()->user()->country() ?? old('country')" required autocomplete="country" />
                    </div>

                    <div class="inline-block w-1/2 pl-2 -mx-1">
                        <x-jet-label for="postal_code" value="{{ __('ZIP or Postal Code') }}" />
                        <x-jet-input id="postal_code" class="block w-full mt-1" type="text" name="postal_code" :value="auth()->user()->postalCode() ?? old('postal_code')" required autocomplete="postal_code" />
                    </div>

                    <h2 class="relative font-serif text-xl font-bold">
                        <span class="side-title">
                            Payment information
                        </span>
                    </h2>

                    {{-- Name On Card --}}
                    <div class="space-y-2">
                        <x-jet-label for="name-card" value="{{ __('Name on Card') }}" />
                        <x-jet-input id="card-holder-name" class="block w-full mt-1" type="text"  :value="auth()->user()->name() ?? old('name-card')" required autocomplete="name" />
                    </div>

                    {{-- Card Details --}}
                    <div class="space-y-2">
                        <x-jet-label for="card_no" value="{{ __('Card Information') }}" />
                        {{-- card-element --}}
                        <div id="card-element" class="p-2 bg-white border border-gray-300 rounded"></div>
                    </div>

                    <div id="card-errors" class=" space-y-2 text-red-500"></div>

                    <div class="space-y-2">
                        {{-- card-button  & data-secret --}}
                        <button id="card-button" data-secret="{{ $intent->client_secret }}" class="px-4 py-1 font-light tracking-wider text-white bg-gray-900 rounded" type="submit">
                            Pay Now
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @push('js')
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        const stripe = Stripe(' {{ env("STRIPE_KEY") }} ');
    
        const elements = stripe.elements();
        const cardElement = elements.create('card');
    
        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;

        cardElement.mount('#card-element');

        cardElement.addEventListener('change', function(e) {
            const displayError = document.getElementById('card-errors');
            if (e.error) {
                displayError.textContent = e.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle A Form Submission
        const paymentForm = document.getElementById('payment-form');
        paymentForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            stripe
            .handleCardSetup(clientSecret, cardElement, {
                payment_method_data: {
                    billing_details: {
                        name: cardHolderName.value
                    }
                }
            })
            .then( function(result) {
                if (result.error) {
                    // Inform The User If There Is An Error
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    const paymentMethodInput = document.getElementById('payment-method');
                    paymentMethodInput.value = result.setupIntent.payment_method;
                    paymentForm.submit();
                }
            });
        });
    </script>
    @endpush

</x-guest-layout>


