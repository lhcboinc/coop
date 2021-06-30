<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'name'                      => 'Name',
            'name_helper'               => ' ',
            'email'                     => 'Email',
            'email_helper'              => ' ',
            'email_verified_at'         => 'Email verified at',
            'email_verified_at_helper'  => ' ',
            'password'                  => 'Password',
            'password_helper'           => ' ',
            'roles'                     => 'Roles',
            'roles_helper'              => ' ',
            'remember_token'            => 'Remember Token',
            'remember_token_helper'     => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'verified'                  => 'Verified',
            'verified_helper'           => ' ',
            'verified_at'               => 'Verified at',
            'verified_at_helper'        => ' ',
            'verification_token'        => 'Verification token',
            'verification_token_helper' => ' ',
            'first_name'                => 'First Name',
            'first_name_helper'         => ' ',
            'last_name'                 => 'Last Name',
            'last_name_helper'          => ' ',
            'signal'                    => 'Signal',
            'signal_helper'             => ' ',
            'skype'                     => 'Skype',
            'skype_helper'              => ' ',
            'telegram'                  => 'Telegram',
            'telegram_helper'           => ' ',
            'viber'                     => 'Viber',
            'viber_helper'              => ' ',
            'whatsapp'                  => 'Whatsapp',
            'whatsapp_helper'           => ' ',
            'photo'                     => 'Photo',
            'photo_helper'              => ' ',
            'ready_to_go'               => 'Ready To Go',
            'ready_to_go_helper'        => ' ',
            'latest_activity'           => 'Latest Activity',
            'latest_activity_helper'    => ' ',
            'rating_as_worker'          => 'Rating As Worker',
            'rating_as_worker_helper'   => ' ',
            'rating_as_client'          => 'Rating As Client',
            'rating_as_client_helper'   => ' ',
            'gps_lat'                   => 'GPS Lat',
            'gps_lat_helper'            => ' ',
            'gps_long'                  => 'GPS Long',
            'gps_long_helper'           => ' ',
            'gps_approx'                => 'GPS Approx',
            'gps_approx_helper'         => ' ',
            'country'                   => 'Country',
            'country_helper'            => ' ',
            'county'                    => 'County',
            'county_helper'             => ' ',
            'city'                      => 'City',
            'city_helper'               => ' ',
            'address'                   => 'Address',
            'address_helper'            => ' ',
            'zip'                       => 'Zip',
            'zip_helper'                => ' ',
            'status'                    => 'Status',
            'status_helper'             => ' ',
            'impressions'               => 'Impressions',
            'impressions_helper'        => ' ',
            'views'                     => 'Views',
            'views_helper'              => ' ',
            'note'                      => 'Note',
            'note_helper'               => ' ',
            'confirmed_at'              => 'Confirmed At',
            'confirmed_at_helper'       => ' ',
            'notify_email'              => 'Notify Email',
            'notify_email_helper'       => ' ',
            'notify_push'               => 'Notify Push',
            'notify_push_helper'        => ' ',
            'notify_sms'                => 'Notify Sms',
            'notify_sms_helper'         => ' ',
            'text'                      => 'Text',
            'text_helper'               => ' ',
        ],
    ],
    'work' => [
        'title'          => 'Works',
        'title_singular' => 'Work',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'title'                 => 'Title',
            'title_helper'          => ' ',
            'description'           => 'Description',
            'description_helper'    => ' ',
            'gps_lat'               => 'GPS Lat',
            'gps_lat_helper'        => ' ',
            'gps_long'              => 'GPS Long',
            'gps_long_helper'       => ' ',
            'gps_approx'            => 'GPS Approx',
            'gps_approx_helper'     => ' ',
            'payment_type'          => 'Payment Type',
            'payment_type_helper'   => ' ',
            'payment_rate'          => 'Payment Rate',
            'payment_rate_helper'   => ' ',
            'transportation'        => 'Transportation',
            'transportation_helper' => ' ',
            'catering'              => 'Catering',
            'catering_helper'       => ' ',
            'country'               => 'Country',
            'country_helper'        => ' ',
            'county'                => 'County',
            'county_helper'         => ' ',
            'city'                  => 'City',
            'city_helper'           => ' ',
            'address'               => 'Address',
            'address_helper'        => ' ',
            'zip'                   => 'Zip',
            'zip_helper'            => ' ',
            'client'                => 'Client',
            'client_helper'         => ' ',
            'client_ip'             => 'Client IP',
            'client_ip_helper'      => ' ',
            'status'                => 'Status',
            'status_helper'         => ' ',
            'impressions'           => 'Impressions',
            'impressions_helper'    => ' ',
            'views'                 => 'Views',
            'views_helper'          => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'endorsed'              => 'Endorsed',
            'endorsed_helper'       => ' ',
            'reported'              => 'Reported',
            'reported_helper'       => ' ',
        ],
    ],
    'offer' => [
        'title'          => 'Offers',
        'title_singular' => 'Offer',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'work'              => 'Work',
            'work_helper'       => ' ',
            'worker'            => 'Worker',
            'worker_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'worker_ip'         => 'Worker IP',
            'worker_ip_helper'  => ' ',
            'status'            => 'Status',
            'status_helper'     => ' ',
        ],
    ],
    'message' => [
        'title'          => 'Messages',
        'title_singular' => 'Message',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'offer'             => 'Offer',
            'offer_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'sender'            => 'Sender',
            'sender_helper'     => ' ',
            'recipient'         => 'Recipient',
            'recipient_helper'  => ' ',
            'text'              => 'Text',
            'text_helper'       => ' ',
            'sent_at'           => 'Sent At',
            'sent_at_helper'    => ' ',
            'read_at'           => 'Read At',
            'read_at_helper'    => ' ',
            'endorsed'          => 'Endorsed',
            'endorsed_helper'   => ' ',
            'reported'          => 'Reported',
            'reported_helper'   => ' ',
        ],
    ],
    'category' => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'icon'               => 'Icon',
            'icon_helper'        => ' ',
            'color'              => 'Color',
            'color_helper'       => ' ',
            'visibility'         => 'Visibility',
            'visibility_helper'  => ' ',
            'author'             => 'Author',
            'author_helper'      => ' ',
            'editor'             => 'Editor',
            'editor_helper'      => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'cover'              => 'Cover',
            'cover_helper'       => ' ',
        ],
    ],
    'workingHour' => [
        'title'          => 'Working Hours',
        'title_singular' => 'Working Hour',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'weekday'           => 'Weekday',
            'weekday_helper'    => ' ',
            'from'              => 'From',
            'from_helper'       => ' ',
            'till'              => 'Till',
            'till_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'workManagement' => [
        'title'          => 'Work Management',
        'title_singular' => 'Work Management',
    ],
    'userImage' => [
        'title'          => 'User Images',
        'title_singular' => 'User Image',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'url'               => 'URL',
            'url_helper'        => ' ',
            'status'            => 'Status',
            'status_helper'     => ' ',
            'reported'          => 'Reported',
            'reported_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'workImage' => [
        'title'          => 'Work Images',
        'title_singular' => 'Work Image',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'work'              => 'Work',
            'work_helper'       => ' ',
            'url'               => 'URL',
            'url_helper'        => ' ',
            'status'            => 'Status',
            'status_helper'     => ' ',
            'reported'          => 'Reported',
            'reported_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'position'          => 'Position',
            'position_helper'   => ' ',
        ],
    ],
    'feedback' => [
        'title'          => 'Feedbacks',
        'title_singular' => 'Feedback',
        'fields'         => [
            'id'                          => 'ID',
            'id_helper'                   => ' ',
            'work'                        => 'Work',
            'work_helper'                 => ' ',
            'client'                      => 'Client',
            'client_helper'               => ' ',
            'client_rating'               => 'Client Rating',
            'client_rating_helper'        => ' ',
            'client_feedback'             => 'Client Feedback',
            'client_feedback_helper'      => ' ',
            'client_wrote_at'             => 'Client Wrote At',
            'client_wrote_at_helper'      => ' ',
            'hide_client_feedback'        => 'Hide Client Feedback',
            'hide_client_feedback_helper' => ' ',
            'worker'                      => 'Worker',
            'worker_helper'               => ' ',
            'worker_rating'               => 'Worker Rating',
            'worker_rating_helper'        => ' ',
            'worker_feedback'             => 'Worker Feedback',
            'worker_feedback_helper'      => ' ',
            'worker_wrote_at'             => 'Worker Wrote At',
            'worker_wrote_at_helper'      => ' ',
            'hide_worker_feedback'        => 'Hide Worker Feedback',
            'hide_worker_feedback_helper' => ' ',
            'status'                      => 'Status',
            'status_helper'               => ' ',
            'created_at'                  => 'Created at',
            'created_at_helper'           => ' ',
            'updated_at'                  => 'Updated at',
            'updated_at_helper'           => ' ',
            'deleted_at'                  => 'Deleted at',
            'deleted_at_helper'           => ' ',
        ],
    ],
    'accountOperation' => [
        'title'          => 'Account Operations',
        'title_singular' => 'Account Operation',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'operation'         => 'Operation',
            'operation_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'favouriteUser' => [
        'title'          => 'Favourite Users',
        'title_singular' => 'Favourite User',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'author'            => 'Author',
            'author_helper'     => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'favouriteWork' => [
        'title'          => 'Favourite Works',
        'title_singular' => 'Favourite Work',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'author'            => 'Author',
            'author_helper'     => ' ',
            'work'              => 'Work',
            'work_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'help' => [
        'title'          => 'Help',
        'title_singular' => 'Help',
    ],
    'answer' => [
        'title'          => 'Answers',
        'title_singular' => 'Answer',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'question'          => 'Question',
            'question_helper'   => ' ',
            'answer'            => 'Answer',
            'answer_helper'     => ' ',
            'order'             => 'Order',
            'order_helper'      => ' ',
            'status'            => 'Status',
            'status_helper'     => ' ',
            'author'            => 'Author',
            'author_helper'     => ' ',
            'editor'            => 'Editor',
            'editor_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'tutorial' => [
        'title'          => 'Tutorials',
        'title_singular' => 'Tutorial',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'category'           => 'Category',
            'category_helper'    => ' ',
            'order'              => 'Order',
            'order_helper'       => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'url'                => 'url',
            'url_helper'         => ' ',
            'image'              => 'Image',
            'image_helper'       => ' ',
            'status'             => 'Status',
            'status_helper'      => ' ',
            'author'             => 'Author',
            'author_helper'      => ' ',
            'editor'             => 'Editor',
            'editor_helper'      => ' ',
        ],
    ],
    'verification' => [
        'title'          => 'Verifications',
        'title_singular' => 'Verification',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'user'               => 'User',
            'user_helper'        => ' ',
            'doc'                => 'Doc',
            'doc_helper'         => ' ',
            'doc_country'        => 'Doc Country',
            'doc_country_helper' => ' ',
            'firstname'          => 'Firstname',
            'firstname_helper'   => ' ',
            'lastname'           => 'Lastname',
            'lastname_helper'    => ' ',
            'lastdigits'         => 'Last digits',
            'lastdigits_helper'  => ' ',
            'verified_by'        => 'Verified By',
            'verified_by_helper' => ' ',
            'editor'             => 'Editor',
            'editor_helper'      => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'page' => [
        'title'          => 'Pages',
        'title_singular' => 'Page',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'title'                   => 'Title',
            'title_helper'            => ' ',
            'subtitle'                => 'Subtitle',
            'subtitle_helper'         => ' ',
            'text'                    => 'Text',
            'text_helper'             => ' ',
            'meta_title'              => 'Meta Title',
            'meta_title_helper'       => ' ',
            'meta_description'        => 'Meta Description',
            'meta_description_helper' => ' ',
            'meta_keywords'           => 'Meta Keywords',
            'meta_keywords_helper'    => ' ',
            'icon'                    => 'Icon',
            'icon_helper'             => ' ',
            'image'                   => 'Image',
            'image_helper'            => ' ',
            'author'                  => 'Author',
            'author_helper'           => ' ',
            'editor'                  => 'Editor',
            'editor_helper'           => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'status'                  => 'Status',
            'status_helper'           => ' ',
        ],
    ],
];