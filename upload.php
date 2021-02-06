<html>
<head>
    <title>Converter</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: grey;
            color: white;
            text-align: center;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>
<h2 >Conversion Tool (Version 1)</h2>
<div class="col-xs-12" style="height:50px;"></div>
<form enctype="multipart/form-data" action="upload.php" method="POST">
    <table class="table">

        <tr>
            <td width="30%"><input type="file" name="uploaded_file" class="btn btn-light"></input></td>
            <td><input type="submit" value="Upload" class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Upload a Microsoft Word  (.docx)"></input>

            </td>
        </tr>
    </table>


</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


</body>
</html>

<?PHP


$uploaded_file = $_FILES['uploaded_file'];
$name = preg_replace("/ /", "_", $uploaded_file['name']);
if (!empty($uploaded_file) && pathinfo($name, PATHINFO_EXTENSION) == "docx") {
    $path = join(DIRECTORY_SEPARATOR, ["uploads", basename($name)]);
    if (move_uploaded_file($uploaded_file['tmp_name'], $path)) {
        $files = glob( 'uploads/*');
        foreach ($files as $file) {
            if (is_file($file) && $file != $path) {
                unlink($file);
            }
        }
        $docxtotei = join(DIRECTORY_SEPARATOR, [getcwd(), "docxtotei", "docxtotei.php"]);
        $docxtoteiConfig= join(DIRECTORY_SEPARATOR, [getcwd(), "docxtotei", "config.json"]);
        $input_file =  join(DIRECTORY_SEPARATOR, [getcwd(),$path]);
        $command = join(" ", ["php", $docxtotei,$input_file,str_replace('.docx','.xml',$input_file),$docxtoteiConfig]);
        $output = shell_exec($command." 2>&1; echo $?");
        file_put_contents(str_replace('.docx','.log',$input_file), $output);
        print("The file " . basename($name) . " has been  converted".'<br/>');
        foreach (explode("\n",$output) as $value){
            print($value.'<br/>');
        }

    } else {
        echo "There was an error uploading the file, please try again!";
    }
} else {
    echo "Only docx files can be converted";
}


$uploads = opendir("uploads/.");
while ($entryName = readdir($uploads)) {
    $dirArray[] = $entryName;
}
closedir($uploads);
$indexCount = count($dirArray);

// sort 'em
sort($dirArray);
// print 'em
print("<br/>\n");
print("<br/>\n");
print("<TABLE border=1 cellpadding=5 cellspacing=0 class=whitelinks>\n");
// loop through the array of files and print them all
for ($index = 0; $index < $indexCount; $index++) {
    if (substr("$dirArray[$index]", 0, 1) != ".") { // don't list hidden files
        print("<TR><TD><a href=\"uploads/$dirArray[$index]\">$dirArray[$index]</a></td></TR>");

    }
}
print("</TABLE>\n");
print('<div class="col-xs-12" style="height:500px;"></div>');
print("<H2>Templates</H2>\n");

$docs = opendir("templates/.");
while ($entryName = readdir($docs)) {
    $templates[] = $entryName;
}
closedir($docs);
$indexCount = count($templates);

print("<TABLE border=1 cellpadding=5 cellspacing=0 class=whitelinks>\n");
for ($index = 0; $index < $indexCount; $index++) {
    if (substr("$templates[$index]", 0, 1) != ".") { // don't list hidden files
        print("<TR><TD><a href=\"templates/$templates[$index]\">$templates[$index]</a></td></TR>");

    }
}
print("</TABLE>\n");


print('<div class="footer">');
print('  <p>This Tool is  an initial version (1) , an updated version  will follow soon.</p>');
print('</div>');


?>
