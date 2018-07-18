<?php

namespace Sinevia\Meta\Models\Meta;

class Meta extends \App\Models\BaseModel {

    protected $table = 'snv_metas_meta';
    protected $primaryKey = 'Id';
    
    public function scopeObjectId($query,$objectId){
        return $query->where('ObjectId',$objectId);
    }
    
    public function scopeKey($query,$key){
        return $query->where('Key',$key);
    }
    
    /**
     * Returns the value
     * @param type $key
     * @return string
     */
    public function getValue() {
        return json_decode($this->Value, true);
    }

    /**
     * Saves the value
     * @param object $value
     * @return boolean
     */
    public static function setValue($value) {
        $this->Value = json_encode($value);
        
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
