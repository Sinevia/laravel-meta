<?php

class PackageSineviaMetaTablesCreate extends Illuminate\Database\Migrations\Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        App\Models\Metas\Meta::tableCreate();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        App\Models\Metas\Meta::tableDelete();
    }

}
