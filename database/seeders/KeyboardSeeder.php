<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Keyboard;

class KeyboardSeeder extends Seeder
{   
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Keyboard::create([
        //     'image' => 'path/to/image.jpg',
        //     'brand' => 'BrandName',
        //     'model' => 'ModelName',
        //     'type' => 'Type',
        //     'color' => 'Color',
        //     'price' => 1000,
        //     'is_seeded' => true,
        // ]);

        $stage_keyboards = [
            [
                'image' => 'images/nord-stage-3-88.png',
                'brand'=>'NORD',
                'model'=>'Stage 3',
                'type'=>'Stage Keyboard',
                'color'=>'Red',
                'price'=>'250000',
                'is_seeded' => true,
            ],
            [
                'image' => 'images/nord-stage-4.jpg',
                'brand'=>'NORD',
                'model'=>'Stage 4',
                'type'=>'Stage Keyboard',
                'color'=>'Red',
                'price'=>'377000',
                'is_seeded' => true,
            ],
        ];

        $performance_synthesizers = [
            [
                'image' => 'images/nord-lead-4.jpg',
                'brand'=>'NORD',
                'model'=>'Lead 4',
                'type'=>'Performance Synthesizer',
                'color'=>'Red',
                'price'=>'158000',
                'is_seeded' => true,
            ],
        ];

        $workstation_synthesizers = [
            [
                'image' => 'images/korg-kross-2.jpg',
                'brand'=>'KORG',
                'model'=>'KROSS 2',
                'type'=>'Workstation Synthesizer',
                'color'=>'Black',
                'price'=>'44888',
                'is_seeded' => true,
            ],
        ];

        $expandable_synthesizers = [
            [
                'image' => 'images/xps-10.jpg',
                'brand'=>'ROLAND',
                'model'=>'XPS-10',
                'type'=>'Expandable Synthesizer',
                'color'=>'Black',
                'price'=>'34950',
                'is_seeded' => true,
            ],
            [
                'image' => 'images/xps-30.jpg',
                'brand'=>'ROLAND',
                'model'=>'XPS-30',
                'type'=>'Expandable Synthesizer',
                'color'=>'Black',
                'price'=>'49950',
                'is_seeded' => true,
            ],
        ];

        foreach($stage_keyboards as $stage_keyboard) {
            Keyboard::create($stage_keyboard);
        }
        
        foreach($expandable_synthesizers as $expandable_synthesizer) {
            Keyboard::create($expandable_synthesizer);
        }
        
        foreach($performance_synthesizers as $performance_synthesizer) {
            Keyboard::create($performance_synthesizer);
        }

        foreach($workstation_synthesizers as $workstation_synthesizer) {
            Keyboard::create($workstation_synthesizer);
        }
    }
}
