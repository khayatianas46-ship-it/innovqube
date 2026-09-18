<nav x-data="{ open: false }" class="border-b border-indigo-100 bg-white shadow-sm">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="flex h-16 items-center justify-between">

            {{-- Logo --}}
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="flex items-center">
                    <x-application-logo
                        class="block h-9 w-auto fill-current text-indigo-600"
                    />
                </a>
            </div>

            {{-- Navigation desktop --}}
            <div class="hidden h-full items-center gap-1 sm:flex">

                {{-- Accueil --}}
                <a
                    href="{{ route('dashboard') }}"
                    class="inline-flex h-10 items-center rounded-xl px-4 text-sm font-semibold transition duration-200
                    {{ request()->routeIs('dashboard')
                        ? 'bg-indigo-600 text-white shadow-sm'
                        : 'text-gray-600 hover:bg-indigo-50 hover:text-indigo-700' }}"
                >
                    Accueil
                </a>

                {{-- Propriétés --}}
                <a
                    href="{{ route('properties.index') }}"
                    class="inline-flex h-10 items-center rounded-xl px-4 text-sm font-semibold transition duration-200
                    {{ request()->routeIs('properties.*')
                        ? 'bg-indigo-600 text-white shadow-sm'
                        : 'text-gray-600 hover:bg-indigo-50 hover:text-indigo-700' }}"
                >
                    Propriétés
                </a>

                {{-- Mes réservations --}}
                <a
                    href="{{ route('bookings.index') }}"
                    class="inline-flex h-10 items-center rounded-xl px-4 text-sm font-semibold transition duration-200
                    {{ request()->routeIs('bookings.*')
                        ? 'bg-indigo-600 text-white shadow-sm'
                        : 'text-gray-600 hover:bg-indigo-50 hover:text-indigo-700' }}"
                >
                    Mes réservations
                </a>

            </div>

            {{-- Menu utilisateur desktop --}}
            <div class="hidden items-center sm:flex">

                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">

                        <button
                            type="button"
                            class="inline-flex items-center gap-2 rounded-xl border border-indigo-100 bg-white px-3 py-2 text-sm font-semibold text-gray-700 shadow-sm transition duration-200 hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                        >

                            {{-- Avatar --}}
                            <span class="flex h-8 w-8 items-center justify-center rounded-full bg-indigo-600 text-sm font-bold text-white shadow-sm">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </span>

                            <span>
                                {{ Auth::user()->name }}
                            </span>

                            <svg
                                class="h-4 w-4 text-gray-400"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="m6 9 6 6 6-6"
                                />
                            </svg>

                        </button>

                    </x-slot>

                    <x-slot name="content">

                        {{-- Informations utilisateur --}}
                        <div class="border-b border-indigo-50 bg-indigo-50/50 px-4 py-3">

                            <p class="text-sm font-bold text-gray-900">
                                {{ Auth::user()->name }}
                            </p>

                            <p class="mt-1 truncate text-xs text-gray-500">
                                {{ Auth::user()->email }}
                            </p>

                        </div>

                        {{-- Profil --}}
                        <x-dropdown-link :href="route('profile.edit')">
                            Profil
                        </x-dropdown-link>

                        {{-- Déconnexion --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button
                                type="submit"
                                class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 transition hover:bg-red-50 hover:text-red-600 focus:bg-red-50 focus:text-red-600 focus:outline-none"
                            >
                                Déconnexion
                            </button>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>

            {{-- Bouton mobile --}}
            <div class="flex items-center sm:hidden">

                <button
                    type="button"
                    @click="open = !open"
                    class="inline-flex items-center justify-center rounded-xl border border-indigo-100 bg-white p-2 text-indigo-600 shadow-sm transition hover:bg-indigo-50 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    aria-label="Ouvrir le menu"
                >

                    {{-- Menu --}}
                    <svg
                        x-show="!open"
                        x-cloak
                        class="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>

                    {{-- Fermer --}}
                    <svg
                        x-show="open"
                        x-cloak
                        class="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18 18 6M6 6l12 12"
                        />
                    </svg>

                </button>

            </div>

        </div>

    </div>

    {{-- Menu mobile --}}
    <div
        x-show="open"
        x-cloak
        x-transition
        @click.outside="open = false"
        class="border-t border-indigo-100 bg-white shadow-sm sm:hidden"
    >

        <div class="space-y-1 px-4 pb-4 pt-3">

            {{-- Accueil --}}
            <a
                href="{{ route('dashboard') }}"
                class="block rounded-xl px-4 py-3 text-sm font-semibold transition
                {{ request()->routeIs('dashboard')
                    ? 'bg-indigo-600 text-white'
                    : 'text-gray-700 hover:bg-indigo-50 hover:text-indigo-700' }}"
            >
                Accueil
            </a>

            {{-- Propriétés --}}
            <a
                href="{{ route('properties.index') }}"
                class="block rounded-xl px-4 py-3 text-sm font-semibold transition
                {{ request()->routeIs('properties.*')
                    ? 'bg-indigo-600 text-white'
                    : 'text-gray-700 hover:bg-indigo-50 hover:text-indigo-700' }}"
            >
                Propriétés
            </a>

            {{-- Mes réservations --}}
            <a
                href="{{ route('bookings.index') }}"
                class="block rounded-xl px-4 py-3 text-sm font-semibold transition
                {{ request()->routeIs('bookings.*')
                    ? 'bg-indigo-600 text-white'
                    : 'text-gray-700 hover:bg-indigo-50 hover:text-indigo-700' }}"
            >
                Mes réservations
            </a>

        </div>

        {{-- Utilisateur mobile --}}
        <div class="border-t border-indigo-100 px-4 py-4">

            <div class="mb-3 flex items-center gap-3">

                <span class="flex h-10 w-10 items-center justify-center rounded-full bg-indigo-600 text-sm font-bold text-white">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </span>

                <div class="min-w-0">
                    <p class="truncate text-sm font-bold text-gray-900">
                        {{ Auth::user()->name }}
                    </p>

                    <p class="truncate text-xs text-gray-500">
                        {{ Auth::user()->email }}
                    </p>
                </div>

            </div>

            {{-- Profil --}}
            <a
                href="{{ route('profile.edit') }}"
                class="block rounded-xl px-4 py-3 text-sm font-semibold text-gray-700 transition hover:bg-indigo-50 hover:text-indigo-700"
            >
                Profil
            </a>

            {{-- Déconnexion --}}
            <form method="POST" action="{{ route('logout') }}" class="mt-1">
                @csrf

                <button
                    type="submit"
                    class="block w-full rounded-xl px-4 py-3 text-start text-sm font-semibold text-gray-700 transition hover:bg-red-50 hover:text-red-600"
                >
                    Déconnexion
                </button>

            </form>

        </div>

    </div>

</nav>