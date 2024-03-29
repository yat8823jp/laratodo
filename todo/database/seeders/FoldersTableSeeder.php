<?php

namespace Database\Seeders;

use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoldersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		//first メソッドでユーザーを一行だけ取得し ID を user_id の値に指定
		$user = DB::table( 'users' ) -> first();

        $titles = [ 'プライベート', '仕事', '旅行' ];

        foreach ( $titles as $title ) {
            DB::table( 'folders' ) -> insert( [
                'title'      => $title,
				'user_id'    => $user -> id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ] );
        }
    }
}
