<?php
// WebTrends
// Copyright (c) 1996-2009 WebTrends Inc.  All rights reserved.
// Version: 8.6.2
// Tag Builder Version: 3.0
// Created: 8/4/2009 10:26:05 AM

// Warning: The two script blocks below must remain inline. Moving them to an external
// JavaScript include file can cause serious problems with cross-domain tracking.
?>

<?php
	// Remove WebTrends from contact us
	if (!check_for_specific_url_path('contact-us')) : ?>
		<!-- START OF WebTrends -->
		<script type="text/javascript">
			//<![CDATA[
			var _tag=new WebTrends();
			_tag.dcsGetId();
			//]]>>
		</script>
		<script type="text/javascript">
			//<![CDATA[
			// Add custom parameters here.
			//_tag.DCSext.param_name=param_value;
			_tag.dcsCollect();
			//]]>>
		</script>
		<noscript>
			<div>
				<img id="DCSIMG" height="1" alt="DCSIMG" src="https://smartsource.nationalarchives.gov.uk/dcsdhhxq6000004rry7ab39or_9h9r/njs.gif?dcsuri=/nojavascript&amp;WT.js=No&amp;WT.tv=8.6.2" width=1 />
			</div>
		</noscript>
		<!-- END OF WebTrends -->
<?php endif; ?>
