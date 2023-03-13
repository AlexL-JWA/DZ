<?php

/**
 * File name to read
 */
const READ_FILE_NAME = 'read.txt';

/**
 * File name to write.
 */
const WRITE_FILE_NAME = 'result.txt';

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

		$string_array = explode( ', ', $str );
	}

	fclose( $file );

	return $string_array;
}

/**
 * Fizz Buzz log in file.
 *
 * @param array $data Data.
 *
 * @return void
 */
function fizz_buzz_log( array $data ): void {

	foreach ( $data as $item ) {
		if ( (int) $item % 3 === 0 ) {
			file_write( WRITE_FILE_NAME, 'Fizz' );
		} elseif ( (int) $item % 5 === 0 ) {
			file_write( WRITE_FILE_NAME, 'Buzz' );
		} else {
			file_write( WRITE_FILE_NAME, $item );
		}
	}
}

/**
 * Echo fizz buzz.
 *
 * @param array $data Data.
 *
 * @return void
 */
function fizz_buzz( array $data ): void {

	foreach ( $data as $item ) {
		if ( (int) $item % 3 === 0 ) {
			echo 'Fizz' . PHP_EOL;
		} elseif ( (int) $item % 5 === 0 ) {
			echo 'Buzz' . PHP_EOL;
		} else {
			echo $item . PHP_EOL;
		}
	}
}


/**
 * Write file.
 *
 * @param string $file_path File path.
 * @param string $str       String data.
 *
 * @return void
 */
function file_write( string $file_path, string $str ): void {
	$file = fopen( $file_path, 'ab+' );

	fwrite( $file, $str . PHP_EOL );

	fclose( $file );
}

fizz_buzz_log( read_to_array( READ_FILE_NAME ) );