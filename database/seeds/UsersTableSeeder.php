<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/json/users.json");
        $data = json_decode($json);
		
		//AVATAR FALLBACK IMAGE
		$imageArr=array(
			"user1-128x128.jpg",
			"user2-160x160.jpg",
			"user3-128x128.jpg",
			"user4-128x128.jpg",
			"user5-128x128.jpg",
			"user6-128x128.jpg",
			"user7-128x128.jpg",
			"user8-128x128.jpg",
		);

        foreach ($data as $obj) {
			
			//FALLBACK AVATAR IMG SRC
			$imageArrRanKey = array_rand($imageArr,1);
			$imgSrc = $imageArr[$imageArrRanKey];
					
            DB::table('employees')->insert(array(
                'id' => $obj->id,
                'name' => $obj->name,
                'avatar' => $obj->avatar,
                'avatar_img_fallback' => $imgSrc,
                'occupation' =>$obj->occupation

            ));
        }
    }
}
