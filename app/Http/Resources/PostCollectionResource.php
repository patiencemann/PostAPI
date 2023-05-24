<?php

    namespace App\Http\Resources;

    use Illuminate\Http\Resources\Json\JsonResource;

    class PostCollectionResource extends JsonResource {
        /**
         * Transform the resource into an array.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
         */
        public function toArray($request) {
            return [
                'id' => $this->id,
                'slug' => $this->slug,
                "user_id" => $this->user_id,
                "collection_url" => $this->collection_url,
                "created_at" => $this->created_at->toDateTimeString()
            ];
        }
    }
