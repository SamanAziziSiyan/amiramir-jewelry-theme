<div class="w-full md:mt-24 mt-11 justify-center flex h-full bg-[#FFFFFF80] rounded-lg backdrop-blur-[10px] px-6 py-4">

    <ul class="flex space-x-12 ">
        <?php if (is_page('blog') || is_page('projects') || is_archive()) : ?>
            <?php
            if (is_page('projects')) {
                $args = [
                    'taxonomy' => ['project-cat'],
                ];
            } elseif (is_page('blog') || is_archive()) {
                $args = [
                    'taxonomy' => ['category'],
                ];
            }

            $terms = get_terms($args);
            if (!empty($terms) && is_array($terms)) :
                foreach ($terms as $term) :
            ?>
                    <li class="ml-12">
                        <a class="hover:text-[#356BF7] transition-all delay-100   focus:text-[#356BF7]" href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo esc_html($term->name); ?></a>
                    </li>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="alert alert-warning">تاکنون دسته بندی برای مطالب اصلی ایجاد نشده
                    است.
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </ul>
</div>