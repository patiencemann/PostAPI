<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreatePostCollectionsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('post_collections', function (Blueprint $table) {
                $table->id();
                $table->string('slug')->nullable();
                $table->unsignedBigInteger('user_id');
                $table->longText('collection_url');
                $table->boolean('published')->nullable()->default(false);
                $table->timestamp('published_at')->nullable()->default(now());
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('post_collections');
        }
    }
