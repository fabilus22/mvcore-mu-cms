
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

?>
<div width="100%" align="center">
	<div class="latest-twitter-tweett">
		<table width="100%" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td style="padding-left:15px;"><?php echo''.theme_inc_total_accounts.'';?></td>
				<td style="float:right;padding-right:15px;"><?php echo $acr2;?></td>
			</tr>
		</table>
	</div>
	<div class="latest-twitter-tweett">
		<table width="100%" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td style="padding-left:15px;"><?php echo''.theme_inc_total_characters.'';?></td>
				<td style="float:right;padding-right:15px;"><?php echo $acr3;?></td>
			</tr>
		</table>
	</div>
	<div class="latest-twitter-tweett">
		<table width="100%" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td style="padding-left:15px;"><?php echo''.theme_inc_total_guilds.'';?></td>
				<td style="float:right;padding-right:15px;"><?php echo $acr4;?></td>
			</tr>
		</table>
	</div>
	<div class="latest-twitter-tweett">
		<table width="100%" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td style="padding-left:15px;"><?php echo''.theme_inc_total_gmasters.'';?></td>
				<td style="float:right;padding-right:15px;"><?php echo $acr5;?></td>
			</tr>
		</table>
	</div>
	<?php if($mvcore['onoff_player_count'] == 'show') { ?>
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><?php echo''.theme_inc_players_online.'';?></td>
					<td style="float:right;padding-right:15px;color:green;"><?php echo $acr1;?></td>
				</tr>
			</table>
		</div>
	<?php } ?>
	<div class="latest-twitter-tweett">
		<table width="100%" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td style="padding-left:15px;"><?php echo''.theme_inc_today_active.'';?></td>
				<td style="float:right;padding-right:15px;color:red;"><?php echo $online_today;?></td>
			</tr>
		</table>
	</div>
</div>
