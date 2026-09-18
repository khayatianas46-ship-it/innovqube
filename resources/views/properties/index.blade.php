<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">
                Propriétés
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Trouvez la propriété idéale pour votre séjour.
            </p>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gray-50 py-8">

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <livewire:property-catalog />

        </div>

    </div>

</x-app-layout>