<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendMessage extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'auteur' => 'required',
            'telephone' => ['required', 'regex:/(?:(?:\+|00)33|0)\s*[1-8](?:[\.-]*\d{2}){4}/m'],
            'mail' => 'required',
            'contenu' => 'required',
            'custom' => [
                'g-recaptcha-response' => [
                    'required' => 'Merci de renseigner le captcha.',
                    'captcha' => 'Erreur captcha. Reessayez plus tard ou contactez l\'administrateur du site',
                ],
            ],
        ];
    }
}
