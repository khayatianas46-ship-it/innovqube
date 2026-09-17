<div class="max-w-7xl mx-auto px-4 py-8">

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">
            Nos propriétés
        </h1>

        <p class="mt-2 text-gray-600">
            Trouvez le logement idéal pour votre séjour.
        </p>
    </div>

    {{-- Recherche --}}
    <div class="mb-8">
        <input
            type="text"
            wire:model.live.debounce.300ms="search"
            placeholder="Rechercher une propriété..."
            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        >

        <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2">

            <div>
                <label for="startDate" class="block text-sm font-medium text-gray-700">
                    Date d'arrivée
                </label>

                <input
                    id="startDate"
                    type="date"
                    wire:model.live="startDate"
                    class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                >
            </div>

            <div>
                <label for="endDate" class="block text-sm font-medium text-gray-700">
                    Date de départ
                </label>

                <input
                    id="endDate"
                    type="date"
                    wire:model.live="endDate"
                    class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                >
            </div>

        </div>
    </div>

    {{-- Liste des propriétés --}}
    @if ($properties->count())

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">

            @foreach ($properties as $property)

                <div class="overflow-hidden rounded-xl bg-white shadow-md transition hover:shadow-lg">

                    <div class="p-6">

                        <h2 class="text-xl font-semibold text-gray-900">
                            {{ $property->name }}
                        </h2>

                        <p class="mt-3 text-gray-600">
                            {{ $property->description }}
                        </p>

                        <div class="mt-4 flex items-center justify-between">
                            <span class="text-sm text-gray-500">
                                Capacité : {{ $property->capacity }} personne(s)
                            </span>

                            <span class="font-bold text-indigo-600">
                                {{ number_format($property->price_per_night, 2) }} DT / nuit
                            </span>
                        </div>

                        {{-- Bouton Réserver --}}
                        <a
    href="{{ route('properties.show', $property) }}"
    class="mt-6 block w-full rounded-lg bg-gray-200 px-4 py-3 text-center font-semibold text-indigo-700 shadow-md transition hover:bg-gray-300"
>
    Réserver
</a>

                    </div>

                </div>

            @endforeach

        </div>

        {{-- Pagination --}}
        <div class="mt-8">
            {{ $properties->links() }}
        </div>

    @else

        <div class="rounded-lg bg-gray-50 p-8 text-center">
            <p class="text-gray-600">
                Aucune propriété trouvée.
            </p>
        </div>

    @endif

</div>