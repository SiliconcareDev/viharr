<div class="sidebar-widget widget_search">
    <form method="get" class="search" action="<?php echo e(url(app_get_locale(false,false,'/').config('news.news_route_prefix'))); ?>">
        <input type="text" class="form-control" value="<?php echo e(Request::query("s")); ?>" name="s" placeholder="<?php echo e(__("Search ...")); ?>">
        <button type="submit" class="icon_search"></button>
    </form>
</div><?php /**PATH /home/u603013329/domains/clubsilicon.in/public_html/themes/BC/News/Views/frontend/layouts/sidebars/search_form.blade.php ENDPATH**/ ?>