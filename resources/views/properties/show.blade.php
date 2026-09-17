<x-app-layout>

    <div class="min-h-screen bg-gray-100 py-8">

        <div class="mx-auto max-w-4xl px-4">

            <div class="mb-6">
                <a
                    href="{{ route('properties.index') }}"
                    class="text-sm font-medium text-indigo-600 hover:text-indigo-800"
                >
                    ← Retour aux propriétés
                </a>
            </div>

            <div class="rounded-xl bg-white p-6 shadow-md">

                <h1 class="text-3xl font-bold text-gray-900">
                    {{ $property->name }}
                </h1>

                <p class="mt-4 text-gray-600">
                    {{ $property->description }}
                </p>

                <div class="mt-4 flex justify-between">
                    <span class="text-gray-500">
                        Capacité : {{ $property->capacity }} personne(s)
                    </span>

                    <span class="font-bold text-indigo-600">
                        {{ number_format($property->price_per_night, 2) }} DT / nuit
                    </span>
                </div>

            </div>

            <livewire:booking-form :property="$property" />

        </div>

    </div>

</x-app-layout>