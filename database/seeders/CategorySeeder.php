<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoryModel;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['category_title' => 'Network Security'],
            ['category_title' => 'Ethical Hacking'],
            ['category_title' => 'Cryptography'],
            ['category_title' => 'Incident Response'],
            ['category_title' => 'Malware Analysis'],
            ['category_title' => 'Security Awareness'],
            ['category_title' => 'Penetration Testing'],
            ['category_title' => 'Cloud Security'],
            ['category_title' => 'Digital Forensics'],
            ['category_title' => 'Application Security']
        ];

        foreach ($categories as $category) {
            CategoryModel::create($category);
        }
    }
}
