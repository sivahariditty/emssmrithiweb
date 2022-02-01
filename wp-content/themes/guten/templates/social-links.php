<?php
if( get_theme_mod( 'guten-social-email' ) ) :
    echo '<a href="' . esc_url( 'mailto:' . antispambot( get_theme_mod( 'guten-social-email' ), 1 ) ) . '" title="' . esc_attr__( 'Send Us an Email', 'guten' ) . '" class="social-icon social-email"><i class="far fa-envelope"></i></a>';
endif;

if( get_theme_mod( 'guten-social-skype' ) ) :
    echo '<a href="skype:' . esc_html( get_theme_mod( 'guten-social-skype' ) ) . '?userinfo" title="' . esc_attr__( 'Contact Us on Skype', 'guten' ) . '" class="social-icon social-skype"><i class="fab fa-skype"></i></a>';
endif;

if( get_theme_mod( 'guten-social-facebook' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-facebook' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Facebook', 'guten' ) . '" class="social-icon social-facebook"><i class="fab fa-facebook"></i></a>';
endif;

if( get_theme_mod( 'guten-social-twitter' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-twitter' ) ) . '" target="_blank" title="' . esc_attr__( 'Follow Us on Twitter', 'guten' ) . '" class="social-icon social-twitter"><i class="fab fa-twitter"></i></a>';
endif;

if( get_theme_mod( 'guten-social-google-plus' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-google-plus' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Google Plus', 'guten' ) . '" class="social-icon social-gplus"><i class="fab fa-google-plus"></i></a>';
endif;

if( get_theme_mod( 'guten-social-snapchat' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-snapchat' ) ) . '" target="_blank" title="' . esc_attr__( 'Follow Us on SnapChat', 'guten' ) . '" class="social-icon social-snapchat"><i class="fab fa-snapchat"></i></a>';
endif;

if( get_theme_mod( 'guten-social-amazon' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-amazon' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Amazon', 'guten' ) . '" class="social-icon social-amazon"><i class="fab fa-amazon"></i></a>';
endif;

if( get_theme_mod( 'guten-social-etsy' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-etsy' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Etsy', 'guten' ) . '" class="social-icon social-etsy"><i class="fab fa-etsy"></i></a>';
endif;

if( get_theme_mod( 'guten-social-yelp' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-yelp' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Yelp', 'guten' ) . '" class="social-icon social-yelp"><i class="fab fa-yelp"></i></a>';
endif;

if( get_theme_mod( 'guten-social-youtube' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-youtube' ) ) . '" target="_blank" title="' . esc_attr__( 'View our YouTube Channel', 'guten' ) . '" class="social-icon social-youtube"><i class="fab fa-youtube"></i></a>';
endif;

if( get_theme_mod( 'guten-social-vimeo' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-vimeo' ) ) . '" target="_blank" title="' . esc_attr__( 'View our Vimeo Channel', 'guten' ) . '" class="social-icon social-vimeo"><i class="fab fa-vimeo-square"></i></a>';
endif;

if( get_theme_mod( 'guten-social-instagram' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-instagram' ) ) . '" target="_blank" title="' . esc_attr__( 'Follow Us on Instagram', 'guten' ) . '" class="social-icon social-instagram"><i class="fab fa-instagram"></i></a>';
endif;

if( get_theme_mod( 'guten-social-pinterest' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-pinterest' ) ) . '" target="_blank" title="' . esc_attr__( 'Pin Us on Pinterest', 'guten' ) . '" class="social-icon social-pinterest"><i class="fab fa-pinterest"></i></a>';
endif;

if( get_theme_mod( 'guten-social-medium' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-medium' ) ) . '" target="_blank" title="' . esc_attr__( 'Find us on Medium', 'guten' ) . '" class="social-icon social-medium"><i class="fab fa-medium"></i></a>';
endif;

if( get_theme_mod( 'guten-social-behance' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-behance' ) ) . '" target="_blank" title="' . esc_attr__( 'Find us on Behance', 'guten' ) . '" class="social-icon social-behance"><i class="fab fa-behance"></i></a>';
endif;

if( get_theme_mod( 'guten-social-soundcloud' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-soundcloud' ) ) . '" target="_blank" title="' . esc_attr__( 'Find us on SoundCloud', 'guten' ) . '" class="social-icon social-soundcloud"><i class="fab fa-soundcloud"></i></a>';
endif;

if( get_theme_mod( 'guten-social-product-hunt' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-product-hunt' ) ) . '" target="_blank" title="' . esc_attr__( 'Find us on Product Hunt', 'guten' ) . '" class="social-icon social-product-hunt"><i class="fab fa-product-hunt"></i></a>';
endif;

if( get_theme_mod( 'guten-social-slack' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-slack' ) ) . '" target="_blank" title="' . esc_attr__( 'Find us on Slack', 'guten' ) . '" class="social-icon social-slack"><i class="fab fa-slack"></i></a>';
endif;

if( get_theme_mod( 'guten-social-linkedin' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-linkedin' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on LinkedIn', 'guten' ) . '" class="social-icon social-linkedin"><i class="fab fa-linkedin"></i></a>';
endif;

if( get_theme_mod( 'guten-social-tumblr' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-tumblr' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Tumblr', 'guten' ) . '" class="social-icon social-tumblr"><i class="fab fa-tumblr"></i></a>';
endif;

if( get_theme_mod( 'guten-social-digg' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-digg' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Digg', 'guten' ) . '" class="social-icon social-digg"><i class="fab fa-digg"></i></a>';
endif;

if( get_theme_mod( 'guten-social-flickr' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-flickr' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Flickr', 'guten' ) . '" class="social-icon social-flickr"><i class="fab fa-flickr"></i></a>';
endif;

if( get_theme_mod( 'guten-social-houzz' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-houzz' ) ) . '" target="_blank" title="' . esc_attr__( 'Find our profile on Houzz', 'guten' ) . '" class="social-icon social-houzz"><i class="fab fa-houzz"></i></a>';
endif;

if( get_theme_mod( 'guten-social-vine' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-vine' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Vine', 'guten' ) . '" class="social-icon social-vine"><i class="fab fa-vine"></i></a>';
endif;

if( get_theme_mod( 'guten-social-vk' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-vk' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on VK', 'guten' ) . '" class="social-icon social-vk"><i class="fab fa-vk"></i></a>';
endif;

if( get_theme_mod( 'guten-social-xing' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-xing' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Xing', 'guten' ) . '" class="social-icon social-xing"><i class="fab fa-xing"></i></a>';
endif;

if( get_theme_mod( 'guten-social-stumbleupon' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-stumbleupon' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on StumbleUpon', 'guten' ) . '" class="social-icon social-stumbleupon"><i class="fab fa-stumbleupon"></i></a>';
endif;

if( get_theme_mod( 'guten-social-tripadvisor' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-tripadvisor' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on TripAdvisor', 'guten' ) . '" class="social-icon social-tripadvisor"><i class="fab fa-tripadvisor"></i></a>';
endif;

if( get_theme_mod( 'guten-social-github' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-github' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on GitHub', 'guten' ) . '" class="social-icon social-github"><i class="fab fa-github"></i></a>';
endif;

if( get_theme_mod( 'guten-social-custom-class' ) && get_theme_mod( 'guten-social-custom-url' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-custom-url' ) ) . '" target="_blank" class="social-icon social-custom"><i class="fab ' . sanitize_html_class( get_theme_mod( 'guten-social-custom-class' ) ) . '"></i></a>';
endif;

if( get_theme_mod( 'guten-social-custom-class-two' ) && get_theme_mod( 'guten-social-custom-url-two' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-custom-url-two' ) ) . '" target="_blank" class="social-icon social-custom"><i class="fab ' . sanitize_html_class( get_theme_mod( 'guten-social-custom-class-two' ) ) . '"></i></a>';
endif;

if( get_theme_mod( 'guten-social-custom-class-nobrand' ) && get_theme_mod( 'guten-social-custom-url-nobrand' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-custom-url-nobrand' ) ) . '" target="_blank" class="social-icon social-custom"><i class="fas ' . sanitize_html_class( get_theme_mod( 'guten-social-custom-class-nobrand' ) ) . '"></i></a>';
endif;