<html>
<head>
    <title>Converter</title>
    <style>

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: grey;
            color: white;
            text-align: center;
        }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>
<header>
    <div class="collapse " id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <p><em>Documenta Nepalica</em></p>
                    <p>DOCX-TEI/XML conversion tool</p>
                    <h1 id="documentation">Documentation</h1>
                    <h2 id="overview">Overview</h2>
                    <p>This converter tool transforms semantically annotated MS-word documents (DOCX) into structured TEI XML documents according to the TEI schema customization of the Research Unit “Documents on the History of Religion and Law of Premodern Nepal” at the Heidelberg Academy of Sciences and Humanities. The tool can be used as a web-based tool and a command-line facility. It is implemented in the PHP programming language. Conversion occurs in three main phases, namely extraction, structure creation, and TEI generation and annotation identification.</p>
                    <p>During the extraction part the Word document is read and the content and styling information is extracted. After the extraction, the structuring takes place and generic PHP objects are created. Those objects contain the styling and structural information and can be modified to user needs. PHP objects are grouped into TEI XML objects in the third phase and the document parts are reflected in the TEI XML objects. The last part of the conversion process consists of annotation generation in two levels. The first part is the line level annotation grouping, parsing and content replacing. The second and final part of the annotation identification is the application of global rules for the whole documentation.</p>
                    <p>The development of the tool was funded by the project “Die Anthropologie von Inschriften. Erinnerung und Kulturerbe im öffentlichen Raum” at the Heidelberg Centre for Transcultural Studies (HCTS), University of Heidelberg.</p>
                    <h2 id="metadata-in-tei-header">Metadata in TEI-Header</h2>
                    <table class="table table-striped">
                        <thead>
                        <tr class="header">
                            <th><strong>Word annotation</strong></th>
                            <th><strong>Example value</strong></th>
                            <th><strong>TEI</strong></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="odd">
                            <td>Document ID</td>
                            <td>E_2253_0015A</td>
                            <td>&lt;TEI xml:id="DOCUMENT_ID_HERE" xmlns="http://www.tei-c.org/ns/1.0"&gt;</td>
                        </tr>
                        <tr class="even">
                            <td>Main title of document</td>
                            <td>A copy of an executive order presumably from King Gīrvāṇa granting Rāmānanda Bā̃ḍā the right to retain overseer ship of the Luthāma Guṭha and its lan endowments (VS 1860)</td>
                            <td>&lt;title type="main"&gt;&lt;/title&gt;</td>
                        </tr>
                        <tr class="odd">
                            <td>Short title of document</td>
                            <td>A copy of an executive order granting Rāmānanda Bā̃ḍā the right to retain overseer ship of the Luthāma Guṭha and its land endowments</td>
                            <td>&lt;title type="short"&gt;&lt;/title&gt;</td>
                        </tr>
                        <tr class="even">
                            <td>Author/issuer of document</td>
                            <td>[Gīrvāṇayuddha Vikrama Śāha]</td>
                            <td>&lt;author role="issuer"&gt;&lt;/author&gt;</td>
                        </tr>
                        <tr class="odd">
                            <td>Name of editor(s)</td>
                            <td>Manik Bajracharya</td>
                            <td>&lt;name type="main_editor"&gt;&lt;/name&gt;</td>
                        </tr>
                        <tr class="even">
                            <td>Name of collaborator(s)</td>
                            <td>Yogesh Budhathoki</td>
                            <td>&lt;name type="collaborator"&gt;&lt;/name&gt;</td>
                        </tr>
                        <tr class="odd">
                            <td>Place of deposit / current location of document</td>
                            <td>Kathmandu</td>
                            <td>&lt;settlement&gt;&lt;/settlement&gt;</td>
                        </tr>
                        <tr class="even">
                            <td>Deposit holding institution</td>
                            <td>Manoja Rājopādhyāya</td>
                            <td>&lt;repository&gt;&lt;/repository&gt;</td>
                        </tr>
                        <tr class="odd">
                            <td>Inventory number assigned by holding institution</td>
                            <td></td>
                            <td>&lt;idno&gt;&lt;/idno&gt;</td>
                        </tr>
                        <tr class="even">
                            <td><p>Alternative manifestation/Inventory</p>
                                <p>Type of alternative manifestation</p></td>
                            <td>microfilm</td>
                            <td>&lt;altIdentifier type=""&gt;&lt;/altIdentifier&gt;</td>
                        </tr>
                        <tr class="odd">
                            <td>Alternative Location</td>
                            <td>Kathmandu, Berlin</td>
                            <td>&lt;altIdentifier&gt;&lt;settlement&gt;&lt;/settlement&gt;&lt;/altIdentifier&gt;</td>
                        </tr>
                        <tr class="even">
                            <td>Alternative holding institution</td>
                            <td>Nepal German Manuscript Preservation Project</td>
                            <td>&lt;altIdentifier&gt;&lt;collection&gt;&lt;/collection&gt;&lt;/altIdentifier&gt;</td>
                        </tr>
                        <tr class="odd">
                            <td>Alternative inventory number</td>
                            <td>NGMPP E 2253/15C</td>
                            <td>&lt;altIdentifier&gt;&lt;idno&gt;&lt;/idno&gt;&lt;/altIdentifier&gt;</td>
                        </tr>
                        <tr class="even">
                            <td>Main language of document</td>
                            <td>Nep</td>
                            <td>&lt;textLang mainLang=""/&gt;</td>
                        </tr>
                        <tr class="odd">
                            <td>Other languages</td>
                            <td>San</td>
                            <td>&lt;textLang otherLangs="san"/&gt;</td>
                        </tr>
                        <tr class="even">
                            <td>Link to catalogue entry</td>
                            <td>https://nepalica.hadw-bw.de/nepal/catitems/viewitem/188621</td>
                            <td>&lt;ref target="..."&gt;&lt;/ref&gt;</td>
                        </tr>
                        <tr class="odd">
                            <td>Date of origin of document</td>
                            <td>VS 1856</td>
                            <td>&lt;origDate&gt;&lt;/origDate&gt;</td>
                        </tr>
                        <tr class="even">
                            <td>Place of origin of document</td>
                            <td>Calcutta</td>
                            <td>&lt;origPlace&gt;&lt;/origPlace&gt;</td>
                        </tr>
                        <tr class="odd">
                            <td>Copyright statement</td>
                            <td>copyright statement example here</td>
                            <td>&lt;availability&gt;&lt;p&gt;&lt;/p&gt;&lt;/availability&gt;</td>
                        </tr>
                        <tr class="even">
                            <td>Notes</td>
                            <td>This is some notes.</td>
                            <td>&lt;notesStmt&gt;&lt;note&gt;&lt;note/&gt;&lt;/notesStmt&gt;</td>
                        </tr>
                        </tbody>
                    </table>
                    <h2 id="facsimile-information">Facsimile Information</h2>
                    <table class="table table-striped">
                        <thead>
                        <tr class="header">
                            <th><strong>Word annotation</strong></th>
                            <th><strong>Default</strong></th>
                            <th><strong>Example</strong></th>
                            <th><strong>TEI</strong></th>
                            <th><strong>Description</strong></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="odd">
                            <td>surface</td>
                            <td></td>
                            <td>surface1:E_2253_0532.png:1r</td>
                            <td><p>&lt;facsimile&gt;</p>
                                <p>&lt;surface xml:id="surface1" facs="E_2253_0532.png" ulx="0" uly="0" lrx="0" lry="0"&gt;&lt;/surface&gt;&lt;/facsimile&gt;</p></td>
                            <td>Defines a digital image as written surface of the source material</td>
                        </tr>
                        </tbody>
                    </table>
                    <h2 id="annotations-in-edition-translationsynopsis-and-commentary">Annotations in Edition, Translation/Synopsis and Commentary</h2>
                    <h3 id="formal-and-textual-annotations">Formal and Textual Annotations</h3>
                    <table class="table table-striped">
                        <thead>
                        <tr class="header">
                            <th><strong>Word annotation</strong></th>
                            <th><strong>Default</strong></th>
                            <th><strong>Example</strong></th>
                            <th><strong>TEI</strong></th>
                            <th><strong>Description</strong></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="odd">
                            <td>Abstract</td>
                            <td></td>
                            <td></td>
                            <td>&lt;div xml:id="abs" type="abstract" xml:lang="eng"&gt;</td>
                            <td>Marks the abstract as text division, subdivision of &lt;body&gt;</td>
                        </tr>
                        <tr class="even">
                            <td>Edition (iso-3 language code)</td>
                            <td>xml:lang="nep"</td>
                            <td></td>
                            <td>&lt;div xml:id="ed" type="edition" xml:lang="nep"&gt;</td>
                            <td>Marks the edition as text division, subdivision of &lt;body&gt;</td>
                        </tr>
                        <tr class="odd">
                            <td>English Translation</td>
                            <td></td>
                            <td></td>
                            <td>&lt;div xml:id="et" type="english_translation" corresp="#ed" xml:lang="eng"&gt;</td>
                            <td>Marks the translation as text division, subdivision of &lt;body&gt;</td>
                        </tr>
                        <tr class="even">
                            <td>Synopsis</td>
                            <td></td>
                            <td></td>
                            <td>&lt;div xml:id="syn" type="synopsis" corresp="#ed" xml:lang="eng"&gt;</td>
                            <td>Marks the synopsis as text division, subdivision of &lt;body&gt;</td>
                        </tr>
                        <tr class="odd">
                            <td>Commentary</td>
                            <td></td>
                            <td></td>
                            <td>&lt;div xml:id="commentary" type="commentary" xml:lang="eng"&gt;</td>
                            <td>Marks the commentary as text division, subdivision of &lt;body&gt;</td>
                        </tr>
                        <tr class="even">
                            <td>ab@#correspond@type</td>
                            <td></td>
                            <td>ab@#addition1@#addition</td>
                            <td>&lt;ab type="addition" corresp="# addition1"&gt;</td>
                            <td>anonymous block, used in &lt;div&gt; edition for text blocks</td>
                        </tr>
                        <tr class="odd">
                            <td>pb@#facs@page-number</td>
                            <td></td>
                            <td>pb@#surface1@1r</td>
                            <td>&lt;pb n="1r" facs="#surface1"/&gt;</td>
                            <td>page beginning, beginning of a new page</td>
                        </tr>
                        <tr class="even">
                            <td>Word1 word2</td>
                            <td></td>
                            <td># Buddhist literature. #</td>
                            <td>&lt;w&gt;Buddhist &lt;/w&gt;&lt;w&gt;literature.&lt;/w&gt;</td>
                            <td>marks a word</td>
                        </tr>
                        <tr class="odd">
                            <td>&amp;#x200c;</td>
                            <td></td>
                            <td><p>षेत्&amp;#x200c;•-</p>
                                <p>वाहेक</p>
                                <p>_________________</p>
                                <p>मर्&amp;#x200c;यो</p></td>
                            <td><p>&lt;w&gt;षेत्&amp;#x200c;&lt;orig&gt;•&lt;/orig&gt;&lt;lb n="15" break="no"/&gt;वाहेक&lt;/w&gt;</p>
                                <p>______________</p>
                                <p>&lt;w&gt;मर्&amp;#x200c;यो&lt;/w&gt;</p>
                                <p>= मर्यो</p></td>
                            <td>Zero width non-joiner</td>
                        </tr>
                        <tr class="even">
                            <td>&amp;#8205;</td>
                            <td></td>
                            <td>मर्&amp;#8205;यो</td>
                            <td><p>&lt;w&gt;मर्&amp;#8205;यो&lt;/w&gt;</p>
                                <p>= मर्‍यो</p></td>
                            <td>Zero width joiner</td>
                        </tr>
                        <tr class="odd">
                            <td>#SB@lan Content #SE</td>
                            <td></td>
                            <td>#SBA long affairSE#</td>
                            <td>&lt;s&gt;A long affair&lt;/s&gt;</td>
                            <td>marks a sentence like unit</td>
                        </tr>
                        <tr class="even">
                            <td>Empty line</td>
                            <td></td>
                            <td>``</td>
                            <td>&lt;lb&gt;</td>
                            <td>beginning of a new line</td>
                        </tr>
                        <tr class="odd">
                            <td>-</td>
                            <td></td>
                            <td>-</td>
                            <td>&lt;lb @break=no&gt;</td>
                            <td>to be used if line break splits a word</td>
                        </tr>
                        <tr class="even">
                            <td>#++++@extent@agent#</td>
                            <td>extent=characters</td>
                            <td>#++++@agent#</td>
                            <td>&lt;gap @reason=“illegible“ extent=“4 lines“&gt;</td>
                            <td>marks illegible text</td>
                        </tr>
                        <tr class="odd">
                            <td>#///@extent@agent#</td>
                            <td>extent=characters</td>
                            <td>#///@characters@breakage#</td>
                            <td>&lt;gap @reason=“lost extent=“3 characters“ agent=“breakage“&gt;</td>
                            <td>marks lost text</td>
                        </tr>
                        <tr class="even">
                            <td>#...#</td>
                            <td>default: chars</td>
                            <td>#...@lines#</td>
                            <td>&lt;space quantity="3" unit="chars"/&gt;</td>
                            <td>marks space between words or lines</td>
                        </tr>
                        <tr class="odd">
                            <td>#&amp;@place@hand{}#</td>
                            <td>place="above_the_line" hand="first" e.g. @@second"</td>
                            <td>#&amp;@above_the_line@first#</td>
                            <td>&lt;add place="above_the_line" hand="first"/&gt;</td>
                            <td>Scribal addition</td>
                        </tr>
                        <tr class="even">
                            <td>#del@rend{text}#</td>
                            <td></td>
                            <td>#DEL@rend:crossed_out{deleted text}#</td>
                            <td>&lt;del @rend="overstrike"&gt;"deleted text"&gt;&lt;/del&gt;</td>
                            <td>Scribal deletion</td>
                        </tr>
                        <tr class="odd">
                            <td>•</td>
                            <td></td>
                            <td>•</td>
                            <td>&lt;orig&gt;•&lt;/orig&gt;</td>
                            <td>Middle dot</td>
                        </tr>
                        <tr class="even">
                            <td>Table</td>
                            <td></td>
                            <td></td>
                            <td><p>&lt;table&gt;&lt;/table&gt;</p>
                                <p>&lt;row&gt;&lt;/row&gt;</p>
                                <p>&lt;cell&gt;&lt;/cell&gt;</p>
                                <p>&lt;lb/&gt;</p></td>
                            <td><p>outer frame of table; marks row inside &lt;table&gt;; marks cell inside &lt;row&gt;;</p>
                                <p>line break in a cell</p></td>
                        </tr>
                        </tbody>
                    </table>
                    <h3 id="editorial-annotations">Editorial Annotations</h3>
                    <table class="table table-striped">
                        <thead>
                        <tr class="header">
                            <th><strong>Word annotation</strong></th>
                            <th><strong>Default</strong></th>
                            <th><strong>Example</strong></th>
                            <th><strong>TEI</strong></th>
                            <th><strong>Description</strong></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="odd">
                            <td>#?@cert{text}#</td>
                            <td>@cert=high</td>
                            <td>#?@high{text unclear}#</td>
                            <td>&lt;unclear @cert=high&gt; &lt;/unclear&gt;</td>
                            <td>marks a doubtful reading</td>
                        </tr>
                        <tr class="even">
                            <td>#cor{text}{text}#</td>
                            <td></td>
                            <td>#cor{Tabel}{Table}#</td>
                            <td>&lt;choice&gt;&lt;sic&gt;Tabel&lt;/sic&gt; &lt;corr&gt;Table&lt;/corr&gt;&lt;/choice&gt;</td>
                            <td><strong>corrections by the editor</strong> (mark original word by &lt;sic&gt; and corrected one by &lt;corr&gt;</td>
                        </tr>
                        <tr class="odd">
                            <td>#orig{text}#</td>
                            <td></td>
                            <td>#orig{Tall}#</td>
                            <td>&lt;orig&gt;Tall&lt;/orig&gt;</td>
                            <td>Annotating original interpunctuation (।), orthographic peculiarities (such as nuktas)</td>
                        </tr>
                        <tr class="even">
                            <td>#reg{text}{}#</td>
                            <td></td>
                            <td>#reg{Talel}{Table}#</td>
                            <td>&lt;choice&gt;&lt;orig&gt;Tabel&lt;/orig&gt; &lt;reg&gt;Table&lt;/reg&gt;&lt;/choice&gt;</td>
                            <td><strong>standardization by the editor</strong> (mark original word by &lt;orig&gt; and standardized one by &lt;reg&gt;</td>
                        </tr>
                        <tr class="odd">
                            <td>#sur{text}#</td>
                            <td></td>
                            <td>#sur{unnecessary text}#</td>
                            <td>&lt;surplus&gt;unnecessary text&lt;/surplus&gt;</td>
                            <td>marks a word or phrase of the original which the editor considers to be superfluous or redundant</td>
                        </tr>
                        <tr class="even">
                            <td>#sup@reason{text}#</td>
                            <td>@reason=lost</td>
                            <td>#sup@lost{text supplied by editor}#</td>
                            <td>&lt;supplied @reason=“lost&gt;text supplied by editor &lt;/supplied&gt;</td>
                            <td>editor’s restoration of lost/illegible/omitted text</td>
                        </tr>
                        </tbody>
                    </table>
                    <h3 id="content-annotations">Content Annotations</h3>
                    <table class="table table-striped">
                        <thead>
                        <tr class="header">
                            <th><strong>Word annotation</strong></th>
                            <th><strong>Default</strong></th>
                            <th><strong>Example</strong></th>
                            <th><strong>TEI</strong></th>
                            <th><strong>Description</strong></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="odd">
                            <td>#pen{text}#</td>
                            <td></td>
                            <td>#pen{ Text }#</td>
                            <td>&lt;persName&gt;Text&lt;/persName&gt;</td>
                            <td>marks a personal name</td>
                        </tr>
                        <tr class="even">
                            <td>#pln{text}#</td>
                            <td></td>
                            <td>#pln{Text}#</td>
                            <td>&lt;placeName&gt;Text&lt;/placeName&gt;</td>
                            <td>marks a place name</td>
                        </tr>
                        <tr class="odd">
                            <td>#gen{text}#</td>
                            <td></td>
                            <td>#gen{Text}#</td>
                            <td>&lt;geogName&gt;Text&lt;/geogName&gt;</td>
                            <td>marks a name associated with some geographical feature such as mountains, river etc.</td>
                        </tr>
                        </tbody>
                    </table>
                    <h3 id="annotations-specific-for-translation-and-commentary">Annotations specific for translation and commentary</h3>
                    <table class="table table-striped">
                        <thead>
                        <tr class="header">
                            <th><strong>Word annotation</strong></th>
                            <th><strong>Default</strong></th>
                            <th><strong>Example</strong></th>
                            <th><strong>TEI</strong></th>
                            <th><strong>Description</strong></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="odd">
                            <td>#pb@p:page-number#</td>
                            <td></td>
                            <td>#pb@1r#</td>
                            <td>&lt;pb n="1r"/&gt;</td>
                            <td>page break, beginning of a new page</td>
                        </tr>
                        <tr class="even">
                            <td>Hard paragraph return (Enter)</td>
                            <td></td>
                            <td></td>
                            <td>&lt;p&gt;&lt;/p&gt;</td>
                            <td>paragraph</td>
                        </tr>
                        <tr class="odd">
                            <td><em>italics</em></td>
                            <td></td>
                            <td></td>
                            <td>&lt;foreign&gt;&lt;/foreign&gt;</td>
                            <td>italizes a word or phrase not annotated as &lt;term&gt;</td>
                        </tr>
                        <tr class="even">
                            <td>Footnote<sup>1</sup></td>
                            <td></td>
                            <td></td>
                            <td>&lt;note place=”end”&gt;&lt;/note&gt;</td>
                            <td>footnote</td>
                        </tr>
                        <tr class="odd">
                            <td>#ref{}#</td>
                            <td></td>
                            <td>#ref{URL}# e.g. #ref{https://google.com}#</td>
                            <td>&lt;ref &gt;&lt;/ref &gt;</td>
                            <td>marks a URI reference</td>
                        </tr>
                        <tr class="even">
                            <td>#ref@URL{}#</td>
                            <td>@target</td>
                            <td>#ref@URL{}# e.g ref@https://web.de{गूठका खेत वढाउदै}</td>
                            <td>&lt;ref target=””&gt;&lt;/ref&gt;</td>
                            <td>marks a URI reference (word as link)</td>
                        </tr>
                        <tr class="odd">
                            <td>#bibl@corresp_id{citation-string}#</td>
                            <td></td>
                            <td>#bibl@168{Acharya 1971}#</td>
                            <td>&lt;bibl corresp="168"&gt;Acharya 1971&lt;/bibl&gt;</td>
                            <td>Marks a citation</td>
                        </tr>
                        <tr class="even">
                            <td>#tt@ref_id{term-string}#</td>
                            <td></td>
                            <td>#tt@224{pañjā[patra] likhata}#</td>
                            <td>&lt;term ref="224"&gt;pañjā[patra] likhata&lt;/term&gt;</td>
                            <td>Marks a technical term</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
                <div class="col-sm-4 offset-md-1 py-4">

                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <strong>DOCX-TEI/XML conversion tool (Version 1)</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>

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
        print('<TABLE class="table  table-striped">');
        print("The file " . basename($name) . " has been  converted".'<br/>');
        foreach (explode("\n",$output) as $value){
            print($value.'<br/>');
        }
        print('</table>');

    } else {
        echo "There was an error uploading the file, please try again!";
    }
} else {
    echo "Only docx files can be converted.";
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

print('<TABLE class="table  table-striped">');
// loop through the array of files and print them all
for ($index = 0; $index < $indexCount; $index++) {
    if (substr("$dirArray[$index]", 0, 1) != ".") { // don't list hidden files
        print("<TR><TD><a href=\"uploads/$dirArray[$index]\">$dirArray[$index]</a></td></TR>");

    }
}
print("</TABLE>\n");


// Templates

print('<div class="col-xs-12" style="height:500px;"></div>');
print("<H2>Templates</H2>\n");

$docs = opendir("templates/.");
while ($entryName = readdir($docs)) {
    $templates[] = $entryName;
}
closedir($docs);
$indexCount = count($templates);

print('<TABLE  class="table  table-striped">');
for ($index = 0; $index < $indexCount; $index++) {
    if (substr("$templates[$index]", 0, 1) != ".") { // don't list hidden files
        print("<TR><TD><a href=\"templates/$templates[$index]\">$templates[$index]</a></td></TR>");

    }
}
print("</TABLE>\n");


print('<footer class="footer mt-auto py-3 bg-light">  <div class="container">');
print('   <span class="text-muted">This Tool is  an initial version (1) , an updated version  will follow soon.</span>');
print(' </div></footer>');


?>
