<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $properties = [
            [
                'property_name' => 'Sunny Apartment',
                'location' => '123 Main Street, Springfield',
                'property_type' => 'Flat',
                'created_by' => 1,
                'last_updated_by' => 1,
                'vendor_id' => 1,
                'is_publish' => true,
                'is_delete' => false,
            ],
            [
                'property_name' => 'Student House',
                'location' => '45 College Lane, Springfield',
                'property_type' => 'Student Accommodation',
                'created_by' => 1,
                'last_updated_by' => 1,
                'vendor_id' => 1,
                'is_publish' => true,
                'is_delete' => false,
            ],
            [
                'property_name' => 'Cozy Homestay',
                'location' => '78 Suburb Drive, Springfield',
                'property_type' => 'Homestay',
                'created_by' => 1,
                'last_updated_by' => 1,
                'vendor_id' => 1,
                'is_publish' => true,
                'is_delete' => false,
            ],
        ];

        foreach ($properties as $property) {
            Property::create($property);
        }
    }
}
