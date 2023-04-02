<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sakin extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'sakinler';


    protected function carbonCreatedAt(): Attribute
    {
        return new Attribute(
            get: fn ($value, $attributes) => Carbon::parse(
                $attributes['created_at']
            )->diffForHumans(),
        );
    }

    protected function carbonUpdatedAt(): Attribute
    {
        return new Attribute(
            get: fn ($value, $attributes) => Carbon::parse(
                $attributes['updated_at']
            )->diffForHumans(),
        );
    }





}
