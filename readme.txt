=== BuddyPress Profile Shortcodes ===
Contributors: Bento4Extend, GICoder
Donate link: http://Extend.BT4.ME/
Tags: BuddyPress, shortcode, shortcodes, profile, social
Requires at least: 3.6
License: GNU/GPL 2
Tested up to: 4.1
Stable tag: 1.0

Allows you to insert any information from either a specific user or the current user into anywhere on the site using shortcodes.

== Description ==

This plugin will allow shortcodes to be used to pull profile data. This plugin will require BuddyPress in order for it to work properly and to pull the information necessary.

In this version you can get a user's display name, gravatar, email, or any information from a specified field.

You can also have this work well with [BuddyPress Profile Custom Area](http://Extend.BT4.ME/downloads/buddypress-profile-custom-area/ "BuddyPress Profile Custom Area") or [BuddyPress Profile GeoLocation](http://Extend.BT4.ME/downloads/buddypress-profile-geolocation/ "BuddyPress Profile GeoLocation"). Feel free to check for any other premium plugins, including BuddyPress plugins, that we may have available for purchase at [Extend.BT4.ME](http://Extend.BT4.ME/ "Extend.BT4.ME").

= The following shortcodes are available: =
**[bp_profile_displayname]**

* Shows the display name.
* Can have a parameter of user_id=<id> to get it for a specific user.

**[bp_profile_email]**

* Same as above except for the email.
* The user_id parameter can be used optionally as well.

**[bp_profile_username]**

* Same as above except for the buddypress username
* The user_id parameter can be used optionally as well.

**[bp_profile_field field="fieldname" tab="section"]**

* Will get the fieldname from the specified tab.
* If the tab parameter is not used then it will get it from the primary / base tab.
* the user_id parameter can be used optionally as well.
* The "fieldname" would be the title and the "section" would be the tab / section.
* The parameter "empty" will allow you to set what will show if the field is empty. Will return "Empty Text" by default.
* Will support the [BuddyPress Profile Custom Area](http://Extend.BT4.ME/downloads/buddypress-profile-custom-area/ "BuddyPress Profile Custom Area") plugin's fields and run the shortcodes in them.

**[bp_profile_gravatar]**

* Will get the gravatar and display it.
* Can use the "dimension" parameter to change the dimensions of the gravatar.
* The user_id parameter can be used optionally as well.

**[bp_profile_gravatar_url]**

* Will get the gravatar url.
* The user_id parameter can be used optionally as well.

**[bp_profile_url]**

* Will get the url for where the user's profile is.
* The user_id parameter can be used optionally as well.

**[bp_profile_edit_url]**

* Will get the url for editing the user's buddypress profile.
* The user_id parameter can be used optionally as well.

== Installation ==

You can download and install BuddyPress Profile Shortcodes and install it automatically through the repository. It will work right out of the box for all of the specified features.

To enhance your BuddyPress profiles further you can also purchase [BuddyPress Profile Custom Area](http://Extend.BT4.ME/downloads/buddypress-profile-custom-area/ "BuddyPress Profile Custom Area") at [Extend.BT4.ME](http://Extend.BT4.ME/ "Extend.BT4.ME").

== Frequently Asked Questions ==

= If you have any questions =

Feel free to contact our support through [Extend.BT4.ME](http://Extend.BT4.ME/ "Extend.BT4.ME")

== Changelog ==

= 1.0 =
* Initial version

== Screenshots ==

There are no screenshots at this time, as it can appear differently for anyone that uses the shortcodes.

== Upgrade Notice ==

= 1.0 =
* Initial version
