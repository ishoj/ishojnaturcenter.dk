<?php


/****************************************************************/
/***  FUNKTION: VIS ANDRE KOMMUNALE HJEMMESIDER FRA ISHOJ.DK  ***/
/****************************************************************/
function json_andre_kommunale_hjemmesider() {
  $output = "";
  $url = "http://www.ishoj.dk/json-andre-kommunale-hjemmesider?hest=" . rand();
  $request = drupal_http_request($url);

  if($request) {
    $json_response = drupal_json_decode($request->data);

    $output .= '<form>';
      $output .= '<label for="hjemmesider">Andre hjemmesider</label>';
      $output .= '<select name="hjemmesider" id="hjemmesider" class="sprite-menu">';
        $output .= '<option value="0" selected="">Vælg en hjemmeside</option>';

        foreach ($json_response as $response_data) {
          $output .= '<option value="' . $response_data['url'] . '">' . $response_data['title'] . '</option>';
        }

      $output .= '</select>';
    $output .= '</form>';
  }
  return $output;
}


/*****************************************************/
/***  FUNKTION: VIS KRISEINFORMATION FRA ISHOJ.DK  ***/
/*****************************************************/
function breaking() {
  $output = "";
  $url_breaking = "http://www.ishoj.dk/json_krisekommunikation?hest=" . rand();
  $request_breaking = drupal_http_request($url_breaking);

  if($request_breaking) {
    $json_response_breaking = drupal_json_decode($request_breaking->data);

    foreach ($json_response_breaking as $response_data_breaking) {
      $output .= "<!-- BREAKING START -->";
      $output .= "<div class=\"breaking\">";
        $output .= "<div class=\"container\">";
          $output .= "<div class=\"row\">";
            $output .= "<div class=\"grid-full\">";
              $output .= "<div class=\"breaking-inner\">";
                $output .= "<a class=\"breaking-close\" href=\"#\" title=\"Luk\"></a>";
                $output .= "<h2><a title=\"BREAKING: " . $response_data_breaking['title'] . "\" href=\"http://ishoj.dk" . $response_data_breaking['php'] . "\">BREAKING: " . $response_data_breaking['title'] . "</a></h2>";
              $output .= "</div>";
            $output .= "</div>";
          $output .= "</div>";
        $output .= "</div>";
      $output .= "</div>";
      $output .= "<!-- BREAKING SLUT -->";
    }
  }
  return $output;
}





?>
