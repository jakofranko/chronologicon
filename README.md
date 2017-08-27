# Chronologicon

A very basic time tracker.

The pertinent file here is *chronologicon.php,* which handles the database query. *new.md* is simply the data submission form. It's a Markdown file, which gets compiled into an HTML document by Markdoc, the document engine my website uses. The &lt;form&gt; element on that page is the only piece necessary to implement Chronologicon on your own site.
  
Dates are stored as integers using unhyphenated [Universal Standard Date Format](https://www.cl.cam.ac.uk/~mgk25/iso-time.html) (YYMMDD). Each hour is simply the one- or two-digit 24-hour time for the data. A project worked on from 7pm to 8pm on the 27th of August, [12017](https://en.wikipedia.org/wiki/Holocene_calendar), would be stored with date "170827" and hour "19". This isn't necessary for graphing, it's just how I write time across all projects.
