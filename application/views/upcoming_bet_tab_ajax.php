<?php
$up_match = $this->db->query("SELECT m.id,m.serial, m.title, m.league_title, m.notification,starting_time AS startTime FROM matchname AS m WHERE m.active_status=2 AND m.status=1 GROUP BY m.id ORDER BY m.serial ASC")->result();
if (!empty($up_match)):
	foreach ($up_match as $vmatch) :
		?>


		<div class="upcomming-matches-list">
			<div class="single-upcomming-match-card ng-star-inserted">
				<div class="upcomming-match-date">
					<span class="date"><?php echo date("j", strtotime($vmatch->startTime));?></span>
					<span class="month"><?php echo date("M", strtotime($vmatch->startTime));?></span>
				</div>
				<div class="upcomming-match-details">
					<a class="upcomming-match-details-link"
					   href="javascript:void(0);" onclick="return adv_bets_by_single_match(<?php echo $vmatch->id; ?>);">
												<span
													class="upcomming-match-tournament"><?php echo $vmatch->league_title; ?></span>
						<span class="upcomming-match-teams"><?php echo $vmatch->title; ?></span>
						<span
							class="upcomming-match-day-time"><?php echo $vmatch->notification; ?></span>
					</a>

				</div>
			</div>
		</div>

	<?php endforeach; ?>
	</div>
<?php else: ?>
	<p style="background: #0000FF;color: white;text-align: center">Sorry! no upcoming game</p>
<?php endif;?>
