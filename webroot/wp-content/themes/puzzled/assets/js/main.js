
import Router from './router';
import common from './routes/common';
import home from './routes/home';
// import postTypeArchiveNewsPost from './modules/pagination';
import paged from './modules/pagination';
// import pagination from './application/modules/pagination';
import leverjobsembed from './modules/leverjobsembed';

/**
 * Populate Router instance with DOM routes
 * @type {Router} routes - An instance of our router
 */
const routes = new Router({
  common,
  home,
});

/** Load Events */
jQuery(document).ready(() => routes.loadEvents());