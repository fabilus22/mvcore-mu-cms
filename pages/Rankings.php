
<?php if(!$mvcore['Rankings'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Rankings'] == 'on') { ?>
<div style="text-align:center;">
							<button href="javascript:;" class="mvcore-button-style" id="mvc_topp"><?php echo main_p_rankings_topplayer;?></button>
							<button href="javascript:;" class="mvcore-button-style" id="mvc_topg"><?php echo main_p_rankings_topguilds;?></button>
							<button href="javascript:;" class="mvcore-button-style" id="mvc_topk"><?php echo main_p_rankings_topkillers;?></button>
							<button href="javascript:;" class="mvcore-button-style" id="mvc_online"><?php echo main_p_rankings_onlineplayers;?></button>
							<button href="javascript:;" class="mvcore-button-style" id="mvc_gms"><?php echo main_p_rankings_gamemasters;?></button>
							<button href="javascript:;" class="mvcore-button-style" id="mvc_vips">Vip Rank</button>
</div>
<br>
<script>
		$(document).ready(function(){
		
		$("#div-topp").show(); $("#rank_by_class").show(); $("#c_all").show();
		
			$("#mvc_topp").click(function(){
				$("#div-topp").show(); $("#rank_by_class").show(); $("#c_alls").show();
				$("#div-topg").hide();
				$("#div-topk").hide();
				$("#div-online").hide();
				$("#div-gms").hide();
				$("#div-vips").hide();
			});
			$("#mvc_topg").click(function(){
				$("#div-topp").hide(); $("#rank_by_class").hide(); $("#c_alls").hide();
				$("#div-topg").show();
				$("#div-topk").hide();
				$("#div-online").hide();
				$("#div-gms").hide();
				$("#div-vips").hide();
			});
			$("#mvc_topk").click(function(){
				$("#div-topp").hide(); $("#rank_by_class").hide(); $("#c_alls").hide();
				$("#div-topg").hide();
				$("#div-topk").show();
				$("#div-online").hide();
				$("#div-gms").hide();
				$("#div-vips").hide();
			});
			$("#mvc_online").click(function(){
				$("#div-topp").hide(); $("#rank_by_class").hide(); $("#c_alls").hide();
				$("#div-topg").hide();
				$("#div-topk").hide();
				$("#div-online").show();
				$("#div-gms").hide();
				$("#div-vips").hide();
			});
			$("#mvc_gms").click(function(){
				$("#div-topp").hide(); $("#rank_by_class").hide(); $("#c_alls").hide();
				$("#div-topg").hide();
				$("#div-topk").hide();
				$("#div-online").hide();
				$("#div-gms").show();
				$("#div-vips").hide();
			});
			$("#mvc_vips").click(function(){
				$("#div-topp").hide(); $("#rank_by_class").hide(); $("#c_alls").hide();
				$("#div-topg").hide();
				$("#div-topk").hide();
				$("#div-online").hide();
				$("#div-gms").hide();
				$("#div-vips").show();
			});
		

		});
</script>
<div id="div-topp" style="display: none;">
	<div id="c_all" style="display: none;">
		<table class="mvcore-table" cellpadding="0" cellspacing="0"><tbody><tr class="mvcore-tabletr"><td>#</td><td><?php echo main_p_rankings_name;?></td><td><?php echo main_p_rankings_class;?></td><td><?php echo main_p_rankings_level;?></td><?php if($mvcore['Reset_Character'] == 'on') { echo '<td>'; } ?><?php if($mvcore['Reset_Character'] == 'on') { echo ''.main_p_rankings_resets.''; } else { echo ''; }; ?><?php if($mvcore['Reset_Character'] == 'on' && $mvcore['Grand_Reset'] == 'on') { echo '<sup style="color: red;">'.main_p_rankings_gr.'</sup>'; } else { echo ''; }; ?><?php if($mvcore['Reset_Character'] == 'on') { echo '</td>'; } ?><?php if($mvcore['Reset_Character'] == 'on' && $mvcore['Grand_Reset'] == 'on' && $mvcore['Master_Grand_Reset'] == 'on') { echo'<td>'.main_p_rankings_mastergr.'</td>'; }; ?><td><?php echo main_p_rankings_location;?></td><td><?php echo echo_web_country;?></td></tr>
		<?PHP
		$guild_query = mssql_query("SELECT top ".$mvcore['top_select']." name from Character where CtlCode <= '7' order by m_Grand_Resets desc, ".$mvcore['gr_column_name']." desc, ".$mvcore['rr_column_name']." Desc, clevel desc");
		for($i=0;$i < mssql_num_rows($guild_query);++$i) {
		$row = mssql_fetch_row($guild_query);
		$sql_char = mssql_query("Select clevel,".$mvcore['rr_column_name'].",".$mvcore['gr_column_name'].",m_Grand_Resets,class,MapNumber from Character where name='$row[0]'");
		$show = mssql_fetch_row($sql_char);
		$gclass = getClass($show[4]);
		$map = getMap($show[5]);
		$rank = $i+1;
		if($mvcore['Reset_Character'] == 'on' && $mvcore['Grand_Reset'] == 'on') { $gr_text = '<sup style="color: red;">'.$show[2].'</sup>'; } else { $gr_text = ''; };
		if($mvcore['Reset_Character'] == 'on') { $rr_text = ''.$show[1].''; } else { $rr_text = ''; };
		if($mvcore['Reset_Character'] == 'on') { $rr_gr_td_1 = '<td>'; $rr_gr_td_2 = '</td>'; } else { $rr_gr_td_1 = ''; $rr_gr_td_2 = '';  };
		if($mvcore['Reset_Character'] == 'on' && $mvcore['Grand_Reset'] == 'on' && $mvcore['Master_Grand_Reset'] == 'on') { $mgr_text = '<td>'.$show[3].'</td>'; } else { $mgr_text = ''; };
		$tr_color_2 = "even2"; 
		$tr_color_1 = "even";
		$tr_color = ($rank % 2) ? $tr_color_1 : $tr_color_2;
		
		$OnlineIMG = chOnlineImg($row[0], $mvcore_medb_s, $mvcore['onoff_style']);
		$mvcFlag = outMvcFlag($row[0], $mvcore_medb_i);
		
				echo "
					<tr style='border-collapse: collapse; border-spacing: 0px;'>
						<td>$rank</td>
						<td><a href='-id-Character_View-id-$row[0].html'>$row[0] $OnlineIMG</a></td>
						<td>$gclass</td>
						<td>$show[0]</td>
						$rr_gr_td_1 $rr_text $gr_text $rr_gr_td_2
						$mgr_text
						<td>$map</td>
						<td>$mvcFlag</td>
					</tr>
				";
		}
		?>
		</table>
	</div>
</div>
<div id="div-topg" style="display: none;">
<table class="mvcore-table" cellpadding="0" cellspacing="0">
	<tbody><tr class="mvcore-tabletr">
		<td>#</td>
		<td><?php echo main_p_rankings_name;?></td>
		<td><?php echo main_p_rankings_guildmaster;?></td>
		<td><?php echo main_p_rankings_score;?></td>
		<td><?php echo main_p_rankings_members;?></td>
	</tr>
<?PHP

$guild_query = mssql_query("SELECT top ".$mvcore['top_select']." G_Name from Guild order by G_Score desc");
for($i=0;$i < mssql_num_rows($guild_query);++$i) {
$row = mssql_fetch_row($guild_query);

$sql_char = mssql_query("Select G_Score,G_Master,G_Mark from Guild where G_Name='$row[0]'");
$show = mssql_fetch_row($sql_char);

$sql_ce = mssql_query("SELECT count(*) FROM guildmember WHERE G_Name = '$row[0]'");
$mcount = mssql_result($sql_ce, 0, 0);

if($show[0] == '') { $DropgScore = '0'; } else { $DropgScore = $show[0]; };

$rank = $i+1;

$tr_color_2 = "even2"; 
$tr_color_1 = "even";
$tr_color = ($rank % 2) ? $tr_color_1 : $tr_color_2;

$OnlineIMG = chOnlineImg($show[1], $mvcore_medb_s, $mvcore['onoff_style']);

echo "

	<tr style='border-collapse: collapse; border-spacing: 0px;'>
		<td>$rank</td>
		<td><a href='-id-Guild_View-id-$row[0].html'>$row[0]</a></td>
		<td><a href='-id-Character_View-id-$show[1].html'>$show[1] $OnlineIMG</a></td>
		<td>$DropgScore</td>
		<td>$mcount</td>
	</tr>
";
}
?>
</table>
</div>
<div id="div-topk" style="display: none;">
<table class="mvcore-table" cellpadding="0" cellspacing="0">
	<tbody><tr class="mvcore-tabletr">
		<td>#</td>
		<td><?php echo main_p_rankings_name;?></td>
		<td><?php echo main_p_rankings_location;?></td>
		<td><?php echo main_p_rankings_playerkills;?></td>
		<td><?php echo main_p_rankings_correntstatus;?></td>
		<td><?php echo echo_web_country;?></td>
	</tr>
<?PHP

$guild_query = mssql_query("SELECT top ".$mvcore['top_select']." name from character where CtlCode <= '7' order by PkCount desc");
for($i=0;$i < mssql_num_rows($guild_query);++$i) {
$row = mssql_fetch_row($guild_query);

$sql_char = mssql_query("Select clevel,".$mvcore['rr_column_name'].",class,strength,dexterity,vitality,energy,leadership,accountid,MapNumber,".$mvcore['gr_column_name'].",MapPosX,MapPosY,PkLevel,PkCount from character where name='$row[0]'");
$show = mssql_fetch_row($sql_char);

$status_reults3 = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='$show[8]'");
$status3 = mssql_fetch_row($status_reults3);

switch ($show[13]) { 
case 6: $hstatus="Phonoman"; break;
Case 5: $hstatus="Phonoman lvl 2"; break;
Case 4: $hstatus="Phonoman lvl 1"; break;
Case 3: $hstatus="Commoner"; break;
Case 2: $hstatus="Hero lvl 1"; break;
Case 1: $hstatus="Hero lvl 2"; break;
Case 0: $hstatus="Hero"; break;
};

switch ($status3[0]) { 
case 0: $SStatus2="<font color='red'>".gs_status_offline."</font>"; break;
case 1: $SStatus2="<font color='green'>".gs_status_online."</font>"; break;
Default: $SStatus2="<font color='red'>".gs_status_offline."</font>"; break;
};

if($show[14] == '' || $show[14] == ' ' || $show[14] == '0' || $show[14] <= '0') { $pk_count = 0; } else { $pk_count = $show[14]; };
	
$get_map = mssql_query("Select MapNumber from character where name='$row[0]'");
$drop_map = mssql_fetch_row($get_map);

$map = getMap($drop_map[0]);

$rank = $i+1;

$tr_color_2 = "even2"; 
$tr_color_1 = "even";
$tr_color = ($rank % 2) ? $tr_color_1 : $tr_color_2;

$OnlineIMG = chOnlineImg($row[0], $mvcore_medb_s, $mvcore['onoff_style']);
$mvcFlag = outMvcFlag($row[0], $mvcore_medb_i);

echo "

	<tr style='border-collapse: collapse; border-spacing: 0px;'>
		<td>$rank</td>
		<td><a href='-id-Character_View-id-$row[0].html'>$row[0] $OnlineIMG</a></td>
		<td>$map</td>
		<td>$pk_count</td>
		<td>$hstatus</td>
		<td>$mvcFlag</td>
	</tr>
";
}
?>
</table>
</div>
<div id="div-online" style="display: none;">
<table class="mvcore-table" cellpadding="0" cellspacing="0">
	<tbody><tr class="mvcore-tabletr">
		<td>#</td>
		<td><?php echo main_p_rankings_name;?></td>
		<td><?php echo main_p_rankings_level;?></td>
		<td><?php echo main_p_rankings_resets;?><sup style="color: red;"><?php echo main_p_rankings_gr;?></sup></td>
		<td><?php echo echo_web_country;?></td>
	</tr>
<?PHP

$status_reults3 = mssql_query("Select top ".$mvcore['top_select']." memb___id from ".$mvcore_medb_s." where connectstat='1'");
for($i=0;$i < mssql_num_rows($status_reults3);++$i) {
$roww = mssql_fetch_row($status_reults3);

$get_char_info_name= mssql_query("Select GameIDC from AccountCharacter where id='".$roww[0]."'");
$status444f = mssql_fetch_row($get_char_info_name);

$sql_char = mssql_query("Select clevel,".$mvcore['rr_column_name'].",class,strength,dexterity,vitality,energy,leadership,accountid,MapNumber,".$mvcore['gr_column_name'].",MapPosX,MapPosY,PkLevel,name from character where name='$status444f[0]'");
$show = mssql_fetch_row($sql_char);

$status_reults34 = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='$roww[0]'");
$status3 = mssql_fetch_row($status_reults34);

switch ($show[13]) { 
case 6: $hstatus="Phonoman"; break;
Case 5: $hstatus="Phonoman lvl 2"; break;
Case 4: $hstatus="Phonoman lvl 1"; break;
Case 3: $hstatus="Commoner"; break;
Case 2: $hstatus="Hero lvl 1"; break;
Case 1: $hstatus="Hero lvl 2"; break;
Case 0: $hstatus="Hero"; break;
};

switch ($status3[0]) { 
case 0: $SStatus21="<font color='red'>".gs_status_offline."</font>"; break;
case 1: $SStatus21="<font color='#58FA58'>".gs_status_online."</font>"; break;
Default: $SStatus21="<font color='red'>".gs_status_offline."</font>"; break;
};

$rank = $i+1;

$tr_color_2 = "even2"; 
$tr_color_1 = "even";
$tr_color = ($rank % 2) ? $tr_color_1 : $tr_color_2;

$OnlineIMG = chOnlineImg($status444f[0], $mvcore_medb_s, $mvcore['onoff_style']);
$mvcFlag = outMvcFlag($status444f[0], $mvcore_medb_i);

if($status444f[0] == '' || $status444f[0] == NULL) { $OnlineIMG = ''; $char_name = ''.main_p_vote_emptyacc.''; $char_lvl = '-'; $char_rr = '-'; $char_gr = '-'; } else { $char_name = $status444f[0]; $char_lvl = $show[0]; $char_rr = $show[1]; $char_gr = $show[10]; };

echo "


	<tr style='border-collapse: collapse; border-spacing: 0px;'>
		<td>$rank</td>
		<td><a href='-id-Character_View-id-$status444f[0].html'>$char_name $OnlineIMG</a></td>
		<td>$char_lvl</td>
		<td>$char_rr<sup style='color: red;'>$char_gr</sup></td>
		<td>$mvcFlag</td>
	</tr>

";

} ?>
</table>
</div>
<div id="div-gms" style="display: none;">
<table class="mvcore-table" cellpadding="0" cellspacing="0">
	<tbody><tr class="mvcore-tabletr">
		<td>#</td>
		<td><?php echo main_p_rankings_name;?></td>
		<td><?php echo main_p_rankings_rank;?></td>
		<td><?php echo echo_web_country;?></td>
	</tr>
<?PHP

$status_reults3 = mssql_query("Select top ".$mvcore['top_select']." name,CtlCode,accountId from character where CtlCode >= '8'");
for($i=0;$i < mssql_num_rows($status_reults3);++$i) {
$roww = mssql_fetch_row($status_reults3);

$status_reults34 = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='$roww[2]'");
$status3 = mssql_fetch_row($status_reults34);

$get_cpanelcode = mssql_query("Select admincp from ".$mvcore_medb_i." where memb___id='$roww[2]'");
$drop_cpanelcode = mssql_fetch_row($get_cpanelcode);

switch ($roww[1]) { 
case 8: $gmsStat="".main_p_rankings_gmtest.""; break;
case 16: $gmsStat="<b>".main_p_rankings_gmaster."</b>"; break;
case 32: $gmsStat="<font color='red'>".main_p_rankings_administrator."</font>"; break;
};

if($drop_cpanelcode[0] == 2 && $roww[1] == 32) { $gmsStat = '<b>'.main_p_rankings_gmaster.'</b>';} 
else if($drop_cpanelcode[0] == 1 && $roww[1] == 32) { $gmsStat = '<font color="red">'.main_p_rankings_administrator.'</font>';}

$rank = $i+1;

switch ($status3[0]) { 
case 0: $SStatus2="<font color='red'>".gs_status_offline."</font>"; break;
case 1: $SStatus2="<font color='green'>".gs_status_online."</font>"; break;
Default: $SStatus2="<font color='red'>".gs_status_offline."</font>"; break;
};

$tr_color_2 = "even2"; 
$tr_color_1 = "even";
$tr_color = ($rank % 2) ? $tr_color_1 : $tr_color_2;

$OnlineIMG = chOnlineImg($roww[0], $mvcore_medb_s, $mvcore['onoff_style']);
$mvcFlag = outMvcFlag($roww[0], $mvcore_medb_i);

echo "


	<tr style='border-collapse: collapse; border-spacing: 0px;'>
		<td>$rank</td>
		<td><a href='-id-Character_View-id-$roww[0].html'>$roww[0] $OnlineIMG</a></td>
		<td>$gmsStat</td>
		<td>$mvcFlag</td>
	</tr>

";
} ?>
</table>
</div>
<div id="div-vips" style="display: none;">
<table class="mvcore-table" cellpadding="0" cellspacing="0">
	<tbody><tr class="mvcore-tabletr">
		<td>#</td>
		<td><?php echo main_p_rankings_name;?></td>
		<td>Class</td>
		<td>Level</td>
		<td>Map</td>
		<td>Vip Status</td>
	</tr>
<?PHP

$status_reults3 = mssql_query("Select top ".$mvcore['top_select']." memb___id from memb_info where mvc_vip_date >= '1'");
for($i=0;$i < mssql_num_rows($status_reults3);++$i) {
$roww = mssql_fetch_row($status_reults3);

$status_reults34 = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='$roww[0]'");
$status3 = mssql_fetch_row($status_reults34);

$get_cpanelcode = mssql_query("Select gameidc from accountcharacter where id='$roww[0]'");
$drop_cpanelcode = mssql_fetch_row($get_cpanelcode);

$get_cpanelcodde = mssql_query("Select name, clevel, ".$mvcore['rr_column_name'].",".$mvcore['gr_column_name'].", MapNumber, class from character where name='$drop_cpanelcode[0]'");
$drop_dcpane = mssql_fetch_row($get_cpanelcodde);

$rank = $i+1; 

switch ($status3[0]) { 
case 0: $SStatus2="<font color='red'>".gs_status_offline."</font>"; break;
case 1: $SStatus2="<font color='green'>".gs_status_online."</font>"; break;
Default: $SStatus2="<font color='red'>".gs_status_offline."</font>"; break;
};

$tr_color_2 = "even2"; 
$tr_color_1 = "even";
$tr_color = ($rank % 2) ? $tr_color_1 : $tr_color_2;

$OnlineIMG = chOnlineImg($drop_dcpane[0], $mvcore_medb_s, $mvcore['onoff_style']);
$mvcFlag = outMvcFlag($drop_dcpane[0], $mvcore_medb_i);
$map = getMap($drop_dcpane[4]);
$gclass = getClass($drop_dcpane[5]);

echo "


	<tr style='border-collapse: collapse; border-spacing: 0px;'>
		<td>$rank</td>
		<td><a href='-id-Character_View-id-$drop_dcpane[0].html'>$drop_dcpane[0] $OnlineIMG</a></td>
		<td>$gclass</td>
		<td>$drop_dcpane[1]</td>
		<td>$map</td>
		<td style='color:green;'>ACTIVE</td>
	</tr>

";
} ?>
</table>
</div>
<?php } ?>