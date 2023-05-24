<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class PostCollection extends Model {
        use HasFactory;

        protected $fillable = [
            'user_id',
            'collection_url',
            'slug',
            'published'
        ];

        public function user() {
            return $this->belongsTo(User::class);
        }
    }
