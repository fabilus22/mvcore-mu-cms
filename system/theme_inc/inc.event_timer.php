<?PHP

$sys_startsa = mssql_query("select top 100 event_name, event_hour, event_min, event_interval, event_run_time, event_reward_info, type, date, event_start_date from MVCore_Event_Timer where type = '1' order by date desc");

for($i=0;$i < mssql_num_rows($sys_startsa);++$i) {
$drop_info = mssql_fetch_row($sys_startsa);

//------------------------------------------------------------
//Timer Script By Using Database ( Experimental )
		$event_timer_date = mssql_query("SELECT event_timer_date from MVCore_Event_Timer_Date where id = '".$drop_info[7]."'");
		$event_timer_date = mssql_fetch_row($event_timer_date);
			
		if($event_timer_date[0] > strtotime("".$drop_info[8]."")) { $date_calc = $event_timer_date[0]; } else { $date_calc = strtotime("".$drop_info[8].""); };
		$set_plus_time = $drop_info[3] * 60;
		$eventruntime = $drop_info[4] * 60;
			//If time() larger then SavedTime + Next Interval
				$calculateLostDTime = time() - $date_calc;
				$calcdel = $calculateLostDTime / ( $set_plus_time + $eventruntime - $eventruntime );
				if(round($calcdel) >= '1') { $set_plus_time = ( $set_plus_time + $eventruntime - $eventruntime ) * round($calcdel); };
			//end

		if( $date_calc <= time() ){
			
			//Start event process
				$time_nes = $date_calc + $eventruntime;
				$date_conwegvertswegssdsv = decode_time(time(),$time_nes,'short','');
				$eventopen[$i] ='Event Opened <font size="1">( For '.$date_conwegvertswegssdsv.' )</font>';
				$run_rest[$i] = '1';
			//end event process

			if( time() >= $time_nes ){
				
				$calculateLostTime = time() - $time_nes;
				
				$date_calc = time() + $set_plus_time - $calculateLostTime;
				if($event_timer_date[0] != '') { $run = mssql_query("update MVCore_Event_Timer_Date set event_timer_date = '".$date_calc."' where id ='".$drop_info[7]."'"); $run_rest[$i] = '0'; }
				else { $run = mssql_query("insert into MVCore_Event_Timer_Date (event_timer_date,id) VALUES ('".$date_calc."','".$drop_info[7]."')"); $run_rest[$i] = '0'; };
			};
		};

		$date_convertsssdsv = decode_time(time(),$date_calc,'short','');
		if($run_rest[$i] != '1') { $eventopen[$i] =''.$date_convertsssdsv.''; };
//------------------------------------------------------------
echo'
			<div class="latest-twitter-tweett" title="'.$drop_info[5].'">
				<div class="trhowthis">
					<div>'.$drop_info[0].'<font style="float:right;"><b>'.$eventopen[$i].'</b></font></div>
				</div>
			</div>
';

};
?>