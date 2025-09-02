<?php
session_start();
include_once'config/setting.php';
include_once'config/check-session.php';
include('assets/vendor/file-uploader/src/php/class.fileuploader.php');
	
	// get custom name field
	$customName = isset($_POST['custom_name']) && !empty($_POST['custom_name']) ? $_POST['custom_name'] : null;
	
	// initialize FileUploader
    $FileUploader = new FileUploader('files', array(
        'limit' => 2,
        'maxSize' => null,
		'fileMaxSize' => 50,
        'extensions' => ['png', 'jpg', 'pdf', 'text/plain', 'audio/*', 'video/*'],
        'required' => true,
        'uploadDir' => ADMIN_URL.'uploads/user-face/',
        'title' => $customName ? $customName : 'name',
		'replace' => false,
        'listInput' => false,
        'files' => null,
		'disallowedExtensions' => ['htaccess', 'php', 'php3', 'php4', 'php5', 'phtml', 'exe', 'html', 'conf'],
		'validate_file' => function($file, $options) {
        $isValid = true;
        if ($isValid) {
            return true;
        } else {
            return "Wrong file!";
        }
		}
    ));
	
	// call to upload the files
    $data = $FileUploader->upload();
	
	

	// change file's public data
    if (!empty($data['files'])) {
        $item = $data['files'][0];
        
        $data['files'][0] = array(
            'title' => $item['title'],
            'name' => $item['name'],
            'size' => $item['size'],
            'size2' => $item['size2']
        );
		
        $image_old = $mysqli->query("select * from my_users where token='".$profile_row['token']."'");
        $image_old_row = $image_old->fetch_assoc();
        if($image_old_row['image']!='no-image.png'){
            unlink(ADMIN_URL.'uploads/user-face/'.$image_old_row['image']);
        }
		
        $statement = $mysqli->query("UPDATE my_users SET image='".$item['name']."' WHERE token='".$profile_row['token']."'");
    }

	// export to js
    header('Content-Type: application/json');
	echo json_encode($data);
	exit;