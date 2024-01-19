
<!-- resources/views/filieres/index.blade.php -->
<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
    }

    .data-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .data-table th, .data-table td {
        border: 1px solid #1a1a1a;
        padding: 8px;
    }

    .data-table th:first-child, .data-table td:first-child {
        width: 20%;
        font-weight: bold;
        background-color: #1a1a1a;
        color: #fff;
    }

    .action-link, .add-link, .action-button {
        text-decoration: none;
        padding: 6px 10px;
        border-radius: 4px;
        margin-right: 8px;
    }
    .action-link {
        display: inline-block;
        padding: 6px 12px;
        margin-right: 8px;
        font-size: 14px;
        font-weight: 500;
        text-align: center;
        text-decoration: none;
        white-space: nowrap;
        border: 1px solid #3490dc;
        color: #3490dc;
        border-radius: 4px;
        transition: background-color 0.3s, color 0.3s;
    }

    .action-link:hover {
        background-color: #3490dc;
        color: #fff;
    }


    .action-button {
        background-color: #dc3545;
        color: #fff;
    }

</style>
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des filières</h1>
        @if(auth()->check())
            @if(auth()->user()->type === 'admin')
                <a href="{{ route('filieres.create') }}" class="add-link">Ajouter une filière</a>
            @endif
        @endif
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Students</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($filieres as $filiere)
                    <tr>
                        <td>{{ $filiere->id }}</td>
                        <td>{{ $filiere->nom }}</td>
                        <td>{{ \App\Models\Etudiants::where('filiere_id', $filiere->id)->count() }}</td>
                        <td>
                            <a href="{{ route('filieres.show', $filiere->id) }}" class="action-link">Voir</a>
                            @if(auth()->check())
                                @if(auth()->user()->type === 'admin')
                                    <a href="{{ route('filieres.edit', $filiere->id) }}" class="action-link">Modifier</a>
                                    <form action="{{ route('filieres.destroy', $filiere->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-button">Supprimer</button>
                                    </form>
                                @endif
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Aucune filière disponible.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
@endsection
