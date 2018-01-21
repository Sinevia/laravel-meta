<?php

namespace Sinevia\Metas;

class Metas {

    public static function set($objectId, $key, $value) {
        $meta = Meta::where('ObjectId', $objectId)->where('Key', $key)->first();
        if ($meta == null) {
            $meta = new Meta;
            $meta->ObjectId = $objectId;
            $meta->Key = $key;
            $meta->save();
        }
        return $meta->setValue($value);
    }

    public static function get($objectId, $key) {
        $meta = Meta::where('ObjectId', $objectId)->where('Key', $key)->first();
        if ($meta == null) {
            return null;
        }
        return $meta->getValue();
    }

}
