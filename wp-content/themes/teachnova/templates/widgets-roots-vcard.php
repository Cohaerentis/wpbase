<p class="vcard">
  <a class="fn org url" href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a><br>
  <span class="adr">
    <span class="street-address"><?php echo $instance['street_address']; ?></span><br>
    <span class="locality"><?php echo $instance['locality']; ?></span>,
    <span class="region"><?php echo $instance['region']; ?></span>
    <span class="postal-code"><?php echo $instance['postal_code']; ?></span><br>
  </span>
  <span class="tel"><span class="value"><?php echo $instance['tel']; ?></span></span><br>
  <a class="email" href="mailto:<?php echo $instance['email']; ?>">
    <?php echo $instance['email']; ?>
  </a>
</p>
