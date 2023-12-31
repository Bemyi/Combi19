<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePasajeroExpress extends FormRequest
{
  /**
  * Determine if the user is authorized to make this request.
  *
  * @return bool
  */
  public function authorize()
  {
    return true; //esto es para validar sesiones, va a servir
  }

  /**
  * Get the validation rules that apply to the request.
  *
  * @return array
  */
  public function rules()
  {
    return [
      'nombre' => 'required|alpha_spaces',
      'apellido' => 'required|alpha_spaces',
      'email' => 'required|unique:pasajeros|email',
      'dni' => 'required|integer|gt:0',
    ];
  }
  public function messages(){
    return [
      'email.unique' => 'Este email ya está registrado en el sistema',
    ];
  }
}
