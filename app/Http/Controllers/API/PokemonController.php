<?php

namespace App\Http\Controllers\API;

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

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() {
        $pokemon = $this->pokemonService->getAll();

        return successResponse('Pokemon successfully retrieved', $pokemon);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id) {

        $request['id'] = $id;

        $pokemon = $this->pokemonService->findById($id);

        $this->validate($request, [
            'id' => 'required|integer|exists:pokemon,id',
            'identifier' => 'string|sometimes|unique:pokemon,name,'.$pokemon->id,
            'species_id' => 'integer|sometimes',
            'height' => 'numeric|sometimes',
            'weight' => 'numeric|sometimes',
            'base_experience' => 'integer|sometimes',
            'order' => 'integer|sometimes',
            'is_default' => 'boolean|sometimes',
        ]);

        $this->pokemonService->update($pokemon, $request);

        return successResponse('Pokemon successfully updated.', $pokemon);
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

        return successResponse('Pokemon info successfully retrieved.', $pokemon);
    }
}
