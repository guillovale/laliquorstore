<?php

return [
	'class' => 'yii\db\Connection',
    	'dsn' => 'pgsql:host=localhost;port=5432;dbname=laliquor',
    	'username' => 'postgres',
    	'password' => 'postgres',
    	'charset' => 'utf8',
	

	#'class' => 'yii\db\Connection',
    	#'dsn' => 'pgsql:host=ec2-184-72-237-95.compute-1.amazonaws.com;port=5432;dbname=dah355f0haatti',
    	#'username' => 'bulcnhpgnwmrjn',
    	#'password' => 'a1beb27819be090c8f71d86a0f728ad5689bf2e6fd4f6b2e61daa38c6bff7c70',
    	#'charset' => 'utf8',

    #'class' => 'yii\db\Connection',
    #'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    #'username' => 'root',
    #'password' => '',
    #'charset' => 'utf8',

	# connection sqlite
	#'class' => 'yii\db\Connection',
	#'dsn' => 'sqlite:@app/db/liquor.db',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
