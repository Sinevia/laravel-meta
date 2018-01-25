<?php

namespace App\Models\Metas;

trait HasMetas {

    public function getMeta($key, $default=null) {
        return Metas::get($this->Id, $key, $default);
    }

    public function setMeta($key, $value) {
        return Metas::set($this->Id, $key, $value);
    }

}
