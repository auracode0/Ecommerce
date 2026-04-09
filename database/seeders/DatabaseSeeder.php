<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    // use WithoutModelEvents;

    public function run(): void
    {
        $categorise=[
            ['id' => 1,'name' => 'كاميرات','description'=>'','imagepath'=>'assets\img\camera.jpg','nameEN'=>'Cameras'],
            ['id' => 2,'name' => 'مكياج','description'=>'','imagepath'=>'assets\img\makeup.jpg','nameEN'=>'Mekup'],
            ['id' => 3,'name' => 'طعام','description'=>'','imagepath'=>'assets\img\food.jpg','nameEN'=>'Food'],
            ['id' => 4,'name' => 'الكترونيات','description'=>'','imagepath'=>'assets\img\elctro.jpg','nameEN'=>'Electronics'],
            ['id' => 5,'name' => 'ساعات','description'=>'','imagepath'=>'assets\img\watch.jpg','nameEN'=>'Watches'],
            ['id' => 6,'name' => 'حقائب','description'=>'','imagepath'=>'assets\img\bag.jpg','nameEN'=>'Bags'],
        

        ];


        $products=[
            ['id' => 1,'name' => 'برجر','description'=>'','imagepath'=>'assets\img\burgar.jpg','price'=>76,'quantity'=>100,'category_id'=>3,'nameEN'=>'berger'],
            ['id' => 2,'name' => 'بيزا','description'=>'','imagepath'=>'assets\img\piza.jpg','price'=>20,'quantity'=>22,'category_id'=>3,'nameEN'=>'piza'],
            ['id' => 3,'name' => 'تشكن فرايز','description'=>'','imagepath'=>'assets\img\checenfrise.jpg','price'=>21,'quantity'=>109,'category_id'=>3,'nameEN'=>'checen frize'],
            ['id' => 4,'name' => 'حقيبة ظهر','description'=>'','imagepath'=>'assets\img\backbag.jpg','price'=>70,'quantity'=>200,'category_id'=>6,'nameEN'=>'Back bag'],
            ['id' => 5,'name' => 'حقيبة سفر','description'=>'','imagepath'=>'assets\img\travelbag.jpg','price'=>100,'quantity'=>78,'category_id'=>6,'nameEN'=>'travel bag'],
            ['id' => 6,'name' => 'حقيبة يد','description'=>'','imagepath'=>'assets\img\womenbag.jpg','price'=>1500,'quantity'=>20,'category_id'=>6,'nameEN'=>'bag'],
            ['id' => 7,'name' => 'ساعة يد نسائي','description'=>'','imagepath'=>'assets\img\womenwatch.jpg','price'=>900,'quantity'=>80,'category_id'=>5,'nameEN'=>'women watch'],
            ['id' => 8,'name' => 'ساعة يد رجالي','description'=>'','imagepath'=>'assets\img\manwatch.jpg','price'=>800,'quantity'=>10,'category_id'=>5,'nameEN'=>'men watch'],
            ['id' => 9,'name' => 'ساعة حائط','description'=>'','imagepath'=>'assets\img\wallwatch.jpg','price'=>30,'quantity'=>90,'category_id'=>5,'nameEN'=>'wall watch'],
            ['id' => 10,'name' => 'ظل عيون','description'=>'','imagepath'=>'assets\img\eyechado.jpg','price'=>70,'quantity'=>300,'category_id'=>2,'nameEN'=>'eye shabo'],
            ['id' => 11,'name' => 'ماسكرا','description'=>'','imagepath'=>'assets\img\mascra.jpg','price'=>22,'quantity'=>200,'category_id'=>2,'nameEN'=>'mascra'],
            ['id' => 12,'name' => 'الينر','description'=>'','imagepath'=>'assets\img\aliner.jpg','price'=>20,'quantity'=>100,'category_id'=>2,'nameEN'=>'aliner'],
            ['id' => 13,'name' => 'لابتوب','description'=>'','imagepath'=>'assets\img\laptop.jpg','price'=>5000,'quantity'=>30,'category_id'=>4,'nameEN'=>'Laptop'],
            ['id' => 14,'name' => 'سماعه','description'=>'','imagepath'=>'assets\img\ear.jpg','price'=>40,'quantity'=>200,'category_id'=>4,'nameEN'=>'EarPhone'],
            ['id' => 15,'name' => 'شاحن هاتف','description'=>'','imagepath'=>'assets\img\changer.jpg','price'=>50,'quantity'=>300,'category_id'=>4,'nameEN'=>'changer'],
            ['id' => 16,'name' => 'كاميرا صغيره','description'=>'','imagepath'=>'assets\img\smallcamera.jpg','price'=>1000,'quantity'=>12,'category_id'=>1,'nameEN'=>'small camera'],
            ['id' => 17,'name' => 'كاميرا متوسطه','description'=>'','imagepath'=>'assets\img\camera.jpg','price'=>1500,'quantity'=>10,'category_id'=>1,'nameEN'=>'camera'],
            ['id' => 18,'name' => 'شاحن كاميرا','description'=>'','imagepath'=>'assets\img\camerachang.jpg','price'=>800,'quantity'=>10,'category_id'=>1,'nameEN'=>'camera change'],
        

        ];




        $reviews=[
            ['id' => 1,'name' => 'omar','phone'=>'','email'=>'','subject'=>'','message'=>''],



        ];


        DB::table('categories')->insertOrIgnore($categorise);
         DB::table('reviews')->insertOrIgnore($reviews);
         DB::table('products')->insertOrIgnore($products);

            
    }
}
