<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreatePostsTable extends Migration
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

            /*column:string*/
            $table->string('publication')->nullable();
            /*column:enum*/
            $table
                ->enum('state_publication', [
                    'published',
                    'reject',
                    'in_review',
                ])
                ->nullable()
                ->default('in_review');
            /*colunm:text*/
            $table->text('content_publication')->nullable();
            $table
                ->bigInteger('category_id')
                ->unsigned()
                ->nullable();
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
        Schema::dropIfExists('posts');
    }
}
