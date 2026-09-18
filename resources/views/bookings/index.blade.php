<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">
                Mes réservations
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Consultez et gérez vos réservations.
            </p>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gray-100 py-10">

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Introduction --}}
            <div class="mb-8">
                <div class="rounded-2xl bg-gradient-to-r from-indigo-600 to-indigo-800 px-6 py-8 shadow-lg sm:px-8">

                    <div class="max-w-2xl">

                        <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-sm font-medium text-white ring-1 ring-white/20">
                            InnovQube Booking
                        </span>

                        <h1 class="mt-4 text-2xl font-bold text-white sm:text-3xl">
                            Vos réservations
                        </h1>

                        <p class="mt-3 text-sm leading-6 text-indigo-100 sm:text-base">
                            Retrouvez ici toutes vos réservations et consultez
                            facilement les détails de vos séjours.
                        </p>

                    </div>

                </div>
            </div>

            {{-- Réservations --}}
            <div class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-gray-200">

                <div class="border-b border-gray-200 px-6 py-5 sm:px-8">

                    <div class="flex items-center gap-3">

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
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                />
                            </svg>
                        </div>

                        <div>
                            <h3 class="text-base font-semibold text-gray-900">
                                Historique des réservations
                            </h3>

                            <p class="text-sm text-gray-500">
                                Gérez vos séjours réservés.
                            </p>
                        </div>

                    </div>

                </div>

                <div class="p-6 sm:p-8">
                    <livewire:my-bookings />
                </div>

            </div>

        </div>

    </div>

</x-app-layout>