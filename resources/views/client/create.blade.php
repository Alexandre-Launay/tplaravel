<x-guest-layout>
    <div class="max-w-7xl mx-auto mt-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-xl font-bold mb-4">Créer un nouveau Client</h2>
    
                <form action="{{ route('client.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <!-- Civilité -->
                    <div class="mb-4">
                        <label for="civilite_id" class="block text-sm font-medium text-gray-700">Civilité</label>
                        <select name="civilite_id" id="civilite_id"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            required>
                            <option value="" disabled selected>Choisissez une civilité</option>
                            @foreach($civilites as $civilite)
                                <option value="{{ $civilite->id }}">{{ $civilite->titre }}</option>
                            @endforeach
                        </select>
                        @error('civilite_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <!-- Nom -->
                    <div class="mb-4">
                        <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                        <input type="text" name="nom" id="nom" value="{{ old('nom') }}"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            required>
                        @error('nom')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <!-- Prénom -->
                    <div class="mb-4">
                        <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
                        <input type="text" name="prenom" id="prenom" value="{{ old('prenom') }}"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            required>
                        @error('prenom')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            required>
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <!-- Téléphone -->
                    <div class="mb-4">
                        <label for="tel" class="block text-sm font-medium text-gray-700">Téléphone</label>
                        <input type="text" name="tel" id="tel" value="{{ old('tel') }}"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('tel')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <!-- Bouton de soumission -->
                    <div class="mt-6">
                        <x-primary-button>
                            {{ __('Enregistrer') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>