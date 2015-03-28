# alphabetical list of all parameters #
| **3d** | use `3d` if you want to show a 3d-style pie-chart. |
|:-------|:---------------------------------------------------|
| **colors** | with `colors` you can set the color for the chart in RRGGBB-style (like _FF0000_ for red). If you have multiple data columns separate the colors with a colon. |
| **fieldsep** | By default the field separator is ",". If you would like to have a different separator set it with `fieldsep`: `fieldsep=”;”` |
| **fill** | You can set the chart background with the `fill`-parameter. Please see http://code.google.com/apis/chart/#chart_or_background_fill for details. |
| **grid** | Often a chart is more appealing if there is a grid under it. Use `grid` to do so. `grid` takes as a parameter `x` for the X-axis, `y` for Y-axis and `xy` for both axis  |
| **horizontal** | add `horizontal` if you would like to have to bars displayed horinzontal. Please note: the whole chart is flipped by 90 degree. So `xlabel` will be used to put labels on the Y-axis! |
| **legend** | you can add a legend to the chart with the `legend` parameter and putting the labels in the first row of the content. |
| **size** | `size` takes the size of the chart as additional parameter (Default is `size=200x120`). |
| **stacked** | if you show multiple data columns in a chart you can use the `stacked`-parameter to show them stacked and not side by side. |
| **title** | `title` is used to set the title of a chart (e.g. `title=”site visitors”` |
| **xlabel** | if you add the `xlabel`-parameter, the first column of the content is considered as labels for the X-axis. |
| **ymin** and **ymax** | by default the size of the y-axis is determined by the smallest and the biggest value in the chart. if you would like to set it manually use `ymin` and `ymax`: `ymin=0` |
| **ylabel** | If you would like to have labels on the Y-axis add `ylabel` to the parameter list. Optionally you can give the count of labels you would like to have: `ylabel=4` will put 4 labels on the Y-axis. |

**Note**: _If you have used DefaultParameters to set a parameter it can be overwriten within the chart. There are some unary parameters like `3d` or `legend`. Prepend `no` to disable them, like `no3d` or `nolegend`._

[back](OnlineDocumentation.md)

# possible parameters by chart-type #

Not all parameters make sens to all type of charts:

| **Parameter**  | **`<lines>`** | **`<bars>`** | **`<pie>`** |
|:---------------|:--------------|:-------------|:------------|
| **3d**         |      ---        |      ---       |      YES      |
| **colors**     |      YES        |      YES       |      YES      |
| **fieldsep**   |      YES        |      YES       |      YES      |
| **fill**       |      YES        |      YES       |      YES      |
| **grid**       |      YES        |      YES       |      ---      |
| **horizontal** |      ---        |      YES       |      ---      |
| **legend**     |      YES        |      YES       |      ---      |
| **size**       |      YES        |      YES       |      YES      |
| **stacked**    |      ---        |      YES       |      ---      |
| **title**      |      YES        |      YES       |      YES      |
| **xlabel**     |      YES        |      YES       |      YES      |
| **ymin** and **ymax** | YES        |      YES       |      ---      |
| **ylabel**     |      YES        |      YES       |      ---      |

[back](OnlineDocumentation.md)