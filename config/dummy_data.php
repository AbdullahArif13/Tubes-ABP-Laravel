<?php

return [
    'pembayaran' => [
        [
            'id' => 1,
            'animalName' => 'Ali',
            'animalBreed' => 'Labrador Retriever',
            'animalImage' => 'placeholderAnimal', // Nanti dipanggil via config('assets.images.placeholderAnimal')
            'price' => 1000000,
            'paymentMethod' => 'qris',
            'userName' => 'Gavin Arasyi',
            'userAvatar' => 'avatarPlaceholder',
            'timeInText' => '2 Jam 1 menit 30detik',
        ],
        // ... (tambahkan sisanya sesuai pola di atas)
    ],

    'form_status' => [
        [
            'id' => 1,
            'animalName' => 'Ali',
            'animalBreed' => 'Labrador Retriever',
            'pdf' => 'Raka.pdf',
            'userName' => 'Gavin Arasyi',
            'timeInText' => '2 Jam 1 menit 30detik',
        ],
        // ... 
    ],

    'animals' => [
        [
            'id' => 1,
            'animalName' => 'Ali',
            'animalBreed' => 'Labrador Retriever',
            'price' => 1000000,
            'status' => 'Tersedia',
            'timeInText' => '2 Jam 1 menit 30detik',
        ],
        [
            'id' => 2,
            'animalName' => 'Milo',
            'animalBreed' => 'Golden Retriever',
            'price' => 1500000,
            'status' => 'Tersedia',
            'timeInText' => '1 Jam 20 menit',
        ],
        // ... (copy paste data lainnya dari data_dummy.js)
    ],
];