#!/usr/bin/python

import Adafruit_DHT as dht

# 1. Membuat variable kelembaban dan suhu
# 2. Sensor menggunakan tipe AM2302, maka function yang dipakai dht.AM2302
# 3. Pin yang digunakan pada GPIO Raspberry adalah 23
# 4. Maka parameter fungsi yang digunakan adalah:
#    dht.read_retry(jenis_sensor, pin_yang_digunakan)
kelembaban, suhu = dht.read_retry(dht.AM2302, 25)

# Agar suhu yang dikeluarkan sensor menjadi real-time, maka
# menggunakan pengulangan
#while True:
print('Suhu: {0:0.1f}*C'.format(suhu))
print('Kelembaban: {0:0.1f}%'.format(kelembaban))
