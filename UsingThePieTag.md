To draw pie-charts with **gchart4mw** put the data to show between `<pie>` and `</pie>` (`<lines>` and `<bars>` are also possible tags for charts). You can´t use this chart-type to draw multiple data-line in a single chart.

If you put this code in a page of your wiki

```
<pie title="Site Visitors">
5345
3452
7843
</pie>
```

you will get this chart:

![http://gchart4mw.googlecode.com/files/pie-step01.png](http://gchart4mw.googlecode.com/files/pie-step01.png)

[back](OnlineDocumentation.md)

## Putting labels and colors on the slices ##

If you add the `xlabel`-parameter to the chart, the first column of the given data is handled as labels for the slices:

```
<pie title="Site Visitors" xlabel>
Oct,5345
Nov,3452
Dec,7843
</pie>
```

![http://gchart4mw.googlecode.com/files/pie-step02.png](http://gchart4mw.googlecode.com/files/pie-step02.png)

You can use the `colors`-parameter to set colors for the slices (If there are less colors given than data values the colors will be interpolated).

```
<pie title="Site Visitors" colors=FF0000,00FF00,0000FF xlabel>
Oct,5345
Nov,3452
Dec,7843
</pie>
```

![http://gchart4mw.googlecode.com/files/pie-step03.png](http://gchart4mw.googlecode.com/files/pie-step03.png)

[back](OnlineDocumentation.md)

## 3D-pie ##

You can add the `3d`-parameter to get a 3D-like pie-chart:

```
<pie title="Site Visitors" colors=FF0000,00FF00,0000FF xlabel 3d>
Oct,5345
Nov,3452
Dec,7843
</pie>
```

![http://gchart4mw.googlecode.com/files/pie-step04.png](http://gchart4mw.googlecode.com/files/pie-step04.png)

[back](OnlineDocumentation.md)