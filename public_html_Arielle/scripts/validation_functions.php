<?php
//CONTAINS ALL DATA VALIDATION FUNCTIONS

/**Check for empty value */
  function is_blank($value) {
    return !isset($value) || trim($value) === '';
  }

/** Check for non-empty value */
  function has_presence($value) {
    return !is_blank($value);
  }

/** Checks if string length greater than int argument. Counts spaces as well. */
  function has_length_greater_than($value, $min) {
    $length = strlen($value);
    return $length > $min;
  }

/** Check for string length less than int argument */
  function has_length_less_than($value, $max) {
    $length = strlen($value);
    return $length < $max;
  }

/** Check for string length matching int argument */
  function has_length_exactly($value, $exact) {
    $length = strlen($value);
    return $length == $exact;
  }

  // Ex: has_length('abcd', ['min' => 3, 'max' => 5])
 /** Check for string length within a range */
  function has_length($value, $options) {
    if(isset($options['min']) && !has_length_greater_than($value, $options['min'])) {
      return false;
    } elseif(isset($options['max']) && !has_length_less_than($value, $options['max'])) {
      return false;
    } elseif(isset($options['exact']) && !has_length_exactly($value, $options['exact'])) {
      return false;
    } else {
      return true;
    }
  }

  // Ex: has_inclusion_of( 5, [1,3,5,7,9] )
  // * Check for existence of a specific value in a set of values
  function has_inclusion_of($value, $set) {
  	return in_array($value, $set);
  }

  // has_exclusion_of( 5, [1,3,5,7,9] )
  // * Check for absence of a specific value from a set of values
  function has_exclusion_of($value, $set) {
    return !in_array($value, $set);
  }

  /** Checks for existence of a substring in a larger string */
  function has_string($value, $required_string) {
    return strpos($value, $required_string) !== false;
  }

  /** Check for valid email address syntax */
  function has_valid_email_format($value) {
    $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
    return preg_match($email_regex, $value) === 1;
  }
?>
