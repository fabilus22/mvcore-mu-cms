
<?php if($_SESSION['admin_panel'] == 'ok') { ?>
		<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?>
				<div class="widget">
                    <div class="whead">
                    <h6>Income statistic ( Values Without Company Percent )</h6>
                    </div>
                    <div class="body">
                        <ul class="wInvoice">
						
						<?php
							$get_data_income = mssql_query("select SUM(CAST(cost_value AS decimal(6,2))) as result from MVCore_Income_Logs where Income_type = '1'"); $pp_value = mssql_fetch_row($get_data_income); // 1 = PayPal
							$get_data_income = mssql_query("select SUM(CAST(cost_value AS decimal(6,2))) as result from MVCore_Income_Logs where Income_type = '2'"); $pg_value = mssql_fetch_row($get_data_income); // 2 = PayGol
							$get_data_income = mssql_query("select SUM(CAST(cost_value AS decimal(6,2))) as result from MVCore_Income_Logs where Income_type = '4'"); $pw_value = mssql_fetch_row($get_data_income); // 4 = PaymentWall
							$get_data_income = mssql_query("select SUM(CAST(cost_value AS decimal(6,2))) as result from MVCore_Income_Logs where Income_type = '5'"); $sr_value = mssql_fetch_row($get_data_income); // 5 = Super Rewards
							$get_data_income = mssql_query("select SUM(CAST(cost_value AS decimal(6,2))) as result from MVCore_Income_Logs where Income_type = '7'"); $fort_value = mssql_fetch_row($get_data_income); // 7 = Fortumo
							$get_data_income = mssql_query("select SUM(CAST(cost_value AS decimal(6,2))) as result from MVCore_Income_Logs where Income_type = '8'"); $pags_value = mssql_fetch_row($get_data_income); // 8 = PagSeguro
							$get_data_income = mssql_query("select SUM(CAST(cost_value AS decimal(6,2))) as result from MVCore_Income_Logs where Income_type = '9'"); $inter_value = mssql_fetch_row($get_data_income); // 9 = Interkassa
							
							//$get_data_income = mssql_query("select SUM(CAST(cost_value AS decimal(6,2))) as result from MVCore_Income_Logs"); $t_value = mssql_fetch_row($get_data_income); // Total
							
							if($pp_value[0] == '') { $pp_value = 0; } else { $pp_value = $pp_value[0]; };
							if($pg_value[0] == '') { $pg_value = 0; } else { $pg_value = $pg_value[0]; };
							if($pw_value[0] == '') { $pw_value = 0; } else { $pw_value = $pw_value[0]; };
							if($sr_value[0] == '') { $sr_value = 0; } else { $sr_value = $sr_value[0]; };
							if($fort_value[0] == '') { $fort_value = 0; } else { $fort_value = $fort_value[0]; };
							if($pags_value[0] == '') { $pags_value = 0; } else { $pags_value = $pags_value[0]; };
							if($inter_value[0] == '') { $inter_value = 0; } else { $inter_value = $inter_value[0]; };
							
							function convertUSD($money) {
								//Converter
								$money = $money * 0.911080; 
								$money = round($money);
								
								return $money;
							};
							
							//total earned
							$total_earned = $pp_value + $pg_value + $sc_value + convertUSD($pw_value) + $sr_value + $fort_value + $inter_value;
							if($total_earned == '') { $total_earned = 0; } else { $total_earned = $total_earned; };
							
						?>
						
                            <li><h4 style="color:ForestGreen;"><?php echo $pp_value;?> EUR</h4><span>PayPal</span></li>
                            <li><h4 style="color:CadetBlue;"><?php echo $pg_value;?> EUR</h4><span>PayGol</span></li>
                            <li><h4 style="color:DarkCyan;"><?php echo $pw_value;?> USD</h4><span>PaymentWall</span></li>
							<li><h4 style="color:DarkOliveGreen;"><?php echo $sr_value;?> EUR</h4><span>SuperRewards</span></li>
							<li><h4 style="color:DarkOliveRed;"><?php echo $fort_value;?> EUR</h4><span>Fortumo</span></li>
							<li><h4 style="color:DarkOliveGreen;"><span style="font-size:12px;">Sold <?php echo $mvcore['money_name2'];?></span> <?php echo $pags_value;?></h4><span>PagSeguro</span></li>
							<li><h4 style="color:DarkViolet;"><?php echo $inter_value;?> EUR</h4><span>InterKassa</span></li>
							<li><h4 style="color:Coral;"><?php echo $total_earned;?> EUR</h4><span>Total Earned</span></li>
                        </ul>
						<div class="invList fluid">
                            <a href="#" onclick="resetearndata(); return false;" class="buttonS bGreen grid12" style="color:#ffffff;">Reset Earned Money Logs</a>
                        </div>
                    </div>
                </div>
				<div class="widget">
                    <div class="whead"><h6>Latest users</h6></div>
                    <table class="tAlt wGeneral" cellpadding="0" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <td>General information</td>
								<td width="20%">User IP</td>
                                <td width="30%">Secret Answer</td>
                                <td width="20%">Date</td>
                            </tr>
                        </thead>
                        <tbody>
							<?php
							$sys_startsa = mssql_query("select top 10 memb___id, mail_addr, SecretAnswer, appl_days, acc_ip from ".$mvcore_medb_i." order by appl_days desc");
							for($i=0;$i < mssql_num_rows($sys_startsa);++$i) {
								$drop_info = mssql_fetch_row($sys_startsa);
								echo'
								
									<tr>
										<td><form action="-id-admincp-id-Account_manage-id-Find_By_Username.html" id="formsubfsfa'.$drop_info[0].'" method="POST"><input name="from_dash_page" type="hidden" value="'.$drop_info[0].'"><a href="#" title="" onclick="document.getElementById(\'formsubfsfa'.$drop_info[0].'\').submit();">'.$drop_info[0].'</a></form><a href="#" title="" class="email">'.$drop_info[1].'</a></td>
										<td align="center"><strong>'.$drop_info[4].'</strong></td>
										<td align="center"><strong>'.$drop_info[2].'</strong></td>
										<td align="center"><strong class="income">'.$drop_info[3].'</strong></td>
									</tr>

								';
							};
							?>
                        </tbody>
                    </table>            
                </div>
<script>
	function resetearndata() {
		var getAllValues = 1;
		
			$.post("acps.php", {
				resetearndata: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
		//MGS Sys --------------
		var getIsOnMSG = '<?php echo $mvcore['admincp_msg_output'];?>';
			var getPaneName2 = '<?php echo $_GET['op2'];?>';
			var getPaneName3 = '<?php echo $_GET['op3'];?>';
		if(getIsOnMSG != 'on') {
			window.location = "-id-admincp-id-"+getPaneName2+"-id-"+getPaneName3+".html";
		} else {
			setInterval(function(){ history.go(0); location.reload(); }, 4000);
		};
		//----------------------
			});
	}
</script>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>