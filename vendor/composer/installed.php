<?php return array(
    'root' => array(
        'name' => 'badys/booking',
        'pretty_version' => '1.0.0+no-version-set',
        'version' => '1.0.0.0',
        'reference' => NULL,
        'type' => 'stripe-php',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        'badys/booking' => array(
            'pretty_version' => '1.0.0+no-version-set',
            'version' => '1.0.0.0',
            'reference' => NULL,
            'type' => 'stripe-php',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'stripe/stripe-php' => array(
            'pretty_version' => 'v12.3.0',
            'version' => '12.3.0.0',
            'reference' => '260aad072f92ddb05e03d47af13b3616d99b3444',
            'type' => 'library',
            'install_path' => __DIR__ . '/../stripe/stripe-php',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
    ),
);
