<div class="rounded-2xl bg-white shadow-sm ring-1 ring-gray-200">

    {{-- En-tête --}}
    <div class="border-b border-gray-200 bg-gray-50 px-6 py-5 sm:px-8">

        <div class="flex items-center gap-3">

            <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-indigo-50 text-indigo-600">
                <svg
                    class="h-6 w-6"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                    />
                </svg>
            </div>

            <div>
                <h2 class="text-xl font-bold text-gray-900">
                    Réserver votre séjour
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    {{ $property->name }}
                </p>
            </div>

        </div>

    </div>

    {{-- Formulaire --}}
    <div class="p-6 sm:p-8">

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

            {{-- Date d’arrivée --}}
            <div>

                <label
                    for="booking-start-date"
                    class="block text-sm font-semibold text-gray-700"
                >
                    Date d’arrivée
                </label>

                <div class="relative mt-2">

                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg
                            class="h-5 w-5 text-gray-400"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                            />
                        </svg>
                    </div>

                    <input
                        id="booking-start-date"
                        type="date"
                        min="{{ now()->format('Y-m-d') }}"
                        wire:model.live="startDate"
                        class="w-full rounded-xl border-gray-300 py-3 pl-10 pr-4 text-sm shadow-sm transition focus:border-indigo-500 focus:ring-indigo-500"
                    >

                </div>

                @error('startDate')
                    <p class="mt-2 flex items-center gap-1 text-sm text-red-600">
                        <span>•</span>
                        {{ $message }}
                    </p>
                @enderror

            </div>

            {{-- Date de départ --}}
            <div>

                <label
                    for="booking-end-date"
                    class="block text-sm font-semibold text-gray-700"
                >
                    Date de départ
                </label>

                <div class="relative mt-2">

                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg
                            class="h-5 w-5 text-gray-400"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                            />
                        </svg>
                    </div>

                    <input
                        id="booking-end-date"
                        type="date"
                        min="{{ now()->format('Y-m-d') }}"
                        wire:model.live="endDate"
                        class="w-full rounded-xl border-gray-300 py-3 pl-10 pr-4 text-sm shadow-sm transition focus:border-indigo-500 focus:ring-indigo-500"
                    >

                </div>

                @error('endDate')
                    <p class="mt-2 flex items-center gap-1 text-sm text-red-600">
                        <span>•</span>
                        {{ $message }}
                    </p>
                @enderror

            </div>

        </div>

        {{-- Prix --}}
        <div class="mt-7 rounded-xl bg-gray-50 p-5 ring-1 ring-gray-200">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm text-gray-500">
                        Prix par nuit
                    </p>

                    <p class="mt-1 text-lg font-bold text-gray-900">
                        {{ number_format($property->price_per_night, 2) }} DT
                    </p>
                </div>

                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-50 text-indigo-600">
                    <svg
                        class="h-5 w-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 01180z"
                        />
                    </svg>
                </div>

            </div>

            @if ($totalPrice > 0)

                <div class="my-5 border-t border-gray-200"></div>

                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-sm font-medium text-gray-500">
                            Prix total du séjour
                        </p>

                        <p class="mt-1 text-2xl font-bold text-indigo-600">
                            {{ number_format($totalPrice, 2) }} DT
                        </p>
                    </div>

                    <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
                        Total calculé
                    </span>

                </div>

            @else

                <div class="mt-4 rounded-lg bg-white px-4 py-3 ring-1 ring-gray-200">
                    <p class="text-sm text-gray-500">
                        Sélectionnez vos dates pour calculer le prix total.
                    </p>
                </div>

            @endif

        </div>

        {{-- Message général d'erreur --}}
        @if ($errors->has('startDate'))
            @if (str_contains($errors->first('startDate'), 'déjà réservée'))
                <div class="mt-5 rounded-xl bg-red-50 p-4 ring-1 ring-red-200">
                    <div class="flex gap-3">

                        <svg
                            class="h-5 w-5 shrink-0 text-red-600"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 9v4m0 4h.01M10.29 3.86l-8.82 14a2 2 0 001.71 3h17.64a2 2 0 001.71-3l-8.82-14a2 2 0 00-3.42 0z"
                            />
                        </svg>

                        <p class="text-sm font-medium text-red-700">
                            {{ $errors->first('startDate') }}
                        </p>

                    </div>
                </div>
            @endif
        @endif

        {{-- Bouton --}}
        <button
            type="button"
            wire:click="calculateBooking"
            wire:loading.attr="disabled"
            class="mt-6 flex w-full items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-3.5 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-60"
        >

            <span wire:loading.remove wire:target="calculateBooking">
                Confirmer la réservation
            </span>

            <span wire:loading wire:target="calculateBooking" class="flex items-center gap-2">
                <svg
                    class="h-4 w-4 animate-spin"
                    fill="none"
                    viewBox="0 0 24 24"
                >
                    <circle
                        class="opacity-25"
                        cx="12"
                        cy="12"
                        r="10"
                        stroke="currentColor"
                        stroke-width="4"
                    ></circle>

                    <path
                        class="opacity-75"
                        fill="currentColor"
                        d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"
                    ></path>
                </svg>

                Réservation en cours...
            </span>

        </button>

        <p class="mt-3 text-center text-xs text-gray-500">
            Le montant total est calculé automatiquement selon vos dates.
        </p>

    </div>

</div>