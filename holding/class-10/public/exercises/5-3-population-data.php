<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maine Population Data</title>
  </head>
  <body>
    
    <h1>Maine Population Data</h1>
    <?php
    // URL for the data file
    // original URL: https://www.maine.gov/cgi-bin/data/download.csv?data_id=54
    $dataUrl = 'https://natelaclaire.me/cis333/class-10/maine-population-by-town-1960-2000.csv';

    // open the URL for reading

    if ($file) {
        ?>
        <table border="1" width="100%">
            <caption>Population Data for Maine Counties</caption>
            <thead>
                <tr>
                    <th>County</th>
                    <th>Population in 2000</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // read the data from the file and display it in the table
                
                ?>
            </tbody>
        </table>
        <?php
        fclose($file);
    } else {
      echo "Error opening URL.\n";
    }
    ?>

    <p>Uses <a href="https://www.maine.gov/cgi-bin/data/data_details.pl?data_id=54">"Population by Town" data</a> published by the <a href="https://digitalmaine.com/spo_docs/">Maine State Planning Office</a>.</p>
    
  </body>
</html>