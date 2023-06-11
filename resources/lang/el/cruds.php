<?php

return [
    'userManagement' => [
        'title'          => 'Διαχείριση χρηστών',
        'title_singular' => 'Διαχείριση χρηστών',
    ],
    'permission' => [
        'title'          => 'Δικαιώματα',
        'title_singular' => 'Δικαίωμα',
        'fields'         => [
            'ταυτότητα'                => 'ταυτότητα',
            'ταυτότητα_helper'         => ' ',
            'title'             => 'Τίτλος',
            'title_helper'      => ' ',
            'created_at'        => 'Δημιουργήθηκε στο',
            'created_at_helper' => ' ',
            'updated_at'        => 'Ενημερώθηκε στις',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Διαγράφηκε στις',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Ρόλοι',
        'title_singular' => 'Ρόλος',
        'fields'         => [
            'id'                 => 'ταυτότητα',
            'ταυτότητα_helper'          => ' ',
            'title'              => 'Τίτλος',
            'title_helper'       => ' ',
            'permissions'        => 'Άδειες',
            'permissions_helper' => ' ',
            'created_at'         => 'Δημιουργήθηκε στο',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Ενημερώθηκε στις',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Διαγράφηκε στις',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Χρήστες',
        'title_singular' => 'Χρήστης',
        'fields'         => [
            'id'                       => 'ταυτότητα',
            'ταυτότητα_helper'                => ' ',
            'name'                     => 'Ονομα',
            'name_helper'              => ' ',
            'email'                    => 'ΗΛΕΚΤΡΟΝΙΚΗ ΔΙΕΥΘΥΝΣΗ',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Κωδικός πρόσβασης',
            'password_helper'          => ' ',
            'roles'                    => 'Ρόλοι',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Δημιουργήθηκε στο',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Ενημερώθηκε στις',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Διαγράφηκε στις',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'patient' => [
        'title'          => 'Ασθενείς',
        'title_singular' => 'Ασθενής',
        'fields'         => [
            'ταυτότητα'                            => 'ταυτότητα',
            'ταυτότητα_helper'                     => ' ',
            'first_name'                    => 'Ονομα',
            'first_name_helper'             => ' ',
            'last_name'                     => 'Επίθετο',
            'last_name_helper'              => ' ',
            'phone'                         => 'Τηλέφωνο',
            'phone_helper'                  => ' ',
            'address'                       => 'Διεύθυνση',
            'address_helper'                => ' ',
            'social_security_number'        => 'Αριθμός κοινωνικής ασφάλισης',
            'social_security_number_helper' => 'AMKA',
            'created_at'                    => 'Δημιουργήθηκε στο',
            'created_at_helper'             => ' ',
            'updated_at'                    => 'Ενημερώθηκε στις',
            'updated_at_helper'             => ' ',
            'deleted_at'                    => 'Διαγράφηκε στις',
            'deleted_at_helper'             => ' ',
        ],
    ],
    'exam' => [
        'title'          => 'Εξετάσεις',
        'title_singular' => 'Εξέταση',
        'fields'         => [
            'ταυτότητα'                => 'ταυτότητα',
            'ταυτότητα_helper'         => ' ',
            'name'              => 'Ονομα',
            'name_helper'       => ' ',
            'Κώδικας'              => 'Κώδικας',
            'Κώδικας_helper'       => ' ',
            'disease'           => 'Ασθένεια',
            'disease_helper'    => 'για το οποίο είναι φτιαγμένο',
            'created_at'        => 'Δημιουργήθηκε στο',
            'created_at_helper' => ' ',
            'updated_at'        => 'Ενημερώθηκε στις',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Διαγράφηκε στις',
            'deleted_at_helper' => ' ',
        ],
    ],
    'reagent' => [
        'title'          => 'Αντιδραστήρια',
        'title_singular' => 'Αντιδραστήριο',
        'fields'         => [
            'ταυτότητα'                     => 'ταυτότητα',
            'ταυτότητα_helper'              => ' ',
            'name'                   => 'Ονομα',
            'name_helper'            => ' ',
            'Κώδικας'                   => 'Κώδικας',
            'Κώδικας_helper'            => ' ',
            'available_stock'        => 'Διαθέσιμο στοκ',
            'available_stock_helper' => ' ',
            'minimum_reserve'        => 'Ελάχιστη κράτηση',
            'minimum_reserve_helper' => ' ',
            'alert' => 'Συναγερμός',
            'created_at'             => 'Δημιουργήθηκε στο',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Ενημερώθηκε στις',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Διαγράφηκε στις',
            'deleted_at_helper'      => ' ',
        ],
    ],
    'test' => [
        'title'          => 'Δοκιμές',
        'title_singular' => 'Δοκιμή',
        'fields'         => [
            'ταυτότητα'                       => 'ταυτότητα',
            'ταυτότητα_helper'                => ' ',
            'exam'                     => 'Εξέταση',
            'exam_helper'              => ' ',
            'patient'                  => 'Ασθενής',
            'patient_helper'           => ' ',
            'date'                     => 'Ημερομηνία',
            'date_helper'              => ' ',
            'customer_received'        => 'Παραλήφθηκε ο πελάτης',
            'customer_received_helper' => ' ',
            'results'                  => 'Αποτελέσματα',
            'results_helper'           => ' ',
            'created_at'               => 'Δημιουργήθηκε στο',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Ενημερώθηκε στις',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Διαγράφηκε στις',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'order' => [
        'title'          => 'Παραγγελίες',
        'title_singular' => 'Σειρά',
        'fields'         => [
            'ταυτότητα'                  => 'ταυτότητα',
            'ταυτότητα_helper'           => ' ',
            'Κώδικας'                => 'Κώδικας',
            'Κώδικας_helper'         => ' ',
            'date_done'           => 'Ημερομηνία Ολοκλήρωσης',
            'date_done_helper'    => ' ',
            'date_skipped'        => 'Ημερομηνία παράλειψης',
            'date_skipped_helper' => ' ',
            'reagents'            => 'Αντιδραστήρια',
            'reagents_helper'     => ' ',
            'created_at'          => 'Δημιουργήθηκε στο',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Ενημερώθηκε στις',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Διαγράφηκε στις',
            'deleted_at_helper'   => ' ',
        ],
    ],

];