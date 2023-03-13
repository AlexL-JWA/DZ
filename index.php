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
 * Read file.
 *
 * @param string $file_path File path.
 *
 */
function file_read( string $file_path ): void {
	$file = fopen( $file_path, 'rb' );

	$i = 1;
	while ( ! feof( $file ) ) {
		$str = trim( fgets( $file ) );
		if ( $i % 2 !== 0 ) {
			file_write( WRITE_FILE_NAME, $str );
		}

		$i ++;
	}

	fclose( $file );
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

file_read( READ_FILE_NAME );