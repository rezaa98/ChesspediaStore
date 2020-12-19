<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParentIdAndTypeToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_id')->after('id')->nullable(); //supaya produk yang tipenya simpel produk maka parent id nya 0, klo lengkap 1
            $table->string('type')->after('sku'); //untuk tipe produknya

            $table->foreign('parent_id')->references('id')->on('products'); //untuk relasi antar database, mereference ke id dari tabel produk
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('parent_id'); //buat drop kolom parent id
            $table->dropColumn('type'); //buat drop kolom tipe
        });
    }
}
