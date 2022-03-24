@extends('layouts.app')
@section('title', deslug_identifier($pokemon->identifier))
@section('sub_title', 'Pokemon Description')
@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="form-group">
                <button class="btn btn-danger btn-md">Go Back</button>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ deslug_identifier($pokemon->identifier) }}</h4>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">{{ deslug_identifier($pokemon->identifier) }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Species: {{ $pokemon->species_id }}</h6>
                        <h6 class="card-subtitle mb-2 text-muted">Order: {{ $pokemon->order }}</h6>
                        <h6 class="card-subtitle mb-2 text-muted">Status: {!! $pokemon->is_default_view !!}</h6>
                        <h6 class="card-text">{{ deslug_identifier($pokemon->identifier) }} weigh about {{ $pokemon->weight }} kg. It is {{ $pokemon->height }} cm long. Its base experience is {{ $pokemon->base_experience }}.</h6>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit">
                            Edit Pokemon
                        </button>
                        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editLongTitle">Edit Pokemon</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="editForm" method="POST" action="{{ route('app.pokemons.update', $pokemon->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="identifier">Identifier</label>
                                                <input type="text" id="identifier" class="form-control" placeholder="Pokemon Identifier" autocomplete="off" value="{{ $pokemon->identifier }}" required name="identifier">
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label for="weight">Weight</label>
                                                    <input type="number" id="weight" class="form-control" placeholder="Pokemon Weight" autocomplete="off" value="{{ $pokemon->weight }}" required name="weight">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="height">Height</label>
                                                    <input type="number" id="height" class="form-control" placeholder="Pokemon Height" autocomplete="off" value="{{ $pokemon->height }}" required name="height">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label for="species_id">Species ID</label>
                                                    <input type="number" id="species_id" class="form-control" placeholder="Order" autocomplete="off" value="{{ $pokemon->species_id }}" required name="species_id">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="order">Order</label>
                                                    <input type="number" id="order" class="form-control" placeholder="Order" autocomplete="off" value="{{ $pokemon->order }}" required name="order">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="base_experience">Base Experience</label>
                                                <input type="number" id="base_experience" class="form-control" placeholder="Pokemon Base Experience" autocomplete="off" value="{{ $pokemon->base_experience }}" required name="base_experience">
                                            </div>
                                            <div class="form-group">
                                                <label for="is_default">Is Default</label>
                                                <input type="checkbox" id="is_default" @if($pokemon->is_default) checked @endif class="form-controls" placeholder="Is Default" autocomplete="off" value="{{ $pokemon->is_default }}" required name="is_default">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" form="editForm" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
