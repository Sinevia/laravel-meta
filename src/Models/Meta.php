<?php

namespace Sinevia\Meta\Models;

class Meta extends \AdvancedCamelCaseModel {

    protected $table = 'snv_metas_meta';
    protected $primaryKey = 'Id';

    protected $useUniqueId = true;
    
    public function scopeObjectId($query,$objectId): mixed{
        return $query->where('ObjectId',$objectId);
    }
    
    public function scopeKey($query,$key): mixed{
        return $query->where('Key',$key);
    }
    
    /**
     * Returns the value
     */
    public function getValue(): mixed {
        return json_decode(json: $this->Value, associative: true);
    }

    /**
     * Saves the value
     * @param object $value
     * @return boolean
     */
    public function setValue($value): bool {
        $this->Value = json_encode(value: $value);
        
        $isSaved = $this->save();
        if ($isSaved != false) {
            return true;
        }
        
        return false;
    }

    public static function tableCreate() {
        $o = new self;

        if (\Schema::connection($o->connection)->hasTable($o->table) == false) {
            return \Schema::connection($o->connection)->create($o->table, function (\Illuminate\Database\Schema\Blueprint $table) use ($o) {
                        $table->engine = 'InnoDB';
                        $table->string($o->primaryKey, 40)->primary();
                        $table->string('ObjectId', 40)->index();
                        $table->string('Key', 255)->index();
                        $table->longtext('Value')->nullable()->default(NULL);
                        $table->datetime('CreatedAt')->nullable()->default(NULL);
                        $table->datetime('UpdatedAt')->nullable()->default(NULL);
                        $table->datetime('DeletedAt')->nullable()->default(NULL);
                        $table->index(['ObjectId', 'Key']);
                    });
        }

        return true;
    }

    public static function tableDelete() {
        $o = new self;
        if (\Schema::connection($o->connection)->hasTable($o->table) == false) {
            return true;
        }
        return \Schema::connection($o->connection)->drop($o->table);
    }

}
