<?php


namespace App\Casts;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class JsonLang implements CastsAttributes
{
    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return mixed
     */
    public function get($model, $key, $value, $attributes)
    {
        $item = json_decode($value, true);
        $lang =  session('lang');
        /* first check existing key for lang */
        if(array_key_exists($lang->locale, $item)) {
            $item = $item[$lang->locale];
            /* second check existing key for in lang as alternative language */
        } else if (array_key_exists('in', $item)) {
            $item = $item['en'];
        } else {
            /* last if not return message */
            $item = 'this language not available';
        }
        return $item;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return array|false|string
     */
    public function set($model, $key, $value, $attributes)
    {
        return json_encode($value);
    }
}
