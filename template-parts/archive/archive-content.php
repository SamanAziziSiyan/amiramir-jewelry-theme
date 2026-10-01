<!-- Blog Loop Section -->


<?php if(is_page('projects') || is_page('project')){
   get_template_part('loop/archive/archive-all-project-loop','archive-all-project-loop');
}elseif (is_page('blog') || is_category() || is_tag()){
    get_template_part('loop/archive/archive-all-post-loop','archive-all-post-loop');
}else{
    get_template_part('loop/archive/archive-loop','archive-loop');
} ?>