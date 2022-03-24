<?php


namespace App\Services;

use App\Models\Pokemon;

/**
 * Class PokemonService
 * @package App\Services
 */
class PokemonService {

    /**
     * @param $request
     * @return mixed
     */
    public function create($request){

        return Pokemon::create($request->only([
            'identifier',
            'species_id',
            'height',
            'weight',
            'base_experience',
            'order',
            'is_default',
        ]));
    }

    /**
     * @return mixed
     */
    public function getAll($paginate = 10) {
        $query = Pokemon::query();
        $search = request('search') ?? '';
        $query->when($search !== '', function ($q) use ($search){
            $q->where('identifier', 'LIKE', '%'.$search.'%');
        });
        return $query->orderBy('order', 'asc')->paginate($paginate);
    }

    /**
     * @return mixed
     */
    public function getTotal() {
        return $this->getAll()->total();
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function findById(int $id) {
        return Pokemon::find($id);
    }

    /**
     * @param string $identifier
     * @return mixed
     */
    public function findByIdentifier(string $identifier) {
        return Pokemon::where('identifier', $identifier)->first();
    }

    public function update($pokemon, $request){
        $pokemon->update($request->only([
            'identifier',
            'species_id',
            'height',
            'weight',
            'base_experience',
            'order',
            'is_default',
        ]));

        return $pokemon;
    }
}
