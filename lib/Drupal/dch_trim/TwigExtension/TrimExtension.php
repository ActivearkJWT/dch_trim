<?php
/**
 * Created by PhpStorm.
 * User: jquinton
 * Date: 29.4.2014
 * Time: 19.49
 */

namespace Drupal\dch_trim\TwigExtension;

use Drupal\Core\Template\TwigExtension;

class TrimExtension extends TwigExtension{

  public function getName () {
    return 'dch_trim.trim_extension';
  }

  public function getFilters(){
    return array('trim_words' => new \Twig_Filter_Function(array('Drupal\dch_trim\TwigExtension\TrimExtension', 'trimWords')));
  }

  public static function trimWords ($string, $limit = 10, $append = '') {

    $parts = explode(' ', $string);

    if (count($parts) <= $limit) {
      return $string;
    }

    $string = implode(' ', array_slice($parts, 0, $limit));

    return $string . $append;
  }
} 