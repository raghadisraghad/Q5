<!-- resources/views/filieres/form.blade.php -->
<style>
    .container {
        max-width: 600px;
        margin: 0 auto;
    }

    .form-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .form-table td {
        border: 1px solid #1a1a1a;
        padding: 8px;
    }

    .form-table td:first-child {
        width: 30%; /* Adjust the width as needed */
        font-weight: bold;
        background-color: #1a1a1a;
        color: #fff;
    }

    .styled-input {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
    }
</style>
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ isset($filieres) ? 'Modifier une filiere' : 'Ajouter une filiere' }}</h1>

        <form action="{{ isset($filieres) ? route('filieres.update', $filieres->id) : route('filieres.store') }}" method="POST">
            @csrf
            @if(isset($filieres))
                @method('PUT')
            @endif

            <table class="form-table">
                <tbody>
                    <tr>
                        <td><label for="nom">Nom de la filiere:</label></td>
                        <td>
                            <input type="text" id="nom" name="nom" value="{{ isset($filieres) ? $filieres->nom : '' }}" required class="styled-input">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit">{{ isset($filieres) ? 'Modifier' : 'Ajouter' }}</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
@endsection
