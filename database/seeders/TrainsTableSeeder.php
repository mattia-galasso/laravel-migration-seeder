<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        // ARRAY STAZIONI
        $stations = [
            'Milano Centrale',
            'Roma Termini',
            'Napoli Centrale',
            'Torino Porta Susa',
            'Firenze Santa Maria Novella',
            'Bologna Centrale',
            'Venezia Santa Lucia',
            'Genova Piazza Principe',
            'Palermo Centrale',
            'Bari Centrale',
            'Catania Centrale',
            'Verona Porta Nuova',
            'Padova',
            'Trieste Centrale',
            'Brescia',
            'Bergamo',
            'Reggio Calabria Centrale',
            'Salerno',
            'Pisa Centrale',
            'Ancona',
        ];

        // Trains Seeder
        for ($i = 0; $i < 20; $i++) {
            $newTrain = new Train();

            $newTrain->company = $faker->randomElement(['Trenitalia', 'Italo', 'Trenord']);

            // Verifica che la stazione di partenza è diversa da quella di arrivo
            $departure = $faker->randomElement($stations);
            $arrival = $faker->randomElement(array_diff($stations, [$departure]));
            $newTrain->departure_station = $departure;
            $newTrain->arrival_station = $arrival;

            $newTrain->departure_time = $faker->time();
            $newTrain->arrival_time = $faker->time();
            $newTrain->train_code = $faker->bothify('?? ####');
            $newTrain->total_carriages = $faker->numberBetween(4, 12);
            $newTrain->platform = $faker->numberBetween(1, 20);
            $newTrain->delay_minutes = $faker->boolean(40) ? $faker->numberBetween(1, 60) : 0;
            $newTrain->is_cancelled = $faker->boolean(10);
            if ($newTrain->delay_minutes > 0 || $newTrain->is_cancelled) {
                $newTrain->is_on_time = false;
            } else {
                $newTrain->is_on_time = true;
            }

            $newTrain->save();
        }
    }
}
