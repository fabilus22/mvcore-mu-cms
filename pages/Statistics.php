
<?php if(!$mvcore['Statistics'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Statistics'] == 'on') { ?>
<?PHP

$sql100 = mssql_query("SELECT count(*) FROM ".$mvcore_medb_s." WHERE ConnectStat = '1'");
$acr1 =mssql_result($sql100, 0, 0);

$sql101 = mssql_query("SELECT count(*) FROM ".$mvcore_medb_i."");
$acr2 =mssql_result($sql101, 0, 0);

$sql102 = mssql_query("SELECT count(*) FROM Character");
$acr3 =mssql_result($sql102, 0, 0);

$sql103 = mssql_query("SELECT count(*) FROM Guild");
$acr4 =mssql_result($sql103, 0, 0);

$sql104 = mssql_query("SELECT count(*) FROM Character WHERE CtlCode = '32'");
$acr5 =mssql_result($sql104, 0, 0);

$sql105 = mssql_query("SELECT count(*) FROM ".$mvcore_medb_s." WHERE ConnectStat = '1'");
$total['online']=mssql_result($sql105, 0, 0);

$month_today = date("M", time());
$day_today  = date("j", time());
$year_today  = date("Y", time());
$query   =mssql_query("SELECT count(*) FROM ".$mvcore_medb_s." WHERE ConnectTM LIKE '%".$month_today."%".$day_today."%".$year_today."%' OR DisConnectTM LIKE '%".$month_today."%".$day_today."%".$year_today."%'");
$online_today = mssql_result($query, 0, 0);
$sql = mssql_query("SELECT count(*) FROM ".$mvcore_medb_s." WHERE ConnectStat = 1");


$sql106 = mssql_query("SELECT Owner_Guild FROM MuCastle_Data");
$acr7 = mssql_fetch_row($sql106);

$sql107 = mssql_query("SELECT Siege_End_Date From MuCastle_Data");
$acr8 = mssql_fetch_row($sql107);
$acr8s = strtotime($acr8[0]) - 86400;

$sql108 = mssql_query("SELECT G_Master FROM Guild WHERE G_Name ='$acr7[0]'");
$acr9 = mssql_fetch_row($sql108);

$Crywolfs = mssql_query("SELECT CRYWOLF_OCCUFY FROM MuCrywolf_DATA WHERE MAP_SVR_GROUP ='0'");
$Crywolfs_Drop = mssql_fetch_row($Crywolfs);

if($Crywolfs_Drop[1] >= '1') { $dropStated = '<font color="green">'.main_p_statistics_protected.'</font>'; } else { $dropStated = '<font color="red">'.main_p_statistics_notprotected.'</font>'; };


$points_totak_vaneter = mssql_query("SELECT sum(cast(".$mvcore['gens_contricol_name']." AS integer)) AS TotalVaneter FROM ".$mvcore['gens_tab_name']." WHERE ".$mvcore['gens_famicol_name']." = '2'");
$points_totak_vaneter = mssql_fetch_row($points_totak_vaneter);
$points_totak_duprain = mssql_query("SELECT sum(cast(".$mvcore['gens_contricol_name']." AS integer)) AS TotalDuprain FROM ".$mvcore['gens_tab_name']." WHERE ".$mvcore['gens_famicol_name']." = '1'");
$points_totak_duprain = mssql_fetch_row($points_totak_duprain);

$total_vanert =  mssql_query("SELECT count(*) FROM ".$mvcore['gens_tab_name']." WHERE ".$mvcore['gens_famicol_name']." = '2'");
$sVener =mssql_result($total_vanert, 0, 0);
$total_duprian =  mssql_query("SELECT count(*) FROM ".$mvcore['gens_tab_name']." WHERE ".$mvcore['gens_famicol_name']." = '1'");
$sDupri =mssql_result($total_duprian, 0, 0);

if($sDupri == '0') { $durpriDropPoints = '0'; } else { $durpriDropPoints = $points_totak_duprain[0]; };
if($sVener == '0') { $venriDropPoints = '0'; } else { $venriDropPoints = $points_totak_vaneter[0]; };


//Class Count Information
$class0 = mssql_query("SELECT count(*) FROM Character WHERE class = '0'"); // DW
$classD0 =mssql_result($class0, 0, 0);

$class1 = mssql_query("SELECT count(*) FROM Character WHERE class = '1'"); // SM
$classD1 =mssql_result($class1, 0, 0);

$class2 = mssql_query("SELECT count(*) FROM Character WHERE class >= '2' and class <= '3'"); // GM
$classD2 =mssql_result($class2, 0, 0);


$class16 = mssql_query("SELECT count(*) FROM Character WHERE class = '16'"); // DK
$classD16 =mssql_result($class16, 0, 0);

$class17 = mssql_query("SELECT count(*) FROM Character WHERE class = '17'"); // BK
$classD17 =mssql_result($class17, 0, 0);

$class18 = mssql_query("SELECT count(*) FROM Character WHERE class >= '18' and class <= '19'"); // BM
$classD18 =mssql_result($class18, 0, 0);


$class32 = mssql_query("SELECT count(*) FROM Character WHERE class = '32'"); // Elf
$classD32 =mssql_result($class32, 0, 0);

$class33 = mssql_query("SELECT count(*) FROM Character WHERE class = '33'"); // Muse Elf
$classD33 =mssql_result($class33, 0, 0);

$class34 = mssql_query("SELECT count(*) FROM Character WHERE class >= '34' and class <= '35'"); // Hight Elf
$classD34 =mssql_result($class34, 0, 0);


$class48 = mssql_query("SELECT count(*) FROM Character WHERE class = '48'"); // MG
$classD48 =mssql_result($class48, 0, 0);

$class49 = mssql_query("SELECT count(*) FROM Character WHERE class >= '49' and class <= '51'"); // DM
$classD49 =mssql_result($class49, 0, 0);


$class64 = mssql_query("SELECT count(*) FROM Character WHERE class = '64'"); // DL
$classD64 =mssql_result($class64, 0, 0);

$class65 = mssql_query("SELECT count(*) FROM Character WHERE class >= '65' and class <= '67'"); // LE
$classD65 =mssql_result($class65, 0, 0);


$class80 = mssql_query("SELECT count(*) FROM Character WHERE class = '80'"); // Sum
$classD80 =mssql_result($class80, 0, 0);

$class81 = mssql_query("SELECT count(*) FROM Character WHERE class = '81'"); // Bloody Sum
$classD81 =mssql_result($class81, 0, 0);

$class82 = mssql_query("SELECT count(*) FROM Character WHERE class >= '82' and class <= '83'"); // Dimension Master
$classD82 =mssql_result($class82, 0, 0);


$class96 = mssql_query("SELECT count(*) FROM Character WHERE class = '96'"); // RF
$classD96 =mssql_result($class96, 0, 0);

$class97 = mssql_query("SELECT count(*) FROM Character WHERE class >= '97' and class <= '98'"); // FM
$classD97 =mssql_result($class97, 0, 0);


$class112 = mssql_query("SELECT count(*) FROM Character WHERE class >= '112' and class <= '114'"); // GL
$classD112 =mssql_result($class112, 0, 0);

?>
<?php if( $mvcore['db_season'] >= '6') { ?>
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
	<tr width="100%" align="center">
		<td><img src="system/engine_images/gens/family.png" alt="duprian"></td>
	</tr>
</table>
<table class="mvcore-tablestat" width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
	<tr width="100%" align="center">
		<td colspan="4"><?php echo main_p_statistics_gensfamilypoints;?></td>
	</tr>
	<tr width="100%" align="center">
			<td><img src="system/engine_images/gens/DupriansFamily.png"></td>
		<td><?php echo main_p_statistics_members;?>: <?php echo $sDupri;?> <br> <?php echo main_p_statistics_points;?>: <?php echo $durpriDropPoints;?></td>
			<td><img src="system/engine_images/gens/StewardsFamily.png"></td>
		<td><?php echo main_p_statistics_members;?>: <?php echo $sVener;?><br><?php echo main_p_statistics_points;?>: <?php echo $venriDropPoints;?></td>
	</tr>
</table>
<br>
<br>
<?php } ?>
<table class="mvcore-tablestat" cellpadding="0" cellspacing="0">
	<tr class="mvcore-tabletr">
		<td colspan="2"><?php echo main_p_statistics_serverinfo;?></td>
	</tr>
				<tr style='border-collapse: collapse; border-spacing: 0px;'>
					<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo main_p_statistics_maxstat;?></td>
					<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $mvcore['server_max_stat'];?></td>
				</tr>
				<tr style='border-collapse: collapse; border-spacing: 0px;'>
					<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo main_p_statistics_maxskslot;?></td>
					<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $mvcore['max_sock_opt'];?></td>
				</tr>
				<tr style='border-collapse: collapse; border-spacing: 0px;'>
					<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo main_p_statistics_totalacc;?></td>
					<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $acr2;?></td>
				</tr>
				<tr style='border-collapse: collapse; border-spacing: 0px;'>
					<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo main_p_statistics_totalchar;?></td>
					<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $acr3;?></td>
				</tr>
				<tr style='border-collapse: collapse; border-spacing: 0px;'>
					<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo main_p_statistics_totalguild;?></td>
					<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $acr4;?></td>
				</tr>
				<tr style='border-collapse: collapse; border-spacing: 0px;'>
					<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo main_p_statistics_totalgmaster;?></td>
					<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $acr5;?></td>
				</tr>
				<?php if($mvcore['onoff_player_count'] == 'show') { ?>
					<tr style='border-collapse: collapse; border-spacing: 0px;'>
						<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo main_p_statistics_totalonline;?></td>
						<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;color:green;"><?php echo $acr1;?></td>
					</tr>
				<?php } ?>
				<tr style='border-collapse: collapse; border-spacing: 0px;'>
					<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo main_p_statistics_todayactive;?></td>
					<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;color:red;"><?php echo $online_today;?></td>
				</tr>

</table>
<br>
<?php 
$sys_startsas = mssql_query("select top 1 event_name from MVCore_Event_Timer where type = '2'");
$sys_startsass = mssql_fetch_row($sys_startsas);
if( $sys_startsass[0] != '') { ?>
<br>
<table class="mvcore-tablestat" cellpadding="0" cellspacing="0">
	<tr class="mvcore-tabletr">
		<td colspan="5" style="padding-left: 15px;"><?php echo''.main_p_statistics_staticeventi.'';?></td>
	</tr>
</table>
<table class="mvcore-tablestat" cellpadding="0" cellspacing="0">

	<tr class="mvcore-tabletr">
		<td><?php echo''.main_p_statistics_eventname.'';?></td>
		<td><?php echo''.main_p_statistics_eventsarthr.'';?></td>
		<td><?php echo''.main_p_statistics_eventstartemin.'';?></td>
		<td><?php echo''.main_p_statistics_eventtime.'';?></td>
		<td><?php echo''.main_p_statistics_eventrewas.'';?></td>
	</tr>
<?php
$sys_startsa = mssql_query("select top 100 event_name, event_hour, event_min, event_interval, event_run_time, event_reward_info, type, date, event_start_date from MVCore_Event_Timer where type = '2' order by date desc");
for($i=0;$i < mssql_num_rows($sys_startsa);++$i) {
$drop_info = mssql_fetch_row($sys_startsa);
								
echo'
		<tr style="border-collapse: collapse; border-spacing: 0px;">
			<td style="text-align: center;border: 0;border-bottom: 1px solid '.$mvcore['table_s_borcolor'].';">'.$drop_info[0].'</td>
			<td style="text-align: center;border: 0;border-bottom: 1px solid '.$mvcore['table_s_borcolor'].';">'.$drop_info[1].'</td>
			<td style="text-align: center;border: 0;border-bottom: 1px solid '.$mvcore['table_s_borcolor'].';">'.$drop_info[2].'</td>
			<td style="text-align: center;border: 0;border-bottom: 1px solid '.$mvcore['table_s_borcolor'].';">'.$drop_info[4].'</td>
			<td style="text-align: center;border: 0;border-bottom: 1px solid '.$mvcore['table_s_borcolor'].';">'.$drop_info[5].'</td>
		</tr>
';
};
?>
</table>
<br>
<?php } ?>
<br>
<table class="mvcore-tablestat" cellpadding="0" cellspacing="0">
	<tr class="mvcore-tabletr">
		<td colspan="2"><?php echo main_p_statistics_crywolfinfo;?></td>
	</tr>
		<tr style='border-collapse: collapse; border-spacing: 0px;'>
			<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo main_p_statistics_statueoffortress;?></td>
			<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $dropStated;?></td>
		</tr>
</table>
<br>
<br>

<?php
if ($acr7[0] == ' ' || $acr7[0] == ''){
	echo'
		<table class="mvcore-tablestat" cellpadding="0" cellspacing="0">
			<tr class="mvcore-tabletr">
				<td colspan="2">'.main_p_statistics_castleownerexit.'</td>
			</tr>
		</table>
	';
} else { 
	echo'
		<table class="mvcore-tablestat" cellpadding="0" cellspacing="0">
			<tr class="mvcore-tabletr">
				<td colspan="2" style="padding-left: 15px;">'.main_p_statistics_castlesiegeinfo.'</td>
			</tr>
						<tr style="border-collapse: collapse; border-spacing: 0px;">
							<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid '.$mvcore['table_s_borcolor'].';">'.main_p_statistics_castleownerguil.'</td>
							<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid '.$mvcore['table_s_borcolor'].';">'.$acr7[0].'</td>
						</tr>
						<tr style="border-collapse: collapse; border-spacing: 0px;">
							<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid '.$mvcore['table_s_borcolor'].';">'.main_p_statistics_ownname.'</td>
							<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid '.$mvcore['table_s_borcolor'].';">'.$acr9[0].'</td>
						</tr>
		</table>
	'; 
}; ?>
<div class="mvcore-nNote mvcore-nInformation"><?php echo main_p_statistics_castlesieocupy;?> <?php echo date('m-d-Y',$acr8s);?></div>
<br>
<table class="mvcore-tablestat" cellpadding="0" cellspacing="0">
	<tr class="mvcore-tabletr">
		<td>Dark Wizard</td>
		<td>Soul Master</td>
		<?php if( $mvcore['db_season'] >= '3'){ ?><td>Grand Master</td><?php } ?>
	</tr>
		<tr style='border-collapse: collapse; border-spacing: 0px;'>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD0;?></td>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD1;?></td>
			<?php if( $mvcore['db_season'] >= '3'){ ?><td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD2;?></td><?php } ?>
		</tr>
</table>
<br>
<table class="mvcore-tablestat" cellpadding="0" cellspacing="0">
	<tr class="mvcore-tabletr">
		<td>Dark Knight</td>
		<td>Blade Knight</td>
		<?php if( $mvcore['db_season'] >= '3'){ ?><td>Blade Master</td><?php } ?>
	</tr>
		<tr style='border-collapse: collapse; border-spacing: 0px;'>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD16;?></td>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD17;?></td>
			<?php if( $mvcore['db_season'] >= '3'){ ?><td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD18;?></td><?php } ?>
		</tr>
</table>
<br>
<table class="mvcore-tablestat" cellpadding="0" cellspacing="0">
	<tr class="mvcore-tabletr">
		<td>Elf</td>
		<td>Muse Elf</td>
		<?php if( $mvcore['db_season'] >= '3'){ ?><td>Hight Elf</td><?php } ?>
	</tr>
		<tr style='border-collapse: collapse; border-spacing: 0px;'>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD32;?></td>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD33;?></td>
			<?php if( $mvcore['db_season'] >= '3'){ ?><td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD34;?></td><?php } ?>
		</tr>
</table>
<br>
<table class="mvcore-tablestat" cellpadding="0" cellspacing="0">
	<tr class="mvcore-tabletr">
		<td> - </td>
		<td>Magic Gladiator</td>
		<?php if( $mvcore['db_season'] >= '3'){ ?><td>Duel Master</td><?php } ?>
	</tr>
		<tr style='border-collapse: collapse; border-spacing: 0px;'>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"> - </td>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD48;?></td>
			<?php if( $mvcore['db_season'] >= '3'){ ?><td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD49;?></td><?php } ?>
		</tr>
</table>
<br>
<table class="mvcore-tablestat" cellpadding="0" cellspacing="0">
	<tr class="mvcore-tabletr">
		<td> - </td>
		<td>Dark Lord</td>
		<?php if( $mvcore['db_season'] >= '3'){ ?><td>Lord Emperor</td><?php } ?>
	</tr>
		<tr style='border-collapse: collapse; border-spacing: 0px;'>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"> - </td>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD64;?></td>
			<?php if( $mvcore['db_season'] >= '3'){ ?><td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD65;?></td><?php } ?>
		</tr>
</table>
<?php if( $mvcore['db_season'] >= '4'){ ?>
<br>
<table class="mvcore-tablestat" cellpadding="0" cellspacing="0">
	<tr class="mvcore-tabletr">
		<td>Summoner</td>
		<td>Bloody Summoner</td>
		<td>Dimension Master</td>
	</tr>
		<tr style='border-collapse: collapse; border-spacing: 0px;'>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD80;?></td>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD81;?></td>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD82;?></td>
		</tr>
</table>
<?php } ?>
<?php if( $mvcore['db_season'] >= '6'){ ?>
<br>
<table class="mvcore-tablestat" cellpadding="0" cellspacing="0">
	<tr class="mvcore-tabletr">
		<td> - </td>
		<td>Rage Fighter</td>
		<td>Fist Master</td>
	</tr>
		<tr style='border-collapse: collapse; border-spacing: 0px;'>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"> - </td>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD96;?></td>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD97;?></td>
		</tr>
</table>
<?php } ?>
<?php if( $mvcore['db_season'] >= '10'){ ?>
<br>
<table class="mvcore-tablestat" cellpadding="0" cellspacing="0">
	<tr class="mvcore-tabletr">
		<td>Grow Lancer</td>
		<td> - </td>
		<td> - </td>
	</tr>
		<tr style='border-collapse: collapse; border-spacing: 0px;'>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD112;?></td>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"> - </td>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"> - </td>
		</tr>
</table>
<?php } ?>
<?php } ?>