<?php
    $post_tags = jewp_get_post_tags();
    if($post_tags):
    foreach ($post_tags as $tag):
        $tag_link = get_tag_link( $tag->term_id );
    ?>
    <li class="bg-[#356BF717] ml-2 p-2 rounded-lg text-[#64646C] md:text-[14px] text-[10px]"><a href="<?php echo $tag_link ?>">#<?php echo $tag->name ?></a></li>

    <?php endforeach; ?>
    <?php else:?>
        <span class="flex items-center text-center justify-center bg-[#356BF717] text-[#64646C] text-sm font-bold px-4 py-3 w-full">تگی برای این مطلب وجود ندارد</span>
<?php endif; ?>
