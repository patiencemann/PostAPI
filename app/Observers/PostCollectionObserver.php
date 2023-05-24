<?php

    namespace App\Observers;

    use App\Models\PostCollection;
    use App\Models\User;

    class PostCollectionObserver {
         /**
         * Handle the Product "created" event.
         *
         * @param  \App\Models\CompanyJobs  $job
         * @return void
         */
        public function created(PostCollection $collection) {
            $collection->slug = generateSlug($collection->id, User::where('id', $collection->user_id)->first()->name.'-collection');
            $collection->save();
        }
    }
