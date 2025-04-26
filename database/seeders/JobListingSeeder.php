<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JobListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $n = rand(1, 5);
        $jobs = [
            [
                "Chief Innovation Catalyst", "Quantum Leap Industries",
                "As the Chief Innovation Catalyst at Quantum Leap Industries, you will be the driving force behind fostering a culture of creativity and experimentation across the organization. You'll identify emerging trends, facilitate brainstorming sessions, and champion the development of groundbreaking ideas that align with Quantum Leap Industries' strategic goals. This role requires a visionary leader with exceptional communication and collaboration skills, capable of inspiring teams to think outside the box and translate innovative concepts into tangible results."
            ], [
                "Data Alchemist", "Celestial Analytics Group",
                "The Data Alchemist at Celestial Analytics Group will be responsible for transforming raw, complex datasets into actionable insights. You will apply advanced statistical techniques, machine learning algorithms, and data visualization tools to uncover hidden patterns, predict future trends, and provide data-driven recommendations to stakeholders across various departments at Celestial Analytics Group. A strong background in mathematics, statistics, and programming is essential, along with a passion for exploring and interpreting data to solve real-world business challenges."
            ], [
                "Sustainability Strategist", "Evergreen Futures Corp.",
                "As the Sustainability Strategist at Evergreen Futures Corp., you will lead the development and implementation of the company's environmental and social responsibility initiatives. You will assess our current practices, identify areas for improvement, and develop strategies to reduce our environmental footprint and enhance our positive social impact at Evergreen Futures Corp. This role requires a deep understanding of sustainability principles, regulatory frameworks, and stakeholder engagement, along with the ability to translate ambitious goals into practical and measurable actions."
            ], [
                "Experiential Marketing Guru", "Kinetic Brand Experiences",
                "The Experiential Marketing Guru at Kinetic Brand Experiences will be responsible for designing and executing innovative and engaging marketing campaigns that create memorable experiences for our target audience. You will conceptualize interactive events, immersive installations, and unique brand activations that drive engagement, build brand loyalty, and generate buzz for Kinetic Brand Experiences. This role demands a creative and strategic thinker with excellent project management and interpersonal skills, capable of bringing imaginative ideas to life and measuring their impact."
            ], [
                "Remote Culture Cultivator", "Global Connective Solutions",
                "The Remote Culture Cultivator at Global Connective Solutions will be instrumental in fostering a strong sense of community and connection within our distributed workforce. You will develop and implement initiatives that promote communication, collaboration, and engagement among remote team members at Global Connective Solutions. This includes designing virtual social events, establishing clear communication protocols, and creating opportunities for professional development and team building. A strong understanding of remote work best practices, excellent communication skills, and a passion for creating an inclusive and supportive virtual environment are key to success in this role."
            ]
        ];
        for ($i = 0; $i < $n; $i++) {
            $job = $jobs[rand(0, 4)];
            DB::table('job_listings')->insert([
                "title" => $job[0],
                "description" => $job[2],
                "company" => $job[1],
                "location" => Fake()->city(),
                "salary" => round(rand(4000000, 10000000)/100000) * 100000,
                "closing_date" => Fake()->dateTimeThisMonth(),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),                
            ]);
        }
    }
}
