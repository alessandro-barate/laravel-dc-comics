<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComicRequest extends FormRequest
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
                'title' => 'required|max:100',
        ];
    }

    public function messages()
    {
        return [
           'title.required' => 'Un supereroe senza nome che supereroe è? Allo stesso modo un fumetto senza titolo non è un fumetto!' 
        ];
    }
}


// Request -> default
// ComicRequest -> aggiornamento e creazione
// StoreComicRequest -> richieste di creazione
// UpdateComicRequest -> richieste di aggiornamento
