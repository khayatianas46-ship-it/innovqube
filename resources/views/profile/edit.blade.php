<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">
                Mon profil
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Gérez vos informations personnelles et la sécurité de votre compte.
            </p>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gray-100 py-10">

        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">

            {{-- Introduction --}}
            <div class="mb-8">
                <div class="rounded-2xl bg-gradient-to-r from-indigo-600 to-indigo-800 px-6 py-8 shadow-lg sm:px-8">

                    <div class="flex items-center gap-4">

                        <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-full bg-white/10 text-white ring-1 ring-white/20">
                            <svg
                                class="h-7 w-7"
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

                        <div>
                            <h1 class="text-2xl font-bold text-white">
                                Paramètres du compte
                            </h1>

                            <p class="mt-1 text-sm text-indigo-100">
                                Mettez à jour vos informations et sécurisez votre compte.
                            </p>
                        </div>

                    </div>

                </div>
            </div>

            <div class="space-y-6">

                {{-- Informations personnelles --}}
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
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7-7"
                                    />
                                </svg>
                            </div>

                            <div>
                                <h3 class="text-base font-semibold text-gray-900">
                                    Informations personnelles
                                </h3>

                                <p class="text-sm text-gray-500">
                                    Modifiez votre nom et votre adresse e-mail.
                                </p>
                            </div>

                        </div>

                    </div>

                    <div class="p-6 sm:p-8">
                        <div class="max-w-2xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                </div>

                {{-- Mot de passe --}}
                <div class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-gray-200">

                    <div class="border-b border-gray-200 px-6 py-5 sm:px-8">

                        <div class="flex items-center gap-3">

                            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
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
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                                    />
                                </svg>
                            </div>

                            <div>
                                <h3 class="text-base font-semibold text-gray-900">
                                    Sécurité
                                </h3>

                                <p class="text-sm text-gray-500">
                                    Modifiez votre mot de passe pour protéger votre compte.
                                </p>
                            </div>

                        </div>

                    </div>

                    <div class="p-6 sm:p-8">
                        <div class="max-w-2xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                </div>

                {{-- Suppression du compte --}}
                <div class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-red-200">

                    <div class="border-b border-red-100 bg-red-50 px-6 py-5 sm:px-8">

                        <div class="flex items-center gap-3">

                            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-red-100 text-red-600">
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
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-7 0h10"
                                    />
                                </svg>
                            </div>

                            <div>
                                <h3 class="text-base font-semibold text-red-900">
                                    Supprimer le compte
                                </h3>

                                <p class="text-sm text-red-700">
                                    Cette action est définitive.
                                </p>
                            </div>

                        </div>

                    </div>

                    <div class="p-6 sm:p-8">
                        <div class="max-w-2xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>