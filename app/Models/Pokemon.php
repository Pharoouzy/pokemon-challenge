<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'identifier',
        'species_id',
        'height',
        'weight',
        'base_experience',
        'order',
        'is_default',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'identifier' => 'string',
        'species_id' => 'string',
        'height' => 'float',
        'weight' => 'float',
        'base_experience' => 'integer',
        'order' => 'integer',
        'is_default' => 'boolean',
    ];

    public function getIsDefaultViewAttribute(){
        if($this->is_default){
            return '<span class="badge badge-success">Default</span>';
        }

        return '<span class="badge badge-danger">Not Default</span>';
    }
}
