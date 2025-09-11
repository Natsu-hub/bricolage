<div class="p-news__pages">
    <?php
    $prev_image_url = get_template_directory_uri() . '/assets/images/common/arrow02.svg';
    $next_image_url = get_template_directory_uri() . '/assets/images/common/arrow02.svg';
    the_posts_pagination( array( 
        'mid_size' => 1,
        'prev_text' => '<span class="prev-text"><img src="' . $prev_image_url . '" alt="前へ" width="30" height="31"></span>',
        'next_text' => '<span class="next-text"><img src="' . $next_image_url . '" alt="次へ" width="30" height="31"></span>',
    ) );
?>
</div>