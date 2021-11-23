<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminFilmRequest extends FormRequest
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
            'title' => 'required|unique:films',
            'sutradara' => 'required|max:255',
            'pemain' => 'required|max:255',
            'produksi' => 'required|max:255',
            'harga' => 'required|numeric',
            'durasi' => 'required|numeric',
            'playing' => 'required|in:Now PLaying,Upcoming',
            'sinopsis' => 'required',
            'gambar' => 'required|image|max:1024',
            'category-1' => '',
            'category-2' => '',
            'category-3' => '',
            'category-4' => '',
            'category-5' => '',
        ];
    }

    public function update($id) {
        return $id;
    }
}
