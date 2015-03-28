To draw lines-charts with **gchart4mw** put the data to show between `<lines>` and `</lines>` (`<bars>` and `<pie>` are also possible tags for charts). Just put one value per row:

If you put this code in a page of your wiki

```
<lines title="Site Visitors">
5345
3452
7843
</lines>
```

you will get this chart:

![http://gchart4mw.googlecode.com/files/lines-step01.png](http://gchart4mw.googlecode.com/files/lines-step01.png)

[back](OnlineDocumentation.md)

## Setting the Y-Axis ##

By default the Y-Axis gets autoscaled by finding the greatest and the smallest value of all given data. If you would like to set the Y-Axis manually you can do so by using `ymin` and `ymax` (You don´t have to use both values):

```
<lines title="Site Visitors" ymin=0 ymax=8000>
5345
3452
7843
</lines>
```

![http://gchart4mw.googlecode.com/files/lines-step02.png](http://gchart4mw.googlecode.com/files/lines-step02.png)

[back](OnlineDocumentation.md)

## Showing multiple data-lines ##

You can show multiple data lines in a chart if you put multiple values separated by a colon in each row:

```
<lines title="Site Visitors" ymin=0 ymax=8000>
4115,1230
2541,911
5410,2433
</lines>
```

![http://gchart4mw.googlecode.com/files/lines-step03.png](http://gchart4mw.googlecode.com/files/lines-step03.png)

To separate the data lines in a better way you can set the color of each line:

```
<lines title="Site Visitors" ymin=0 ymax=8000 colors=FF0000,00FF00>
4115,1230
2541,911
5410,2433
</lines>
```

![http://gchart4mw.googlecode.com/files/lines-step04.png](http://gchart4mw.googlecode.com/files/lines-step04.png)

[back](OnlineDocumentation.md)

## Putting Labels on the Y-axis ##

To get an idea about the value of each data-point, put labels on the Y-axis. This puts 4 labels on the Y-axis:

```
<lines title="Site Visitors" ymin=0 ymax=8000 colors=FF0000,00FF00 ylabel=4>
4115,1230
2541,911
5410,2433
</lines>
```

![http://gchart4mw.googlecode.com/files/lines-step05.png](http://gchart4mw.googlecode.com/files/lines-step05.png)

[back](OnlineDocumentation.md)

## Putting Labels on the X-axis ##

If you add the `xlabel`-parameter to the chart, the first column of the given data is handled as labels for the X-axis:

```
<lines title="Site Visitors" ymin=0 ymax=8000 colors=FF0000,00FF00 ylabel=4 xlabel>
Oct,4115,1230
Nov,2541,911
Dec,5410,2433
</lines>
```

![http://gchart4mw.googlecode.com/files/lines-step06.png](http://gchart4mw.googlecode.com/files/lines-step06.png)

[back](OnlineDocumentation.md)

## Adding a legend to the chart ##

Especially for charts with multiple data lines you should add a legend to it. This can be done with the `legend`-parameter and putting the labels for the legend in the first row of the content.

```
<lines title="Site Visitors" ymin=0 ymax=8000 colors=FF0000,00FF00 ylabel=4 xlabel legend>
   ,EU  ,US
Oct,4115,1230
Nov,2541, 911
Dec,5410,2433
</lines>
```

**Note:** _As you see in the example, if you also have labels on the X-axis, the first column of the first row is empty!_

![http://gchart4mw.googlecode.com/files/lines-step07.png](http://gchart4mw.googlecode.com/files/lines-step07.png)

[back](OnlineDocumentation.md)

## Putting a grid under the chart ##

It is easier to compare values if you put a grid under the chart. You can put lines for one axis only or for both X- and Y-axis:

```
<lines title="Site Visitors" ymin=0 ymax=8000 colors=FF0000,00FF00 ylabel=4 xlabel legend grid=xy>
   ,EU  ,US
Oct,4115,1230
Nov,2541, 911
Dec,5410,2433
</lines>
```

![http://gchart4mw.googlecode.com/files/lines-step08.png](http://gchart4mw.googlecode.com/files/lines-step08.png)

[back](OnlineDocumentation.md)