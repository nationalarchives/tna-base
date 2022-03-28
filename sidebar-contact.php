<?php
// the ids are from the livechat admin interface
$webchat = get_post_meta( $post->ID, 'webchat', true );
switch( $webchat ) {
	case 'yourviews':
		$webchat_id = 'TTuqXupAAFh';
		break;
	case 'dsd':
		$webchat_id = 'ePKP7MjW_D4';
		break;
	default:
		$webchat_id = 'ePKP7MjW_D4';
		break;
}

?>


<aside id="sidebar" class="col-xs-12 col-sm-4" role="complementary">
	<div class="sidebar-header">
		<h2>
				Other ways to contact us
		</h2>
	</div>
	<div class="row sidebar-contact clearfix">
		<div class="live-chat sidebar-item">
			<div class="col-xs-8 col-sm-12 col-md-8">
				<h3>
					<a id="livechat" class="anchor" href="#livechat" aria-hidden="true"></a>
					Live chat
				</h3>
				<p>
					For general enquiries and help with your research <br>
					Tuesday to Saturday<br>
					09:00 to 17:00
				</p>
			</div>
			<div class="col-xs-4 col-sm-6 col-md-4">
<div data-id="<?php echo $webchat_id; ?>" class="livechat_button"><a href="/contact-us/">live chat software</a></div>
<!-- Start of LiveChat (www.livechatinc.com) code -->
<script type="text/javascript">
window.__lc = window.__lc || {};
window.__lc.ga_version = "gtm";
window.__lc.license = 10565762;
(function() {
  var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
  lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
})();
</script>
<noscript>
<a href="https://www.livechatinc.com/chat-with/10565762/" rel="nofollow">Chat with us</a>,
powered by <a href="https://www.livechatinc.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a>
</noscript>
<!-- End of LiveChat code -->
			</div>
		</div>
	</div>
</aside>
