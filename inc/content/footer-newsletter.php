<div class="newsletter-template">
    <div class="news-icon">
        <img src="<?php  echo make_path_relative(get_template_directory_uri()); ?>/img/tna-newsletter-icon.png" alt="TNA Newsletter Icon"/>
    </div>
    </div>

    <div class="news-content">
        <h2>Send me The National Archives’ newsletter</h2>
        <p>A monthly round-up of news, blogs, offers and events</p>
    </div>

    <div class="news-form">
        <form name="signup" id="signup" action="http://r1.wiredemail.net/signup.ashx" method="post" role="form">
            <input type="hidden" name="addressbookid" value="636353"> <!-- homepage and general sign up -->
            <!-- input type="hidden" name="addressbookid" value="732466" --> <!-- first world war portal sign up -->
            <input type="hidden" name="userid" value="173459">
            <input type="hidden" name="ReturnURL"
                   value="http://nationalarchives.gov.uk/news/subscribe-confirmation.htm">
            <label for="Email">Send me The National Archives’ newsletter</label>
            <input type="email" name="Email" id="Email" required="required"
                   placeholder="Enter your email address">
            <input id="newsletterSignUp" type="submit" name="Submit" value="Subscribe" class="margin-left-medium">
        </form>
    </div>
</div>