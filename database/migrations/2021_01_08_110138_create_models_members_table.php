<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelsMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('models_members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom', 50);
            $table->string('prenom', 50);
            $table->string('user_github', 50);
            $table->string('tel1', 50);
            $table->string('tel2', 50)->nullable();
            $table->string('mail', 50);
            $table->dateTime('date_d_adhesion')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('niveau', 50);
            $table->date('date_exclusion', 40)->nullable();

            $table->timestamps();
        });
    }

    protected $fillable = [
        'id', 'nom', 'prenom', 'user_github', 'tel1', 'tel2', 'mail', 'date_d_adhesion', 'niveau', 'date_exclusion',
    ];

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('models_members');
    }
}
