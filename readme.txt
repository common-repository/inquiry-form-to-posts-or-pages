=== Inquiry form to posts or pages ===
Contributors: udamadu
Tags: inquiry form,form,single post,single template,page, page template, admin, send mail 
Requires at least: 3.0
Tested up to: 3.3.1
Stable tag: 0.1


Inquiry form to posts or pages

== Description ==

This Simple Plugin will add an Inquiry form for a Post or page. Site Administrator will be allowed to customize this inquiry form as he/she wants to show it to site visitors.
The plugin will support both short code and php code for adding the inquiry form in to your wordpress site.

short code - [inquiry_form]
php code - [?php if (function_exists('inquiry_form')) echo inquiry_form();?]


author's website : http://www.mclanka.com/



== Installation ==

1. Unzip the inquiry-form-to-posts-or-pages.zip file.
2. Upload the 'inquiry-form-to-posts-or-pages' folder to the '/wp-content/plugins/' directory.
3. Activate the plugin through the 'Plugins' menu in WordPress.
4. Go to Settings => Manage  Post or Page Inquiry form
5. For adding the inquiry form just add the below php code in your single.php template or page template. This will also support your custom page templates.
   [?php if (function_exists('inquiry_form')) echo inquiry_form();?]
   -or-
   Add the below short code for your post from your administrative panel.
   [inquiry_form]
6. You are done.

== Screenshots ==

1. Inquiry form
2. Control panel for Inquiry form to posts or pages
