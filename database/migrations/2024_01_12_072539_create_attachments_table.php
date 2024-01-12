<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attachable_id');
            $table->string('attachable_type');
            $table->integer('owner_id');
            $table->integer('data_item_id');
            $table->integer('data_item_type');
            $table->integer('site_id');
            $table->string('title'); 
            $table->string('original_filename');
            $table->string('stored_filename'); 
            $table->string('content_type');
            $table->integer('resume');
            $table->text('text');
            $table->dateTime('date_created');
            $table->dateTime('date_modified'); 
            $table->integer('profile_image');
            $table->string('directory_name'); 
            $table->string('md5_sum');
            $table->integer('file_size_kb');
            $table->string('md5_sum_text');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attachments');
    }
}
