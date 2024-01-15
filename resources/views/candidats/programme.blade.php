<!-- resources/views/candidat/programme.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <!-- ... en-tête de la vue du programme ... -->
    </x-slot>

    <div class="py-12">
        <!-- ... contenu de la vue du programme ... -->
        <h1>Programme de {{ $candidat->Nom }}</h1>

        <!-- Affichez ici les détails du programme du candidat -->
        <div class="card-header">Liste des Programmes</div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Document</th>
                    <th>choiX</th>
                    <th>candidat</th>
                    <th>secteur</th>
                    <th>Action</th>
                </tr>

                @foreach ($programmes as $programme)
                    <tr>
                        <td>{{ $programme->id }}</td>
                        <td>{{ $programme->titre }}</td>
                        <td>{{ $programme->contenu }}</td>
                        <td>{{ $programme->document }}</td>
                        <td>
                            <livewire:program-vote :program="$programme" :key="$programme->id" />
                        </td>
                        <td>
                            @if ($programme->candidat)
                                {{ $programme->candidat->Nom }} {{ $programme->candidat->Prenom }}
                            @else
                                Aucun candidat associé
                            @endif
                        </td>
                        <td>
                            @if ($programme->secteur)
                                {{ $programme->secteur->libelle }}
                            @endif
                        </td>
                        <td>
                            <!-- Ajoutez ici les actions pour chaque programme si nécessaire -->
                            <a href="{{ route('programme.create') }}" class="btn btn-warning ms-3"
                                @can('create', App\Models\Property::class)
                                    @if (auth()->user()->is_admin)
                                        style="display: inline-block;"
                                    @else
                                        style="display: none;"
                                    @endif
                                @endcan
                            >Ajouter</a>

                            <a href="{{ route('programme.edit', $programme->id) }}" class="btn btn-warning ms-3"
                                @can('edit', App\Models\Property::class)
                                    @if (auth()->user()->is_admin)
                                        style="display: inline-block;"
                                    @else
                                        style="display: none;"
                                    @endif
                                @endcan
                            >Editer</a>

                            <form action="{{ route('programme.destroy', $programme->id) }}" method="post"
                                @can('delete', App\Models\Property::class)
                                    @if (auth()->user()->is_admin)
                                        style="display: inline-block;"
                                    @else
                                        style="display: none;"
                                    @endif
                                @endcan>
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Voulez-vous vraiment supprimer le programme?')" type="submit" class="btn btn-danger mt-3">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</x-app-layout>
