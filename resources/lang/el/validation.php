<?php

return [
    'accepted'         => 'Το πεδίο :attribute πρέπει να γίνει αποδεκτή.',
    'active_url'       => 'Το πεδίο :attribute δεν είναι έγκυρη διεύθυνση',
    'after'            => 'Το πεδίο :attribute πρέπει να είναι ημερομηνία μετά από την :date.',
    'after_or_equal'   => 'The :attribute must be a date after or equal to :date.',
    'alpha'            => 'Το πεδίο :attribute μπορεί να περιέχει μόνο γράμματα',
    'alpha_dash'       => 'Το πεδίο :attribute μπορεί να περιέχει μόνο γράμματα, αριθμούς και παύλες.',
    'alpha_num'        => 'Το πεδίο :attribute μπορεί να περιέχει μόνο γράμματα και αριθμούς',
    'latin'            => 'The :attribute may only contain ISO basic Latin alphabet letters.',
    'latin_dash_space' => 'The :attribute may only contain ISO basic Latin alphabet letters, numbers, dashes, hyphens and spaces.',
    'array'            => 'Το πεδίο :attribute πρέπει να είναι πίνακας.',
    'before'           => 'Το πεδίο :attribute πρέπει να είναι ημερομηνία πριν από την :date',
    'before_or_equal'  => 'The :attribute must be a date before or equal to :date.',
    'between'          => [
        'numeric' => 'Το πεδίο :attribute πρέπει να έχει τιμή μεταξύ :min και :max.',
        'file'    => 'Το πεδίο :attribute πρέπει να έχει τιμή μεταξύ :min και :max kilobytes.',
        'string'  => 'Το πεδίο :attribute πρέπει να έχει τιμές μεταξύ :min και :max χαρακτήρες.',
        'array'   => 'Το πεδίο :attribute πρέπει να έχει τιμές μεταξύ :min και :max τεκμήρια.',
    ],
    'boolean'          => 'Το πεδίο :attribute πρέπει να είναι αληθές ή ψευδές.',
    'confirmed'        => 'Το πεδίο :attribute επιβεβαίωσης δεν ταιριάζει.',
    'current_password' => 'The password is incorrect.',
    'date'             => 'Το πεδίο :attribute δεν είναι έγκυρη ημερομηνία.',
    'date_equals'      => 'The :attribute must be a date equal to :date.',
    'date_format'      => 'Το πεδίο :attribute δεν ταιριάζει με τον τύπο :format.',
    'different'        => 'Τα πεδία :attribute και :other πρέπει να διαφέρουν.',
    'digits'           => 'Το πεδίο :attribute πρέπει να φέρει :digits ψηφία.',
    'digits_between'   => 'Το πεδίο :attribute πρέπει να φέρει από :min έως :max ψηφία.',
    'dimensions'       => 'Το πεδίο :attribute φέρει εσφαλμένες διαστάσεις εικόνας.',
    'distinct'         => 'Το πεδίο :attribute φέρει διπλότυπη τιμή.',
    'email'            => 'Το πεδίο :attribute πρέπει να φέρει έγκυρη μορφή διεύθυνσης e-mail.',
    'ends_with'        => 'The :attribute must end with one of the following: :values.',
    'exists'           => 'Το επιλεγμένο πεδίο :attribute δεν είναι έγκυρο.',
    'file'             => 'Το πεδίο :attribute πρέπει να είναι αρχείο.',
    'filled'           => 'Το πεδίο :attribute απαιτείται.',
    'gt'               => [
        'numeric' => 'Το πεδίο :attribute πρέπει να έχει είναι μεγαλύτερο από  :value.',
        'file'    => 'Το πεδίο :attribute πρέπει να έχει μέγεθος μεγαλύτερο από  :value kilobytes.',
        'string'  => 'Το πεδίο :attribute πρέπει να έχει περισσότερους από  :value χαρακτήρες.',
        'array'   => 'Το πεδίο :attribute πρέπει να έχει περισσότερα από :value αντικείμενα.',
    ],
    'gte' => [
        'numeric' => 'Το πεδίο :attribute πρέπει να έχει είναι ίσο ή μεγαλύτερο από  :value.',
        'file'    => 'Το πεδίο :attribute πρέπει να έχει μέγεθος ίσο ή μεγαλύτερο από  :value kilobytes.',
        'string'  => 'Το πεδίο :attribute πρέπει να έχει :value ή περισσότερους  χαρακτήρες.',
        'array'   => 'Το πεδίο :attribute πρέπει να  :value ή περισσότερα αντικείμενα.',
    ],
    'image'    => 'Το πεδίο :attribute πρέπει να είναι εικόνα.',
    'in'       => 'Το επιλεγμένο :attribute δεν είναι αποδεκτό.',
    'in_array' => 'Το πεδίο :attribute δεν υπάρχει στο :other.',
    'integer'  => 'Το πεδίο :attribute πρέπει να είναι ακέραιος.',
    'ip'       => 'Το πεδίο :attribute πρέπει να είναι έγκυρη διεύθυνση IP.',
    'ipv4'     => 'Το πεδίο :attribute πρέπει να  περιέχει έγκυρη διεύθυνση IPv4.',
    'ipv6'     => 'Το πεδίο :attribute πρέπει να  περιέχει έγκυρη διεύθυνση IPv6.',
    'json'     => 'Το πεδίο :attribute πρέπει να φέρει έγκυρη τιμή JSON.',
    'lt'       => [
        'numeric' => 'The :attribute must be less than :value.',
        'file'    => 'The :attribute must be less than :value kilobytes.',
        'string'  => 'The :attribute must be less than :value characters.',
        'array'   => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file'    => 'The :attribute must be less than or equal :value kilobytes.',
        'string'  => 'The :attribute must be less than or equal :value characters.',
        'array'   => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'Το πεδίο :attribute δεν μπορεί να υπερβαίνει την τιμή :max.',
        'file'    => 'Το μέγεθος του πεδίου :attribute δεν μπορεί να υπερβαίνει τα :maxKB.',
        'string'  => 'Το πεδίο :attribute δεν μπορεί να φέρει περισσότερους από :max χαρακτήρες.',
        'array'   => 'Το πεδίο :attribute δεν μπορεί να έχει περισσότερα από :max αντικείμενα.',
    ],
    'mimes'     => 'Το πεδίο :attribute πρέπει να είναι αρχείο τύπου :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min'       => [
        'numeric' => 'Το πεδίο :attribute πρέπει να είναι τουλάχιστον :attribute.',
        'file'    => 'Το πεδίο :attribute θα πρέπει να είναι τουλάχιστον :minKB.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'not_regex'            => 'The :attribute format is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'password'             => 'The password is incorrect.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'Το πεδίο :attribute είναι απαραίτητο.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'Το πεδίο :attribute πρέπει να έχει μέγεθος :size.',
        'file'    => 'Το πεδίο :attribute πρέπει να έχει μέγεθος :size kilobytes.',
        'string'  => 'Το πεδίο :attribute πρέπει να έχει μέγεθος :size χαρακτήρες.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string'      => 'Το πεδίο :attribute πρέπει να είναι τύπου string (χαρακτήρες).',
    'timezone'    => 'The :attribute must be a valid zone.',
    'unique'      => 'The :attribute has already been taken.',
    'uploaded'    => 'The :attribute failed to upload.',
    'url'         => 'The :attribute format is invalid.',
    'uuid'        => 'The :attribute must be a valid UUID.',
    'custom'      => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    'reserved_word'                  => 'The :attribute contains reserved word',
    'dont_allow_first_letter_number' => 'Το πεδίο :input δεν μπορεί να έχει αριθμό ως πρώτο χαρακτήρα.',
    'exceeds_maximum_number'         => 'Το πεδίο :attribute ξεπερνά το μέγιστο επιτρεπτό μήκος',
    'db_column'                      => 'The :attribute may only contain ISO basic Latin alphabet letters, numbers, dash and cannot start with number.',
    'attributes'                     => [],

];
