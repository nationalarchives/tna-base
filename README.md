# tna-base

The National Archives WordPress Parent Theme

## 1.0 Development setup

### 1.1 Create host for WordPress

Under the 'Hosts' tab create a new server with Server Name 'tna-base-dev' within the MAMP/htdocs/sites/tna-base-dev/ directory. Having done this click 'Save'.

### 1.2 1-click WordPress install

Under the 'Hosts' tab, with 'tna-base-dev' selected, click Extras and install WordPress, providing:

* 'The National Archives' as Name of the blog
* Your email address as the email address

### 1.3 Clone Github repository 'tna-base'

### 1.4 Create a new project for the WordPress installation in PhpStorm

* Select 'Create New Project from Existing Files' 
* Select 'Web server is installed locally, source files are located under its document root' 
* Set /Applications/MAMP/htdocs/sites/tna-base-dev as Project Root
* Specify parameters for a new server as:
  * Name: tna-base-dev
  * Web server root URL: http://tna-base-dev:8888
  * Set Project URL as: http://tna-base-dev:8888

### 1.5 Enable WordPress integration in PhpStorm

* Open the tna-base-dev project in PhpStorm
* Go to PhpStorm > Preferences > Languages & Frameworks > WordPress
* Check the 'Enable WordPress Integration' box
* Set the WordPress installation path as the root directory for the tna-base-dev WordPress installation (typically /Applications/MAMP/htdocs/sites/tna-base-dev/)
