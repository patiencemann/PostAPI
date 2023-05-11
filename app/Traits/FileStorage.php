<?php

    namespace App\Traits;

    use Illuminate\Http\UploadedFile;
    use Illuminate\Support\Facades\Storage;

    trait FileStorage {
        /**
         * Upload given file to public/dir
         *
         * @param UploadedFile $collectionFile
         * @return UploadedFile $collectionFile
         */
        public function storeFile($dir, $collectionFile) {
            $template = 'patienceman_';

            if(!$collectionFile) return false;

            $md5Name = $template.time().'_'.md5_file($collectionFile->getRealPath());
            $guessExtension = $collectionFile->guessExtension();

            return $collectionFile->storeAs($dir, $md5Name.'.'.$guessExtension, 'public');
        }

        /**
         * Get full url of given file
         *
         * @param string collectionFile
         * @return mixed
         */
        public function getFile($collectionFile) {
            if(file_exists( public_path().'/collections/'.$collectionFile))
                return Storage::get(public_path().'/collections/'.$collectionFile);
        }

        /**
         * delete image from storage
         *
         * @param string collectionFile
         * @return mixed
         */
        public function deleteFile($collectionFile) {
            if(file_exists( public_path().'/collections/'.$collectionFile))
                Storage::delete(public_path().'/collections/'.$collectionFile);
        }
    }
