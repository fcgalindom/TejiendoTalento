<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed with cities for multiple countries
        $cities = [
            ['name' => 'Bogotá', 'country_id' => 1],
            ['name' => 'Medellín', 'country_id' => 1],
            ['name' => 'Cali', 'country_id' => 1],
            ['name' => 'Barranquilla', 'country_id' => 1],
            ['name' => 'Cartagena', 'country_id' => 1],
            ['name' => 'Buenos Aires', 'country_id' => 2],
            ['name' => 'Córdoba', 'country_id' => 2],
            ['name' => 'Rosario', 'country_id' => 2],
            ['name' => 'Mendoza', 'country_id' => 2],
            ['name' => 'La Plata', 'country_id' => 2],
            ['name' => 'São Paulo', 'country_id' => 3],
            ['name' => 'Rio de Janeiro', 'country_id' => 3],
            ['name' => 'Brasília', 'country_id' => 3],
            ['name' => 'Salvador', 'country_id' => 3],
            ['name' => 'Fortaleza', 'country_id' => 3],
            ['name' => 'Santiago', 'country_id' => 4],
            ['name' => 'Valparaíso', 'country_id' => 4],
            ['name' => 'Concepción', 'country_id' => 4],
            ['name' => 'La Serena', 'country_id' => 4],
            ['name' => 'Antofagasta', 'country_id' => 4],
            ['name' => 'Lima', 'country_id' => 5],
            ['name' => 'Arequipa', 'country_id' => 5],
            ['name' => 'Trujillo', 'country_id' => 5],
            ['name' => 'Chiclayo', 'country_id' => 5],
            ['name' => 'Piura', 'country_id' => 5],
            ['name' => 'Quito', 'country_id' => 6],
            ['name' => 'Guayaquil', 'country_id' => 6],
            ['name' => 'Cuenca', 'country_id' => 6],
            ['name' => 'Santo Domingo', 'country_id' => 6],
            ['name' => 'Machala', 'country_id' => 6],
            ['name' => 'Caracas', 'country_id' => 7],
            ['name' => 'Maracaibo', 'country_id' => 7],
            ['name' => 'Valencia', 'country_id' => 7],
            ['name' => 'Barquisimeto', 'country_id' => 7],
            ['name' => 'Ciudad Guayana', 'country_id' => 7],
            ['name' => 'Montevideo', 'country_id' => 8],
            ['name' => 'Salto', 'country_id' => 8],
            ['name' => 'Paysandú', 'country_id' => 8],
            ['name' => 'Las Piedras', 'country_id' => 8],
            ['name' => 'Rivera', 'country_id' => 8],
            ['name' => 'Asunción', 'country_id' => 9],
            ['name' => 'Ciudad del Este', 'country_id' => 9],
            ['name' => 'San Lorenzo', 'country_id' => 9],
            ['name' => 'Luque', 'country_id' => 9],
            ['name' => 'Capiatá', 'country_id' => 9],
            ['name' => 'La Paz', 'country_id' => 10],
            ['name' => 'Santa Cruz de la Sierra', 'country_id' => 10],
            ['name' => 'Cochabamba', 'country_id' => 10],
            ['name' => 'Sucre', 'country_id' => 10],
            ['name' => 'Oruro', 'country_id' => 10],
            ['name' => 'Ciudad de México', 'country_id' => 11],
            ['name' => 'Guadalajara', 'country_id' => 11],
            ['name' => 'Monterrey', 'country_id' => 11],
            ['name' => 'Puebla', 'country_id' => 11],
            ['name' => 'Tijuana', 'country_id' => 11],
            ['name' => 'Panamá', 'country_id' => 12],
            ['name' => 'Colón', 'country_id' => 12],
            ['name' => 'David', 'country_id' => 12],
            ['name' => 'La Chorrera', 'country_id' => 12],
            ['name' => 'Santiago', 'country_id' => 12],
            ['name' => 'San José', 'country_id' => 13],
            ['name' => 'Alajuela', 'country_id' => 13],
            ['name' => 'Cartago', 'country_id' => 13],
            ['name' => 'Heredia', 'country_id' => 13],
            ['name' => 'Liberia', 'country_id' => 13],
            ['name' => 'Ciudad de Guatemala', 'country_id' => 14],
            ['name' => 'Mixco', 'country_id' => 14],
            ['name' => 'Villa Nueva', 'country_id' => 14],
            ['name' => 'Quetzaltenango', 'country_id' => 14],
            ['name' => 'Escuintla', 'country_id' => 14],
            ['name' => 'Tegucigalpa', 'country_id' => 15],
            ['name' => 'San Pedro Sula', 'country_id' => 15],
            ['name' => 'Choloma', 'country_id' => 15],
            ['name' => 'La Ceiba', 'country_id' => 15],
            ['name' => 'El Progreso', 'country_id' => 15],
            ['name' => 'San Salvador', 'country_id' => 16],
            ['name' => 'Santa Ana', 'country_id' => 16],
            ['name' => 'San Miguel', 'country_id' => 16],
            ['name' => 'Mejicanos', 'country_id' => 16],
            ['name' => 'Soyapango', 'country_id' => 16],
            ['name' => 'Managua', 'country_id' => 17],
            ['name' => 'León', 'country_id' => 17],
            ['name' => 'Masaya', 'country_id' => 17],
            ['name' => 'Chinandega', 'country_id' => 17],
            ['name' => 'Matagalpa', 'country_id' => 17],
            ['name' => 'La Habana', 'country_id' => 18],
            ['name' => 'Santiago de Cuba', 'country_id' => 18],
            ['name' => 'Camagüey', 'country_id' => 18],
            ['name' => 'Holguín', 'country_id' => 18],
            ['name' => 'Santa Clara', 'country_id' => 18],
            ['name' => 'Santo Domingo', 'country_id' => 19],
            ['name' => 'Santiago de los Caballeros', 'country_id' => 19],
            ['name' => 'La Romana', 'country_id' => 19],
            ['name' => 'San Pedro de Macorís', 'country_id' => 19],
            ['name' => 'Higüey', 'country_id' => 19],
            ['name' => 'San Juan', 'country_id' => 20],
            ['name' => 'Bayamón', 'country_id' => 20],
            ['name' => 'Carolina', 'country_id' => 20],
            ['name' => 'Ponce', 'country_id' => 20],
            ['name' => 'Caguas', 'country_id' => 20],
        ];

        foreach ($cities as $city) {
            DB::table('cities')->insert([
                'name' => $city['name'],
                'country_id' => $city['country_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}