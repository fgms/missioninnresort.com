<form action="<?php bloginfo('url') ?>" method="get" class="form-search form-inline">
        <div class="form-group">
                <label class="sr-only" for="s">Search</label>
                <input type="text" name="s" id="search" class="input-medium form-control" placeholder="Search" style="max-width: 155px;"value="<?php the_search_query(); ?>" />
                <input type="submit" class="btn btn-primary btn-sm" style="padding: 5px 12px"  value="Go"/>                
        </div>

</form>
