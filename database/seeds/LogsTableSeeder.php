<?php

use Illuminate\Database\Seeder;

class LogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/json/logs.json");
        $data = json_decode($json);
		
		$dataImpressionLog = array();
		$dataConversionLog = array();
		
		$dataImpressionLogCount = 0;
		$dataConversionLogCount = 0;
		
        foreach ($data as $obj) {

			//IMRESSION LOG
			if($obj->type == 'impression'){
				$dataImpressionLog[]	=	array(
					'employee_id' => $obj->user_id,
					'revenue' =>$obj->revenue,
					'time'=>$obj->time,
					'created_at'=>date("Y-m-d H:i:s"),
					'updated_at'=>date("Y-m-d H:i:s")

				);
				$dataImpressionLogCount++;
			}
			//CONVERSION LOG
			if($obj->type == 'conversion'){
				$dataConversionLog[]	=	array(
					'employee_id' => $obj->user_id,
					'revenue' =>$obj->revenue,
					'time'=>$obj->time,
					'created_at'=>date("Y-m-d H:i:s"),
					'updated_at'=>date("Y-m-d H:i:s")

				);
				$dataConversionLogCount++;
			}
			
			//INSERT IMPRESSION LOG
			if($dataImpressionLogCount>=1500){
				
				DB::table('impression_logs')->insert($dataImpressionLog);
				
				$dataImpressionLogCount = 0;
				$dataImpressionLog = array();
			}
			
			//INSERT CONVERSOIN LOG
			if($dataConversionLogCount>=1500){
				
				DB::table('conversion_logs')->insert($dataConversionLog);
				
				$dataConversionLogCount = 0;
				$dataConversionLog = array();
			}
        }    
    }
}
