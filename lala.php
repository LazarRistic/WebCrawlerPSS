<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 10/21/2015
 * Time: 10:44 PM
 */
include("Dancer.php");
include("Competition.php");


function getStringBetween($str, $from, $to)
{
    $sub = substr($str, strpos($str, $from) + strlen($from), strlen($str));
    return substr($sub, 0, strpos($sub, $to));
}

function getDancersCompetitions($url) {
    $homepage = file_get_contents($url);
    $homepage = iconv('windows-1250', 'utf-8', $homepage);

    $html = getStringBetween($homepage, '<html>', "</html>");
    $head = getStringBetween($html, '<head>', '</head>');
    $body = getStringBetween($html, '<body>', "</body>");
    $table = getStringBetween($body, "<table border='0' align='center' class='style1'>", '</table>');

    $parcici = explode("<td", $table);


    $number = 1;
    $dancers = array();
    $dancer = new \root\Dancer();

    $competitions = array();
    $competition = new \root\Competition();

    $myfile2 = fopen("Turnir.txt", "w") or die("Unable to open file!");

    for ($i = 1; $i < count($parcici); $i++) {
        $parce = $parcici[$i] /*. "T"*/;
        $parce = preg_replace('/\s+/', '', $parce);
        fwrite($myfile2, $parce . "\n");
        if ($number==1) {
            $datumigrad = substr($parce, strpos($parce, ">") + 1, -1);
            $temp = explode("<br>", $datumigrad);
            $datum = $temp[0];
            $grad = $temp[1];
            $competition->setDate($datum);
            $competition->setTown($grad);
        } elseif ($number ==2) {
            $parce = substr($parce, 1, -5);
            $temp = explode("<br>", $parce);
            $naziv = $temp[0];
            $kategorija = $temp[1];
            $competition->setCompetitionName($naziv . " " . $kategorija);
        } elseif ($number == 3) {
            $parce = substr($parce, 1, -5);
            $temp = explode("<br>", $parce);
            
        }
        $number++;
    }

    fclose($myfile2);
    return $parcici;
}

function getDancers($kategotija, $razred, $ples) {
    $fields = array(
        'bkat' => $kategotija,
        'braz' => $razred,
        'bples' => $ples,
        'SelPar' => 'Lista'
    );
    //extract data from the post
    extract($_POST);
    //set POST variables
    $url = 'http://www.ples.co.rs/psss/list_bdl.php';


    //url-ify the data for the POST
    $fields_string = http_build_query($fields);
    rtrim($fields_string, '&');

    //open connection
    $ch = curl_init();

    //set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    //execute post
    $page = curl_exec($ch);
    $page = iconv('windows-1250', 'utf-8', $page);


    //close connection
    curl_close($ch);

    $html = getStringBetween($page, '<html>', "</html>");
    $head = getStringBetween($html, '<head>', '</head>');
    $body = getStringBetween($html, '<body>', "</body>");
    $table = getStringBetween($body, "<table border='0' align='center' class='style1'>", '</table>');

    $pieces = explode("<td", $table);
    $number = 1;
    $dancers = array();
    $dancer = new \root\Dancer();

    for ($i = 1; $i < count($pieces); $i++) {
        $piece = $pieces[$i] . "T";
        if ($number == 2) {
            $bodovi = substr($piece, strpos($piece, ">") + 1, -1);
            $bodovi = str_replace("</td>", " ", $bodovi);
            $bodovi = preg_replace('/\s+/', '', $bodovi);

            $dancer->setBodovi($bodovi);
        } elseif ($number == 3) {
            $ostatak = substr($piece, strpos($piece, ">") + 1, -1);
            $nesto = getStringBetween($ostatak, "href=", ">");
            $nesto = str_replace(" ", "%20", $nesto);
            $link = substr($nesto, 1, -1);
            $dancer->setLink($link);
            $nesto2 = getStringBetween($ostatak, ">", "<");
            $dancer->setPar($nesto2);
        } elseif ($number == 4) {
            $piece = substr($piece, 0, strpos($piece, "<"));
            $piece = $piece . "T";
            $dancer->setKlub(substr($piece, 1, -1));
            $dancers[] = $dancer;
            $dancer = new \root\Dancer();
            $number = 0;
        }
        $number++;
    }

    return $dancers;
}

/*$myfile = fopen("Parovi.txt", "w") or die("Unable to open file!");

$bkat = array("PIO", "MLO", "OML", "STO", "SEN");
$braz = array("E", "D", "C", "B", "A", "I");
$bples = array("LA", "ST");
foreach ($bkat as $kat) {
    foreach ($braz as $raz) {
        foreach ($bples as $ples) {
            if ($ples == "LA") {
                fwrite($myfile, "LA: \n" );
            } else {
                fwrite($myfile, "ST: \n");
            }
            foreach (getDancers($kat,$raz,$ples) as $parovi) {
                fwrite($myfile, $parovi . "\n");
            }
        }
    }
}*/

$s = getDancersCompetitions("http://www.ples.co.rs/psss/frm_bdl.php?sfMs=21527&sfZs=9794&imMs=Ristic%20Lazar%20-%20Petrovic%20Sanja&ukbd=133&ktMs=SENCLA");

foreach ($s as $delovi) {
    echo $delovi . "<br/>";
}



//fclose($myfile2);
?>
