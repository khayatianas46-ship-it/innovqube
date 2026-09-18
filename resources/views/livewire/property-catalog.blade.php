<div class="space-y-8">

    {{-- Filtres --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
        <div class="mb-5">
            <h2 class="text-lg font-semibold text-gray-900">
                Rechercher une propriété
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Recherchez par nom et vérifiez la disponibilité selon vos dates.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">

            {{-- Recherche --}}
            <div class="lg:col-span-1">
                <label
                    for="search"
                    class="mb-2 block text-sm font-medium text-gray-700"
                >
                    Recherche
                </label>

                <div class="relative">
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
                                d="m21 21-4.35-4.35m2.35-5.65a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z"
                            />
                        </svg>
                    </div>

                    <input
                        id="search"
                        type="text"
                        wire:model.live.debounce.300ms="search"
                        placeholder="Nom de la propriété..."
                        class="w-full rounded-xl border-gray-300 py-3 pl-10 pr-4 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    >
                </div>
            </div>

            {{-- Date arrivée --}}
            <div>
                <label
                    for="startDate"
                    class="mb-2 block text-sm font-medium text-gray-700"
                >
                    Date d'arrivée
                </label>

                <input
                    id="startDate"
                    type="date"
                    wire:model.live="startDate"
                    class="w-full rounded-xl border-gray-300 py-3 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                >
            </div>

            {{-- Date départ --}}
            <div>
                <label
                    for="endDate"
                    class="mb-2 block text-sm font-medium text-gray-700"
                >
                    Date de départ
                </label>

                <input
                    id="endDate"
                    type="date"
                    wire:model.live="endDate"
                    class="w-full rounded-xl border-gray-300 py-3 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                >
            </div>

        </div>

        {{-- Information disponibilité --}}
        @if ($startDate && $endDate)
            <div class="mt-5 flex items-center gap-3 rounded-xl bg-indigo-50 px-4 py-3">
                <svg
                    class="h-5 w-5 shrink-0 text-indigo-600"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z"
                    />
                </svg>

                <p class="text-sm text-indigo-700">
                    Les résultats affichés correspondent aux dates sélectionnées.
                </p>
            </div>
        @endif
    </div>


    {{-- Résultats --}}
    <div>

        {{-- En-tête résultats --}}
        <div class="mb-5 flex items-end justify-between gap-4">
            <div>
                <h2 class="text-xl font-bold text-gray-900">
                    Propriétés disponibles
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    @if ($properties->total() > 0)
                        {{ $properties->total() }} propriété(s) trouvée(s)
                    @else
                        Aucune propriété trouvée
                    @endif
                </p>
            </div>
        </div>


        @if ($properties->count())

            {{-- Grille --}}
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">

                @foreach ($properties as $property)

                    <article
                        wire:key="property-{{ $property->id }}"
                        class="group flex h-full flex-col overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm transition duration-200 hover:-translate-y-1 hover:shadow-md"
                    >

                        {{-- En-tête propriété --}}
                        <div class="border-b border-gray-100 bg-gray-50 px-6 py-5">

                            <div class="flex items-start justify-between gap-4">

                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-wide text-indigo-600">
                                        Propriété
                                    </p>

                                    <h3 class="mt-1 text-lg font-bold text-gray-900">
                                        {{ $property->name }}
                                    </h3>
                                </div>

                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-100 text-indigo-600">
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
                                            d="M3 21h18M5 21V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16M9 7h1m4 0h1M9 11h1m4 0h1M9 15h1m4 0h1"
                                        />
                                    </svg>
                                </div>

                            </div>
                        </div>


                        {{-- Contenu --}}
                        <div class="flex flex-1 flex-col p-6">

                            <p class="line-clamp-3 text-sm leading-6 text-gray-600">
                                {{ $property->description }}
                            </p>


                            {{-- Informations --}}
                            <div class="mt-6 grid grid-cols-2 gap-3">

                                {{-- Capacité --}}
                                <div class="rounded-xl bg-gray-50 p-4">
                                    <p class="text-xs font-medium text-gray-500">
                                        Capacité
                                    </p>

                                    <div class="mt-2 flex items-baseline gap-1">
                                        <span class="text-lg font-bold text-gray-900">
                                            {{ $property->capacity }}
                                        </span>

                                        <span class="text-xs text-gray-500">
                                            personne(s)
                                        </span>
                                    </div>
                                </div>


                                {{-- Prix --}}
                                <div class="rounded-xl bg-indigo-50 p-4">
                                    <p class="text-xs font-medium text-gray-500">
                                        Tarif
                                    </p>

                                    <div class="mt-2">
                                        <span class="text-lg font-bold text-indigo-600">
                                            {{ number_format($property->price_per_night, 2) }} DT
                                        </span>
                                    </div>

                                    <p class="text-xs text-gray-500">
                                        par nuit
                                    </p>
                                </div>

                            </div>


                            {{-- Bouton --}}
                            <div class="mt-6">

                                <a
                                    href="{{ route('properties.show', $property) }}"
                                    class="flex w-full items-center justify-center gap-2 rounded-xl bg-indigo-600 px-4 py-3 text-sm font-semibold text-white transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                >
                                    Voir la propriété

                                    <svg
                                        class="h-4 w-4 transition-transform group-hover:translate-x-1"
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
                                </a>

                            </div>

                        </div>

                    </article>

                @endforeach

            </div>


            {{-- Pagination --}}
            <div class="mt-8">
                {{ $properties->links() }}
            </div>


        @else

            {{-- Aucun résultat --}}
            <div class="rounded-2xl border border-gray-200 bg-white px-6 py-16 text-center shadow-sm">

                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-gray-100">

                    <svg
                        class="h-7 w-7 text-gray-400"
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

                </div>

                <h3 class="mt-4 text-lg font-semibold text-gray-900">
                    Aucune propriété trouvée
                </h3>

                <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-gray-500">
                    Essayez de modifier votre recherche ou les dates sélectionnées.
                </p>

            </div>

        @endif

    </div>

</div>