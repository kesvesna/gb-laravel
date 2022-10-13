<?php

namespace App\Http\Requests\News\Sources;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSourceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => ['required|string|unique:news_sources,title|min:2|max:255'],
            'slug' => ['required|string|unique:news_sources,slug|min:2|max:255'],
        ];
    }
}
