<?php

/**
 * File name to read
 */
const READ_FILE_NAME = 'read.txt';

/**
 * Longer than average file name.
 */
const LONGER_AVERAGE_FILE_NAME = 'longer.txt';


/**
 * Read file to array.
 *
 * @param string $file_path File path.
 *
 * @return array
 */
function read_to_array( string $file_path ): array {
	$string_array = [];

	$file = fopen( $file_path, 'rb' );

	while ( ! feof( $file ) ) {

		$str = trim( fgets( $file ) );

		if ( ! empty( $str ) ) {
			$string_array[] = $str;
		}
	}

	fclose( $file );

	return $string_array;
}

/**
 * Lengths string.
 *
 * @param string $str
 *
 * @return int
 */
function lengths_string( string $str ): int {
	return strlen( $str );
}

/**
 * Longer average.
 *
 * @param string $file_path
 * @param array  $data
 *
 * @return void
 */
function longer_average( string $file_path, array $data ): void {
	$file = fopen( $file_path, 'ab+' );

	$temp_array = array_map( 'strlen', $data );
	$max        = max( $temp_array );
	$middle     = $max / 2;

	foreach ( $data as $str ) {
		if ( $middle < lengths_string( $str ) ) {
			fwrite( $file, $str . PHP_EOL );
		}
	}

	fclose( $file );
}

longer_average( LONGER_AVERAGE_FILE_NAME, read_to_array( READ_FILE_NAME ) );