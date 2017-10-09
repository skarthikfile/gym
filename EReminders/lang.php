<?

// set desired language below

$language="english-american";

/*
Currently available list of languages:

italian
english-american

You must replace the default text, "english-american"
 with another language from the above list if you desire to change the language.
NOTE: The text must be entered exactly as it appears in the list above.
*/






// DO NOT EDIT BELOW

// =======================================================================
// -----------------------------------------------------------------------
// =======================================================================

if ( strcmp($language, "english-american") == 0) {
  require("lang/english-american.php");
} else if ( strcmp($language, "italian") == 0) {
  require("lang/italian.php");
} else { // error condition... wrong language specified
  require("lang/english-american.php");
}

?>
