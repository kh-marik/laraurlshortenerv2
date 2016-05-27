<?php
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;
    use \UrlShortener\User;

    class CreateUsersTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password');
                $table->boolean('is_admin')->default(0);
                $table->rememberToken();
                $table->timestamps();
            });
            User::create([
                    'name'  => 'admin',
                    'email' => 'marat_khuzin@mail.ru',
                    'password' => bcrypt('111111'),
                    'is_admin' => 1]);
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::drop('users');
        }
    }
