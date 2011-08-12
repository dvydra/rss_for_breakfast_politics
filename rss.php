<?php
  header('Content-type: text/xml');
  include('lib/simple_html_dom.php');
  $html = file_get_html('http://www.breakfastpolitics.com/');

  echo "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>";
  echo "<?xml-stylesheet type=\"text/css\" href=\"http://ivydra.com/breakfast/style/rss.css\" ?>";
  echo "<rss version=\"2.0\">\n";
  echo "<channel>\n";
  echo "\t<title>Breakfast Politics daily RSS</title>\n";
  echo "\t<description>Individual articles from the latest Breakfast Politics.</description>\n";
  echo "\t<link>http://www.breakfastpolitics.com</link>\n";
  echo "\t<lastBuildDate>".date('D, d M Y H:i:s T')."</lastBuildDate>\n";
  echo "\t<pubDate>".date('D, d M Y H:i:s T')."</pubDate>\n";

  foreach($html->find('div.entry-body', 0)->find('a') as $link) {
    echo"\t<item>\n";
    echo    "\t\t<title>" . $link->innertext . "</title>\n";
    echo    "\t\t<description>" . $link->href . "</description>\n";
    echo    "\t\t<link>" . $link->href . "</link>\n";
    echo    "\t\t<guid>" . $link->href . "</guid>\n";
    echo    "\t</item>\n";
  }
echo "</channel>\n";
echo "</rss>\n";
?>