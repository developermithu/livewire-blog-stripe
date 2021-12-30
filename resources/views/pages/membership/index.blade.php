<x-guest-layout>

    <section class="container pt-16 mx-auto mb-32">

        {{-- Header --}}
        <header class="flex flex-col py-8 mt-8 mb-12 space-y-6 text-center">
            <h2 class="font-serif text-5xl font-bold">Membership</h2>
            <hr class="self-center w-40 border-b-4 border-theme-blue-200">
        </header>

        {{-- Session Message --}}
        <x-alerts.main/>

        <div class="grid grid-cols-3 gap-8 my-16">
            {{-- Free Plan --}}
            <div class="border border-gray-200 divide-y divide-gray-200 shadow-lg bg-gray-50">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold leading-6 text-gray-900">Free</h2>
                    <p class="mt-4 text-sm leading-normal">Awesome packages</p>
                    <p class="mt-8">
                        <span class="text-4xl font-extrabold">$0.00</span>
                    </p>
                    <x-jet-button class="mt-6">
                        {{ __("Sign Up") }}
                        <svg style="height: 1.25rem;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-current">
                            <path class="heroicon-ui" d="M9.3 8.7a1 1 0 0 1 1.4-1.4l4 4a1 1 0 0 1 0 1.4l-4 4a1 1 0 0 1-1.4-1.4l3.29-3.3-3.3-3.3z"></path>
                        </svg>
                    </x-jet-button>

                </div>
                <div class="px-6 pt-6 pb-8">
                    <h3 class="text-xs font-semibold tracking-wide uppercase">What's included
                    </h3>
                    <ul class="mt-6 space-y-4">
                        <li class="flex space-x-3">
                            <x-heroicon-o-check class="flex-shrink-0 w-5 h-5 text-green-500" />
                            <span class="text-xs leading-normal">
                                Some huge benefit
                            </span>
                        </li>

                        <li class="flex space-x-3">
                            <x-heroicon-o-check class="flex-shrink-0 w-5 h-5 text-green-500" />
                            <span class="text-xs leading-normal">
                                Crazy offer
                            </span>
                        </li>

                        <li class="flex space-x-3">
                            <x-heroicon-o-check class="flex-shrink-0 w-5 h-5 text-green-500" />
                            <span class="text-xs leading-normal">
                                Used Laravel 8 to make this
                            </span>
                        </li>

                        <li class="flex space-x-3">
                            <x-heroicon-o-check class="flex-shrink-0 w-5 h-5 text-green-500" />
                            <span class="text-xs leading-normal">
                                Tailwind is awesome
                            </span>
                        </li>

                        <li class="flex space-x-3">
                            <x-heroicon-o-check class="flex-shrink-0 w-5 h-5 text-green-500" />
                            <span class="text-xs leading-normal">
                                AOS js library for some extra effects
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Premium Plan --}}
            @foreach ($plans as $plan)
            <div class="border border-gray-200 divide-y divide-gray-200 shadow-lg bg-gray-50">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold leading-6 text-gray-900">{{ $plan->name() }}</h2>
                    <p class="mt-4 text-sm leading-normal">Awesome packages</p>
                    <p class="mt-8">
                        <span class="text-4xl font-extrabold">{{ $plan->price() }}</span>
                        <span class="text-base font-medium text-gray-500">{{ $plan->abbreviation() }}</span>
                    </p>

                    @subscribedToProduct($user, $plan->stripeProductId(), $plan->stripeName())

                        @if ($user->onTrial($plan->stripeName()))
                            <h2 class="p-2 text-pink-700">
                                Your trial will end on {{ $user->trialEndsAt($plan->stripeName())->format('d F Y') }}  
                            </h2>
                        @else
                            <h2 class="p-2 mt-6 text-center bg-green-500 rounded text-lg text-white">You have already subscribed</h2>

                            @onGracePeriod($plan->stripeName())
                                <h2 class="p-2 text-pink-700">Your subscription will end on {{ $user->subscription($plan->stripeName())->ends_at->format('d F Y') }} </h2>

                                {{-- Resume Subscription --}}
                                <div class="my-5">
                                    <a href="{{ route('subscription.update', $plan->stripeName()) }}" class="px-6 py-2 text-center bg-blue-500 text-white rounded w-full"> Resume Subscription </a>
                                </div>
                            @else 
                                {{-- Cancel Subscription --}}
                                <div class="my-5">
                                    <a href="{{ route('subscription.destroy', $plan->stripeName()) }}" class="px-6 py-2 text-center bg-red-600 text-white rounded"> Cancel Subscription </a>
                                </div>
                            @endonGracePeriod
                        @endif

                    @else
                        <x-link.primary href="{{ route('payments', ['plan' => $plan->stripeName()]) }}">
                            Sign Up
                        </x-link.primary>
                    @endsubscribedToProduct

                </div>
                <div class="px-6 pt-6 pb-8">
                    <h3 class="text-xs font-semibold tracking-wide uppercase">What's included
                    </h3>
                    <ul class="mt-6 space-y-4">
                        <li class="flex space-x-3">
                            <x-heroicon-o-check class="flex-shrink-0 w-5 h-5 text-green-500" />
                            <span class="text-xs leading-normal">
                                Some huge benefit
                            </span>
                        </li>

                        <li class="flex space-x-3">
                            <x-heroicon-o-check class="flex-shrink-0 w-5 h-5 text-green-500" />
                            <span class="text-xs leading-normal">
                                Crazy offer
                            </span>
                        </li>

                        <li class="flex space-x-3">
                            <x-heroicon-o-check class="flex-shrink-0 w-5 h-5 text-green-500" />
                            <span class="text-xs leading-normal">
                                Used Laravel 8 to make this
                            </span>
                        </li>

                        <li class="flex space-x-3">
                            <x-heroicon-o-check class="flex-shrink-0 w-5 h-5 text-green-500" />
                            <span class="text-xs leading-normal">
                                Tailwind is awesome
                            </span>
                        </li>

                        <li class="flex space-x-3">
                            <x-heroicon-o-check class="flex-shrink-0 w-5 h-5 text-green-500" />
                            <span class="text-xs leading-normal">
                                AOS js library for some extra effects
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            @endforeach

        </div>
    </section>
</x-guest-layout>
