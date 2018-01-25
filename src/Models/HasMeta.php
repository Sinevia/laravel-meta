<?php

namespace App\Models\Metas;

trait HasMetas {

    public function getMeta($key, $default=null) {
        return Metas::get($this->Id, $key, $default);
    }

    /**
     * Sets key-value pair
     * @param string $key
     * @param any $value
     * @return boolean
     */
    public function setMeta($key, $value) {
        return Metas::set($this->Id, $key, $value);
    }

}
