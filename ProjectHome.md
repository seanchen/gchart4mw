**gchart4mw** is a mediawiki-extension for visualizing data in wiki pages. To do so it provides a couple of additional tags for embedding different chart-types. Possible charts are
  * [lines](UsingTheLinesTag.md)
  * [bars](UsingTheBarsTag.md)
  * and [pie-charts](UsingThePieTag.md)

The charts are drawn by using the Google Chart API.

All data for visualization is provided in CSV-style.

# Example of usage #
This example shows the result of 2005´s election for the german Bundestag:

```
<pie 3d title="Bundestagswahl 2005" size=300x150 xlabel>
SPD,       34.2
CDU,       27.8
CSU,        7.4
GRÜNE,      8.1
FDP,        9.8
Die Linke., 8.7
Sonstige,   3.9
</pie>
```

![http://gchart4mw.googlecode.com/files/chart.png](http://gchart4mw.googlecode.com/files/chart.png)



# Installation #
The installation of this extension is done by 2 easy steps:
  * drop the php-file in the extension-folder of your mediawiki-installation.
  * add `require_once('$IP/extensions/gchart4mw.php');` to your _LocalSettings.php_.
