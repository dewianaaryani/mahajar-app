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
        DB::unprepared('
            CREATE TRIGGER trg_delete_related_records
            AFTER DELETE ON courses
            FOR EACH ROW
            BEGIN
                DELETE FROM tasks WHERE course_id = OLD.id;
                DELETE FROM assignments WHERE task_id IN (SELECT id FROM tasks WHERE course_id = OLD.id);
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS trg_delete_related_records');
    }
};
