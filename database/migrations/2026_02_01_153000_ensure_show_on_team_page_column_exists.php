<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasColumn('team_members', 'show_on_team_page')) {
            Schema::table('team_members', function (Blueprint $table) {
                $table->boolean('show_on_team_page')->default(true)->after('is_in_leadership');
            });
        }
    }

    public function down()
    {
        if (Schema::hasColumn('team_members', 'show_on_team_page')) {
            Schema::table('team_members', function (Blueprint $table) {
                $table->dropColumn('show_on_team_page');
            });
        }
    }
};
