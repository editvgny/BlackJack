<?php


class ZZZ
{


    static $foreground_colors = array(
        'bold'         => '1',    'dim'          => '2',
        'black'        => '0;30', 'dark_gray'    => '1;30',
        'blue'         => '0;34', 'light_blue'   => '1;34',
        'green'        => '0;32', 'light_green'  => '1;32',
        'cyan'         => '0;36', 'light_cyan'   => '1;36',
        'red'          => '0;31', 'light_red'    => '1;31',
        'purple'       => '0;35', 'light_purple' => '1;35',
        'brown'        => '0;33', 'yellow'       => '1;33',
        'light_gray'   => '0;37', 'white'        => '1;37',
        'normal'       => '0;39',
    );

    static $background_colors = array(
        'black'        => '40',   'red'          => '41',
        'green'        => '42',   'yellow'       => '43',
        'blue'         => '44',   'magenta'      => '45',
        'cyan'         => '46',   'light_gray'   => '47',
    );

    static $options = array(
        'underline'    => '4',    'blink'         => '5',
        'reverse'      => '7',    'hidden'        => '8',
    );

    static $EOF = "\n";

    /**
     * Logs a string to console.
     * @param  string  $str        Input String
     * @param  string  $color      Text Color
     * @param  boolean $newline    Append EOF?
     * @param  [type]  $background Background Color
     * @return [type]              Formatted output
     */
    public static function log($str = '', $color = 'normal', $newline = true, $background_color = null)
    {
        if( is_bool($color) )
        {
            $newline = $color;
            $color   = 'normal';
        }
        elseif( is_string($color) && is_string($newline) )
        {
            $background_color = $newline;
            $newline          = true;
        }
        $str = $newline ? $str . self::$EOF : $str;

        echo self::$color($str, $background_color);
    }

    /**
     * Anything below this point (and its related variables):
     * Colored CLI Output is: (C) Jesse Donat
     * https://gist.github.com/donatj/1315354
     * -------------------------------------------------------------
     */

    /**
     * Catches static calls (Wildcard)
     * @param  string $foreground_color Text Color
     * @param  array  $args             Options
     * @return string                   Colored string
     */
    public static function __callStatic($foreground_color, $args)
    {
        $string         = $args[0];
        $colored_string = "";

        // Check if given foreground color found
        if( isset(self::$foreground_colors[$foreground_color]) ) {
            $colored_string .= "\033[" . self::$foreground_colors[$foreground_color] . "m";
        }
        else{
            die( $foreground_color . ' not a valid color');
        }

        array_shift($args);

        foreach( $args as $option ){
            // Check if given background color found
            if(isset(self::$background_colors[$option])) {
                $colored_string .= "\033[" . self::$background_colors[$option] . "m";
            }
            elseif(isset(self::$options[$option])) {
                $colored_string .= "\033[" . self::$options[$option] . "m";
            }
        }

        // Add string and end coloring
        $colored_string .= $string . "\033[0m";

        return $colored_string;

    }

    /**
     * Plays a bell sound in console (if available)
     * @param  integer $count Bell play count
     * @return string         Bell play string
     */
    public static function bell($count = 1) {
        echo str_repeat("\007", $count);
    }





//        $unicodeChar1 = '\u2664';
//        $unicodeChar2 = '\u2661';
//        $unicodeChar3 = '\u2662';
//        $unicodeChar4 = '\u2667';
//        echo "\033[31mRed\n".json_decode('"'.$unicodeChar1.'"');
//        echo json_decode('"'.$unicodeChar2.'"');
//        echo json_decode('"'.$unicodeChar3.'"');
//        echo json_decode('"'.$unicodeChar4.'"');
//        echo "\033[31mRed\n".    // Red Color Text
//            "\033[32mGreen\n".  // Green Color Text
//            "\033[34mBlue\n".   // Blue Color Text
//            "\033[37mWhite\n";
//        $black = "33[0;30m";
//        $darkgray = "33[1;30m";
//        $blue = "33[0;34m";
//        $lightblue = "33[1;34m";
//        $green = "33[0;32m";
//        $lightgreen = "33[1;32m";
//        $cyan = "33[0;36m";
//        $lightcyan = "33[1;36m";
//        $red = "33[0;31m";
//        $lightred = "33[1;31m";
//        $purple = "33[0;35m";
//        $lightpurple = "33[1;35m";
//        $brown = "33[0;33m";
//        $yellow = "33[1;33m";
//        $lightgray = "33[0;37m";
//        $white = "33[1;37m";
//
//        $color = "K";
//        $value = 6;
//        $card = array();
////        .json_decode('"'.$unicodeChar1.'"')
//        array_push($card,'┌──────────┐');
//        array_push($card,'│.'."\033[31m".$color.$value."\033[37m".'.......│');
//        array_push($card,'│..........│');
//        array_push($card,'│..........│');
//        array_push($card,'│....'."\033[31m".json_decode('"'.$unicodeChar1.'"')."\033[37m".'.....│');
//        array_push($card,'│..........│');
//        array_push($card,'│..........│');
//        array_push($card,'│.......'."\033[31m".$color.$value."\033[37m".'.│');
//        array_push($card,'└──────────┘');
//
//        foreach($card as $row){
//            echo $row."\n";
//        }
//
//        $color = "K";
//        $value = 6;
//        $card2 = array();
////        .json_decode('"'.$unicodeChar1.'"')
//        array_push($card2,'┌──────────┐');
//        array_push($card2,'│ '."\033[31m".$color.$value."\033[37m".'       │');
//        array_push($card2,'│          │');
//        array_push($card2,'│          │');
//        array_push($card2,'│    '."\033[31m".json_decode('"'.$unicodeChar1.'"')."\033[37m".'     │');
//        array_push($card2,'│          │');
//        array_push($card2,'│          │');
//        array_push($card2,'│       '."\033[31m".$color.$value."\033[37m".' │');
//        array_push($card2,'└──────────┘');
//
//        for($i = 0 ; $i < count($card2); $i++){
//            echo $card[$i]."          ".$card2[$i]."\n";
//        }

}


