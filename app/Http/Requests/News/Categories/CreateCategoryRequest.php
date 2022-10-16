<?php

namespace App\Http\Requests\News\Categories;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CreateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
        // метод для проверки прав доступа к форме
        // младший редактор может заходить на форму, но менять не может return false
        // старший редактор может заходить на форму и менять данные return true
        // при false получим ошибку 403 this action is unauthorized
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'unique:news_categories,name', 'min:2', 'max:255'],
            'slug' => ['required', 'string', 'unique:news_categories,slug', 'min:2', 'max:255'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    //public function messages(): array
    //{
    // если этих данных не будет,
    // то будут браться данные из файла validation.php
    //return [
//            'title.required' => 'A title is required',
//            'category_id.required' => 'A category is required',
//            'source_id.required' => 'A source is required',
//            'min' => [
//                'string' => 'Поле :attribute должно быть не меньше :min'
    //  ]
    //];
    // }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
//    protected function prepareForValidation()
//    {
//        $this->merge([
//            'slug' => Str::slug($this->slug),
//        ]);
//    }

//    public function attributes(): array
//    {
//        // будет использовать при отправке сообщений,
//        // если этих данных не будет, то будут браться из файла  ru/validation.php
//        return [
//            'name' => 'название',
//            'slug' => 'slug'
//        ];
//    }
}
