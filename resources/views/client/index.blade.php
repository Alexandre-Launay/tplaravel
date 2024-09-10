<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Liste des clients
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
            @if(Auth::check() && Auth::user()->is_admin)
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            @endif
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
            @if(Auth::check() && Auth::user()->is_admin)
              <td class="px-6 py-4 whitespace-nowrap">
                <a href="{{ route('client.edit', $client->id) }}">Edit</a>
                <form action="{{ route('client.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-red-600 hover:text-red-900">
                      Supprimer
                  </button>
              </form>
              </td>
            @endif
          </tr>
          @endforeach
        </tbody>
      </table>

</x-app-layout>