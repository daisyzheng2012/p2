<?php

    // Error reporting, and display errors on page
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    /*
    *   Generate xkcd style password
    */
    // echo var_dump($_GET);
    $number_of_words = 0;
    $errmsg = " ";
    $add_number = 0;
    $add_symbol = 0;
    $gen_pwd    = "";
    // post validation
    function validate_options() {
        global $number_of_words, $add_number, $add_symbol, $errmsg;
        //number checkbox post-checking
        if (isset($_GET['add_number']) and ($_GET['add_number'] == 'Yes')) {
            $add_number = 1;
            // echo ""$add_number;
        }
        echo $add_number;

        //words number post-checking isset
        $pattern = '/[0-9]/';
        if (isset($_GET['number_of_words']) and preg_match($pattern, $_GET['number_of_words'])) {
            $number_of_words = $_GET['number_of_words'];
            $errmsg = "haha";
        }
        else{
            $number_of_words = 4;
            $errmsg = "Invalid number entered. Showing a default 4 word long paragraph.";
            // echo $errmsg;
        }

        //special character checkbox post-checking
        if (isset($_GET['add_symbol']) and $_GET['add_symbol'] == 'Yes') {
            $add_symbol = 1;
        }

        //words number post-checking
        // if ($_GET['number_of_words'] == "") {
        //     global $number_of_words = 4;
        //     global $errmsg = "Invalid number entered. Showing a default 4 word long paragraph."
        // }
        // else {
        //
        // }
    }

    // generate words
    function generate_wordlist($number_of_words) {
        $filename = "lib/words.txt";
        $handle   = fopen($filename, "r");
        $contents = fread($handle, filesize($filename));
        fclose($handle);
        $results = "";
        $words    = preg_split('/[\s\n]+/', $contents);
        $length   = sizeof($words);
        for($i = 0; $i < $number_of_words; $i++) {
            $results .= $words[rand(0, $length)];
            $results .= " ";
        }
        return $results;
        // echo $contents;
    }

    // generate special character
    function generate_special_character() {
        $special_char = "{}[];:,./<>?_+~!@#";
        echo $special_char[rand(0, strlen($special_char))];
        return $special_char[rand(0, strlen($special_char))];
    }

    // generate numbers
    function generate_number() {
        $numbers = "1234567890";
        // echo mt_rand(0, 9);
        return mt_rand(0, 9);
    }

    // aggregate xkcd password strings
    function xkcd_password_generator() {
        global $number_of_words, $add_number, $add_symbol, $errmsg, $gen_pwd;
        // $gen_pwd = "";
        validate_options();
        // echo $number_of_words;
        $gen_pwd = generate_wordlist($number_of_words);
        if ($add_number == 1) {
            $gen_num = generate_number();
            $gen_pwd = $gen_pwd . strval($gen_num);
        }

        if ($add_symbol == 1) {
            $gen_pwd .= generate_special_character();
        }

        echo $gen_pwd;
        // echo $errmsg;
    }

    function error_message() {
        global $errmsg;
        echo $errmsg;
    }
 ?>
