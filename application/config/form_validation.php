<?php

$config = array(
    'login' => array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email|trim'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required'
        )
    ),
    'change_password' => array(
        array(
            'field' => 'old_password',
            'label' => 'Old Password',
            'rules' => 'required|trim|min_length[5]|max_length[20]'
        ),
        array(
            'field' => 'new_password',
            'label' => 'New Password',
            'rules' => 'required|trim|min_length[5]|max_length[20]'
        )
    ),
    'category' => array(
        array(
            'field' => 'name',
            'label' => 'Category Name',
            'rules' => 'required|trim|min_length[5]|max_length[50]'
        ),
        array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'trim'
        ),
        array(
            'field' => 'icon',
            'label' => 'ICON',
            'rules' => 'required|trim'
        )
    ),
    'add_user' => array(
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required|trim|min_length[2]|max_length[50]|regex_match[/[A-Za-z ]/]'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|trim|min_length[2]|max_length[50]|valid_email'
        ),
        array(
            'field' => 'mobile',
            'label' => 'Mobile',
            'rules' => 'required|trim|exact_length[10]|numeric|callback_mobile_uniqueness'
        ),
        array(
            'field' => 'dob',
            'label' => 'DOB',
            'rules' => 'trim'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|trim|min_length[5]|max_length[20]'
        ),
        array(
            'field' => 'status',
            'label' => 'Status',
            'rules' => 'required|trim'
        )
    ),
    'update_user' => array(
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required|trim|min_length[2]|max_length[50]|regex_match[/[A-Za-z ]/]'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|trim|min_length[2]|max_length[50]|valid_email'
        ),
        array(
            'field' => 'mobile',
            'label' => 'Mobile',
            'rules' => 'required|trim|exact_length[10]|numeric|callback_mobile_uniqueness'
        ),
        array(
            'field' => 'dob',
            'label' => 'DOB',
            'rules' => 'trim'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|min_length[5]|max_length[20]'
        ),
        array(
            'field' => 'status',
            'label' => 'Status',
            'rules' => 'required|trim'
        )
    ),
    'add_business' => array(
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required|trim|min_length[2]|max_length[100]|regex_match[/[A-Za-z ]/]'
        ),
        array(
            'field' => 'established_on',
            'label' => 'Established on',
            'rules' => 'required|trim'
        ),
        array(
            'field' => 'register_no',
            'label' => 'Register no',
            'rules' => 'required|trim|min_length[5]|max_length[50]'
        ),
        array(
            'field' => 'location',
            'label' => 'Location',
            'rules' => 'required|trim|min_length[5]'
        ),
        array(
            'field' => 'area',
            'label' => 'Area',
            'rules' => 'required|trim|min_length[3]'
        ),
        array(
            'field' => 'lat',
            'label' => 'Latitude',
            'rules' => 'required|trim'
        ),
        array(
            'field' => 'lng',
            'label' => 'Longitude',
            'rules' => 'required|trim'
        ),
        array(
            'field' => 'start_time',
            'label' => 'Start time',
            'rules' => 'required|trim'
        ),
        array(
            'field' => 'close_time',
            'label' => 'Close time',
            'rules' => 'required|trim'
        ),
        array(
            'field' => 'url',
            'label' => 'URL',
            'rules' => 'trim|valid_url'
        )
    ),
    'add_notification' => array(
        array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'required|trim|max_length[100]'
        ),
        array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'required|max_length[125]|trim'
        ),
        array(
            'field' => 'type',
            'label' => 'To',
            'rules' => 'required|trim'
        )
    ),
    'add_package' => array(
        array(
            'field' => 'title',
            'label' => 'Heading',
            'rules' => 'required|trim'
        ),
        array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'required|trim'
        ),
        array(
            'field' => 'type',
            'label' => 'Type',
            'rules' => 'required|trim'
        ),
        array(
            'field' => 'validate_till',
            'label' => 'Validate till',
            'rules' => 'required|trim|is_natural_no_zero'
        ),
        array(
            'field' => 'price',
            'label' => 'Price',
            'rules' => 'required|trim|is_natural_no_zero'
        )
    ),
    'error_prefix' => '<span style="color:red">',
    'error_suffix' => '</span>'
);
