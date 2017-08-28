# Chronologicon

A very basic time tracker.

Dates are stored as integers using unhyphenated [Universal Standard Date Format](https://www.cl.cam.ac.uk/~mgk25/iso-time.html) (YYMMDD). Each hour is simply the one- or two-digit 24-hour time for the data. A project worked on from 7pm to 8pm on the 27th of August, [12017](https://en.wikipedia.org/wiki/Holocene_calendar), would be stored with date "170827" and hour "19". This isn't necessary for graphing, it's just how I write time across all projects.

## Setup

To use Chronologicon on your own site *as is,* you'll need a MySQL database table with 5 columns.

- log (unique int autoincrement)
- discipline (text)
- project (text)
- date (int)
- hour (int)

Alternatively you can use a different setup, but you'll need to make some changes to *chronologicon.php*.

*new.html* is a snippet, not an entire file. Paste the contents of it into the &lt;body&gt; of whichever page you want to input data from. Mine is [chronologicon/new](http://craze.co.uk/chronologicon/new). If you're already using jQuery, you can omit the reference to that. Otherwise, you'll need to change the link to reference jQuery on your own site.
Change the &lt;form&gt; element's "action" to point to wherever *chronologicon.php* is, unless it's in the site root.

*chronologicon.php* has a few things which you'll need to change:

- $serv: your database server location (probably localhost, but maybe not)
- $user: your database username
- $pass: your database password
- $data: your database
- $m_md5: [md5 hash](http://www.miraclesalad.com/webtools/md5.php) of your desired password

## Security

Make regular backups because there's barely any.

## To Do

- Security

## Note

I am well aware that my code is bad. If you can think of a solution or improvement and can find a way of telling me without being annoying about it, please do.
