<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('  Ajouter Candidat') }}
            <a href="/dashboard" class="btn btn-primary">Home</a>
            <a class="btn btn-primary" href="{{route('candidat.index')}}">Liste</a>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

            @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <ul>
            @foreach ($errors->all() as $error)
                <li class="alert alert-danger">{{ $error }}</li>
            @endforeach
        </ul>
                    <form action="{{route('candidat.store')}}" method="post" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                          <label for="nom">Nom</label>
                          <input type="text" name="Nom" id="" class="form-control" required>
                        </div>

                        <div class="form-group">
                          <label for="nom">Prénom</label>
                          <input type="text" name="Prenom" id="" class="form-control" required>
                        </div>

                        <div class="form-group">
                          <label for="parti">Parti</label>
                          <input type="text" name="Parti" id="" class="form-control"required>
                        </div>

                        <div class="form-group">
                          <label for="Biographie">Biographie</label>
                          <textarea name="Biographie" id="" cols="5" rows="5" class="form-control"required></textarea>
                        </div>

                        <div class="form-group">
                          <label for="Validate">Validation Candidature</label>
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="radio" name="Validate" role="switch" value="1" required>
                            <label class="form-check-label" for="Validate">Accepter</label>
                          </div>

                          <div class="form-check form-switch">
                            <input class="form-check-input" type="radio" name="Validate" role="switch" value="0" required>
                            <label class="form-check-label" for="Validate">Refuser</label>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="photo">Photo Candidat : </label>
                          <!-- <input type="text" name="photo" required class="form-control"> -->
                          <input type="file" class="form-control" accept=".jpeg, .jpg, .png" id="" name="photo" required>
                        </div> <br>

                        <div class="form-group">
                          <button class="btn btn-success">Enregistrer</button>
                        </div>
                        <a href="{{route('candidat.index')}}" class="btn btn-primary">Retourner à la liste des candidats</a>
                      </form>

            </div>
        </div>
    </div>
    </x-app-layout>
