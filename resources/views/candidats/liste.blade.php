<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste Candidats') }}
            <a href="/dashboard" class="btn btn-primary">Home</a>

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="card">
                        <div class="card-header">Liste des Candidats</div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>#</th>
                                    <th>Photo</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Parti</th>

                                    <th>Biographie</th>
                                    <th>Validation</th>
                                    <th>Action</th>
                                    <th>Detail</th>
                                </tr>

                                @foreach ($candidat as $cand)
                                    <tr>
                                        <td>{{ $cand->id }}</td>
                                        <td><img src="/downloads/{{ $cand->photo }}" alt="" width="100"></td>
                                        <td>{{ $cand->Nom }}</td>
                                        <td>{{ $cand->Prenom }}</td>
                                        <td>{{ $cand->Parti }}</td>
                                        <td>{{ $cand->Biographie }}</td>
                                        <td>{{ $cand->Validate }}</td>

                                        <td>


                                            <a href="{{ route('candidat.create') }}" class="btn btn-warning ms-3"
                                            @can('create', App\Models\Property::class)
                                                @if (auth()->user()->is_admin)
                                                    style="display: inline-block;"
                                                @else
                                                    style="display: none;"
                                                @endif
                                            @endcan
                                        >Ajouter</a>
                                        <a href="{{ route('candidat.edit', $cand->id) }}" class="btn btn-warning ms-3"
                                            @can('edit', App\Models\Property::class)
                                                @if (auth()->user()->is_admin)
                                                    style="display: inline-block;"
                                                @else
                                                    style="display: none;"
                                                @endif
                                            @endcan
                                        >editer</a>
                                            <form action="{{ route('candidat.destroy', $cand->id) }}" method="post"
                                                @can('delete', App\Models\Property::class)
                                                @if (auth()->user()->is_admin)
                                                    style="display: inline-block;"
                                                @else
                                                    style="display: none;"
                                                @endif
                                            @endcan>
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Voulez-vous vraiment supprimer le candidat?')" type="submit" class="btn btn-danger mt-3">Supprimer</button>
                                            </form>
                                        </td>
                                        <td><a  href="{{ route('candidat.programme', $cand->id) }}">{{ $cand->Nom }}</a></td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
