vdr2chap
========

Convert noad VDR commercial markers to MP4 chapter markers. The resulting file can be used with MP4Box (GPAC) and/or mp4chaps.
- See http://uzzikie.livejournal.com/17048.html for additional information about quicktime compatible chapter markers.
- See http://www.allesblog.de/blog/2012/07/10/vdr-tv-in-mp4-konvertieren/ for an article about why the tool was written initially

Synopsis
========

    cat info.vdr | perl vdr2chap.pl > chapters.txt

OR

    cat info.vdr | php vdr2chap.php > chapters.txt

Dependencies
============

    Perl or PHP

Author
======

vdr2chap was written by Michael Henke <vdr2chap@codingmerc.com>.