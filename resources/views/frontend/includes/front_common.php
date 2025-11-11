<?php include("classes/security.class.php");
// $rdb = new security('localhost', 'pkengurd_dictionary', 'pkengurd_dict', '6tcnUNXhh(mZ');
$rdb = new security('localhost', 'engl_engishtourdudictionarypk', 'engl_engishtourdudictionarypk', 'MteLB0ssLrCIfD8f');
$path = "https://englishurdudictionarypk.com/";


function Cleaner($input)
{

    if (is_array($input)) {

        foreach ($input as $var => $val) {

            $output[$var] = sanitize($val);
        }
    } else {



        $input = stripslashes($input);


        $input  = cleanInput($input);

        $output = mysqli_real_escape_string($input);
    }

    $output_final = preg_replace("/<.*?>/", "", $output);


    return $output_final;
}



function Link_Res()
{

    $Link_Res = '<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- dict_linkresponsive -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7732304816769492"
     data-ad-slot="3865787162"
     data-ad-format="link"
     data-full-width-responsive="true"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>';

    return $Link_Res;
}

function Add_Res()
{

    $Add_Res = '<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- dict_responsive -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7732304816769492"
     data-ad-slot="8708083564"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>';

    return $Add_Res;
}

function Add_Res_vertical()
{

    $Add_Res_vertical = '<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- dict_responsive -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7732304816769492"
     data-ad-slot="8708083564"
     data-ad-format="vertical"
     data-full-width-responsive="true"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>';

    return $Add_Res_vertical;
}


function Add_Res_rectangle()
{

    $Add_Res_rectangle = '<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- dict_responsive -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7732304816769492"
     data-ad-slot="8708083564"
     data-ad-format="rectangle"
     data-full-width-responsive="true"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>';

    return $Add_Res_rectangle;
}


function Add_Res_horizontal()
{

    $Add_Res_horizontal = '<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- dict_responsive -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7732304816769492"
     data-ad-slot="8708083564"
     data-ad-format="horizontal"
     data-full-width-responsive="true"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>';

    return $Add_Res_horizontal;
}
