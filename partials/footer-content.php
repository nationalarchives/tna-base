<?php
$site_url = blog_footer_url( get_option('blog_type') )
?>
<div class="row">
    <div class="footer-col col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <div class="row">
            <div class="footer-col col-xs-12 col-sm-6 col-md-12 col-lg-12">
            <img src="<?php echo str_replace( home_url(), '', get_template_directory_uri() ); ?>/img/tna-square-white-logo.png" srcset="<?php echo str_replace( home_url(), '', get_template_directory_uri() ); ?>/img/tna-square-white-logo.svg" alt="The National Archives"  class="img-responsive square-logo">
                <address>
                    The National Archives<br/>
                    Kew, Richmond, Surrey,<br/>
                    TW9 4DU
                </address>
            </div>
            <div class="footer-col col-xs-12 col-sm-6 col-md-12 col-lg-12">
                <h3>Standard opening times</h3>
                <div class="opening-times">
                    <div class="open_table">
                        <div class="open_tableBody">
                            <div class="open_tableRow">
                                <div class="open_tableCell">Monday</div>
                                <div class="open_tableCell">Closed</div>
                            </div>
                            <div class="open_tableRow">
                                <div class="open_tableCell">Tuesday</div>
                                <div class="open_tableCell">09:00 &ndash; 19:00</div>
                            </div>
                            <div class="open_tableRow">
                                <div class="open_tableCell">Wednesday</div>
                                <div class="open_tableCell">09:00 &ndash; 17:00</div>
                            </div>
                            <div class="open_tableRow">
                                <div class="open_tableCell">Thursday</div>
                                <div class="open_tableCell">09:00 &ndash; 19:00</div>
                            </div>
                            <div class="open_tableRow">
                                <div class="open_tableCell">Friday</div>
                                <div class="open_tableCell">09:00 &ndash; 17:00</div>
                            </div>
                            <div class="open_tableRow">
                                <div class="open_tableCell">Saturday</div>
                                <div class="open_tableCell">09:00 &ndash; 17:00</div>
                            </div>
                            <div class="open_tableRow">
                                <div class="open_tableCell">Sunday</div>
                                <div class="open_tableCell">Closed</div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo $site_url ?>/about/visit-us/opening-times/">Full opening times</a>
            </div>
        </div>
    </div>
    <div class="footer-col col-xs-12 col-sm-12 col-md-6">
        <div class="row">
            <div class="footer-col col-xs-12 col-sm-6 col-md-6">
                <h3>Find out more</h3>
                <ul>
                    <li><a href="<?php echo $site_url ?>/contact-us/">Contact us</a></li>
                    <li><a href="<?php echo $site_url ?>/about/press-room/">Press room</a></li>
                    <li><a href="<?php echo $site_url ?>/about/jobs/">Jobs and careers</a></li>
                    <li><a href="<?php echo $site_url ?>/about/get-involved/friends-of-the-national-archives/">Friends of The National
                            Archives</a>
                    </li>
                </ul>
            </div>
            <div class="footer-col col-xs-12 col-sm-6 col-md-6">
                <h3>Websites</h3>
                <ul>
                    <li><a href="https://blog.nationalarchives.gov.uk/">Blog</a></li>
                    <li><a href="https://media.nationalarchives.gov.uk/">Podcasts and videos</a></li>
                    <li><a href="http://bookshop.nationalarchives.gov.uk/">Bookshop</a></li>
                    <li><a href="https://images.nationalarchives.gov.uk/">Image library</a></li>
                    <li><a href="<?php echo $site_url ?>/webarchive/">UK Government Web Archive</a></li>
                    <li><a href="http://www.legislation.gov.uk/" target="_blank" title="Opens a new window">Legislation.gov.uk <span class="sr-only">Opens a new window</span></a></li>
                    <li><a href="https://www.thegazette.co.uk/" target="_blank" title="Opens a new window">The Gazette <span class="sr-only">Opens a new window</span></a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="footer-col col-xs-12 col-sm-6 col-md-6">
                <h3>Site help</h3>
                <ul>
                    <li><a href="<?php echo $site_url ?>/help/">Help</a></li>
                    <li><a href="<?php echo $site_url ?>/help/a-to-z/">Website A-Z index</a></li>
                    <li><a href="<?php echo $site_url ?>/help/web-accessibility/">Accessibility</a></li>
                </ul>
            </div>
            <div class="footer-col col-xs-12 col-sm-6 col-md-6">
                <h3>Legal</h3>
                <ul>
                    <li><a href="<?php echo $site_url ?>/legal/">Terms of use</a></li>
                    <li><a href="<?php echo $site_url ?>/legal/privacy.htm">Privacy policy</a></li>
                    <li><a href="<?php echo $site_url ?>/legal/cookies.htm">Cookies</a></li>
                    <li><a href="<?php echo $site_url ?>/about/freedom-of-information/">Freedom of Information</a></li>
                    <li><a href="<?php echo $site_url ?>/about/our-role/transparency/">Transparency</a></li>
                    <li><a href="<?php echo $site_url ?>/legal/our-fees.htm">Our fees</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-col col-xs-12 col-sm-12 col-md-3">
        <div class="row">
            <div class="footer-col col-xs-12 col-sm-6 col-md-12">
                <h3>Follow us</h3>
                <div class="follow-us">
                    <a href="https://twitter.com/@UKNatArchives" title="Follow us on Twitter - Opens a new window" target="_blank">
                        <img src="https://nationalarchives.gov.uk/wp-content/themes/tna-base/img/social/twitter.png"
                             alt="Twitter logo">
                        <span class="sr-only">Opens a new window</span>
                    </a>
                    <a href="https://www.youtube.com/c/TheNationalArchivesUK" title="Follow us on YouTube - Opens a new window"
                       target="_blank">
                        <img src="https://nationalarchives.gov.uk/wp-content/themes/tna-base/img/social/youtube-play.png"
                             alt="YouTube logo">
                        <span class="sr-only">Opens a new window</span>
                    </a>
                    <a href="https://www.flickr.com/photos/nationalarchives" title="Follow us on Flickr - Opens a new window"
                       target="_blank">
                        <img src="https://nationalarchives.gov.uk/wp-content/themes/tna-base/img/social/flickr.png" alt="Flickr logo">
                        <span class="sr-only">Opens a new window</span>
                    </a>
                    <a href="https://www.facebook.com/TheNationalArchives" title="Follow us on Facebook - Opens a new window"
                       target="_blank">
                        <img src="https://nationalarchives.gov.uk/wp-content/themes/tna-base/img/social/facebook.png"
                             alt="Facebook logo">
                        <span class="sr-only">Opens a new window</span>
                    </a>
                    <a href="https://www.instagram.com/nationalarchivesuk/" title="Follow us on Instagram - Opens a new window"
                       target="_blank">
                        <img src="https://nationalarchives.gov.uk/wp-content/themes/tna-base/img/social/instagram.png"
                             alt="Instagram logo">
                        <span class="sr-only">Opens a new window</span>
                    </a>
                    <a href="https://www.nationalarchives.gov.uk/rss/" title="Follow us via RSS">
                        <img src="https://nationalarchives.gov.uk/wp-content/themes/tna-base/img/social/rss.png" alt="RSS logo"></a>
                </div>
            </div>

            <div class="footer-col col-xs-12 col-sm-6 col-md-12">
            </div>
        </div>
    </div>
</div>

<div class="row footer-base">
    <div class="col-xs-12 col-sm-9 col-md-9 ogl">
        <a title="External website - opens in a new window"
           href="https://www.nationalarchives.gov.uk/doc/open-government-licence/"> <img
                    alt="Open Government License logo"
                    src="<?php echo str_replace(home_url(), '', get_template_directory_uri()); ?>/img/logo-ogl.png">
        </a>
        <p>All content is available under the <a href="https://www.nationalarchives.gov.uk/doc/open-government-licence/">Open
                Government Licence v3.0</a>, except where otherwise stated </p>
    </div>
    <div class="col-xs-12 col-sm-3 col-md-3 gov-uk">
        <a title="External website - opens in a new window" href="http://gov.uk/" target="_blank">
            <img alt="GOV.UK logo" src="<?php echo str_replace(home_url(), '', get_template_directory_uri()); ?>/img/gov-uk.png">
            <span class="sr-only">Opens a new window</span>
        </a>
    </div>
</div>
