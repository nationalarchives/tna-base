# tna-base

The National Archives WordPress Parent Theme

## 1.0 Development setup

### 1.1 Create host for WordPress in MAMP Pro

Under the 'Hosts' tab create a new server with Server Name 'tna-base-dev' within the MAMP/htdocs/sites/tna-base-dev/ directory. Having done this click 'Save'.

### 1.2 1-click WordPress install in MAMP Pro

Under the 'Hosts' tab, with 'tna-base-dev' selected, click Extras and install WordPress, providing:

* 'The National Archives' as Name of the blog
* Your email address as the email address

### 1.3 Clone Github repository 'tna-base' using SourceTree

Click 'Remote' in SourceTree and you will be shown a full list of repositories you have access to. Then: 

* Create a folder called 'tna-base' in the Themes directory of your WordPress installation
* Select the 'tna-base' repository in SourceTree and clone it to your newly created 'tna-base' directory

### 1.4 Create a new project for the WordPress installation in PhpStorm

* Select 'Create New Project from Existing Files' 
* Select 'Web server is installed locally, source files are located under its document root' 
* Set /Applications/MAMP/htdocs/sites/tna-base-dev/wp-content/themes/tna-base as Project Root
* Specify parameters for a new server as:
  * Name: tna-base-dev
  * Web server root URL: http://tna-base-dev:8888
  * Set Project URL as: http://tna-base-dev:8888

### 1.5 Enable WordPress integration in PhpStorm

* Open the tna-base-dev project in PhpStorm
* Go to PhpStorm > Preferences > Languages & Frameworks > Php > WordPress
* Check the 'Enable WordPress Integration' box
* Set the WordPress installation path as the root directory for the tna-base-dev WordPress installation (typically /Applications/MAMP/htdocs/sites/tna-base-dev/)

### 1.6 Running Grunt

Assuming that the Grunt CLI has been installed follow the instructions on the [Grunt website] (http://gruntjs.com/getting-started#working-with-an-existing-grunt-project).

### 1.7 Ignoring NodeJS

* Copy and paste the line of code below into the .gitignore using your preferred text editor:

```
# NodeJS
/node_modules/
```

## 2.0 tna-base theme features

### 2.1 Bootstrap 3.3.6

Mobile first front-end framework [http://getbootstrap.com/] (http://getbootstrap.com/)

### 2.2 Sass

Using Bootstrap Sass [https://github.com/twbs/bootstrap-sass] (https://github.com/twbs/bootstrap-sass)

### 2.3 Dimox breadcrumbs

WordPress breadcrumbs without a plugin [https://gist.github.com/Dimox/5654092] (https://gist.github.com/Dimox/5654092)
