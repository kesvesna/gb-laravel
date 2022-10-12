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
        Schema::create('news', function (Blueprint $table) {

            //$table->engine = 'InnoDB';
            //$table->charset = 'utf8mb4';
            //$table->collation = 'utf8mb4_unicode_ci';
            //$table->temporary();

            $table->id();

            $table->unsignedBigInteger('category_id')->comment('Вторичный ключ на таблицу категории новостей');
            $table->foreign('category_id')
                ->references('id')
                ->on('news_categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');;

            $table->unsignedBigInteger('source_id')->comment('Вторичный ключ на таблицу источник новости');
            $table->foreign('source_id')
                ->references('id')
                ->on('news_sources')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('image')->default('');
            $table->string('title')->comment('Заголовок новости');
            $table->boolean('is_private')->default(false)->comment('Признак того, что новость приватная, только для зарегистрированных пользователей');
            $table->text('short_description')->comment('Краткое описание новости');
            $table->text('description')->comment('Вся новость');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropForeign(['category_id', 'source_id']);
            $table->dropColumn('category_id', 'source_id');
            $table->drop('news');
        });
    }
};
