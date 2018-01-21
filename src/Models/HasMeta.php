<?php

namespace App\Models\Metas;

trait HasMetas {

    public function getMeta($key) {
        return Metas::get($this->Id, $key);
    }

    public function setMeta($key, $value) {
        return Metas::set($this->Id, $key, $value);
    }

}
