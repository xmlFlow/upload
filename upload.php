<html>
<head>
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
    </style>
</head>
<body>
<h2>Conversion Tool</h2>
<form enctype="multipart/form-data" action="upload.php" method="POST">
    <table>

        <tr>
            <td width="30%"><input type="file" name="uploaded_file"></input></td>
            <td><input type="submit" value="Upload"></input></td>
        </tr>
    </table>


</form>
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
        print("The file " . basename($name) . " has been uploaded");
    } else {
        echo "There was an error uploading the file, please try again!";
    }
} else {
    echo "Only docx files can be converted";
}


$myDirectory = opendir("uploads/.");
// get each entry
while ($entryName = readdir($myDirectory)) {
    $dirArray[] = $entryName;
}
// close directory
closedir($myDirectory);
//  count elements in array
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

?>