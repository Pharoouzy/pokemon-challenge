@extends('layouts.app')

@section('content')
    <section id="bs-pokemon" class="bs-pokemon roomy-50 p-top-100 bg-white fix mb-5">
        <div class="container">
            <div class="col-md-10 mb-4">
                <form>
                    <div class="form-row">
                        <input type="text" class="form-control col-8 mr-3" placeholder="Search Pokemon" autocomplete="off" value="{{ request('search') }}" name="search">
                        <button type="submit" class="btn btn-primary col-2">Search</button>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>The Pokémon Full Stack Coding Challenge Solution</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @forelse($pokemons as $pokemon)
                                <div class="col-md-4 mb-5">
                                    <div class="card h-100" style="width: 18rem;">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ deslug_identifier($pokemon->identifier) }}</h5>
                                            <h6 class="card-subtitle mb-2 text-muted">Species: {{ $pokemon->species_id }}</h6>
                                            <p class="card-text">{{ deslug_identifier($pokemon->identifier) }} weigh about {{ $pokemon->weight }} kg. It is {{ $pokemon->height }} cm long. Its base experience is {{ $pokemon->base_experience }}...</p>
                                            <a href="{{ route('app.pokemons.show', $pokemon->id) }}" class="card-link">Read more...</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <h4>No record found</h4>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($pokemons)
    <section id="bs-pokemon" class="bs-pokemon mb-5">
        <div class="container">
            {{ $pokemons->appends(request()->except('page'))->links() }}
        </div>
    </section>
    @endif
@endsection
