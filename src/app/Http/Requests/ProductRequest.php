<?php

namespace App\Http\Requests;

use App\Rules\ValidProduct;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'=>['required'],
            'price'=>['numeric', 'min:0', 'max:10000'],
            'image'=>['required','mimes:jpeg,png'],
            'description'=>['required','max:120'],
            'seasons'=>['required'],
        ];
    }

    public function messages(){
        
        return[
            'name.required'=> '商品名を入力してください',
            'price.required'=> '値段を入力してください',
            'price.min'=> '0~10000円以内で入力してください',
            'price.max'=> '0~10000円以内で入力してください',
            'price.numeric' => '数値で入力してください',
            'description.required'=> '商品説明を入力してください',
            'description.max'=> '120文字以内で入力してください',
            'image.required'=> '商品画像を登録してください',
            'image.mimes'=> '「.png」または「.jpeg」形式でアップロードしてください',
            'seasons.required' => '季節を選択してください',
        ];
    }

    public function withValidator($validator){
        $validator->after(function ($validator) {

            /* price */
            $price = $this->input('price');

            if($price === null){
                $validator->errors()->add('price','値段を入力してください');
                $validator->errors()->add('price', '数値で入力してください');
                $validator->errors()->add('price', '0~10000円以内で入力してください');
            }elseif(! is_numeric($price)){
                $validator->errors()->add('price', '数値で入力してください');
                $validator->errors()->add('price', '0~10000円以内で入力してください');
            }

            /* image */
            $image = $this->file('image');

            if($image === null){
                $validator->errors()->add('image', '商品画像を登録してください');
                $validator->errors()->add('image', '「.png」または「.jpeg」形式でアップロードしてください');
            } 
            elseif (!$image->isValid() || !in_array(strtolower($image->extension()), ['jpeg', 'jpg', 'png'])) {
                // ファイルがある場合は形式チェックのみ
                $validator->errors()->add('image', '「.png」または「.jpeg」形式でアップロードしてください');
            }

            /* description */
            $description = $this->input('description');

            if($description === null){
                $validator->errors()->add('description', '商品説明を入力してください');
                $validator->errors()->add('description', '120文字以内で入力してください');
            }
        });
}
}