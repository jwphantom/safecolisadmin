@extends('layouts.base')

@section('contenu')
<div class="page-header">
    <h3 class="page-title"> {{ $namepage }} </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Voyage</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$namepage}}</li>
        </ol>
    </nav>
</div>
@if(session()->has('voyage_accepte'))
	<div class="alert alert-success alert-dismissible">{!! session('voyage_accepte') !!}</div>
@endif
@if(session()->has('voyage_supprime'))
	<div class="alert alert-success alert-dismissible">{!! session('voyage_supprime') !!}</div>
@endif
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $namepage }}</h4>
                <p class="card-description"> Liste des voyages en attente de validation
                </p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Ville de départ</th>
                            <th>Ville d'arrivé</th>
                            <th>Date de départ</th>
                            <th>Actif</th>
                            <th>voir</th>



                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($waitvoyages as $voyage)
                        <tr>
                            <td>{!! $voyage->id !!}</td>
                            <td>{!! $voyage->villedepart !!}</td>
                            <td>{!! $voyage->villearrive !!}</td>
                            <td>{!! $voyage->datedepart !!}</td>
                            <td><label class="badge badge-warning">{!! $voyage->active !!}</label></td>
                            <td>

                                <a href="{{ url('voyages/' . $voyage->id ) }}" class="btn btn-primary">Voir</a></td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="text-align: center">
                        {{ $waitvoyages->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection