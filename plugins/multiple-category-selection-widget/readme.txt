=== Multiple Category Selection Widget ===
Contributors: zackdesign
http://wp.zackdesign.biz/category-selection-widget/
Donate link: http://wp.zackdesign.biz/category-selection-widget/
Tags: widget, plugin, category, post, subcategory, drill, sidebar
Requires at least: 2.8
Tested up to: 3.3.2
Stable tag: 3.1.2

This widget makes it easy for your site users to drill down into your Wordpress post categories.

== Description ==

Turn your Wordpress post categories into a search powerhouse! This plugin gives you the ability to provide your users with a widget full of dropdowns based upon parent categories and their sub-categories.

A new function has been added for release 2.2 - you can now set up an AJAX chained select box. For example, if you have multiple countries, and multiple states for each country, you can get a user to select a country.
Upon selecting the country, the plugin looks for any states under that country, and then shows the dropdown box for the states under that country beneath the country dropdown.

Multiple subcategories spanning multiple parent categories (though multiple categories inside a single parent cannot be chosen) are chosen and intelligently filter your posts.

Please note that this plugin, while it is a widget, can be used on a sidebar you define anywhere within your theme that you like. Think of it as a 'block' area rather than a 'sidebar'.

Sample Application:

Real Estate - set up parent categories such as 'Bedrooms', 'Bathrooms', 'Price Range', etc. Then put sub-categories beneath them. These are the ones that are searched.

Create a new post and tick all applicable sub-categories. Users should now be able to search for your post under all those categories!

Features:

 * Inclusive category search
 * Exclusive category search
 * Ordering of results
 * Automatically checks for the 'uncategorized' category and hides it
 * Generates complete URL 
 * Now does a proper URL-Rewrite if permalinks are enabled
 * Pagination
 * If search is pressed, allows you to decide whether or not to show all posts (or a post category ID) or none
 * Exclude certain categories
 * Tested with All-in-one-SEO, WP Smart Sort, and sCategory Permalink. Now plays nice with all four! Required a bit of a logic rewrite, thus the 2.0
 * Supports the new WP 2.8+ widget class structure and as a result is now available in as many instances as needed
 * 2-level AJAX chained select options

Please be aware that I'll only be updating this if I need to or if I'm paid to. Feel free to come on board and contribute!

== Screenshots ==

[Zack Design Plugin Showcase](http://wp.zackdesign.biz "Plugin Showcase")

== Installation ==

1. Upload the 'wordpress-multiple-category-selection' folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Create multiple categories and subcategories
4. Add as many instances of this widget you like to your sidebars.

As a quick guide, here's how to get the chained select boxes happening using Wordpress category heirarchies:

Country
 - Australia
   - State
     - Vic
     - NSW
     - QLD
     - Tas
     - SA
 - New Zealand
   - State
     - NZ state 1
     - NZ state 2

== Changelog ==

3.1.2

- Tested in WP 3.3.2 - confirmed it works
- Updated licensing information

3.1.1

- Did some extensive testing on any/all. Confident bugs are fixed
- Went back to old layout of select boxes. Using &raquo; to create an easy method of seeing headers
- Any/All text is back.

3.1

- Created new admin page for settings (shortcodes, ajax, and more)
- Fixed some strange search type issues with not being saved in session
- Redid the HTML for the form to be more correct semantically
- Allowed AJAX to be turned on and off and removed it from Admin loads
- Allowed form display above results to be turned on and off 

3

- Support for multiple mscw forms in the page at once
- Fix weird form issues
- Shortcode for form
- Form appears on category view at top of page
- Found issues with rewrite for the latest Wordpress, fixed

2.4

- Rewrite rules now only flush upon plugin activation

2.3

- Fixed some variable checking
- Ensure Any/All defaults worked properly
- Tested and validated against TenTwenty theme. Any other issues are probably caused by your theme or another plugin
- Added ordering by title ascending or default

2.2.3

- Made default search option for all or no posts

2.2.2

- Added ability to set blank search to any category over-riding post archives page blank search

2.2.1

- Added 'blank search' to show post archives page

2.2

- Added ability to chain AJAX select boxes 

2.1.1

- Minor fix - XHTML 1.0 Transitional form validation

2.1 

- Uses the new 2.8+ extendible widget class - multiple instances supported!
- Widget form for editing in the widget area
- Processes new widget options  - title, and/in optional, exclude categories

2.0

 - Fixed bug from 1.2 which meant that if Permalinks weren't enabled a 404 would appear
 - All-in-one-SEO fixes - now doesn't go blank
 - WP Smart Sort fixes - allows this plugin to work
 - sCategory Permalink fixes - should now allow links to work properly

1.2

- New Feature: users can now show all posts under parent categories by hitting Search without choosing any category first

1.1

- Bug with pages fixed

1.0

- URL creation
- URL rewrite rules
- 2.7 testing
- Pagination works

0.9.1

- Change of 'Properties' to 'Categories' to make it accessible to a wider audience without modification. 
  Real estate users simply need to use 0.9 for now.

0.9 

First Release!

== Frequently Asked Questions ==

= ANY vs ALL is not working? =

Ensure you reset your search query using the 'reset' button first.

= The dropdowns aren't appearing?!? =

They won't appear unless you have posts in the Wordpress categories.

= CSS for Dropdowns Example =

`#wpmm select {
  width: 160px;
  margin-top: 4px;
}`

Change the 'width' value to whatever width you need and place in your theme CSS file.

= I Need HELP!!! =

That's what I'm here for. I do Wordpress sites for many people in a professional capacity and
can do the same for you. Check out www.zackdesign.biz
