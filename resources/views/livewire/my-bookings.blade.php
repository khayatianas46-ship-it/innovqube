<div class="py-2">

    @if ($bookings->isEmpty())

        {{-- Aucune réservation --}}
        <div class="rounded-2xl bg-white px-6 py-12 text-center shadow-sm ring-1 ring-gray-200">

            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-indigo-50 text-indigo-600">

                <svg
                    class="h-8 w-8"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2v12a2 2 0 002 2z"
                    />
                </svg>

            </div>

            <h3 class="mt-5 text-lg font-semibold text-gray-900">
                Aucune réservation
            </h3>

            <p class="mx-auto mt-2 max-w-md text-sm text-gray-500">
                Vous n'avez aucune réservation pour le moment.
                Découvrez nos propriétés et planifiez votre prochain séjour.
            </p>

            <a
                href="{{ route('properties.index') }}"
                class="mt-6 inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
            >
                Voir les propriétés

                <svg
                    class="h-4 w-4"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 5l7 7-7 7"
                    />
                </svg>

            </a>

        </div>

    @else

        {{-- Liste des réservations --}}
        <div class="space-y-5">

            @foreach ($bookings as $booking)

                <div
                    wire:key="booking-{{ $booking->id }}"
                    class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-gray-200 transition hover:shadow-md"
                >

                    {{-- Bandeau supérieur --}}
                    <div class="flex flex-col gap-4 border-b border-gray-200 px-6 py-5 sm:flex-row sm:items-center sm:justify-between">

                        <div class="flex items-center gap-4">

                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-indigo-50 text-indigo-600">

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
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6"
                                    />
                                </svg>

                            </div>

                            <div>
                                <p class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                    Réservation #{{ $booking->id }}
                                </p>

                                <h2 class="mt-1 text-lg font-bold text-gray-900">
                                    {{ $booking->property->name }}
                                </h2>
                            </div>

                        </div>

                        {{-- Statut --}}
                        <div>

                            @if ($booking->status === 'cancelled')

                                <span class="inline-flex items-center gap-2 rounded-full bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700 ring-1 ring-red-100">
                                    <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                    Annulée
                                </span>

                            @elseif ($booking->status === 'confirmed')

                                <span class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700 ring-1 ring-emerald-100">
                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                    Confirmée
                                </span>

                            @else

                                <span class="inline-flex items-center gap-2 rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700 ring-1 ring-amber-100">
                                    <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                    En attente
                                </span>

                            @endif

                        </div>

                    </div>

                    {{-- Informations --}}
                    <div class="px-6 py-6">

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

                            {{-- Arrivée --}}
                            <div class="rounded-xl bg-gray-50 p-4 ring-1 ring-gray-100">

                                <div class="flex items-center gap-2">

                                    <svg
                                        class="h-5 w-5 text-indigo-600"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2v12a2 2 0 002 2z"
                                        />
                                    </svg>

                                    <span class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                        Arrivée
                                    </span>

                                </div>

                                <p class="mt-3 text-base font-bold text-gray-900">
                                    {{ $booking->start_date->format('d/m/Y') }}
                                </p>

                            </div>

                            {{-- Départ --}}
                            <div class="rounded-xl bg-gray-50 p-4 ring-1 ring-gray-100">

                                <div class="flex items-center gap-2">

                                    <svg
                                        class="h-5 w-5 text-indigo-600"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2v12a2 2 0 002 2z"
                                        />
                                    </svg>

                                    <span class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                        Départ
                                    </span>

                                </div>

                                <p class="mt-3 text-base font-bold text-gray-900">
                                    {{ $booking->end_date->format('d/m/Y') }}
                                </p>

                            </div>

                            {{-- Total --}}
                            <div class="rounded-xl bg-indigo-50 p-4 ring-1 ring-indigo-100">

                                <div class="flex items-center gap-2">

                                    <svg
                                        class="h-5 w-5 text-indigo-600"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                        />
                                    </svg>

                                    <span class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                        Total
                                    </span>

                                </div>

                                <p class="mt-3 text-lg font-bold text-indigo-600">
                                    {{ number_format($booking->total_price, 2) }} DT
                                </p>

                            </div>

                        </div>

                        {{-- Action --}}
                        @if ($booking->status === 'pending')

                            <div class="mt-6 flex justify-end border-t border-gray-100 pt-5">

                                <button
                                    type="button"
                                    wire:click="cancelBooking({{ $booking->id }})"
                                    wire:confirm="Êtes-vous sûr de vouloir annuler cette réservation ?"
                                    wire:loading.attr="disabled"
                                    class="inline-flex items-center gap-2 rounded-xl border border-red-200 bg-white px-4 py-2.5 text-sm font-semibold text-red-600 transition hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-60"
                                >

                                    <svg
                                        class="h-4 w-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"
                                        />
                                    </svg>

                                    <span wire:loading.remove wire:target="cancelBooking({{ $booking->id }})">
                                        Annuler la réservation
                                    </span>

                                    <span wire:loading wire:target="cancelBooking({{ $booking->id }})">
                                        Annulation...
                                    </span>

                                </button>

                            </div>

                        @endif

                    </div>

                </div>

            @endforeach

        </div>

    @endif

</div>