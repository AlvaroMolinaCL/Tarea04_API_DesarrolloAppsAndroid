<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $music = Category::updateOrCreate([
            'name' => 'Musica',
        ], [
            'description' => 'Conciertos, festivales y espectaculos en vivo',
        ]);

        $technology = Category::updateOrCreate([
            'name' => 'Tecnologia',
        ], [
            'description' => 'Conferencias, talleres y meetups tecnicos',
        ]);

        $sports = Category::updateOrCreate([
            'name' => 'Deportes',
        ], [
            'description' => 'Competencias, maratones y actividades deportivas',
        ]);

        Event::updateOrCreate([
            'title' => 'Festival de Música Urbana',
        ], [
            'category_id' => $music->id,
            'description' => 'Evento musical con artistas invitados y escenario principal al aire libre.',
            'date' => '12/06/2026',
            'location' => 'Parque Bicentenario, Concepcion',
            'image_res_name' => 'event_music',
        ]);

        Event::updateOrCreate([
            'title' => 'Congreso de Tecnología Aplicada',
        ], [
            'category_id' => $technology->id,
            'description' => 'Charlas, paneles y talleres sobre desarrollo, IA y arquitectura de software.',
            'date' => '28/07/2026',
            'location' => 'Sala de Teatro UCSC, Concepcion',
            'image_res_name' => 'event_tech',
        ]);

        Event::updateOrCreate([
            'title' => 'Maratón de Santiago',
        ], [
            'category_id' => $sports->id,
            'description' => 'Competencia abierta para corredores amateurs y profesionales.',
            'date' => '26/04/2026',
            'location' => 'Santiago',
            'image_res_name' => 'event_sports',
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
