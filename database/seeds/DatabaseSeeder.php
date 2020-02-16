<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(ErrorPageSeeder::class);
        $this->call(ReservationMessageSeeder::class);
        $this->call(ReservationHeaderSeeder::class);
        $this->call(ReservationModeSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(ServiceHeaderSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(TeamHeaderSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(TestimonialHeaderSeeder::class);
        $this->call(TestimonialSeeder::class);
        $this->call(ProductHeaderSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(TreatmentHeaderSeeder::class);
        $this->call(TreatmentTypeSeeder::class);
        $this->call(TreatmentSeeder::class);
        $this->call(GalleryHeaderSeeder::class); 
        $this->call(GalleryTagSeeder::class); 
        $this->call(GallerySeeder::class); 
        $this->call(SliderSeeder::class);
        $this->call(BlogHeaderSeeder::class); 
        $this->call(BlogCategorySeeder::class); 
        $this->call(BlogSeeder::class); 
        $this->call(ProfileSeeder::class);
    }
}
