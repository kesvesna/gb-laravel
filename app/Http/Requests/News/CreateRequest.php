<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category_id' => ['required', 'integer', 'exists:news_categories,id'],
            'source_id' => ['required', 'integer', 'exists:news_sources,id'],
            'title' => ['required', 'string', 'min:2', 'max:200'],
            'description' => ['nullable', 'string'],
            'short_description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg, png'],
            'is_private' => ['nullable', 'integer']
        ];
    }
}
