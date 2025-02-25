<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notification_types', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('value');
            $table->string('redirect_to');
        });

        $data[] = [
            "type" => "new_user",
            "value" => "A new user has visited your website",
            "redirect_to" => "{{ route('secured.user_visits') }}"
        ];

        $data[] = [
            "type" => "new_mail",
            "value" => "A new user has contacted you throgh email",
            "redirect_to" => "{{ route('secured.mails') }}"
        ];

        $data[] = [
            "type" => "resume_download",
            "value" => "A user has downloaded your resume",
            "redirect_to" => "{{ route('secured.mails') }}"
        ];

        DB::table('notification_types')->insert($data);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification_types');
    }
};
