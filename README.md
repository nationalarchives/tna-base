# tna-base

The National Archives WordPress Parent Theme

## 1.0 Theme features

### 1.1 Bootstrap 3.3.6

Mobile first front-end framework [http://getbootstrap.com/] (http://getbootstrap.com/)

### 1.2 Sass

Using Bootstrap Sass [https://github.com/twbs/bootstrap-sass] (https://github.com/twbs/bootstrap-sass)

### 1.3 Grunt

Grunt as a task manager to aid development [http://gruntjs.com/] (http://gruntjs.com/)

### 1.4 Dimox breadcrumbs

WordPress breadcrumbs without a plugin [https://gist.github.com/Dimox/5654092] (https://gist.github.com/Dimox/5654092)

## 2.0 Development setup

### 2.1 Create host for WordPress in MAMP Pro

Under the 'Hosts' tab create a new server with Server Name 'tna-base-dev' within the MAMP/htdocs/sites/tna-base-dev/ directory. Having done this click 'Save'.

### 2.2 1-click WordPress install in MAMP Pro

Under the 'Hosts' tab, with 'tna-base-dev' selected, click Extras and install WordPress, providing:

* 'The National Archives' as Name of the blog
* Your email address as the email address

### 2.3 Clone Github repository 'tna-base' using SourceTree

Click 'Remote' in SourceTree and you will be shown a full list of repositories you have access to. Then: 

* Create a folder called 'tna-base' in the Themes directory of your WordPress installation
* Select the 'tna-base' repository in SourceTree and clone it to your newly created 'tna-base' directory

### 2.4 Create a new project for the WordPress installation in PhpStorm

* Select 'Create New Project from Existing Files' 
* Select 'Web server is installed locally, source files are located under its document root' 
* Set /Applications/MAMP/htdocs/sites/tna-base-dev/wp-content/themes/tna-base and click 'Project Root'
* Specify parameters for a new server as:
  * Name: tna-base-dev
  * Web server root URL: http://tna-base-dev:8888
  * Set Project URL as: http://tna-base-dev:8888

### 2.5 Enable WordPress integration in PhpStorm

* Open the tna-base-dev project in PhpStorm
* Go to PhpStorm > Preferences > Languages & Frameworks > Php > WordPress
* Check the 'Enable WordPress Integration' box
* Set the WordPress installation path as the root directory for the tna-base-dev WordPress installation (typically /Applications/MAMP/htdocs/sites/tna-base-dev/)

### 2.6 Running Grunt

Assuming that the Grunt CLI has been installed follow the instructions on the [Grunt website] (http://gruntjs.com/getting-started#working-with-an-existing-grunt-project).

### 2.7 Composer dependency management

Composer is used for dependency management, initially for PHPUnit but extending to other dependencies as needed. 

#### 2.7.1 Installing Composer

To install Composer, from within the ```tna-base``` directory open the Terminal and execute this command: 

```curl -sS https://getcomposer.org/installer | php```

This downloads the Composer installer script with ```curl``` and executes it with PHP, resulting in a ```composer.phar``` file (the Composer binary) being placed in the current working directory. 

Having done this follow these steps:

* Type ```sudo mv composer.phar /usr/local/bin/composer``` into the Terminal
* Append this line to your ```~/.bash_profile``` file ```PATH=/usr/local/bin:$PATH```

At this stage you should be able to execute the ```composer``` command in the Terminal to see all the available options.

#### 2.7.2 Obtaining dependencies via Composer

Having followed the steps above you will be able to install dependencies by typing ```composer install``` at the Terminal.

### 2.8 PHPUnit

Having followed the steps under 'Installing Composer' type ```vendor/bin/phpunit -c phpunit.xml``` from within the ```tna-base``` directory to run Unit Tests for the project.

Note: PhpStorm allows for PHPUnit integration - allowing your tests to be run automatically. Search the JetBrains website to find out how to configure this.

## 3.0 Credits

* [Bootstrap 3.3.6] (http://getbootstrap.com/)
* [Dimox] (https://github.com/Dimox)
