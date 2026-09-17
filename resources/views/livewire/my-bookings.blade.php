<div class="py-8">
    <div class="mx-auto max-w-5xl px-4">

        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900">
                Mes réservations
            </h1>

            <p class="mt-2 text-gray-600">
                Retrouvez ici toutes vos réservations.
            </p>
        </div>

        @if ($bookings->isEmpty())

            <div class="rounded-xl bg-white p-8 text-center shadow-md">
                <p class="text-gray-500">
                    Vous n'avez aucune réservation pour le moment.
                </p>

                <a
                    href="{{ route('properties.index') }}"
                    class="mt-4 inline-block rounded-lg bg-gray-200 px-5 py-3 font-semibold text-indigo-700 transition hover:bg-gray-300"
                >
                    Voir les propriétés
                </a>
            </div>

        @else

            <div class="space-y-4">

                @foreach ($bookings as $booking)

                    <div class="rounded-xl bg-white p-6 shadow-md">

                        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

                            <div>
                                <h2 class="text-xl font-bold text-gray-900">
                                    {{ $booking->property->name }}
                                </h2>

                                <p class="mt-2 text-gray-600">
                                    Du {{ $booking->start_date->format('d/m/Y') }}
                                    au {{ $booking->end_date->format('d/m/Y') }}
                                </p>

                                <p class="mt-1 font-semibold text-indigo-600">
                                    {{ number_format($booking->total_price, 2) }} DT
                                </p>
                            </div>

                            <div class="flex flex-col items-start gap-3 md:items-end">

                                @if ($booking->status === 'cancelled')

                                    <span class="rounded-full bg-red-100 px-3 py-1 text-sm font-semibold text-red-700">
                                        Annulée
                                    </span>

                                @elseif ($booking->status === 'confirmed')

                                    <span class="rounded-full bg-green-100 px-3 py-1 text-sm font-semibold text-green-700">
                                        Confirmée
                                    </span>

                                @else

                                    <span class="rounded-full bg-yellow-100 px-3 py-1 text-sm font-semibold text-yellow-700">
                                        En attente
                                    </span>

                                    <button
                                        type="button"
                                        wire:click="cancelBooking({{ $booking->id }})"
                                        wire:confirm="Êtes-vous sûr de vouloir annuler cette réservation ?"
                                        class="rounded-lg bg-gray-200 px-4 py-2 font-semibold text-red-600 transition hover:bg-gray-300"
                                    >
                                        Annuler
                                    </button>

                                @endif

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @endif

    </div>
</div>