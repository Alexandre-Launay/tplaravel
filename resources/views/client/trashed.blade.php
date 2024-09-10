<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Liste des clients supprimés
        </h2>
    </x-slot>

    @if(session()->has('success'))
      <p>{{ session()->get('success') }}</p>
    @endif

    <table class="w-full table-auto">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Civilité</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nom</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Prénom</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Téléphone</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date Suppression</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($clients as $client)
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">{{$client->civilite->titre}}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{$client->nom}}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{$client->prenom}}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{$client->email}}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{$client->tel}}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{$client->deleted_at}}</td>
            <td class="px-6 py-4 whitespace-nowrap">
              <form action="{{ route('client.restore', $client->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir restaurer ce client ?');">
                @csrf
                @method('PATCH')
                <button type="submit" class="text-red-600 hover:text-red-900">
                    Restaurer
                </button>
            </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

</x-app-layout>