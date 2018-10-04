<?php
// Temporary notification banner for the audience agency.

if ( ! function_exists( 'notification_banner' ) ) {
	function notification_banner() {
		if ( have_posts() ) { ?>
            <div class="notification-banner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="notice">
                                <strong class="title">PARTICIPATE</strong>
                                Enter a prize draw by <a href="https://www.smartsurvey.co.uk/s/XEM2T/" target="_blank">answering 4 questions</a> about your online visit.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<?php
		}
	}
}