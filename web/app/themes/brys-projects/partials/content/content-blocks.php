<div class="section-content--flexible">

    <?php if (have_rows('flexible_content')): while (have_rows('flexible_content')) :
        the_row(); ?>

        <?php if (get_row_layout() == 'content_text'): ?>
        <div class="content-row content-container content-text">
            <?php the_sub_field('text'); ?>
        </div>
    <?php endif; ?>

        <?php if (get_row_layout() == 'content_image'): ?>
        <div class="content-row content-container-image content-image">
            <?php $image = get_sub_field('image'); ?>
            <img srcset="<?php echo $image['sizes']['large']; ?> 1x, <?php echo $image['sizes']['large@2x']; ?> 2x">
        </div>
    <?php endif; ?>

        <?php if (get_row_layout() == 'content_list'): ?>
        <?php $title = get_sub_field('list_title'); ?>
        <?php $type = get_sub_field('list_type'); ?>
        <?php $items = get_sub_field('list_items'); ?>
        <div class="content-row content-container content-list">

            <?php if ($title) : ?>
                <div class="content-title">
                    <?php echo $title; ?>
                </div>
            <?php endif; ?>

            <?php if ($items) : ?>
                <ul class="list-<?php echo $type; ?>">
                    <?php foreach ($items as $item) : ?>
                        <li><?php echo $item['list_item']; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

        </div>
    <?php endif; ?>

    <?php endwhile;
    endif; ?>

</div>
