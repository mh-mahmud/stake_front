<?php
$up_match = $this->db->query("SELECT m.id, m.title,m.team1,m.team2,m.icon1,m.icon2, m.league_title, m.notification, mp.match_option_title, mp.id AS option_id,starting_time AS startTime FROM matchname AS m INNER JOIN match_option AS mp ON m.id=mp.match_id WHERE m.active_status=2 AND m.status=1 AND mp.is_score_show ='YES'")->result();
if (!empty($up_match)):
	foreach ($up_match as $vmatch) :
		$team1_coin = $this->db->query("SELECT option_coin FROM match_option_details WHERE match_option_id='{$vmatch->option_id}' AND option_serial = '1'")->row()->option_coin;
		$team2_coin = $this->db->query("SELECT option_coin FROM match_option_details WHERE match_option_id='{$vmatch->option_id}' AND option_serial = '2'")->row()->option_coin;

		if (!empty($team1_coin) && !empty($team2_coin)):
			?>


			<div class="br-banner ">
				<div class="br-banner__title"><?php echo $vmatch->league_title; ?></div>
				<div class="br-banner-body">
					<div class="br-banner-team">
						<div class="br-banner-team__image">
							<img
								src="<?= get_admin_url() ?>assets/img/flag/<?= $vmatch->icon1 ?>"
								alt="">
						</div>
						<div class="br-banner-team__title"><?= $vmatch->team1 ?></div>
					</div>
					<div class="br-banner-info">
						<div class="br-banner-info__time">
							<span><?php echo date("j-m", strtotime($vmatch->startTime));?></span><span><?php echo date("H:i", strtotime($vmatch->startTime));?></span>
						</div>
						<div class="br-banner-info__ico">

						</div>
					</div>
					<div class="br-banner-team">
						<div class="br-banner-team__image">
							<img
								src="<?= get_admin_url() ?>assets/img/flag/<?= $vmatch->icon2 ?>"
								alt="">
						</div>
						<div class="br-banner-team__title"><?= $vmatch->team2 ?></div>
					</div>
				</div>
				<div class="br-banner-footer">
					<div class="br-banner-footer__val br-banner-footer__val--left"><b style="color: black;"><?= $team1_coin ?></b></div>
					<a href="javascript:void(0);" onclick="return adv_bets_by_single_match(<?php echo $vmatch->id; ?>);"
					   class="br-banner-footer__btn">Place a bet</a>
					<div class="br-banner-footer__val br-banner-footer__val--right"><b style="color: black;"><?= $team2_coin ?></b></div>
				</div>
			</div>

		<?php endif; ?>
	<?php endforeach; ?>
<?php else: ?>
	<p style="background: #0000FF;color: white;text-align: center">Sorry! no match score</p>
<?php endif; ?>
