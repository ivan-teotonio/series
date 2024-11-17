<x-layout title="Nova Series">

    <x-series.form :action="route('series.store')" />

   

        <!-- <form action="{{ route('series.store') }}" method="post" class="ms-2">
            @csrf
            <div class="form-group mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>

            <button class="btn btn-primary">Adicionar</button>
        </form>
    </span> -->
   
</x-layout>
