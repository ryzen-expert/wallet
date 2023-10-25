<?php

namespace Tests\Models;

use Database\Factories\UserFactory;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use O21\LaravelWallet\Contracts\SupportsBalance;
use O21\LaravelWallet\Models\Concerns\HasBalance;

class User extends Model implements SupportsBalance
{
    use HasFactory;
    use HasBalance;
    use Authenticatable;

    protected $fillable = ['name'];

    public $timestamps = false;

    protected $table = 'users';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return UserFactory::new();
    }
}
