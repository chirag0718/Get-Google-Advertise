<?php if (isset($_REQUEST['google_search'])) {
?><a href="#" onClick ="$('#tableID').tableExport({type:'excel',escape:'false'});">Export Table</a>
        <?php
            $query = urlencode($_REQUEST['google_search']);




            require('./simple_html_dom.php');
           

            $html = file_get_html("http://www.google.com.au/search?q=" . $query);
            //echo $html;
            $html10 = file_get_html('http://www.google.com.au/search?q=' . $query . '&start=10');
            $html20 = file_get_html('http://www.google.com.au/search?q=' . $query . '&start=20');

            echo '<table id="tableID" border=1>';
            echo '<tr><th>Page Number</th><th>Keyword</th><th>Title</th><th>Link</th><th>Description</th><th>Full Details</th>';
            $i = 0;
            foreach ($html->find('#desktop-search li.ads-ad') as $row) {
                $header = $html->find('h3 a');
                $headertd = $header[$i]->innertext;
                $link = $html->find('div.ads-visurl cite');
                $linktd = $link[$i]->innertext;
                $desc = $html->find('div.ads-creative');
                //print_r($desc);
                $desctd = $desc[$i]->innertext;
                $addresss = $html->find('li.ads-ad');
                $addressstd = $addresss[$i]->innertext;


                echo "<tr>";
                echo "<td>1</td><td>" . $_REQUEST['google_search'] . "</td><td>$headertd</td><td>$linktd</td><td>$desctd</td><td>$addressstd</td>";
                echo "</tr>";
                $i++;
            }

            $i = 0;
            $headertd = NULL;
            $linktd = NULL;
            $desctd = NULL;
            $addressstd = NULL;

            foreach ($html10->find('#desktop-search li.ads-ad') as $row) {
                $header = $html10->find('h3 a');
                $headertd = $header[$i]->innertext;
                $link = $html10->find('div.ads-visurl cite');
                $linktd = $link[$i]->innertext;
                $desc = $html10->find('div.ads-creative');
                //print_r($desc);
                $desctd = $desc[$i]->innertext;
                $addresss = $html10->find('li.ads-ad');
                $addressstd = $addresss[$i]->innertext;


                echo "<tr>";
                echo "<td>2</td><td>" . $_REQUEST['google_search'] . "</td><td>$headertd</td><td>$linktd</td><td>$desctd</td><td>$addressstd</td>";
                echo "</tr>";
                $i++;
            }
            $i = 0;
            $headertd = NULL;
            $linktd = NULL;
            $desctd = NULL;
            $addressstd = NULL;

            foreach ($html20->find('#desktop-search li.ads-ad') as $row) {
                $header = $html20->find('h3 a');
                $headertd = $header[$i]->innertext;
                $link = $html20->find('div.ads-visurl cite');
                $linktd = $link[$i]->innertext;
                $desc = $html20->find('div.ads-creative');
                //print_r($desc);
                $desctd = $desc[$i]->innertext;
                $addresss = $html20->find('li.ads-ad');
                $addressstd = $addresss[$i]->innertext;


                echo "<tr>";
                echo "<td>3</td><td>" . $_REQUEST['google_search'] . "</td><td>$headertd</td><td>$linktd</td><td>$desctd</td><td>$addressstd</td>";
                echo "</tr>";
                $i++;
            }

            echo '</table>';
        } else {
            echo "There is no result found.";
        }
        ?>
