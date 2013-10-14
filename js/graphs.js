function showTooltip(x, y, contents) {
    $('<div id="tooltip">' + contents + '</div>').css( {
        position: 'absolute',
        display: 'none',
        color: "#fff",
        padding: '2px 5px',
        'border-radius': '6px',
        'background-color': '#000',
        opacity: 0.65
    }).appendTo("body").fadeIn(200).css({
        top: y - $('#tooltip').height()-10,
        left: x - $('#tooltip').width()/2
    });
}

    function tooltipChart(chartHolder, tooltipString) {
    var previousPoint = null;
    chartHolder.bind("plothover", function (event, pos, item) {
        if (item) {
            if (previousPoint != item.dataIndex) {
                previousPoint = item.dataIndex;

                $("#tooltip").remove();
                var x = item.datapoint[0].toFixed(1),
                    y = item.datapoint[1].toFixed(1);

                d = item.datapoint[0];
                date = new Date(d);
                year = 1900+parseInt(date.getYear())
                if(parseInt(date.getMonth()+1)==7)
                    $semester = '2do';
                else
                    $semester = '1er';

                showTooltip(item.pageX, item.pageY,
                            item.series.label + "<br> "  +$semester+ " semestre " + year +" <br> "+tooltipString+": " + y);
            }
        }
        else {
            $("#tooltip").remove();
            previousPoint = null;
        }
    });
}

function updateBarChart(checkboxHolder, graphBar, barDatasets) {
    var data = [];
    if(checkboxHolder.find("input:checked").length > 0){
        checkboxHolder.find("input:checked").each(function () {
            checked = $(this).is(':checked');
            var key = $(this).attr("name");
            if (key && barDatasets[key] && checked) {
                data.push(barDatasets[key]['data'][0]);
            }

        });
    }
    graphBar.setData(data);
}

function plotClasses(chartHolder, checkboxHolder, datasets, legendHolder, tooltipString) {

    var data =[];
    if(checkboxHolder.find("input:checked").length > 0){
        checkboxHolder.find("input:checked").each(function () {
            checked = $(this).is(':checked');
            var key = $(this).attr("name");
            if (key && datasets[key] && checked) {
                data.push(datasets[key]);
            }

        });

        var plot = $.plot(chartHolder,data, {
                series: {
                    lines: { show: true,
                            lineWidth: 1,
                            fill: true, 
                            fillColor: { colors: [ { opacity: 0.1 }, { opacity: 0.13 } ] }
                         },
                    points: { show: true, 
                             lineWidth: 2,
                             radius: 3
                         },
                    shadowSize: 0,
                },
                grid: { hoverable: true, 
                       clickable: true, 
                       tickColor: "#f9f9f9",
                       borderWidth: 0
                    },
                legend: {
                        // show: false
                        labelBoxBorderColor: "#fff",
                        container: legendHolder,
                        noColumns: 3,
                        sorted: 'reverse'
                    },  
                colors: ["#a7b5c5", "#30a0eb"],
                xaxis: {
                    mode: "time",
                    font: {
                        size: 10,
                        family: "Open Sans, Arial",
                        variant: "small-caps",
                        color: "#697695"
                    }
                },
                yaxis: {
                    ticks:10, 
                    tickDecimals: 0,
                    font: {size:12, color: "#9da3a9"}
                }
            });
        }
    tooltipChart(chartHolder, tooltipString);
}

function facultyScroll() {

    $('.faculty_list').slimScroll({
        height: '200px',
        size: '5px',
        position: 'right',
        alwaysVisible: false,
        railVisible: false,
        railOpacity: 0.3,
        wheelStep: 10,
        allowPageScroll: false,
        disableFadeOut: false

    });
}

function searchFaculty(searcher, holder) {
    searcher.keyup(function(){
        q = $(this).val().toLowerCase();
        holder.find('label').each(function(){
            val=$(this).text().toLowerCase()
            if(val.search(q)!=-1){
                $(this).show();
            }
            else {
                $(this).hide();
            }
        })
    })
}


