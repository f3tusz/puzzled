<?php
  $url = urlencode(get_permalink());
  $title = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
  $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u=' . $url;
?>
<nav class="block-social-navigation d-flex align-items-center justify-content-center">
  <strong class="h6">SHARE</strong>
  <a class="ln" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_the_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>&summary=<?php echo urlencode(get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true)); ?>&source=Pushnamni">
    <?php get_template_part('partials/icons/linkedin'); ?>
  </a>
  <a class="tw" target="_blank" href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); ?>">
    <?php get_template_part('partials/icons/twitter'); ?>
  </a>
  <a class="fb" target="_blank" href="<?php echo $facebookURL; ?>">
    <?php get_template_part('partials/icons/facebook'); ?>
  </a>
  <a class="email" target="_blank" href="mailto:?subject=<?= get_the_title(); ?>&amp;body=Check out this site <?= $url; ?>" title="Share by Email">
    <?php get_template_part('partials/icons/mail'); ?>
  </a>
</nav>