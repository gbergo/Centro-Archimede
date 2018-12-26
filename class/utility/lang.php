<?php

function getTextLanguage($text, $default) {
      $supported_languages = array(
          'en',
          'it',
      );
      // Italian word list
      // from http://1000mostcommonwords.com/1000-most-common-italian-words/
      $wordList['it'] = array ('come','io','che','lui','era','per','su',
        'sono','con','essi','essere','a','uno','avere','questo','da','da',
        'caldo','parola','ma');
      // English word list
      // from http://en.wikipedia.org/wiki/Most_common_words_in_English
      $wordList['en'] = array ('the', 'be', 'to', 'of', 'and', 'a', 'in', 
          'that', 'have', 'I', 'it', 'for', 'not', 'on', 'with', 'he', 
          'as', 'you', 'do', 'at');
      // clean out the input string - note we don't have any non-ASCII 
      // characters in the word lists... change this if it is not the 
      // case in your language wordlists!
      $text = preg_replace("/[^A-Za-z]/", ' ', $text);
      // count the occurrences of the most frequent words
      foreach ($supported_languages as $language) {
        $counter[$language]=0;
      }
      for ($i = 0; $i < 20; $i++) {
        foreach ($supported_languages as $language) {
          $counter[$language] = $counter[$language] + 
            // I believe this is way faster than fancy RegEx solutions
            substr_count($text, ' ' .$wordList[$language][$i] . ' ');
        }
      }
      // get max counter value
      // from http://stackoverflow.com/a/1461363
      $max = max($counter);
      $maxs = array_keys($counter, $max);
      // if there are two winners - fall back to default!
      if (count($maxs) == 1) {
        $winner = $maxs[0];
        $second = 0;
        // get runner-up (second place)
        foreach ($supported_languages as $language) {
          if ($language <> $winner) {
            if ($counter[$language]>$second) {
              $second = $counter[$language];
            }
          }
        }
        // apply arbitrary threshold of 10%
        if (($second / $max) < 0.1) {
          return $winner;
        } 
      }
      return $default;
    }

    ?>