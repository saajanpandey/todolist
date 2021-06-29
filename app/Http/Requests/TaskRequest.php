<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'description'=>'required|max:255',

            'deadline'=> 'required'
        ];
    }
    public function message()
    {
        return[
        'description.required'=>'Task Description is required',
        'deadline.required'=>'Deadline is required',
        ];
    }
}
