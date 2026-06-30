<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Peca;

class PecaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Peca::create([
            'nome' => 'Ryzen 7 5700X',
            'categoria' => 'Processador',
            'fabricante' => 'AMD',
            'modelo' => '5700X',
            'quantidade' => 5,
            'preco' => 1199.90,
            'descricao' => 'Processador AMD Ryzen 7'
        ]);

        Peca::create([
            'nome' => 'RTX 4060',
            'categoria' => 'Placa de Vídeo',
            'fabricante' => 'NVIDIA',
            'modelo' => 'RTX 4060',
            'quantidade' => 3,
            'preco' => 2299.90,
            'descricao' => 'Placa de vídeo NVIDIA RTX 4060'
        ]);

        Peca::create([
            'nome' => 'Kingston Fury Beast 16GB',
            'categoria' => 'Memória RAM',
            'fabricante' => 'Kingston',
            'modelo' => 'DDR4 3200MHz',
            'quantidade' => 10,
            'preco' => 329.90,
            'descricao' => 'Memória RAM DDR4 16GB'
        ]);
    }
}