# ComputerCraft Item Catalogue

How does this all work? What is it about? Read on...

## Prerequisites

* [Computercraft 1.5](http://www.computercraft.info/)
* [MiscPeripherals 1.3](http://www.computercraft.info/forums2/index.php?/topic/4587-cc15mc147-miscperipherals-31/)
* WAMP server (PHP, MYSQL)

(Tested to work on Feed the Beast Ultimate 1.2)

## Setup of PHP backend

1. Upload everything apart from cc-scripts to the root of your webhosting
2. Using your favourite method (phpMyAdmin for example) create and make note of database name, username and password.
3. Import install.sql into newly created database (db/install.sql).
4. Edit the following fields in config.php:
 * $conf['db_hostname'] - Generally localhost but your hosting provider may provide a remote database
 * $conf['db_username'] - Username you created in Step 2.
 * $conf['db_password'] - Password you created in Step 2.
 * $conf['db_port'] = - Default port is 3306.
 * $conf['db_socket'] - Sometimes you have to use a socket instead to connect to DB. Leave blank if not needed.
 * $conf['db_name'] - Name of database you created in Step 2.
 * $conf['db_tname'] - Default is * items * here
 * $conf['db_prefix'] - Default is * mc * here
 * The 2 configs above create mc_items which is what * install.sql * will setup.
 * $conf['password'] - Create a secure password which will be set in the ComputerCraft scripts for all communication between game and server. See https://www.grc.com/passwords.htm

## ComputerCraft script and ingame setup

1. Edit add, is-terminals, ticker in * cc-scripts * directory
 * Set * local wwwdir * as the URL to your website/PHP script setup above.
 * Set * local password * to the password created above.

## What each script does and how to use them

** Add **

`add Cobblestone CBBL`

What we are doing here is calling the script `add` then setting the Full Name and Short Name (kinda like the stock market code)

** Ingame setup: **

![Imgur](http://i.imgur.com/liN25ey.png)

** is-terminals **

No commands with this one.

** Ingame setup: **

![Imgur](http://i.imgur.com/z324iOB.png)
* Wireless Modem under computer *

These computers chain together and require some editing of the script. When you place your first sorting computer down as pictured above it will be assigned a unique ID, type `id` into the console this will return `This is computer #X`. Make a note of this ID and edit `cc-scipts/extract` change the number 4 on the line `rednet.send(4, msg)` to whichever ID you just created.

When you place your second computer type `id` into the console again.
In the `is-terminals` script on the **FIRST** computer edit `local nextComputer` with the ID of your **SECOND** computer.
Then continue this pattern for all sorters. Second computer `is-terminals` points to Third, Third to Fourth etc.

** Extract **

You need 1 Wireless Modem on the back of extraction computer.

`extract 1 64`

The syntax here is Minecraft Item ID:Damage value and quantity so for 64 Red Wool it would be `extract 35:14 64` and 22 Gravel would be `extract 13 22` - * note that you can leave off damage value if it is 0 *

** Ticker **

No commands with this one.

** Ingame setup: **

![Imgur](http://i.imgur.com/VSPR242.png)

Nothing to setup here as previously we already edited `local wwwdir` and `local password`.

This script displays your items in database.

** Usage **

* Right clicking any of the bottom row of monitors Refreshes the screen and gets latest amounts.
* Clicking top left monitor pages back
* Click top right monitor pages forward