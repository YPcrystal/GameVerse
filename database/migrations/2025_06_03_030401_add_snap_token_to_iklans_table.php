<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSnapTokenToIklansTable extends Migration
{
    public function up()
    {
        Schema::table('iklans', function (Blueprint $table) {
            $table->string('snap_token')->nullable()->after('status');
        });
    }

    public function down()
    {
        Schema::table('iklans', function (Blueprint $table) {
            $table->dropColumn('snap_token');
        });
    }
}
