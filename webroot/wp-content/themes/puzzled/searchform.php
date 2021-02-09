<div class="search-form">
    <form action="<?php echo home_url( '/' ); ?>" method="get">
        <fieldset>
            <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Keywords, job title or company" />
            <button type="submit"><?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon-magnifiying-glass.svg');?></button>
        </fieldset>
    </form>
</div>