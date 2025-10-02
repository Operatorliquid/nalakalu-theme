<?php

/**
 * Hero Block render callback
 * Using ACF fields for content
 */

// Make sure ACF is active
if (! function_exists('get_field')) {
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
<section class="hero-block alignfull relative min-h-[60vh] bg-cover bg-center flex items-center justify-center text-white text-center" style="background-image:url('<?php echo $bg_url; ?>')">
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
    <div class="relative z-10 max-w-4xl px-8">
        <?php if ($title): ?>
            <h1 class="text-5xl font-bold mb-4"><?php echo esc_html($title); ?></h1>
        <?php endif; ?>

        <?php if ($desc): ?>
            <p class="text-xl leading-relaxed"><?php echo esc_html($desc); ?></p>
        <?php endif; ?>
    </div>
</section>