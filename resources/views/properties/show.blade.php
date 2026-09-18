<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">
                {{ $property->name }}
            </h2>
            <p class="mt-1 text-sm text-gray-500">
                Détails de la propriété et réservation
            </p>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gray-100 py-10">

        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">

            {{-- Retour --}}
            <div class="mb-6">
                <a
                    href="{{ route('properties.index') }}"
                    class="inline-flex items-center gap-2 text-sm font-semibold text-indigo-600 transition hover:text-indigo-800"
                >
                    <span>←</span>
                    Retour aux propriétés
                </a>
            </div>

            {{-- Informations de la propriété --}}
            <div class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-gray-200">

                {{-- Header --}}
                <div class="bg-gradient-to-r from-indigo-600 to-indigo-800 px-6 py-8 sm:px-8">

                    <div class="flex flex-col gap-5 sm:flex-row sm:items-start sm:justify-between">

                        <div>
                            <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-semibold text-white ring-1 ring-white/20">
                                Propriété disponible
                            </span>

                            <h1 class="mt-4 text-3xl font-bold tracking-tight text-white">
                                {{ $property->name }}
                            </h1>

                            <p class="mt-2 text-sm text-indigo-100">
                                Réservez votre séjour simplement et rapidement.
                            </p>
                        </div>

                        <div class="rounded-xl bg-white/10 px-5 py-4 text-left ring-1 ring-white/20 sm:text-right">
                            <p class="text-xs font-medium uppercase tracking-wide text-indigo-100">
                                Tarif
                            </p>

                            <p class="mt-1 text-2xl font-bold text-white">
                                {{ number_format($property->price_per_night, 2) }} DT
                            </p>

                            <p class="text-xs text-indigo-100">
                                par nuit
                            </p>
                        </div>

                    </div>

                </div>

                {{-- Informations --}}
                <div class="p-6 sm:p-8">

                    <div class="grid gap-6 sm:grid-cols-2">

                        {{-- Description --}}
                        <div class="sm:col-span-2">

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
                                            d="M4 6h16M4 12h16M4 18h10"
                                        />
                                    </svg>
                                </div>

                                <div>
                                    <h2 class="text-base font-semibold text-gray-900">
                                        Description
                                    </h2>

                                    <p class="text-xs text-gray-500">
                                        À propos de cette propriété
                                    </p>
                                </div>
                            </div>

                            <p class="mt-4 text-sm leading-7 text-gray-600">
                                {{ $property->description }}
                            </p>

                        </div>

                        {{-- Capacité --}}
                        <div class="rounded-xl bg-gray-50 p-5 ring-1 ring-gray-200">

                            <div class="flex items-center gap-4">

                                <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600">
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
                                            d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8zM22 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"
                                        />
                                    </svg>
                                </div>

                                <div>
                                    <p class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                        Capacité
                                    </p>

                                    <p class="mt-1 text-lg font-bold text-gray-900">
                                        {{ $property->capacity }}
                                        <span class="text-sm font-normal text-gray-500">
                                            personne(s)
                                        </span>
                                    </p>
                                </div>

                            </div>

                        </div>

                        {{-- Prix --}}
                        <div class="rounded-xl bg-gray-50 p-5 ring-1 ring-gray-200">

                            <div class="flex items-center gap-4">

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
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                        />
                                    </svg>
                                </div>

                                <div>
                                    <p class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                        Prix par nuit
                                    </p>

                                    <p class="mt-1 text-lg font-bold text-indigo-600">
                                        {{ number_format($property->price_per_night, 2) }} DT
                                    </p>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Formulaire de réservation --}}
            <div class="mt-8">

                <div class="mb-5">
                    <h2 class="text-xl font-bold text-gray-900">
                        Réserver cette propriété
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        Sélectionnez vos dates pour calculer automatiquement le prix total.
                    </p>
                </div>

                <div class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-gray-200">
                    <div class="p-6 sm:p-8">
                        <livewire:booking-form :property="$property" />
                    </div>
                </div>

            </div>

        </div>

    </div>

</x-app-layout>