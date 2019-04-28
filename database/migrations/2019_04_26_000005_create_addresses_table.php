<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'addresses';

    /**
     * Run the migrations.
     * @table addresses
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('cep', 191);
            $table->string('street', 191);
            $table->string('number', 191);
            $table->string('district', 191);
            $table->string('city', 191);
            $table->string('state', 191);
            $table->integer('employee_id')->unsigned();
            $table->timestamps();

            $table->foreign('employee_id')
                ->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
