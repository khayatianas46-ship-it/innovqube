<div class="mt-6 rounded-xl bg-white p-6 shadow-md">

    <h2 class="text-2xl font-bold text-gray-900">
        Réserver : {{ $property->name }}
    </h2>

    <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2">

        <div>
            <label for="booking-start-date" class="block text-sm font-medium text-gray-700">
                Date d'arrivée
            </label>

            <input
                id="booking-start-date"
                type="date"
                wire:model.live="startDate"
                class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            >

            @error('startDate')
                <p class="mt-2 text-sm text-red-600">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div>
            <label for="booking-end-date" class="block text-sm font-medium text-gray-700">
                Date de départ
            </label>

            <input
                id="booking-end-date"
                type="date"
                wire:model.live="endDate"
                class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            >

            @error('endDate')
                <p class="mt-2 text-sm text-red-600">
                    {{ $message }}
                </p>
            @enderror
        </div>

    </div>

    <div class="mt-6">
        <p class="text-lg font-semibold text-gray-900">
            Prix par nuit :
            {{ number_format($property->price_per_night, 2) }} DT
        </p>

        @if ($totalPrice > 0)
            <p class="mt-2 text-xl font-bold text-indigo-600">
                Total :
                {{ number_format($totalPrice, 2) }} DT
            </p>
        @endif
    </div>

    <button
    type="button"
    wire:click="calculateBooking"
    class="mt-6 w-full rounded-lg bg-gray-200 px-4 py-3 font-semibold text-indigo-700 shadow-md transition hover:bg-gray-300"
>
    Réserver
</button>

</div>