
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
  /** All pages */
  common,
  /** Home page */
  home,
  // pagination,
  leverjobsembed
  /** About Us page, note the change from about-us to aboutUs. */
});

/** Load Events */
jQuery(document).ready(() => routes.loadEvents());