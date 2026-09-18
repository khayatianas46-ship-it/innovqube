<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm font-semibold text-indigo-600">
                Tableau de bord
            </p>

            <h2 class="mt-1 text-2xl font-bold text-gray-900">
                Bienvenue, {{ Auth::user()->name }} 👋
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Gérez vos réservations et découvrez nos propriétés.
            </p>
        </div>
    </x-slot>

    <div
        class="min-h-screen py-10"
        style="background-color: #eef2ff;"
    >

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Hero --}}
            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-indigo-600 via-indigo-600 to-indigo-800 shadow-xl">

                <div class="relative px-6 py-10 sm:px-10 sm:py-14">

                    <div class="max-w-2xl">

                        <span class="inline-flex items-center rounded-full bg-white/15 px-4 py-1.5 text-xs font-bold uppercase tracking-wide text-white ring-1 ring-white/20">
                            InnovQube Booking
                        </span>

                        <h1 class="mt-5 text-3xl font-bold tracking-tight text-white sm:text-4xl">
                            Trouvez votre prochaine propriété
                        </h1>

                        <p class="mt-4 max-w-xl text-base leading-7 text-indigo-100 sm:text-lg">
                            Découvrez les propriétés disponibles, choisissez vos dates
                            et réservez votre séjour simplement.
                        </p>

                        <div class="mt-8 flex flex-wrap gap-3">

                            <a
                                href="{{ route('properties.index') }}"
                                class="inline-flex items-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-bold text-indigo-700 shadow-lg transition duration-200 hover:-translate-y-0.5 hover:bg-indigo-50"
                            >
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
                                        d="m21 21-4.35-4.35m2.35-5.65a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z"
                                    />
                                </svg>

                                Voir les propriétés
                            </a>

                            <a
                                href="{{ route('bookings.index') }}"
                                class="inline-flex items-center gap-2 rounded-xl border border-white/30 bg-white/10 px-5 py-3 text-sm font-bold text-white backdrop-blur-sm transition duration-200 hover:bg-white/20"
                            >
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

                                Mes réservations
                            </a>

                        </div>

                    </div>

                </div>

                {{-- Decorative elements --}}
                <div class="absolute -right-20 -top-24 h-72 w-72 rounded-full bg-white/10"></div>
                <div class="absolute -bottom-32 right-24 h-80 w-80 rounded-full bg-white/5"></div>

            </div>


            {{-- Quick Actions --}}
            <div class="mt-10">

                <div>
                    <p class="text-sm font-semibold text-indigo-600">
                        Navigation
                    </p>

                    <h3 class="mt-1 text-xl font-bold text-gray-900">
                        Accès rapide
                    </h3>

                    <p class="mt-1 text-sm text-gray-500">
                        Retrouvez rapidement les principales fonctionnalités.
                    </p>
                </div>


                <div class="mt-6 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">

                    {{-- Properties --}}
                    <a
                        href="{{ route('properties.index') }}"
                        class="group rounded-2xl border border-indigo-100 bg-white p-6 shadow-sm transition duration-200 hover:-translate-y-1 hover:border-indigo-200 hover:shadow-lg"
                    >

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-100 text-indigo-600 transition group-hover:bg-indigo-600 group-hover:text-white">

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
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6"
                                />
                            </svg>

                        </div>

                        <h4 class="mt-5 text-base font-bold text-gray-900 transition group-hover:text-indigo-600">
                            Propriétés
                        </h4>

                        <p class="mt-2 text-sm leading-6 text-gray-500">
                            Parcourez les propriétés disponibles et trouvez
                            celle qui correspond à vos besoins.
                        </p>

                        <div class="mt-5 flex items-center text-sm font-semibold text-indigo-600">
                            Explorer
                            <svg
                                class="ml-2 h-4 w-4 transition-transform group-hover:translate-x-1"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="m9 5 7 7-7 7"
                                />
                            </svg>
                        </div>

                    </a>


                    {{-- Bookings --}}
                    <a
                        href="{{ route('bookings.index') }}"
                        class="group rounded-2xl border border-indigo-100 bg-white p-6 shadow-sm transition duration-200 hover:-translate-y-1 hover:border-indigo-200 hover:shadow-lg"
                    >

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-100 text-indigo-600 transition group-hover:bg-indigo-600 group-hover:text-white">

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

                        <h4 class="mt-5 text-base font-bold text-gray-900 transition group-hover:text-indigo-600">
                            Mes réservations
                        </h4>

                        <p class="mt-2 text-sm leading-6 text-gray-500">
                            Consultez vos réservations et gérez facilement
                            vos séjours.
                        </p>

                        <div class="mt-5 flex items-center text-sm font-semibold text-indigo-600">
                            Consulter
                            <svg
                                class="ml-2 h-4 w-4 transition-transform group-hover:translate-x-1"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="m9 5 7 7-7 7"
                                />
                            </svg>
                        </div>

                    </a>


                    {{-- Profile --}}
                    <a
                        href="{{ route('profile.edit') }}"
                        class="group rounded-2xl border border-indigo-100 bg-white p-6 shadow-sm transition duration-200 hover:-translate-y-1 hover:border-indigo-200 hover:shadow-lg"
                    >

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-100 text-indigo-600 transition group-hover:bg-indigo-600 group-hover:text-white">

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
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                />
                            </svg>

                        </div>

                        <h4 class="mt-5 text-base font-bold text-gray-900 transition group-hover:text-indigo-600">
                            Mon profil
                        </h4>

                        <p class="mt-2 text-sm leading-6 text-gray-500">
                            Consultez et modifiez vos informations personnelles.
                        </p>

                        <div class="mt-5 flex items-center text-sm font-semibold text-indigo-600">
                            Modifier
                            <svg
                                class="ml-2 h-4 w-4 transition-transform group-hover:translate-x-1"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="m9 5 7 7-7 7"
                                />
                            </svg>
                        </div>

                    </a>

                </div>

            </div>


            {{-- Information --}}
            <div class="mt-8 overflow-hidden rounded-2xl border border-indigo-100 bg-white shadow-sm">

                <div class="flex items-start gap-4 p-6">

                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-indigo-100 text-indigo-600">

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
                                d="M13 16h-1v-4h-1m1-4h.01M12 21a9 9 0 100-18 9 9 0 000 18z"
                            />
                        </svg>

                    </div>

                    <div>

                        <h3 class="text-sm font-bold text-gray-900">
                            Comment ça fonctionne ?
                        </h3>

                        <p class="mt-1 text-sm leading-6 text-gray-500">
                            Choisissez une propriété, sélectionnez vos dates,
                            vérifiez le prix total et confirmez votre réservation.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>