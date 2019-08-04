<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Accounting/Finance',
            'Beauty Care/Health & Fitness',
            'Data Entry/Operator',
            'Education/Training',
            'HR/Org development',
            'Marketing/sales',
            'NGO/Development',
            'Research/Consultancy',
            'Agro(Plant/Animal/Fisheries)',
            'Commercial/Supply Chain',
            'Design/Creative',
            'Electrician/Construction/Repair',
            'IT/Telecommunication',
            'IT/Web development',
            'Secretary/Receptionist',
            'Customer Support/Call Center',
            'Driving/Motor Technician',
            'Engineer/Architect',
            'Hospitality/Travel/Tourism',
            'Mediacal/Pharma',
            'Others',
        ];
        foreach ($categories as $category) {
            $category = str_replace('/', ' ', $category);
            factory(Category::class)->create([
                'name'      => $category,
                'slug'      => str_slug($category),
                'job_count' => 0
            ]);
        }
    }
}
