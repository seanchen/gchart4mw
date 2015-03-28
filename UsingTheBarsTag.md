To draw bar-charts with **gchart4mw** put the data to show between `<bars>` and `</bars>` (`<lines>` and `<pie>` are also possible tags for charts). Just put one value per row:

If you put this code in a page of your wiki

```
<bars title="Site Visitors">
5345
3452
7843
</bars>
```

you will get this chart:

![http://gchart4mw.googlecode.com/files/bars-step01.png](http://gchart4mw.googlecode.com/files/bars-step01.png)

**Note:** _There is an autofit scaling of the Y-Axis by default. This is why you see only 2 bars - the middle value is drawn as as bar with height zero. Especially for bar-charts it is handy to set the Y-Axis manually!_

[back](OnlineDocumentation.md)

## Setting the Y-Axis ##

By default the Y-Axis gets autoscaled by finding the greatest and the smallest value of all given data. If you would like to set the Y-Axis manually you can do so by using `ymin` and `ymax` (You don´t have to use both values):

```
<bars title="Site Visitors" ymin=0 ymax=8000>
5345
3452
7843
</bars>
```

![http://gchart4mw.googlecode.com/files/bars-step02.png](http://gchart4mw.googlecode.com/files/bars-step02.png)

[back](OnlineDocumentation.md)

## Showing multiple data-lines ##

You can show multiple data lines in a chart if you put multiple values separated by a colon in each row. To separate the data lines in a better way you can set the color of each line using the `colors`-parameter:

```
<bars title="Site Visitors" ymin=0 ymax=8000 colors=FF0000,00FF00>
4115,1230
2541,911
5410,2433
</bars>
```

![http://gchart4mw.googlecode.com/files/bars-step03.png](http://gchart4mw.googlecode.com/files/bars-step03.png)

If like to show the data-lines stacked rather than side by side add the `stacked`-parameter:

```
<bars title="Site Visitors" ymin=0 ymax=8000 colors=FF0000,00FF00 stacked>
4115,1230
2541,911
5410,2433
</bars>
```

![http://gchart4mw.googlecode.com/files/bars-step04.png](http://gchart4mw.googlecode.com/files/bars-step04.png)

[back](OnlineDocumentation.md)

## Putting Labels on the Y-axis ##

To get an idea about the value of each data-point, put labels on the Y-axis. This puts 4 labels on the Y-axis:

```
<bars title="Site Visitors" ymin=0 ymax=8000 colors=FF0000,00FF00 stacked ylabel=4>
Oct,4115,1230
Nov,2541,911
Dec,5410,2433
</bars>
```

![http://gchart4mw.googlecode.com/files/bars-step05.png](http://gchart4mw.googlecode.com/files/bars-step05.png)

[back](OnlineDocumentation.md)

## Putting Labels on the X-axis ##

If you add the `xlabel`-parameter to the chart, the first column of the given data is handled as labels for the X-axis:

```
<bars title="Site Visitors" ymin=0 ymax=8000 colors=FF0000,00FF00 stacked ylabel=4 xlabel>
Oct,4115,1230
Nov,2541,911
Dec,5410,2433
</bars>
```

![http://gchart4mw.googlecode.com/files/bars-step06.png](http://gchart4mw.googlecode.com/files/bars-step06.png)

[back](OnlineDocumentation.md)

## Adding a legend to the chart ##

Especially for charts with multiple data lines you should add a legend to it. This can be done with the `legend`-parameter and putting the labels for the legend in the first row of the content.

```
<bars title="Site Visitors" ymin=0 ymax=8000 colors=FF0000,00FF00 stacked ylabel=4 xlabel legend>
   ,EU  ,US
Oct,4115,1230
Nov,2541, 911
Dec,5410,2433
</bars>
```

**Note:** _As you see in the example, if you also have labels on the X-axis, the first column of the first row is empty!_

![http://gchart4mw.googlecode.com/files/bars-step07.png](http://gchart4mw.googlecode.com/files/bars-step07.png)

[back](OnlineDocumentation.md)

## Drawing horizontal bars ##

You can add the `horizontal`-parameter to change the bar-orientation:
```
<bars title="Site Visitors" ymin=0 ymax=8000 colors=FF0000,00FF00 stacked ylabel=4 xlabel legend horizontal>
   ,EU  ,US
Oct,4115,1230
Nov,2541, 911
Dec,5410,2433
</bars>
```

![http://gchart4mw.googlecode.com/files/bars-step08.png](http://gchart4mw.googlecode.com/files/bars-step08.png)

**Note:** _By using `horizontal` the whole chart is flipped by 90 degrees, so the `ylabel` puts labels on the X-axis in fact!_

[back](OnlineDocumentation.md)

## Putting a grid under the chart ##

It is easier to compare values if you put a grid under the chart. You can put lines for one axis only or for X- and Y-axis. Bars look nice with lines only on the Y-axis:

```
<bars title="Site Visitors" ymin=0 ymax=8000 colors=FF0000,00FF00 stacked ylabel=4 xlabel legend horizontal grid=y>
   ,EU  ,US
Oct,4115,1230
Nov,2541, 911
Dec,5410,2433
</bars>
```

![http://gchart4mw.googlecode.com/files/bars-step09.png](http://gchart4mw.googlecode.com/files/bars-step09.png)

[back](OnlineDocumentation.md)
