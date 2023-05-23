<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class UpdateCollectionRequest extends FormRequest {
        /**
         * Get the validation rules that apply to the request.
         *
         * @return array
         */
        public function rules() {
            return [
                "id" => ['required', 'string'],
                "section" => ['required', 'string'],
                "changes" => ['array'],
            ];
        }

        protected function prepareForValidation(): void {
            $this->merge([
                'changes' => json_decode($this->changes, true),
            ]);
        }
    }
