<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\StoreCollectionRequest;
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

            return response()->json([ "message" => "collection reposted and updated" ], 200);
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
    }
