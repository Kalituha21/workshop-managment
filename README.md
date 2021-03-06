INSTALATION
------------
### Requirement (download and install)
GIT - [Download](https://git-scm.com/)

Composer (optional, needed only if you plan to manage project packages) -
- Windows: [Download](https://getcomposer.org/download/) - download through terminal potentially will reduce headpin problems in the future <br>
- Mac: Download [using brew](https://formulae.brew.sh/formula/composer), but before need to install [Homebrew](https://brew.sh/) <br>

IDE (for example [PHPStorm](https://www.jetbrains.com/ru-ru/phpstorm/)) - for PhpStorm use your RTU @edu.rtu.lv email to get free license instantly

Local server (for example XAMPP) - if you choose [XAMPP](https://www.apachefriends.org/download.html), use version 7.4.27 (at least for mac)

### Setup

1. In terminal open folder where you want to locate project locally and enter command `git clone https://github.com/Kalituha21/workshop-managment.git` <br>
How to open folder in terminal:
   - [Windows](https://www.minitool.com/news/how-to-open-a-file-folder-cmd.html)
   - [Mac](https://www.macworld.com/article/221277/command-line-navigating-files-folders-mac-terminal.html)
2. Setup virtual hosts for your project
   1. Add host address at the end of `/etc/hosts` file. For example `127.0.0.1 workshop-managment.test` where **127.0.0.1** is your localhost IP that is used by XAMPP server, and **workshop-management.test** is any domain you want to use to access project page in browser
   2. Setup virtual hosts in your local server (instructions for XAMPP - [Windows](https://ultimatefosters.com/hosting/setup-a-virtual-host-in-windows-with-xampp-server/), [Mac](https://silvawebdesigns.com/how-to-configure-virtualhosts-in-xampp-on-a-mac/)). <br>
   As a root folder of the project for virtual host please use `/web` folder -> `/Users/<system_user>/projects/workshop-managment/web` where **Users/<system_user>/projects** is location of the project. <br>
   3. (For XAMPP) Edit `httpd-vhosts.conf` from the previous step, add following code lines to project <VirtualHost>: <br>
   ```
    <Directory "<project_directory>/web">
        Options Indexes FollowSymLinks Includes execCGI
        AllowOverride All
        Require all granted
    </Directory>
   ```
   Don't forget to change project directory. In the result your project VirtualHost look similar to this:
   ```
       <VirtualHost *:80>
           ServerName workshop-managment.test
           DocumentRoot "<project_directory>/web"
           <Directory "<project_directory>/web">
               Options Indexes FollowSymLinks Includes execCGI
               AllowOverride All
               Require all granted
           </Directory>
       </VirtualHost>
   ```
3. Fully turn on the server (all Servers in XAMPP) and access web-page by earlier set-upped domain (`workshop-managment.test`)

PROJECT INFO
------------
<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Basic Project Template</h1>
    <br>
</p>

Yii 2 Basic Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
rapidly creating small projects.

The template contains the basic features including user login/logout and a contact page.
It includes all commonly used configurations that would allow you to focus on adding new
features to your application.

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![build](https://github.com/yiisoft/yii2-app-basic/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-basic/actions?query=workflow%3Abuild)

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application - .php/.html template that will be seen in browser
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 7.4.0.


CONFIGURATION
-------------

### Database

1. Create a database for your system (for example by using phpMyAdmin). You can choose any name for your database (in example used `workshop-managment`)
2. Create a copy of the file `config/db.example.php` and name it `config/db.php`. Set real data in the new file, for example (default data-set for XAMPP):

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=workshop-managment',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];
```

**NOTES:**
- Yii won't create the database for you, this has to be done manually before you can access it.
- Check and edit the other files in the `config/` directory to customize your application as required.
- Refer to the README in the `tests` directory for information specific to basic application tests.


HOW TO
-------
### Create new template page
1. In the folder `/views` create a new sub-folder (or use existing) to add your HTML or PHP file. 
2. In folder `/controllers` and new file (or use some existing) and add function that would open your template file. <br>
- To access your template in browser use name of controller and function as URL route to your template in the browser. <br>
- Controllers should be named in PascalCase and its name should end with word `Controller`
- Controllers should be named same as sub-folder where located your template file
- functions should be named in camelCase and start with word `action` (rule about `action` relates only to functions accessed as browser URLs)
- if function named as `actionIndex` then function name part is not required in URL. <br>
For example `ExamplesController` -> `actionIndex` can be accessed in browser by using URL `workshop-managment.test/examples/index` or `workshop-managment.test/examples` <br> <br>
To understand better see example `views/examples/test.php`, `\controllers\ExamplesController`, `\controllers\ExamplesController::actionIndex`.

### Create query
1. In folder `/queries` add new folder. Give it representative name of your planned query
2. In your new folder create two files `execute.sql` and `revert.sql`. 
    - File `execute.sql` is place where you should write your query. 
    - File `revert.sql` is place where you should write a query that would revert changes made by your main query. (!!! Required !!!)
3. Add the name of your new folder to the end of query list. This constant: `\models\QueryHistory::QUERY_NAMES`
4. You can now execute your query on page `workshop-managment.test/query`
- See example: `queries/create_test_table`

### Add image in HTML file
1. Save image in `web/images` folder
2. Add image tag with src which is php `img()` function, where an input parameter is image's name.
   - Example: 
   ```html
   <img src="<?= img('message.png'); ?>
   ```

TESTING
-------

Tests are located in `tests` directory. They are developed with [Codeception PHP Testing Framework](http://codeception.com/).
By default, there are 3 test suites:

- `unit`
- `functional`
- `acceptance`

Tests can be executed by running

```
vendor/bin/codecept run
```

The command above will execute unit and functional tests. Unit tests are testing the system components, while functional
tests are for testing user interaction. Acceptance tests are disabled by default as they require additional setup since
they perform testing in real browser. 


### Running  acceptance tests

To execute acceptance tests do the following:  

1. Rename `tests/acceptance.suite.yml.example` to `tests/acceptance.suite.yml` to enable suite configuration

2. Replace `codeception/base` package in `composer.json` with `codeception/codeception` to install full-featured
   version of Codeception

3. Update dependencies with Composer 

    ```
    composer update  
    ```

4. Download [Selenium Server](http://www.seleniumhq.org/download/) and launch it:

    ```
    java -jar ~/selenium-server-standalone-x.xx.x.jar
    ```

    In case of using Selenium Server 3.0 with Firefox browser since v48 or Google Chrome since v53 you must download [GeckoDriver](https://github.com/mozilla/geckodriver/releases) or [ChromeDriver](https://sites.google.com/a/chromium.org/chromedriver/downloads) and launch Selenium with it:

    ```
    # for Firefox
    java -jar -Dwebdriver.gecko.driver=~/geckodriver ~/selenium-server-standalone-3.xx.x.jar
    
    # for Google Chrome
    java -jar -Dwebdriver.chrome.driver=~/chromedriver ~/selenium-server-standalone-3.xx.x.jar
    ``` 
    
    As an alternative way you can use already configured Docker container with older versions of Selenium and Firefox:
    
    ```
    docker run --net=host selenium/standalone-firefox:2.53.0
    ```

5. (Optional) Create `yii2basic_test` database and update it by applying migrations if you have them.

   ```
   tests/bin/yii migrate
   ```

   The database configuration can be found at `config/test_db.php`.


6. Start web server:

    ```
    tests/bin/yii serve
    ```

7. Now you can run all available tests

   ```
   # run all available tests
   vendor/bin/codecept run

   # run acceptance tests
   vendor/bin/codecept run acceptance

   # run only unit and functional tests
   vendor/bin/codecept run unit,functional
   ```

### Code coverage support

By default, code coverage is disabled in `codeception.yml` configuration file, you should uncomment needed rows to be able
to collect code coverage. You can run your tests and collect coverage with the following command:

```
#collect coverage for all tests
vendor/bin/codecept run --coverage --coverage-html --coverage-xml

#collect coverage only for unit tests
vendor/bin/codecept run unit --coverage --coverage-html --coverage-xml

#collect coverage for unit and functional tests
vendor/bin/codecept run functional,unit --coverage --coverage-html --coverage-xml
```

You can see code coverage output under the `tests/_output` directory.
