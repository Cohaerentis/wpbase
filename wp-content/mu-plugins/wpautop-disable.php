<?php

remove_filter( 'the_content', 'wpautop' );                //remove extra <p> & <br> added by wordpress
remove_filter( 'the_excerpt', 'wpautop' );                //remove extra <p> & <br> added by wordpress
