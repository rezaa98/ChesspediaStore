<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attributes', function (Blueprint $table) {
            $table->string('type')->after('name');
            // bahas di step selanjutnya
            $table->string('validation')->after('type')->nullable();
            //untuk memvalidasi
            $table->boolean('is_required')->default(false)->after('validation');
            $table->boolean('is_unique')->default(false)->after('is_required');
            $table->boolean('is_filterable')->default(false)->after('is_unique');
            $table->boolean('is_configurable')->default(false)->after('is_filterable');
            //khusus konfigurable ketika membuat stok produk berdasarkan kombinasi attribut. 
            // contohnya ada baju merah dengan stok tinggal 5 doang
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attributes', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('validation');
            $table->dropColumn('is_required');
            $table->dropColumn('is_unique');
            $table->dropColumn('is_filterable');
            $table->dropColumn('is_configurable');
            //ini juga untuk nambahin kolomnya
        });
    }
}
