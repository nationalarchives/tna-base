<?php
// Notification banner
function notification_banner() {
	$notice_title = 'YO MOTHER';
	$notice_text = 'This is a new service';
	$notice_link = '#';
	$notice_link_text = 'send us feedback';
	?>
	<div class="notification-banner">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="notice">
						<strong><?php echo $notice_title; ?></strong>
						<?php echo $notice_text; ?> -
						<a href="<?php echo $notice_link; ?>"><?php echo $notice_link_text; ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}