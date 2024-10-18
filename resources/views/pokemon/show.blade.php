@extends('layouts.template')

@section('title', "pokemon: $pokemon->name")

@section('body')
@if ($pokemon->photo)
    <img src="{{ $pokemon->photo_url }}" class="rounded img-thumbnail mx-auto d-block my-3"/>
@endif

<table class="table table-bordered">
    <tbody>
        <tr>
            <th scope="row">name</th>
            <td>{{ $pokemon->name }}</td>
        </tr>
        <tr>
            <th scope="row">species</th>
            <td>{{ $pokemon->species }}</td>
        </tr>
        <tr>
            <th scope="row">primary_type</th>
            <td>{{ $pokemon->primary_type }}</td>
        </tr>
        <tr>
            <th scope="row">weight</th>
            <td>{{ $pokemon->weight }}</td>
        </tr>
        <tr>
            <th scope="row">height</th>
            <td>{{ $pokemon->height}}</td>
        </tr>
        <tr>
            <th scope="row">hp</th>
            <td>{{ $pokemon->hp }}</td>
        </tr>
        <tr>
            <th scope="row">attack</th>
            <td>{{ $pokemon->attack }}</td>
        </tr>
        <tr>
            <th scope="row">defense</th>
            <td>{{ $pokemon->defense }}</td>
        </tr>
        <tr>
            <th scope="row">is_legendary</th>
            <td>{{ $pokemon->is_legendary }}</td>
        </tr>
    </tbody>
</table>
@endsection
