<?php

namespace Database\Factories;

use App\Models\Document;
use App\Models\DocumentType;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    protected $model = Document::class;

    public function definition(): array
    {
        return [
            'document_type_id' => null, //DocumentType::factory(), // Usará un tipo generado si no se pasa uno
            'client_id' => $this->faker->numberBetween(1, 3),
            'external_id' => $this->faker->numberBetween(2000000, 4000000),
            'identifier' => [
                'dua' => $this->faker->numberBetween(10000000, 99999999),
                'contenedor' => 'DD' . $this->faker->unique()->numerify('#########'),
            ],
            'data' => [
                'nombre' => $this->faker->name,
                'direccion' => $this->faker->address,
                'telefono' => $this->faker->phoneNumber,
                'edad' => $this->faker->numberBetween(18, 80),
            ],
        ];
    }
}
