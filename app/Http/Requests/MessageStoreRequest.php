<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MessageStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'conn_id' => ['required', Rule::exists('connections', 'id')->where(function ($query) {
                $query->where('user1_id', Auth::user()->musicianUser()->id)
                ->orWhere('user2_id', Auth::user()->musicianUser()->id);
            })],
            'sender_id' => ['required', Rule::in(Auth::user()->musicianUser()->id)],
            'content' => ['Required', 'max:300'],
        ];
    }
}