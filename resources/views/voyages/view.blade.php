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

@foreach ($voyage as $index)
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{!! $index->villedepart !!} 
                    <i class="mdi mdi-arrow-right
                    mr-2 text-primary"></i>
                {!! $index->villearrive !!}</h4>
            <div class="media">
                <div class="media-body">
                    <p class="card-text"><i class="mdi mdi-clock-fast mr-2 text-primary"></i>
                        Heure de départ : {!! $index->datedepart !!} </p>
                    <p class="card-text"><i class="mdi mdi-clock-fast mr-2 text-primary"></i>
                        Kilo disponible : {!! $index->kilodisponible !!}Kg </p>
                    <p class="card-text"><i class="mdi mdi-clock-fast mr-2 text-primary"></i>
                        Prix par kilo :   ${!! $index->prixkilo !!} </p>
                     <p class="card-text"><i class="mdi mdi-clock-fast mr-2 text-primary"></i>
                        Date d'ajout :   {!! $index->dateajout !!} </p>
                    <p class="card-text"><i class="mdi mdi-clock-fast mr-2 text-primary"></i>
                           Pièce de voyage </p>
                           <p class="card-text">
                            <img src="https://res.cloudinary.com/doxl9x2a0/image/upload/{!! $index->url_justification !!}.{!!$ext_just->url!!}"  width="30%" height="300">
                                 </p>
                    <p class="card-text"><i class="mdi mdi-clock-fast mr-2 text-primary"></i>
                            Pièce d'identité</p>
                            <p class="card-text">
                                <img src="https://res.cloudinary.com/doxl9x2a0/image/upload/{!! $index->url_identification !!}.{!!$ext_id->url!!}"  width="30%" height="300">
                                     </p>

                          <p class="card-text text-right">
                                <a href="{{ url('voyages/accept/' . $index->id ) }}" class="btn btn-success">Valider</a>
                                <a href="{{ url('voyages/refuse/' . $index->id ) }}" class="btn btn-danger">Refuser</a>
                            </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection