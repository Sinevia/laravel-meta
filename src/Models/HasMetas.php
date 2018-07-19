<?php

namespace Sinevia\Meta\Models;

trait HasMetas {    
    /**
     * Returns the meta value, or default (null) if not found
     * @param string $key
     * @return string|null|any
     */
    public function getMeta($key, $default=null) {
        return Metas::get($this->getKey(), $key, $default);
    }

    /**
     * Sets key-value pair
     * @param string $key
     * @param any $value
     * @return boolean
     */
    public function setMeta($key, $value) {
        return Metas::set($this->getKey(), $key, $value);
    }

}
