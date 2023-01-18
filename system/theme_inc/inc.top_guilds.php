
<table width="100%" cellpadding="2" cellspacing="2">
	<tbody>
		<tr>
			<td><b>#</b></td>
			<td><b><?php echo''.theme_inc_name.'';?></b></td>
			<td><b><?php echo''.theme_inc_gmaster_name.'';?></b></td>
			<td><b><?php echo''.theme_inc_g_score.'';?></b></td>
		</tr>
		<?PHP

		$guild_query = mssql_query("SELECT top 10 G_Name from Guild order by G_Score desc");
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
		echo "

			<tr style='border-collapse: collapse; border-spacing: 0px;'>
				<td>$rank</td>
				<td><a href='-id-Guild_View-id-$row[0].html'>$row[0]</a></td>
				<td><a href='-id-Character_View-id-$show[1].html'>$show[1]</a></td>
				<td>$DropgScore</td>
			</tr>
			
		";
		}
		?>
</table>