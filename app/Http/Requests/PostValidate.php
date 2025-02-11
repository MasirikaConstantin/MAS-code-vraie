<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostValidate extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titre' => ['required', 'min:4'],
            'contenus'=> ['required', 'min:4'],
            'user_id'=> ['required', 'exists:users,id'],
            'image'=> ['image', 'max:3000'],
            'slug' => ['required', 'min:8' ,'regex:/^[0-9a-z\-]+$/', Rule::unique('posts', 'slug')->ignore($this->post?->id)],  
            'codesource'=>[ 'nullable'],
            'categorie_id'=>['required', 'exists:categories,id'],
            'tags'=>['array', 'exists:tags,id','required'],
            'etat'=>['nullable']



        ];
    }
    
protected function prepareForValidation(){
    $this->merge([
        'slug' => $this->input('slug') ?: Str::slug($this->input('titre')) //. '-' . Carbon::now()->format('Y-m-d-H-i-s'))
    ]);
}
}
