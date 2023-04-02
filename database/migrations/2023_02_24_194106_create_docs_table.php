<?php

use App\Models\User;

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
        Schema::create('docs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('DocNo');
            $table->string('Revision');
            $table->string('RevisionStatus');
            $table->text('Title');
            $table->text('Purpose')->nullable();
            $table->text('Scope')->nullable();
            $table->integer('ApprovedBy')->unsigned()->nullable();
            $table->dateTime('ApprovedOn')->nullable();
            $table->integer('AuthorisedBy')->unsigned()->nullable();
            $table->dateTime('AuthorisedOn')->nullable();
            $table->string('Status')->default('Verbatim');
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
        Schema::dropIfExists('docs');
    }
};
