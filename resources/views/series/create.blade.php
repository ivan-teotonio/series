<x-layout title="Nova Series">

    
<form action="{{ route('series.store') }}" method="post">
    @csrf

    <div class="row mb-3">
        <div class="col-md-8">
            <label for="name" class="form-label">Nome:</label>
            <input type="text"
                autofocus
                id="name"
                name="name"
                class="form-control"
                value="{{ old('name') }}">
        </div>

        <div class="col-md-2">
            <label for="seasonsQtd" class="form-label">Nª Temporadas:</label>
            <input type="text"
                id="seasonsQtd"
                name="seasonsQtd"
                class="form-control"
                value="{{ old('seasonsQtd') }}">
        </div>

        <div class="col-md-2">
            <label for="episodesPerSeason" class="form-label">Eps / Temporada:</label>
            <input type="text"
                id="episodesPerSeason"
                name="episodesPerSeason"
                class="form-control"
                value="{{ old('episodesPerSeason') }}">
        </div>

   </div>
    <button type="submit" class="btn btn-primary">{{ isset($name) ? 'Editar' : 'Adicionar' }}</button>
</form>
   

       
   
</x-layout>
