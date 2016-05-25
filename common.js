function fnGetDate()
        {

            var dataList = [];
            $("#desktop-search li.ads-ad").each(function () {
                dataList.push({
                    "Header": $(this).find("h3:first a").text(),
                    "DomainLink": $(this).find("div.ads-visurl cite").text(),
                    "Details": $(this).find("div.ads-creative").text(),
                });
            })
            var vartable = "<table border='2'>";
            for (key in dataList)
            {
                vartable = vartable + "<tr><td>" + dataList[key].Header + "</td><td>" + dataList[key].DomainLink + "</td><td>" + dataList[key].Details + "</td></tr>"
            }
            vartable = vartable + "</table>";
            $("#GoogleResultSet").html("");
            $("#GoogleResultSet").html(vartable);
