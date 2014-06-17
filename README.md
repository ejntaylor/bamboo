# Bamboo Read Me

Bamboo is a free WordPress Plugin for building better sites. It includes tools and libraries that will speed up your development. It works alone or in tandem with our child theme Bambino.

Bamboo is focused on consistency, simplicity and speed to help you build better. Providing the foundations to build with WordPress.

Bamboo provides the skeleton structure to build your Wordpress site. It is best accompanied by the Bamboo method. The Bamboo method is a set of consistent principles which allow for a consistent and quicker development style.

The Bamboo family consists of:

- **Bamboo**: Main Plugin
- **Bamboo Pro**: Pro Features Plugin
- **Bambino Child Theme**: Child theme for WooThemes Canvas
- **Bamboo eBook**: Explains the Bamboo and Bambino Methodology.


## Table of Contents

[toc]

## Bamboo Overview

There are three areas of Bamboo. 

1. The front-end tools
2. The back-end options
3. The custom dashboard

Both the front-end tools and the back-end options are for use by Administrators only and are hidden for all other user roles.

Bamboo works in two states. In debug and live. To make the most out of Bamboo make sure you have wp_debug enabled when developing. 

**See the eBook for more detail**


## 1. Front End Tools

Click on the red box that floats on the left hand side of the screen. This will slide out the Bamboo Front End controls.

On the bottom left we also have the responsive information panel.

### Styles Debug

#### Element / Breakpoint Detector

Toggle through various style debugs to view the borders of elements and padding.

The following are available:

1. All borders
2. Hover borders
3. Show Canvas main elements

Links are disabled when using element detector. Any clicked item will have the container element shown on the bottom of the screen.

#### Responsive Screen Tester

This opens a lightbox to view the site in the following screen sizes:

- Mobile Vertical
- Mobile Horizontal
- Tablet Vertical
- Tablet Horizontal

### CSS Debug

- Shows Child and Parent CSS outputted on the active page
- Lists the load order number
- Toggle to disable/enable with a click
- Show all CSS outputted by clicking on the advanced option (top right cog)

### JS Debug

- Shows the scripts that is enqueed on the active page.
- Shows script load order
- Links to the script file
- Displays Script Version


### Hook Debug

- Outputs the following sets of Hooks:
	- All hooks loaded
	- All WooFramework hooks and WooCommerce hooks
	- Woo Framework hooks only
	- WooCommerce hooks only.
- Displays actions hooked in
- Displays action hook order
- Easy add_action copy/paste text


### Info

Displays Important Site Info

- Parent Theme, Author, Link and Version
- Child Theme, Author, Link and Version
- Debug Status
- Wordpress, WooCommerce, Bamboo Version
- Language
- Show all template files
	- Highlights the template of the page being viewed


### Responsive Information Panel

This is displayed on the bottom of every page (bottom left)

- Updated with the actual size of the current browser 
- Updates when the browser is resized
- Displays the corresponding media query breakpoints
- Displays the device screen size




## 2. The Backend Options

The functionality of the backend can be found under the Bamboo menu tab.


### The Head

- Removes query string from all enqueued scripts (Debug OFF)
	- This improves performance and also compatibility with cacheing tools 
- Adds time/date as versoin to enqueued scripts (Debug On)
	- Stops browser caching. Because the appended version for each script will always be unique on load the browser will load the new script file. This means you are always showing the latest files. Important for development.
- Enqueues Bambino essentials
- Remove Header Meta Information

### Admin

- Hide WordPress Update Notice To All But Admins
- Remove Unneeded Dashboard widgets
- Always show admin bar when logged in
- Move Admin bar to bottom (better for designing)


### WooCommerce 

- Change default woocommerce placeholder image that is not Woo branded


	

### Libraries Included

We load the following libraries by default and can be disabled in Bamboo settings.

- PrettyPhoto - Ability to open items in a Lightbox
- Flexslider - Comprehensive Slider
- Modernizr - Feature detection HTML/CSS
- FontAweseome - Icon Library
- jQuery - jQuery library
- WooShortcodes



### Canvas Module

The following settings are available if the Parent theme is Canvas.

- Remove Duplicate Title Issue
- Remove Custom CSS Injection
- Remove Woo Navigation


### Plugin Deactivation

When there are problems the first step is to rule out a conflict with other plugins. The plugin deactivator saves a huge amount of time.

1. You can deactivate only the activated plugins.
2. A list of saved plugins is created.
3. All the plugins can quickly be activated again in one click.
4. If you want to discover the conflict plugin, then you are able to choose which from the list are activated.

This is a much easier and quicker method of activating and deactivating plugins during debug.




## 3. The Custom Dashboard


- Redirect Subscribers to Front Page on login (good for testing)
- Custom Dashboard for Users with welcome message and quick link to Front-End
- Easily template the custom dashboard in your theme (PRO)



## Pro

- Custom Dashboard
- Full Branding
- Authorised Sites
	- Disable site on unknown domains
	- Emailed when activated on unknown domain
	- Domain Logged
- Set Required / Recommended Plugins List
- Quick Add / Remove 
	- Example Posts
	- Example WooCommerce Products


### Bambino Child Theme Integration

- Loads the Bambino Style files. 
- Adds time to scripts for debug. Files are cached, by changing the version to current date time the most recent version is set.
- Works with the Responsive Information Panel to show breakpoints.





- - -

## Still To Do


- Array option for plugins to require
- Array option for Domains to allow
- Log domains visited
- JS - Hide Version if using Debug
- JS - remove main domain if local
- List the 4 emails
- JS Print
	- Show original Version
	- Tick if Debug Time enabled


## Options

- Enable Woo Shortcodes (if using Woo then grey option)
- Domain Notification Email Address
- Filters
- Check Domain
	- Check Domain used
	- Option to add authorised domains
	- Email which domains used from (use options email)






> Written by [Bamboo](https://getbamboo.co/).
