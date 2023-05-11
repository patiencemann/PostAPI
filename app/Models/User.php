<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Laravel\Passport\HasApiTokens;
    use Laratrust\Traits\LaratrustUserTrait;
    use Illuminate\Support\Str;

    class User extends Authenticatable {
        use HasApiTokens,
            HasFactory,
            Notifiable,
            LaratrustUserTrait;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            'name',
            'email',
            'password',
            'provider',
            'provider_id',
            'provider_token',
            'provider_remember_token',
            'email_verified_at',
            'avatar'
        ];

        /**
         * The attributes that should be hidden for serialization.
         *
         * @var array<int, string>
         */
        protected $hidden = [
            'password',
            'remember_token',
        ];

        /**
         * The attributes that should be cast.
         *
         * @var array<string, string>
         */
        protected $casts = [
            'email_verified_at' => 'datetime',
        ];

        public function postCollections() {
            return $this->hasMany(PostCollection::class);
        }

        protected static function boot() {
            parent::boot();

            /**
             * Generate doc slug
             */
            static::creating(function ($user) {
                $user->slug = Str::lower(Str::slug($user->name)."_".Str::random(10));
            });
        }
    }
