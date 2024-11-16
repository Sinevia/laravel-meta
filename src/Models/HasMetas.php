<?php

namespace Sinevia\Meta\Models;

trait HasMetas {    
    /**
     * Returns the meta value, or default (null) if not found
     * @param string $key
     * @return string|null|mixed
     */
    public function getMeta(string $key, mixed $default=null): mixed {
        return Metas::get(objectId: $this->getKey(), key: $key, default: $default);
    }

    /**
     * Sets key-value pair
     * @param string $key
     * @param mixed $value
     * @return bool
     */
    public function setMeta(string $key, mixed $value): bool {
        return Metas::set(objectId: $this->getKey(), key: $key, value: $value);
    }

}
