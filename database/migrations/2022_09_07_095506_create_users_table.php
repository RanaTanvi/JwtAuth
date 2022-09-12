<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('username');
                $table->string('password');
                $table->foreignId('role_id')->constrained('roles');
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
