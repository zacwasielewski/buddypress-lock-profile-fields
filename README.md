Lock BuddyPress Profile Fields
==============================

Lock editing of user-specified BuddyPress profile fields


Description
-----------

Sometimes you don't want your BuddyPress users to change certain profile fields. This plugin will help.


Dependencies
------------

* WordPress and BuddyPress... obviously.


Installation
------------

1. Upload `buddypress-lock-profile-fields/` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress


Usage
-----

1. Go to 'Settings > Lock BuddyPress Profile Fields' in WordPress
2. Choose which BuddyPress fields should be "locked" and save changes
3. Users will no longer be able to update the chosen fields on their 'Edit my profile' page.


To-do
-----

* BUG: Disable UI for locked radio and checkbox controls (changes are currently not saved, so this is not a critical bug).
* Allow Administrators to edit locked user profile data
* Integration and unit tests.


Changelog
---------

### 0.3.0 ###
* Display all profile groups on plugin settings page.
* Bug fixes and refactoring.

### 0.2.1 ###
* Prevent locked fields from being overwritten with blank data on form submit.

### 0.2.0 ###
* Admin settings page to define locked profile fields.

### 0.1.0 ###
* Proof-of-concept with locked profile fields harcdoded in plugin code.

