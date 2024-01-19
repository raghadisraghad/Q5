<!-- resources/views/etudiants/form.blade.php -->
<style>
    .styled-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        border-radius: 10px;
    }

    .styled-table th, .styled-table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    .styled-table th {
        background-color: #1a202c; /* Header background color */
        color: #ffffff; /* Header text color */
    }

    .styled-input {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
        background-color: transparent; /* Invisible background */
        color: #333; /* Text color */
    }

    .styled-select {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
        background-color: #1a202c; /* Background color similar to the header */
        color: #ffffff; /* Text color */
    }

    .styled-button {
        background-color: #3490dc;
        color: #ffffff;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .styled-button:hover {
        background-color: #2779bd;
    }


</style>
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ isset($etudiants) ? 'Modifier un étudiant' : 'Ajouter un étudiant' }}</h1>
        <h1><a href="{{ route('etudiants.index') }}">Retour à la liste des étudiants</a></h1>

        @if(isset($etudiants))
            <form action="{{ route('etudiants.update', $etudiants->id) }}" method="POST">
                @method('PUT')
        @else
            <form action="{{ route('etudiants.store') }}" method="POST">
        @endif
            @csrf
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Field</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><label for="prenom">Student's Name:</label></td>
                        <td><input type="text" id="prenom" name="prenom" value="{{ isset($etudiants) ? $etudiants->prenom : '' }}" required class="styled-input"></td>
                    </tr>
                    <tr>
                        <td><label for="nom">Student's LastName:</label></td>
                        <td><input type="text" id="nom" name="nom" value="{{ isset($etudiants) ? $etudiants->nom : '' }}" required class="styled-input">
                    </td>
                    </tr>
                    <tr><td><label for="sexe">Student's Sexe:</label></td>
                        <td>
                            <select id="sexe" name="sexe" required class="styled-select">
                                <option value="male" {{ (isset($etudiants) && $etudiants->sexe == 'male') ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ (isset($etudiants) && $etudiants->sexe == 'female') ? 'selected' : '' }}>Female</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="filiere_id">Student's Sector:</label></td>
                        <td>
                            <select id="filiere" name="filiere_id" required class="styled-select">
                                @foreach(\App\Models\Filieres::all() as $filiere)
                                    <option value="{{ $filiere->id }}" 
                                        {{ (isset($etudiants) && $etudiants->filiere_id == $filiere->id) ? 'selected' : '' }}>
                                        {{ $filiere->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="user_id">Users:</label></td>
                        <td>
                            <select id="user_id" name="user_id" required class="styled-select">
                                @foreach(\App\Models\User::all() as $user)
                                    <option value="{{ $user->id }}" 
                                        {{ (isset($etudiants) && $etudiants->user_id == $user->id) ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>

            <button type="submit" class="styled-button">{{ isset($etudiants) ? 'Modifier' : 'Ajouter' }}</button>
        </form>
    </div>
@endsection
