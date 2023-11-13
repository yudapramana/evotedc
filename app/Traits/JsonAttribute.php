<?php


namespace App\Traits;

trait JsonAttribute
{
    /**
     * get original value
     * @param $field
     * @return mixed
     */
    public function getActualAttribute($field){
        return $this->attributes[$field];
    }

    /**
     * get json array
     * @param $field
     * @return mixed
     */
    public function getArrayAttribute($field) {
        return json_decode($this->attributes[$field], true);
    }

    /**
     * get json by key
     * @param $field
     * @param $key
     * @return string
     */
    public function getByKeyAttribute($field, $key) {
        $item = json_decode($this->attributes[$field], true);
        return array_key_exists($key, $item) ? $item[$key] : '';
    }
}
