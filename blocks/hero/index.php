<?php
/**
 * Hero Block render callback
 * Using ACF fields for content
 */

// Make sure ACF is active
if ( ! function_exists('get_field') ) {
    echo '<p><em>ACF plugin required.</em></p>';
    return;
}

// Get ACF fields
$background = get_field('background_image'); // returns array from image field
$title      = get_field('title');
$desc       = get_field('description');

// Extract image URL safely
$bg_url = $background && isset($background['url']) ? esc_url($background['url']) : '';

?>
<section class="hero-block alignfull" style="background-image:url('<?php echo $bg_url; ?>')">
    <div class="hero-block__overlay"></div>
    <div class="hero-block__content">
        <?php if ($title): ?>
            <h1 class="hero-block__title"><?php echo esc_html($title); ?></h1>
        <?php endif; ?>

        <?php if ($desc): ?>
            <p class="hero-block__desc"><?php echo esc_html($desc); ?></p>
        <?php endif; ?>
    </div>
</section>
