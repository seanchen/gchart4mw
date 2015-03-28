# Setting default values #

To give your charts a consistant look and make editing easier, you can use the file `LocalSettings.php` to set default values for all parameters.

This way you can make sure, that every chart has the same size, is using the same colors, is always having a sensible scaling on the Y-axis, etc.

To set defaults the theses arrays are used:

  * `$gchartWikiDefaults` for all charts in the wiki
  * `$gchartLinesDefaults` for all `<lines>`-charts in the wiki.
  * `$gchartBarsDefaults` for all `<bars>`-charts in the wiki.
  * `$gchartPieDefaults` for all `pie`-charts in the wiki.

# Evaluation of parameters #

When it comes to drawing a chart first of all `$gchartWikiDefaults` is evaluated. Then the defaults-array for this specific chart-type and at last the parameters given directly with the chart.

That way it is possible to overwrite wiki-defaults with chart-type-defaults and chart-type-defaults with the parameters given within the chart.

# Example #

To make sure that

  * each chart is 300x180 in size
  * all `<lines`-charts get a grid on X- and Y-axis, start with 0 on the Y-axis and have 4 labels on the Y-axis.
  * all `<bars>`-charts have only horizontal lines as grid, start with 0 on the Y-axis and also have 4 labels on the Y-axis.
  * `<pie>`-charts are always drawn in 3D

put those lines in your `LocalSettings.php`:

```
$gchartWikiDefaults = Array ( "size" => "300x180" );
$gchartLinesDefaults = Array ( "grid" => "xy", "ymin" => "0", "ylabel" => "4");
$gchartBarsDefaults = Array ( "grid" => "y", "ymin" => "0", "ylabel" => "4" );
$gchartPieDefaults = Array ( "3d" => "3d" );
```

# Overwriting unary parameters #

There are some unary parameters like `3d` for pie-charts. To Overwrite one of those parameters prepend “no” to it:

```
<pie no3d>
60
40
</pie>
```