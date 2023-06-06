<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StroreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Это поле обязательно для заполнения',
            'title.string' => 'Данные не являются строкой',
            'content.string' => 'Данные не являются строкой',
            'content.required' => 'Это поле обязательно для заполнения',
            'preview_image.required' => 'Это поле обязательно для заполнения',
            'preview_image.file' => 'Файл не выбран',
            'main_image.required' => 'Это поле обязательно для заполнения',
            'main_image.file' => 'Файл не выбран',
            'category_id.required' => 'Это поле обязательно для заполнения',
            'category_id.integer' => 'ID должен быть числовым',
            'category_id.exists' => 'ID отсутствует в базе данных',
            'tag_ids.array' => 'Ожидается массив данных',
        ];
    }
}
