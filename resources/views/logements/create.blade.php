@extends('layouts.app')

@section('content')
<div class="container">
<<<<<<< HEAD
    <h2 class="text-center mb-4">Ajouter un Logement</h2>
=======
    <h2>Ajouter un Logement</h2>
>>>>>>> d4278f523441b9c35de155d30ffd5e3687634b6e

    <form action="{{ route('logements.store') }}" method="POST">
        @csrf
        <div class="form-group">
<<<<<<< HEAD
            <label for="id_Logement">ID Logement</label>
            <input type="text" class="form-control" id="id_Logement" name="id_Logement" required>
        </div>
        <div class="form-group">
            <label for="nb_Lit">Nombre de Lits</label>
            <input type="number" class="form-control" id="nb_Lit" name="nb_Lit" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
=======
            <label for="nb_Lit">Nombre de Lits</label>
            <input type="number" class="form-control" id="nb_Lit" name="nb_Lit" required min="1">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Créer</button>
    </form>
</div>
@endsection
>>>>>>> d4278f523441b9c35de155d30ffd5e3687634b6e
