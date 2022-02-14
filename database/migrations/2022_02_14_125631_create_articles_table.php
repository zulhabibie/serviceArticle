<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('Title', 200);
            $table->text('Content');
            $table->string('Category',100);
            $table->timestamp('Created_date')->useCurrent();
            $table->timestamp('Updated_date')->useCurrent();
            $table->string('Status',100)->comment('Publish | Draft | Thrash');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
