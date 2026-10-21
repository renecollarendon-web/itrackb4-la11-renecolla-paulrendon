    <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    // 1. Gawa ng bagong genres table
    Schema::create('genres', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->timestamps();
    });

    // 2. I-drop ang lumang 'genre' text column sa movies table
    Schema::table('movies', function (Blueprint $table) {
        $table->dropColumn('genre');
    });

    // 3. Magdagdag ng bagong 'genre_id' na foreign key
    Schema::table('movies', function (Blueprint $table) {
        $table->foreignId('genre_id')->constrained();
    });
}

public function down(): void
{
    // B6: I-undo lahat (reverse order)
    Schema::table('movies', function (Blueprint $table) {
        $table->dropForeign(['genre_id']);
        $table->dropColumn('genre_id');
        $table->string('genre')->nullable(); // ibalik ang lumang text column
    });
    Schema::dropIfExists('genres');
}
};
