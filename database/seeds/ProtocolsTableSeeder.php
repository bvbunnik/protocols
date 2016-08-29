<?php

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class ProtocolsTableSeeder 
 */
class ProtocolsTableSeeder extends Seeder {

	/**
	 *
	 */
	public function run() {

		if (DB::connection()->getDriverName() == 'mysql') {
			DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		}

		DB::table('protocols')->truncate();

		$protocols = [
			[
				'id' => 1,
				'name' => 'Human & Animals',
				'table_name' => 'combineds',
				'table_columns' => '{"columns":["Domestic / Free-ranging / Not Applicable (NA)","Host species","In-vivo (IV) / Post-mortem (PM)","Disease or Syndrome","Pathogen type","Pathogen species","Protocol(s)","Source","Comments","Notifiable"]}',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
			[
				'id' => 2,
				'name' => 'Food',
				'table_name' => 'foods',
				'table_columns' => '{"columns":["Host species","Food item","Live/Dead","Matrix","Target Pathogen or Syndrome","Scientific name","Protocol(s)","Source","Comments"]}',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
			[
				'id' => 3,
				'name' => 'Transport',
				'table_name' => 'transports',
				'table_columns' => '{"columns":["Animal /Human","Transport / Storage / Other","Title","Link","Source"]}',
				'created_at' => Carbon::now(),
                                'updated_at' => Carbon::now()
			],
			[
                'id' => 4,
                'name' => 'Vector',
                'table_name' => 'vectors',
                'table_columns' => '{"columns":["Vector","Scientific name","Species (most important)","Target Pathogen","Scientific Name","Disease","Protocol(s)","Source"]}',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
		];

		DB::table('protocols')->insert($protocols);

		if (DB::connection()->getDriverName() == 'mysql') {
			DB::statement('SET FOREIGN_KEY_CHECKS=1;');
		}
	}
}
