<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(){
        return [
                "name" => "required|max:42"  
                ,"pages" => "required|min:1"
                //,"read"=> "required"                        
        ];  
    }
}
