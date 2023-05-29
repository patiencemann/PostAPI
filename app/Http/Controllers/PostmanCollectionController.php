<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\StoreCollectionRequest;
    use App\Http\Requests\UpdateCollectionRequest;
    use App\Http\Resources\PostCollectionResource;
    use App\Models\PostCollection;
    use App\Traits\FileStorage;
    use Illuminate\Http\Request;

    class PostmanCollectionController extends Controller {
        use FileStorage;

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index() {
            return response()->json([
                "data" => PostCollectionResource::collection(
                    PostCollection::where('user_id', user()->id)->orderBy('created_at', 'desc')->get()
                ), "message" => "collections listed"
            ]);
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(StoreCollectionRequest $request) {
            if ($request->hasFile('collection')) {
                $collection = $this->storeFile('collections', $request->file('collection'));
                $postCollection = user()->postCollections()->create([ 'collection_url' => $collection ]);

                return response()->json([
                    "data" => PostCollectionResource::make($postCollection),
                    "message" => "collection imported"
                ], 201);
            }

            return response()->json([ "message" => "collection not found" ], 400);
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function repost(PostCollection $collection, Request $request) {
            $file = public_path()."/storage/".$collection->collection_url;
            file_put_contents($file, json_encode($request->new_collection_contents));

            return response()->json([
                "message" => "collection reposted and updated",
                "data" => PostCollectionResource::make($collection)
            ], 200);
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  PostCollection $collection
         * @return \Illuminate\Http\Response
         */
        public function destroy(PostCollection $collection) {
            $this->deleteFile($collection->collection_url);
            $collection->delete();

            return response()->json([ "message" => "Collection have been deleted "]);
        }

        /**
         * Update json file based on request
         *
         * @param PostCollection $collection
         * @param UpdateCollectionRequest $request
         * @return JsonResponse
         */
        public function updateCollection(PostCollection $collection, UpdateCollectionRequest $request) {
            $collectionFile = public_path()."/storage/".$collection->collection_url;
            $collectionJson = file_get_contents($collectionFile, false);

            // Converts JSON into an associative array.
            $collectionItems = json_decode($collectionJson, true);

            $updatedCollection = [];

            if($request->section == "info.name"){
                $collectionItems['info']['name'] = $request->changes['name'];
            }

            if($request->section == "info.description"){
                $collectionItems['info']['description'] = $request->changes['description'];
            }

            if(array_key_exists('info', $collectionItems)){
                $updatedCollection['info'] = $collectionItems['info'];
            }

            if(array_key_exists('auth', $collectionItems)) {
                $updatedCollection['auth'] = $collectionItems['auth'];
            }

            if(array_key_exists('event', $collectionItems)) {
                $updatedCollection['event'] = $collectionItems['event'];
            }

            if(array_key_exists('item', $collectionItems)) {
                $updatedCollection['item'] = $collectionItems['item'];
            }

            if($request->section == "item") {
                $collectionIn = $this->traverseThroughJSON($collectionItems['item'], $request->id, $request->changes);
                $updatedCollection['item'] = $collectionIn;
            }

            $collectionJson = file_put_contents($collectionFile, json_encode($updatedCollection));
            return response()->json([ "message" => "Collection updated"]);
        }

        /**
         * A recursive function to traverse the GeoJSON array.
         *
         * @param $collectionItems
         * @param $search
         * @param $changes
         */
        private function traverseThroughJSON($collectionItems, $search, $changes) {
            foreach ($collectionItems as $key => $value) {
                if (is_array($value)) {
                    $collectionItems[$key] = $this->traverseThroughJSON($value, $search, $changes);
                } elseif ($key === 'id') {
                    if($value == $search) {
                        if(isset($changes['name'])) {
                            $collectionItems['name'] = $changes['name'];
                        }

                        if(isset($changes["description"])) {
                            $collectionItems["description"] = $changes['description'];
                        }
                    }
                }
            }

            return $collectionItems;
        }

        /**
         * Set collection public
         *
         * @param PostCollection collection
         */
        public function publish(PostCollection $collection) {
            $collection->published = now();
            $collection->save();
            return response()->json([ "message" => "Collection published"]);
        }

        /**
         * show collection public
         *
         * @param PostCollection collection
         */
        public function show(PostCollection $collection) {
            return response()->json([
                "message" => "Collection published",
                "data" => PostCollectionResource::make($collection)
            ]);
        }
    }
