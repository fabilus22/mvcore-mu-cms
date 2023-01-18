<table width="100%" cellpadding="2" cellspacing="2">
	<tr>
		<td><b>#</b></td>
		<td><b><?php echo''.theme_inc_name.'';?></b></td>
		<?php if($mvcore['Reset_Character'] == 'on') { echo'<td><b>'.theme_inc_resets.'</b></td>'; }; ?>
		<?php if($mvcore['Reset_Character'] == 'on' && $mvcore['Grand_Reset'] == 'on') { echo'<td><b>'.theme_inc_gresets.'</b></td>'; }; ?>
		<?php if($mvcore['Reset_Character'] == 'on' && $mvcore['Grand_Reset'] == 'on' && $mvcore['Master_Grand_Reset'] == 'on') { echo'<td><b>'.theme_inc_mastergresets.'</b></td>'; }; ?>
	</tr>
	<?PHP
		$guild_query = mssql_query("SELECT top 10 name from character where CtlCode <= '7' order by m_Grand_Resets desc, ".$mvcore['gr_column_name']." desc, ".$mvcore['rr_column_name']." Desc, clevel desc");
		for($i=0;$i < mssql_num_rows($guild_query);++$i) {
			$row = mssql_fetch_row($guild_query);
			
			$sql_char = mssql_query("Select clevel,".$mvcore['rr_column_name'].",".$mvcore['gr_column_name'].",m_Grand_Resets,class,MapNumber from character where name='$row[0]'");
			$show = mssql_fetch_row($sql_char);
			
			$rank = $i+1;
			if($mvcore['Reset_Character'] == 'on') { $rr_text = '<td>'.$show[1].'</td>'; } else { $rr_text = ''; };
			if($mvcore['Reset_Character'] == 'on' && $mvcore['Grand_Reset'] == 'on') { $gr_text = '<td>'.$show[2].'</td>'; } else { $gr_text = ''; };
			if($mvcore['Reset_Character'] == 'on' && $mvcore['Grand_Reset'] == 'on' && $mvcore['Master_Grand_Reset'] == 'on') { $mgr_text = '<td>'.$show[3].'</td>'; } else { $mgr_text = ''; };
			$tr_color_2 = "even2"; 
			$tr_color_1 = "even";
			$tr_color = ($rank % 2) ? $tr_color_1 : $tr_color_2;
				echo"
					<tr style='border-collapse: collapse; border-spacing: 0px;'>
						<td>$rank</td>
						<td><a href='-id-character_view-id-$row[0].html'>$row[0]</a></td>
						$rr_text
						$gr_text
						$mgr_text
					</tr>
				";
		}
	?>
</table>