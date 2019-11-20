<?php

return [
    'cloud_payments' => [
        'public_key'                                            => '',
        'private_key'                                           => '',


        # Карта MasterCard с 3-D Secure 	5555 5555 5555 4444 	Успешный результат
        'CARD_CRYPTOGRAM_PACKET_WITH_3D_SUCCESS'                =>
            "015555554444200202adKgQsi7ZNdiUyVHpOZQzVEjXYhc82ZvFrYqSs878SeF3Y+0aKHiVmRRR9nZG238x+IIpbQ6Uy260Hm+dwAkLn38nrA0MEyXSn3frgMhVePaJnJ/Cl2o7F9ZAB00j70TDur4RXEWgSX5IhRh2+zzwgyPTIFlJdlJ+yuyqWxSYyEEju1IYIMBToxu5/qHwdsJfdTtN3/9hxM0d51AXJBLONSoiz3xw2WzTqm0m/kjKcabQG0krnLQJE64n826xtcrbiYjQn4c9di52BY2FUDmAnBWyEQpDYog6abdk154Uy6+Ji0k+jAFl4ILh9NGiNGq0XZBhPKcbXuWb1U0xYSycQ==",

        # Карта Visa с 3-D Secure 	4012 8888 8888 1881 	Недостаточно средств на карте
        'CARD_CRYPTOGRAM_PACKET_WITH_3D_FAIL'                   => '014012881881200202Vf7yGio6VzVdz1iSlAegBCMgIj4nFxX2LIwhPiZxX4Q+mFKj8EEAsK3Yf3oSqIB8Hy98xNZR1CHCcfgVQI6i/iJDbD76E5lqlfy4zBcEudoVqP0gI1TUOUSv+C6GZ2EWr9T8L3yfSxoDe819IeU3FWHg1hcR+VaOceB6sOlyHwkQL3/W28LHMM/d2DpCOqvs5oQ8rEZyM/rBln1SZLf/ztQgfJOwwSXGO6hhkFpjjBGKWeefC07+XJJhDOntsyxwhgSqbR+iQ/XAatBC9JCjlNlhSwnllJUPUDtvyttwxiIXtM9w1VB1zTdy1kFuw0b/TaW5a4k5YLSWeFkbM2H7HQ==',

        # Карта Visa без 3-D Secure 	4111 1111 1111 1111 	Успешный результат
        'CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_SUCCESS_VISA'        => '014111111111200202USC4VuXqF9vIti776HAWnqXTFFdnmBUlUJtuWVBroTsOHHui0K4yAbTyZ47hqzJIUkmM0fK8OcyYl8hX3vfrZtydmpMJimakph/LOU4ABRgVeocMlHn1sgCuDpKw4AQbm7PbfLwEZiXBYd8G0BOscUKo3zq+4aGACOzrC90y/rFnt0nTTjVNXiNeH6xe8USiUTpYdb0tgCfZWytTWmSB9TIvTZhE5cFJQcXQH9RT5/lhyTHQdkJu884bdC5VKOjLfCvwIU0F0O9shv5uHaqxNdNEGG2YsmNaV+6Fv6dMWVPhilgApXXuvxPRdVDqiqCVl9DCTfNwcqKmiDP4wwjNCw==',

        # Карта MasterCard без 3-D Secure 	5200 8282 8282 8210 	Успешный результат
        'CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_SUCCESS_MASTER_CARD' => '015200828210200202A88H/u8J58cRIDmpIPK3MvD9bR72+FHqUwFhurxkkkBOLMbgn6nWlQGpfbkR0r+9b9kv7ZbzTPscJLrPdTgi/E5BpTQulgn6N67MBHc9C5TUyrF61VJoNFEPNTd4uSZ/xL48wi2JrDQX+PnyP5gXcQO00AIb67c2Qh7bDt2nBILlr3cppgkjA/P5P5pWhObWyO1f1vES/suzno7VH75M+RRErVBUymmf4KMyarpy37uH1iAs5EJQVvTgI5na/4NhHRNho+tlbwWbCEXs/thUspa1yHegi/tMHI+otVFT8XPImUAGDIKkyMWGJmi4Asdf0QENHOQEG6OhAn0u4kMYYg==',

        # Карта MasterCard без 3-D Secure 	5404 0000 0000 0043 	Недостаточно средств на карте
        'CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_FAIL'                => '015404000043200202PWiQLRu5O7viUbO2L56lPbcNn1mCG/TVcxNV9VMl5d1JagskQLDQHJEAeaygOp4nlR5o22IhsaFAm701Y00JLQyhyquEzO3iefLAb7mlzHv3WyCmC4ZzhVUJfJbSwD4gZO+7beTGIeIozXYQDuQXkFv9DMEaUBRSgEX/9bUbo92YKJSvTa6jNVVIs6dSWj8rFz1a4goWiw9I5GLierLgBgY2BA0T7P+Qa7c/As6mAZFFLmh8zJywWHR/npYmEhOQ8f6qGp+8Fbf9KvgU4La8WA3KL8/5eqUFaFKZbLKDmvykwdUVN05U03dAiiQXY577yjhL3Th3j392kPg9Awq7og==',
    ],

];
