# Realtyna Test Project (Wordpress Plugin)

## `lib` directory
I use composer for PSR-4 autoloading and changed the `vendor` directory to `lib` and I decided to upload `lib` directory because when cloning the project to WordPress plugins  directory it shows error and needs to run `composer install` command to make it work. 

## What does this plugin do?

---
- Custom post type: **Movies**
- Custom Taxonomy: **Genre**
- **Tags** (I used WP Core Tags)
- **Rest API** (I used WP Core REST API and modify some keys like genre and tags)
- Movies list **Shortcode**
- Movies count **Widget**

### Movies post type
I register a custom post type for **Movies** and is accessible from sidebar menu in WordPress admin panel.

### Taxonomies
I create a custom taxonomy for **Genres** and use WordPress core **Tags** for **Movies** post type.  

### Rest API
I use WordPress core Rest API for posts (and custom post types), but modify **tags** and **genres** keys in the Rest API because the WordPress API returns Just taxonomy IDs, so I modified them and add extra data. 

### Shortcode
I create `[movies-list]` custom shortcode for Movies list. It shows recent movies. You can pass number of Movies to show with `num` parameter, default value is number of posts per page from WordPress settings.  
Example: `[movies-list num=5]`

### Widget
I register custom Widget to display count of Movies, It shows number of total published Movies. It is accessible from `Appearance > Widgets` 