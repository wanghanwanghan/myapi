<?php

return [
    'alipay' => [
        'app_id'         => '2016092400586431',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAxiwwc8Kq5K7cydtD+j1SFNMKxjZBMdrlxi9IuKcH+GZ7dLVpLTIp/NjVYdPFpl4fCwE0zeOo2zfWJgjUTQhxjpSudeehFd5IeUAFcUtk56P+ACt/MjUusgC2O/zoUtc4uZAM+4j2mZqPc7htLUjyoGgbo+zuY0JSBzUftSyjp3ju2RIf3RteqpRTchJjH2dBUZFe5p09nMQm8KS1S7bTQCOsUaBR5AKx/CdMAevoWLt36fuudvnOp99JfZtlxDWwsgP/Y6FXZMrXda8iFwuYJXFe/n6sz59OY6yp3cn/2p5UD7P6FGLGWadaKRGsWCzGdED/7XJaOIVORlif3tkBEQIDAQAB',
        'private_key'    => 'MIIEowIBAAKCAQEAotd3CDUYbz1hFE2PMEnmeBo6XGrmLFZkX9Jzt69rDCMwoaGN6tOSp8Y/2cpjWXAHPWxlb70q5ZsYUQtm+InZhjd2CgXy2Yp4SN4m1AatythSYoe9DY/ffsxQ6X5b7d2Xwt/LIQKfxtOHHZIouOS8fxN66GJn5Cc0oHNvpVQZfFcxd0vOBQ98Y9SZkh1E9vUguYQ+wMGvlBnfX4+0kRFVWhDv8s4EDHX+GdD8Lp7ZJDmeQI60o8I9T8tRQukF3zlraJhVlzG78B3uCVymsOZ9hCU80wp6Ywy+I14KQEw4+S9+ZgFAgncLHOORR3Z+JnRezqPI5B88LiW3sqkWJ8H+6QIDAQABAoIBAFNtYCZsTWBwadQlCD8NHW5awZuniNUeTb5p668nyAgn3zpvsm2kh3Y9M2k5Lz0bEBp/9lgQ6nFHzGV5GgArX65Lq8Xm1kxtjMKITgxCf7d0rICeWlUgaLhlpO57Nk3fQWktjrwSxBjxNkAIKaTQS2IvcMCt6dwR2fx6J7DkLUpt8Eoe/T1VAjKr76x6pr/6McVz5J8yOxRohS7eaeMKuB/+HqPSm9Z7RHvV462FWtQqOOly7pgtaF/icOdW0tQv1nEAUiSXMcpT+rKNECSgMrokyXhVRmHdzGCJg6Uah/KG3bRoiV9Ou3aM1jRqP+MhJwf9IOTR6aYo5wTbgyELNAECgYEAzfbgM8m8giNBy+2/TbANjeMsH7TFwcHvAmImAk2UJ0CIgqoXnaVyYfommcNcmplWu+Ea9JRoTTpFRy3fPPiW8TUZ/gKg6HFFWmC9AhvUC2XJ7MLGI40MSrC6g1mHoC7f73+JrE3XmTq1M3GRQ9Xi2NO+EL6/xLfcKlnzI2eDHXECgYEAyma/HF04gkaQtifLrEr77tJltSJg3CR8CWZMaZs6HxL1b+RdWTgN1aZTl0bGexmUCe5luIikSaWTFiVTgyjbH18tEk/+/0dq7cLK7fKThKS8Bldl1fVCxFdUI6vrt7zW96qVHi35NbOEVacMDKYTrBgFjW8YeqIfuv0TVUkiHPkCgYALUSJWliIegHNwEhst2JuWDUJyZ4tqLw7D8cKm475dPcWCcHgluF6FlaojTsG62OwUHLVPdQwaGjaOR635eqtIi6Nm+pv+yaKG6cPY5tCK48fpk3Yxo+FmBTnqV7QFEC5LyZU1+3z6NWiZcAcMVCdHxLKv1ttQos2dIh4i9uAUcQKBgC6Ctd/6vAWT2aVCN9d707DpwF2DbOapq6ctTtnlxdFmNehkfd8GtocmFYdpyCp5kj9F/TIOlFIoLkikgzBcrx3ibSUMJPjcnIHOhXtwht2wTVTXuJsWJSWhO8CGvUAXsP5wwJuSzPW+LubP4ED32QVu77e0k9d6cfgyN8Mdby1hAoGBAKHkmfq+rTSg+EE0KwQOd5249R+O86Vi8SZzK1TYyrZFfr2h+07sXCpDCMxiCVw+i59EH8w92klVDRS+nXusyI49YNNP72195KBJZNk4caHpI0RTuENe2hnU+Ble13CLN3nEf6NjLKj5VWAkHS0SQ+6wwjPP3Bz+UkGKrM6X2zsn',
        'log'            => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id'      => '',
        'mch_id'      => '',
        'key'         => '',
        'cert_client' => '',
        'cert_key'    => '',
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];