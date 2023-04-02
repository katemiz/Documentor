<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gelir extends Model
{
    use HasFactory;


    protected $guarded = [];

    protected $table = 'gelirler';



    public function sakinler()
    {
        return $this->hasMany(GelirGider::class);
    }


    protected function carbonCreatedAt(): Attribute
    {
        return new Attribute(
            get: fn ($value, $attributes) => Carbon::parse(
                $attributes['created_at']
            )->diffForHumans(),
        );
    }



}
