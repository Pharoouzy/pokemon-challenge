<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PokemonService;

/**
 * Class PokemonController
 * @package App\Http\Controllers\V1
 */
class PokemonController extends Controller {

    /**
     * @var PokemonService
     */
    public $pokemonService;

    /**
     * PokemonController constructor.
     * @param PokemonService $pokemonService
     */
    public function __construct(PokemonService $pokemonService) {
        $this->pokemonService = $pokemonService;
    }

    public function index() {
        $pokemons = $this->pokemonService->getAll(12);

        return view('pages.home', compact('pokemons'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id) {

        $request['id'] = $id;
        $request['is_default'] = isset($request->is_default);

        $pokemon = $this->pokemonService->findById($id);

        $this->validate($request, [
            'id' => 'required|integer|exists:pokemon,id',
            'identifier' => 'string|sometimes|unique:pokemon,name,'.$pokemon->id,
            'species_id' => 'integer|required',
            'height' => 'numeric|required',
            'weight' => 'numeric|required',
            'base_experience' => 'integer|required',
            'order' => 'integer|required',
            'is_default' => 'required',
        ]);

        $this->pokemonService->update($pokemon, $request);

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function show(Request $request, $id) {

        $request['id'] = $id;

        $this->validate($request, ['id' => 'required|integer|exists:pokemon,id']);

        $pokemon = $this->pokemonService->findById($id);

        return view('pages.pokemons.show', compact('pokemon'));
    }
}
