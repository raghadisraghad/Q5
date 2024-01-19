<!-- resources/views/etudiants/index.blade.php -->
<style>
    .container a.button {
        display: inline-block;
        padding: 8px 12px;
        margin-right: 10px;
        background-color: #61dafb; /* Light blue button color */
        color: #fff; /* White text color */
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s, color 0.3s;
    }

    .container a.button:hover {
        background-color: #4a8bc2; /* Darker blue color on hover */
    }

    .container button {
        background-color: #e44d26; /* Red button color */
        color: #fff; /* White text color */
        padding: 8px 12px;
        border: none;
        cursor: pointer;
        border-radius: 4px;
        transition: background-color 0.3s, color 0.3s;
    }

    .container button:hover {
        background-color: #d5371d; /* Darker red color on hover */
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    .container h1 {
        color: #61dafb; /* Light blue heading color */
    }

    .container table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .container thead {
        background-color: #333; /* Dark grey header background color */
        color: #ffffff; /* Light text color */
    }

    .container th, .container td {
        padding: 12px;
        border: 1px solid #555; /* Medium grey border color */
    }
    
    .container td {
        color: black;
    }

    .container tr:nth-child(even) {
        background-color: #555; /* Medium grey background color for even rows */
    }

    .container a {
        color: #61dafb; /* Light blue link color */
        text-decoration: none;
        margin-right: 10px;
    }

    .container a:hover {
        text-decoration: underline;
    }

    .container button {
        background-color: #e44d26; /* Red button color */
        color: black; /* Light text color */
        padding: 8px 12px;
        border: none;
        cursor: pointer;
    }

    .container button:hover {
        background-color: #d5371d; /* Darker red color on hover */
    }

    /* Add more styles as needed */

</style>

@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Liste des etudiants</h1>
        
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>lastName</th>
                    <th>Sexe</th>
                    <th>Sector</th>
                    <th>User</th>
                </tr>
            </thead>
            <tbody>
                @forelse($etudiants as $etudiant)
                    <tr>
                        <td>{{ $etudiant->id }}</td>
                        <td>{{ $etudiant->prenom }}</td>
                        <td>{{ $etudiant->nom }}</td>
                        <td>{{ $etudiant->sexe }}</td>
                        <td>{{ $etudiant->filiere_id }}</td>
                        <td>{{ $etudiant->user_id }}</td>
                        <td>
                            <a href="{{ route('etudiants.show', $etudiant->id) }}" class="button">Show</a>
                            <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="button">Edit</a>

                            <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Aucun étudiant disponible.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <a href="{{ route('etudiants.create') }}">Ajouter un etudiant</a>
    </div>
@endsection
