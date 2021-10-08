<?php
/* Credit to Keith Weaver for this code and tutorial on how to upload images to S3 buckets. I was struggling
with doing this for a long time and his tutorial was awesome and taught me how to solve my issue.
https://github.com/keithweaver/python-aws-s3
https://gist.github.com/keithweaver/70eb06d98b008113ce97f6148fbea83d
https://www.youtube.com/watch?v=aPBFqDIIPYE&ab_channel=Keith%2CtheCoder
*/

	require 'vendor/autoload.php';
	
	use Aws\S3\S3Client;
	use Aws\S3\Exception\S3Exception;

	// AWS Info
	$bucketName = 'inserttobucket';
	$IAM_KEY = process.env.AWS_ACCESS_KEY_ID;
	$IAM_SECRET = process.env.AWS_SECRET_ACCESS_KEY;

	// Connect to AWS
	try {
		$s3 = S3Client::factory(
			array(
				'credentials' => array(
					'key' => $IAM_KEY,
					'secret' => $IAM_SECRET
				),
				'version' => 'latest',
				'region'  => 'us-east-1'
			)
		);
	} catch (Exception $e) {
		// We use a die, so if this fails. It stops here. Typically this is a REST call so this would
		// return a json object.
		die("Error: " . $e->getMessage());
	}

		$keyName = 'test_example/' . basename($_FILES["fileToUpload"]['name']);
	$pathInS3 = 'https://s3.us-east-1.amazonaws.com/' . $bucketName . '/' . $keyName;

	// Add it to S3
	try {
		// Uploaded:
		$file = $_FILES["fileToUpload"]['tmp_name'];

		$s3->putObject(
			array(
				'Bucket'=>$bucketName,
				'Key' =>  $keyName,
				'SourceFile' => $file,
				'StorageClass' => 'REDUCED_REDUNDANCY'
			)
		);

	} catch (S3Exception $e) {
		die('Error:' . $e->getMessage());
	} catch (Exception $e) {
		die('Error:' . $e->getMessage());
	}


	echo 'Complete';
?>